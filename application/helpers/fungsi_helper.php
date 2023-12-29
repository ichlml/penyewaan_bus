<?php

    function check_alerdy_login()
    {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_admin');
        if($user_session){
            redirect('admin');
        }
    }
    
    function check_not_login()
    {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_admin');
        if(!$user_session){
            redirect('admin/login');
        }
    }

    // pengguna
    function check_alerdy_login_p()
    {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user');
        if($user_session){
            redirect('pengguna');
        }
    }

    function check_not_login_p()
    {
        $ci =& get_instance();
        $user_session = $ci->session->userdata('id_user');
        if(!$user_session){
            redirect('pengguna/login');
        }
    }

    
?>