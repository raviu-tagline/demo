<?php
    defined('BASEPATH') OR exit('No direct permission');
    class Model_test
    {
        private $CI;
        private $login;

        function __construct()
        {
            $this->CI =& get_instance();
            $this->CI->load->library('unit_test');
            $this->CI->load->library('form_validation');
        }

        function model_test()
        {
            $uri = $this->CI->uri->segment(1);
            
            if($uri == '' || $uri == NULL) {
                $var = $this->CI->input->post('user_email');
                var_dump($var);
                die;
            }
        }
    }

    if( ! function_exists('login_test')) {
        function login_test() {

            $CI =& get_instance();
            $CI->load->library('unit_test');

            if(isset($_SESSION['userID']) && isset($_SESSION['password']))
            {
                $CI->unit->run($_SESSION['userID'], 'is_string', 'Email is correct', 'Email session set');
                $CI->unit->run($_SESSION['password'], 'is_string', 'Password is correct', 'Password session set');

                echo $CI->unit->report();
            }
        }
    }

    if( ! function_exists('model_test'))
    {
        function model_test()
        {
            $CI =& get_instance();
            $CI->load->library('unit_test');
            $CI->load->model('Dbclass');
            
            if(isset($_SESSION['userID']))
            {
                $email = $_SESSION['userID'];
                $pass = $_SESSION['password'];

                $flds = array('user_email');
                $where = array('user_email' => $email);

                $test = $email;
                
                $result = $CI->Dbclass->select_where($flds, 'tbl_user_data', $where);

                $expected_result = $result[0]['user_email'];

                var_dump($expected_result);
                // die;

                $test_name = 'Tests login details';

                $CI->unit->active(TRUE);

                echo $CI->unit->run($test, $expected_result, $test_name, 'We found if passed');
                
                // $result = $CI->Dbclass->select_where($flds, 'tbl_user_role', $where);
                // if(!empty($result))
                // {
                //     return $result[0];
                // }
                // else
                // {
                //     return $result;
                // }
            }
        }
    }
?>