<?php
    class Admin_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();

            if($_SESSION['role_id'] != 2)
            {
                header('location: '.base_url('error'));
            }
        }

        function index()
        {
            $this->load->view('Admin/index.php');
        }
    }
?>