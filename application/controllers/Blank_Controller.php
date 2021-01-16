<?php 
    class Blank_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $mail = $_SESSION['userID'];
            $role = $_SESSION['role_id'];

            $data['name'] = $this->get_name($mail);
            $data['role'] = $this->get_role($role);

            $this->load->view('blank_page.php',$data);
        }

        function get_name($mail)
        {
            $flds = array('reg_first_name','reg_last_name');
            $where = array('reg_email' => $mail);

            $result = $this->Dbclass->select_where($flds, 'tbl_registration', $where);

            if(!empty($result))
            {
                return $result[0];
            }
            else
            {
                return $result;
            }
        }

        function get_role($role)
        {
            $flds = array('user_role');
            $where = array('role_id' => $role);

            $result = $this->Dbclass->select_where($flds, 'tbl_user_role', $where);

            return $result[0];
        }
    }
?>