<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {

    public function __construct(){
		parent::__construct();
        $this->load->model("Model_product");
        $this->load->model("Model_setting");
    }

    public function index(){
        $data['setting'] = $this->Model_setting->checkSetting();
        $listCart = $this->cart->contents();
        $listShop = array_column($listCart, 'id_olshop');
        $listShopid = array_values(array_unique($listShop));
        if(count($listShopid) > 0){
        $data['productShop'] = $this->Model_product->getInfoolshop($listShopid);
        } else {
            $data['productShop'] = array();
        }
    	$this->load->view('checkout', $data);
    }

    public function pesan(){
        $nama_pembeli = $this->input->post('nama_pembeli');
        $phone_pembeli = $this->input->post('phone_pembeli');
        $alamat_pembeli = $this->input->post('alamat_pembeli');
        $setting = $this->Model_setting->checkSetting();

        $i=0;
        $list_cart = $this->cart->contents();
        $id_olshop = $this->input->post('id_olshop');
        $list_cart_fix = array();
        foreach ($list_cart as $p) {
            if($p['id_olshop'] == $id_olshop){
                array_push($list_cart_fix, $p);
            }
            $i++;
        }
        // echo json_encode($list_cart_fix);
        // print_r($list_cart_fix);
        $pesanan = "";
        $j=1;
        $total_harga = 0;
        foreach ($list_cart_fix as $lc) {
            $hiden_price = "";
            if($setting[0]->show_price == 1){
                $hiden_price = $total_harga+$lc['subtotal'];

            } else {
                $hiden_price = 0;
            }
            $total_harga = $hiden_price;
            if($pesanan == ""){
                $pesanan = "*".$j.". ".$lc['name']."*%0A";
                $pesanan = $pesanan."Quantity : ".$lc['qty']."%0A";
                if($setting[0]->show_price == 1){
                    $pesanan = $pesanan."Harga : "."Rp. ".number_format($lc['price'], 2)."%0A";
                    $pesanan = $pesanan."Subtotal : "."Rp. ".number_format($lc['subtotal'], 2)."%0A";
                } else {
                    $pesanan = $pesanan."Harga : "."Rp. "."0"."%0A";
                    $pesanan = $pesanan."Subtotal : "."Rp. "."0"."%0A";
                }
            } else {
                $pesanan = $pesanan."%0A*".$j.". ".$lc['name']."*%0A";
                $pesanan = $pesanan."Quantity : ".$lc['qty']."%0A";
                if($setting[0]->show_price == 1){
                    $pesanan = $pesanan."Harga : "."Rp. ".number_format($lc['price'], 2)."%0A";
                    $pesanan = $pesanan."Subtotal : "."Rp. ".number_format($lc['subtotal'], 2)."%0A";
                } else {
                    $pesanan = $pesanan."Harga : "."Rp. "."0"."%0A";
                    $pesanan = $pesanan."Subtotal : "."Rp. "."0"."%0A";
                }
            }
            $j++;
        }
        $nama = $nama_pembeli;
        // echo $nama;
        $no_hp = $phone_pembeli;
        $alamat = $alamat_pembeli;
        $no_wa_olshop = $list_cart_fix[0]['no_wa'];
        if(substr($no_wa_olshop, 0,2) == "08"){
            $no_wa_olshop = substr($no_wa_olshop, 1);
            $no_wa_olshop = "62".$no_wa_olshop;
        }
        echo $no_wa_olshop;
        $nama_toko = $list_cart_fix[0]['osname'];
        $pesanan = "Halo *".$nama_toko."*, saya mau order.%0A%0A".$pesanan."%0ATotal Harga : Rp. ".number_format($total_harga, 2);
        $pesanan = $pesanan."%0A--------------------------------";
        $pesanan = $pesanan."%0ANama : ".$nama;
        $pesanan = $pesanan."%0ANo Hp : ".$no_hp;
        $pesanan = $pesanan."%0AAlamat : ".$alamat;
        $pesanan = $pesanan."%0AVia : https://caritoko.com";
        // print_r($pesanan);
        // echo json_encode($pesanan);

        // echo "https://api.whatsapp.com/send?phone=".$no_wa_olshop."&text=".$pesanan;
        redirect("https://api.whatsapp.com/send?phone=".$no_wa_olshop."&text=".$pesanan);
    }

function show_cart(){ 
    $shown = $this->Model_setting->checkSetting();
        $output = '';
        // $no = 0;
        $jml = $this->cart->total_items();
        if($jml == 0){
            $output = '<li>'.
                            '<a class="page-scroll" href="'.base_url('').'">Home</a>'.
                        '</li>'.
                        '<li>'.
                            '<a class="page-scroll" href="'.base_url('').'">Kategori</a>'.
                        '</li>'.
                        '<li>'.
                            '<a class="page-scroll" href="'.base_url('').'">Produk</a>'.
                        '</li>'.
                        '<li>'.
                            '<a href="'.base_url('login').'" target="_blank">Member</a>'.
                        '</li>'.
                        '<li class="dropdown">'.
                            '<a class="dropdown-toggle count-info" href="#" data-toggle="dropdown">'.
                                '<i class="fa fa-shopping-cart"></i>'.
                                // '<span class="label label-warning">'.$this->cart->total_items().'</span>'.
                            '</a>'.
                            '<ul class="dropdown-menu dropdown-messages">'.
                                '<li>'.
                                    '<div class="dropdown-messages-box">'.
                                        '<div class="media-body">'.
                                            '<small class="text-warning">Total</small>'.
                                            '<strong>'.'</strong>'.
                                            '<br>'.
                                        '</div>'.
                                    '</div>'.
                                '</li>'.
                                '<li class="divider"></li>'.
                                '<li>'.
                                    '<div>'.
                                        '<a href="'.base_url('checkout').'" target="_blank"><i class="fa fa-check fa-fw"></i> Lanjutkan?</a>'.
                                    '</div>'.
                                '</li>'.
                            '</ul>'.
                        '</li>';
        } else {
        // $output .= '<span class="label label-warning">'.$this->cart->total_items().'</span>';
        // $output .= '<strong>'.'Rp.'.$this->cart->format_number($this->cart->total()).'</strong>';
            $total = "";
            if($shown[0]->show_price == 1){
                $total = '<strong>'.' Rp. '.number_format($this->cart->total(), 2).'</strong>';

            } else {
                $total = '<strong>'.' Rp. '.number_format(0, 0).'</strong>';
            }
            $output .= '<li>'.
                            '<a class="page-scroll" href="'.base_url('').'">Home</a>'.
                        '</li>'.
                        '<li>'.
                            '<a class="page-scroll" href="'.base_url('').'">Kategori</a>'.
                        '</li>'.
                        '<li>'.
                            '<a class="page-scroll" href="'.base_url('').'">Produk</a>'.
                        '</li>'.
                        '<li>'.
                            '<a href="'.base_url('login').'" target="_blank">Member</a>'.
                        '</li>'.
                        '<li class="dropdown">'.
                            '<a class="dropdown-toggle count-info" href="#" data-toggle="dropdown">'.
                                '<i class="fa fa-shopping-cart"></i>'.
                                '<span class="label label-warning">'.$this->cart->total_items().'</span>'.
                            '</a>'.
                            '<ul class="dropdown-menu dropdown-messages">'.
                                '<li>'.
                                    '<div class="dropdown-messages-box">'.
                                        '<div class="media-body">'.
                                            '<small class="text-warning">Total</small>'.
                                            $total.
                                            '<br>'.
                                        '</div>'.
                                    '</div>'.
                                '</li>'.
                                '<li class="divider"></li>'.
                                '<li>'.
                                    '<div>'.
                                        '<a href="'.base_url('checkout').'" target="_blank"><i class="fa fa-check fa-fw"></i> Lanjutkan?</a>'.
                                    '</div>'.
                                '</li>'.
                            '</ul>'.
                        '</li>';
        }
        return $output;
    }

    function load_cart(){ 
        echo $this->show_cart();
    }

    public function clear_cart(){
        $this->cart->destroy();
        redirect('checkout');
    }

    public function update_qty(){
        $data = array(
            'rowid'   => $this->input->post('row_id'),
            'qty'     => $this->input->post('qty')
        );
        $this->cart->update($data);
        // print_r($data);
        // echo $data['rowid'];
        echo $this->show_cart();
    }

    public function totalShop(){
        // $listShop = $this->Model_product->getProductolshop();
        $setting = $this->Model_setting->checkSetting();
        $result = array();
        $listCart = $this->cart->contents();
        $listShop = array_column($listCart, 'id_olshop');
        $listShopid = array_values(array_unique($listShop));
        foreach ($listShopid as $p) {
            $sum = 0;
            foreach ($listCart as $c) {
                if($c['id_olshop'] == $p){
                    $is_price = "";
                        if($setting[0]->show_price == 1){
                            $is_price = $c['price'];
                        } else {
                            $is_price = 0;
                        }
                    $sum = $sum + ($is_price * $c['qty']);
                }

            }
                $data = array(
                    'id_shop'   => $p,
                    'total'     => $sum
                );
                array_push($result, $data);
        }
        
        // print_r($result);
        // print_r($listCart);
        echo json_encode($result);
    }
    function remove(){
        $rowid = $this->input->post('rowid');
        $data = array(
            'rowid'   => $rowid,
            'qty'     => 0
        );
        $hapus = $this->cart->update($data);

        echo json_encode($hapus);
    }

    // nomer Umam +62 813-5797-7554
}