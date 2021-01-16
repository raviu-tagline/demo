<?php
    class Register_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {
            $this->load->view('Register/index.php');
        }

        function submit()
        {
            $this->form_validation->set_rules('reg_first_name','First Name','trim|required|regex_match[/^[a-zA-z]+/]', 
            array(
                'required' => '%s Must Required',
                'regex_match' => '%s Not valid'
            ));
            
            $this->form_validation->set_rules('reg_last_name', 'Last Name', 'trim|required|regex_match[/^[a-zA-z]+/]', 
            array(
                'required' => '%s Must Required',
                'regex_match' => '%s Not valid'
            ));

            $this->form_validation->set_rules('reg_email', 'Email ID', 'trim|required|is_unique[tbl_registration.reg_email]', 
            array(
                'required' => '%s Must Required',
                'is_unique' => '%s Already exist'
            ));

            if($this->form_validation->run())
            {
                $data['records'] = $_REQUEST;

                $data['records']['reg_token'] = $this->generateToken();

                $data['records']['role_id'] = 3;

                $token = $data['records']['reg_token'];

                // $image = $this->get_image();
                // $data['records']['reg_image'] = $image['image_data']['file_name'];

                if($this->Dbclass->insert('tbl_registration',$data['records']))
                {
                    $fields = array('reg_email', 'reg_token', 'reg_first_name', 'reg_last_name');
                    $where = array('reg_token' => $token);
                    $result = $this->Dbclass->select_where($fields, 'tbl_registration', $where);

                    $db_token = $result[0]['reg_token'];
                    $user = $result[0]['reg_first_name']." ".$result[0]['reg_last_name'];
                    $email = $result[0]['reg_email'];

                    if($token == $db_token)
                    {
                        $this->verify($user, $email, $token);
                    }

                    if(isset($_SESSION['role_id']))
                    {
                        $uri = $this->uri->segment(2);

                        if($_SESSION['role_id'] == 1 && $uri == 'add_admin_data')
                        {
                            header('location: '.base_url('super_admin/add_admin'));
                        }

                        if($_SESSION['role_id'] == 1 && $uri == 'add_employee_data')
                        {
                            header('location: '.base_url('super_admin/add_employee'));
                        }

                        if($_SESSION['role_id'] == 2 && $uri == 'add_employee_data')
                        {
                            header('location: '.base_url('admin/add_employee'));
                        }
                    }
                }
                else
                {
                    $uri = $this->uri->segment(1);
                    if(isset($_SESSION['role_id']) && $uri == "add_admin_data")
                    {
                        header('location: '.base_url('super_admin/add_admin'));
                    }
                    else if(isset($_SESSION['role_id']) && $uri == "add_employee")
                    {
                        if($_SESSION['role_id'] == 1)
                        {
                            header('location: '.base_url('super_admin/add_employee'));
                        }
                        else
                        {
                            header('location: '.base_url('admin/add_employee'));
                        }
                    }
                    else
                    {
                        header('location: '.base_url('register'));
                    }

                }
            }
            else
            {
                $this->form_validation->set_error_delimiters('<p class="error">','</p>');
                $this->load->view('Register/index.php');
            }
        }

        function generateToken()
        {
            return random_string('alnum', 15);
        }

        function verify($user, $email, $token)
        {
            $this->EmailVerification->sendVerificationLink($user, $email, $token);
        }

        function redirection()
        {
            $flds = array('reg_email');
            $token = $this->uri->segment(2);
            $where = array('reg_token' => $token);

            $result = $this->Dbclass->select_where($flds, 'tbl_registration', $where);

            if(!empty($result))
            {
                $data['token'] = $token;
                $this->load->view('Verify/index.php',$data);
            }
            else
            {
                echo "<script>alert('Your email had been verified')</script>";
                header('location: '.base_url());
            }
        }

        function get_image()
        {           
            $config['upload_path'] = './images/register/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload',$config);

            if( ! $this->upload->do_upload('imgUpload'))
            {
                $err = array('error' => $this->upload->display_errors());
                $this->load->view('Register/index.php', $err);
            }
            else
            {
                $data = array('image_data' => $this->upload->data());
                return $data;
            }
        }
    }
?>