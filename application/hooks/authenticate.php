<?php
    defined('BASEPATH') OR exit('No direct permission');
    class Authenticate
    {
        private $CI;
        private $login;

        function authentication()
        {
            $this->CI =& get_instance();
            $uri = $this->CI->uri->segment(1);

            if(!isset($_SESSION['userID']) && ($uri != NULL && $uri != 'register' && $uri != 'email_verify' && $uri != 'change_password' && $uri != 'login'))
            {
                header('location: '.base_url());
            }

            if(isset($_SESSION['userID']) && $uri != NULL)
            {
                if($uri != 'error' && $uri != 'email_verify')
                {
                    $data['name'] = get_name();

                    $data['role'] = get_role();

                    $data['image_src'] = get_image();
                    
                    $this->CI->load->view('Layout/header.php');

                    $this->CI->load->view('Layout/navbar.php', $data);

                    $this->CI->load->view('Layout/sidebar.php', $data);

                }
            }
            
            // if($_SESSION['status'] == 'logout' && $uri == '')
            // {

            // }
        }
    }
?>