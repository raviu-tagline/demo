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

        // function add_admin()
        // {
        //     $this->load->view('super_admin/add_admin');
        // }

        function user_records()
        {
            $tbl = 'tbl_registration';
            $res = $this->Dbclass->select($tbl);
            
            $data['rec'] = $res;
            
            foreach($data as $k)
            {
                foreach($k as $ky => $val)
                {
                    if($ky == 'role_id')
                    {
                        // $where = array('tr.role_id' => $val);
                        $result = $this->Dbclass->join_role_table();

                        $data['rec'] = $result;
                    }
                }
            }
            
            $this->load->view('super_admin/user_records.php',$data);
        }
    }
?>