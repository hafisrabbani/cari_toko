<?php
    function checkSessionUser(){
        $CI =& get_instance();
        if($CI->session->userdata("login_session") == "Y"){
            // redirect("dashboard");
        } else {
            redirect(base_url());
        }
    }
?>