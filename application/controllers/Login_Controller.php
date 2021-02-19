<?php
    class Login_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {

            // $this->load->view('birthday');
            if(isset($_SESSION['role_id']))
            {
                $role = $_SESSION['role_id'];
                if($role == 1)
                {
                    header('location: '.base_url('super_admin/dashboard'));
                }
                if($role == 2)
                {
                    header('location: '.base_url('admin/dashboard'));
                }
                if($role == 3)
                {
                    header('location: '.base_url('employee/dashboard'));
                }
            }
            else
            {
                $this->load->view('Login/index.php');
            }
        }

        function login()
        {
            $this->form_validation->set_rules('user_email', 'Username', 'required' ,array('required' => '%s Must required'));
            $this->form_validation->set_rules('user_password', 'Password', 'required', array( 'required' => '%s Must required'));

            if($this->form_validation->run())
            {
                $mail = $_REQUEST['user_email'];
                $pass = $_REQUEST['user_password'];

                $fields = array('user_email', 'user_password', 'role_id');
                $where = array('user_email' => $mail); //, 'user_password' => $pass_hash

                $result = $this->Dbclass->select_where($fields, 'tbl_user_data', $where);
                
                if(!empty($result) && password_verify($pass, $result[0]['user_password']))
                {
                    $_SESSION['userID'] = $this->input->post('user_email');

                    $_SESSION['role_id'] = $result[0]['role_id'];

                    if($_SESSION['role_id'] == 1)
                    {
                        header('location: '.base_url('super_admin/dashboard'));
                    }

                    if($_SESSION['role_id'] == 2)
                    {
                        header('location: '.base_url('admin/dashboard'));
                    }

                    if($_SESSION['role_id'] == 3)
                    {
                        header('location: '.base_url('employee/dashboard'));
                    }                    
                }
                else
                {
                    $error = array( 'error' => '<p class="error">Invalid Username/ Password</p>');
                    $this->load->view('Login/index.php', $error);
                }
            }
            else
            {
                $this->form_validation->set_error_delimiters('<p class="error">','</p>');
                $this->load->view('Login/index.php');
            }
        }

        function logout()
        {
            unset(
                $_SESSION['role_id'],
                $_SESSION['userID']
            );

            header('location: '.base_url());
        }
    }
?>