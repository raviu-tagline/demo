<?php
    class Super_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();

            if($_SESSION['role_id'] != 1)
            {
                header('location: '.base_url('error'));
            }
        }

        function index()
        {
            $this->load->view('super_admin/index.php');
        }

        function status()
        {
            $this->load->view('super_admin/status.php');
        }

        function add_admin()
        {
            $this->load->view('super_admin/add_admin');
        }
    }
?>