<?php
    class Verify_Controller extends CI_Controller
    {
        function __construct()
        {
            parent::__construct();
            // $this->load->library('password');
        }

        function index()
        {

        }

        function submit()
        {
            $this->form_validation->set_rules('user_password','Password', 'trim|required|min_length[8]|max_length[15]', 
            array( 
                'required' => '%s Must Required',
                'min_length' => '%s is too short',
                'max_length' => '%s is too long'
            ));

            $this->form_validation->set_rules('conf_password', 'Confirm Password', 'trim|required|matches[user_password]', 
            array(
                'required' => '%s Must Required',
                'matches' => '%s Not match'
            ));

            if($this->form_validation->run())
            {
                $tkn = $_REQUEST['hdnToken'];
                $flds = array('reg_email');
                $where = array('reg_token' => $tkn);
                
                $res = $this->Dbclass->select_where($flds, 'tbl_registration', $where);

                if(!empty($res))
                {
                    $mail = $res[0]['reg_email'];
                }

                $password = $this->input->post('user_password');

                $password = password_hash($password, PASSWORD_BCRYPT);

                $data = array('user_password' => $password);
                $where = array('user_email' => $mail);

                $this->Dbclass->update($data, 'tbl_user_data', $where);

                $where = array('reg_email' => $mail);
                $flds = array('reg_token' => NULL);
                $this->Dbclass->delete_fields($flds, 'tbl_registration', $where);

                header('location: '.base_url());
            }
            else
            {
                $this->form_validation->set_error_delimiters('<p class="error">','</p>');
                $this->load->view("Verify/index.php");
            }
        }
    }
?>