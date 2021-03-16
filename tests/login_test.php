<?php

    ob_start();
    require_once('../index.php');
    ob_end_clean();

    class Login_test
    {

        // $CI = '';
        
        function Login_test() {
            $CI =& get_instance();
            var_dump($CI);
        }

        function index() {
            // $this->CI->load('Login_Controller');
            $CI->load->library('unit_test');
        }

        function login_test1() {
             $this->hello();
        }

        function hello()
        {
            echo "Hello121212";
        }
    }

    $obj = new Login_test();
    
    $obj->login_test1();

    
?>