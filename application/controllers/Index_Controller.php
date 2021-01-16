<?php
    class Index_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $this->load->view('Index/index.php');
        }
    }
?>