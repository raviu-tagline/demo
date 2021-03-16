<?php
    class Login_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            // $this->load->library('Google');
            $this->load->model('user');
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

        /*function google_login() {
            if(isset($_GET['code'])){ 
             
             // Authenticate user with google 
                if($this->google->getAuthenticate()){ 
                 
                     // Get user info from google 
                    $gpInfo = $this->google->getUserInfo(); 
                     
                     // Preparing data for database insertion 
                    $userData['oauth_provider'] = 'google'; 
                    $userData['oauth_uid']         = $gpInfo['id']; 
                    $userData['first_name']     = $gpInfo['given_name']; 
                    $userData['last_name']         = $gpInfo['family_name']; 
                    $userData['email']             = $gpInfo['email']; 
                    $userData['gender']         = !empty($gpInfo['gender'])?$gpInfo['gender']:''; 
                    $userData['locale']         = !empty($gpInfo['locale'])?$gpInfo['locale']:''; 
                    $userData['picture']         = !empty($gpInfo['picture'])?$gpInfo['picture']:''; 
                     
                     // Insert or update user data to the database  
                    $userID = $this->user->checkUser($userData); 
                     
                     // Store the status and user profile info into session 
                    $this->session->set_userdata('loggedIn', true); 
                    $this->session->set_userdata('userData', $userData); 
                     
                     // Redirect to profile page 
                    redirect(base_url()); 
                } 
            }
        }*/
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

                    $_SESSION['password'] = $this->input->post('user_password');

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
                    $error = array('error' => '<p class="error">Invalid Username/ Password</p>');
                    $this->unit->run($_REQUEST['user_email'], !empty($result),'Email Not Found');
                    $this->unit->run($_REQUEST['user_password'], password_verify($_REQUEST['user_password'], !empty($result)),'Password not matched');
                    
                    $error['err'] = $this->unit->report();
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