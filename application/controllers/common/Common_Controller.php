<?php
    class Common_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();

            $uri = $this->uri->segment(1);

            // if($_SESSION['role_id'] == 3 && $uri != 'profile')
            // {
            //     header('location: '.base_url('error'));
            // }
        }

        function index()
        {
            echo "Hey";
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

        function add_user()
        {
            $this->load->view('common/add_user.php');
        }

        function profile()
        {
            $data['records'] = '';

            $where = array(
                    'role_id' => $_SESSION['role_id'],
                    'reg_email' => $_SESSION['userID']);

            $flds = array('reg_first_name','reg_last_name','reg_email','reg_image', 'reg_birth_date','role_id');

            $result = $this->Dbclass->select_where($flds,'tbl_registration',$where);

            $role = $this->Dbclass->select_where(array('user_role'),'tbl_user_role',array('role_id' => $result[0]['role_id']));
                
            $data['records'] = $result;

            $data['records'][0]['role_id'] = $role[0]['user_role'];

            $this->load->view('common/profile.php',$data);
        }

        function update_profile()
        {
            if($this->validation())
            {
                $str_name = $this->input->post('name');
                $name = explode(" ",$str_name);
                $img = $this->image_data();
                
                $flds = array(
                    'reg_first_name' => $name[0],
                    'reg_last_name' => $name[1],
                    'reg_birth_date' => $this->input->post('bdate')
                );

                if($img != NULL)
                {
                    $flds['reg_image'] = $img['image']['file_name'];
                }

                $where = array('reg_email' => $_SESSION['userID']);
                $this->Dbclass->update($flds,'tbl_registration',$where);

                if($_SESSION['role_id'] == 1)
                {
                    header('location: '.base_url('super_admin/profile'));
                }

                if($_SESSION['role_id'] == 2)
                {
                    header('location: '.base_url('admin/profile'));
                }

                if($_SESSION['role_id'] == 3)
                {
                    header('location: '.base_url('employee/profile'));
                }
            }
            else
            {
                // $this->load->view('common/profile.php');
            }
            
        }

        function validation()
        {
            $this->form_validation->set_rules('name','Name','required|regex_match[/[^0-9]/]',array(
                'required' => '%s Must Required',
                'regex_matches' => '%s Not Valid'
            ));

            $this->form_validation->set_rules('bdate','Birth Date','required',array(
                'required' => '%s Must Required'
            ));

            if($this->form_validation->run())
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

        function image_data()
        {
            $config['upload_path'] = './images/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = '0';
            $config['max_width'] = '0';
            $config['max_height'] = '0';

            $this->load->library('upload', $config);

            if( ! $this->upload->do_upload('profile_pic'))
            {
                $err = array('error' => $this->upload->display_errors());
                $this->load->view('common/profile.php');
            }
            else
            {
                $data = array('image' => $this->upload->data());
                return $data;
            }
        }
    }
?>