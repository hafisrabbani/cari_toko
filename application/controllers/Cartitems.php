<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartitems extends CI_Controller {

    public function __construct(){
		parent::__construct();
        // checkSessionUser();
        // $loginstatus = $this->session->userdata('role');
        //  if($loginstatus!="SUPERADMIN"){
        //     redirect('my404');
        // $this->load->model("Model_product");
        $this->load->model("Model_setting");
    }

    public function addCart(){
        $id_product = $this->input->post('id_product');
        $id_olshop = $this->input->post('id_olshop');
        $osname = $this->input->post('osname');
        $id_user = $this->input->post('id_user');
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_image = $this->input->post('product_image');
        $product_description = $this->input->post('product_description');
        $no_wa = $this->input->post('no_wa');

        $data = array(
                'id'      => $id_product,
                'id_olshop'      => $id_olshop,
                'osname'      => $osname,
                'id_user' => $id_user,
                'qty'     => 1,
                'price'   => $product_price,
                'name'    => $product_name,
                'product_image' => $product_image,
                'product_description' => $product_description,
                'no_wa' => $no_wa
        );
        // print_r($data);
        $this->cart->insert($data);
        // echo "aaa";

        echo $this->show_cart();
        // echo 'Echo Total items :'.$this->cart->total_items().'<br/>';
        // echo count($data);
        // echo '<pre>',print_r($this->cart->contents(),1),'</pre>';
        // print_r($this->cart->contents());
        // foreach ($this->cart->contents() as $items){
        //     echo $items['name'];
        //     echo $items['subtotal'];
        // }

        // redirect('landingpage');
    }

    function show_cart(){
        $shown = $this->Model_setting->checkSetting();
        $output = '';
        // $no = 0;
        $jml = $this->cart->total_items();
        if($jml == 0){
            $output = '<li>'.
                            '<a style="padding-bottom: 0px; !important;" class="page-scroll" href="'.base_url('').'">Home</a>'.
                        '</li>'.
                        '<li>'.
                            '<a style="padding-bottom: 0px; !important;" class="page-scroll" href="'.base_url('').'">Video</a>'.
                        '</li>'.
                        '<li>'.
                            '<a style="padding-bottom: 0px; !important;" class="page-scroll" href="'.base_url('').'">Donasi</a>'.
                        '</li>'.
                        '<li>'.
                            '<a style="padding-bottom: 0px; !important;" href="'.base_url('login').'" target="_blank">Member</a>'.
                        '</li>'.
                        '<li class="dropdown">'.
                            '<a style="padding-bottom: 0px; !important;" class="dropdown-toggle count-info" href="#" data-toggle="dropdown">'.
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
                            '<a style="padding-bottom: 0px; !important;" class="page-scroll" href="'.base_url('').'">Home</a>'.
                        '</li>'.
                        '<li>'.
                            '<a style="padding-bottom: 0px; !important;" class="page-scroll" href="'.base_url('').'">Kategori</a>'.
                        '</li>'.
                        '<li>'.
                            '<a style="padding-bottom: 0px; !important;" class="page-scroll" href="'.base_url('').'">Produk</a>'.
                        '</li>'.
                        '<li>'.
                            '<a style="padding-bottom: 0px; !important;" href="'.base_url('login').'" target="_blank">Member</a>'.
                        '</li>'.
                        '<li class="dropdown">'.
                            '<a style="padding-bottom: 0px; !important;" class="dropdown-toggle count-info" href="#" data-toggle="dropdown">'.
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

    public function checkOut(){
    	$this->load->view('checkout');
    }
}