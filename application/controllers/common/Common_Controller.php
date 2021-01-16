<?php
    class Common_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();

            $uri = $this->uri->segment(1);

            if($_SESSION['role_id'] == 3 && $uri != 'error')
            {
                header('location: '.base_url('error'));
            }
        }

        function index()
        {

        }

        function project()
        {
            $this->load->view('common/project.php');   
        }

        function salary()
        {
            $this->load->view('common/salary.php');
        }

        function employee()
        {
            $this->load->view('common/employee.php');
        }

        function queries()
        {
            $this->load->view('common/queries.php');
        }

        function error()
        {
            $this->load->view('errors/error_403.php');
        }

        function add_employee()
        {
            $this->load->view('common/add_employee.php');
        }
    }
?>