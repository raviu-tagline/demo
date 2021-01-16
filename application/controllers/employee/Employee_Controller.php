<?php
    class Employee_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();

            if($_SESSION['role_id'] != 3)
            {
                header('location: '.base_url('error'));
            }
        }

        function index()
        {
            $this->load->view('Employee/index.php');
        }

        function profile()
        {
            $this->load->view('Employee/profile.php');
        }

        function tasks()
        {
            $this->load->view('Employee/tasks.php');
        }
    }
?>