<?php
    if( ! defined('BASEPATH')) exit('No direct script access allowed');

    if( ! function_exists('get_name'))
    { 
        function get_name()
        {
            $CI =& get_instance();
            $CI->load->model('Dbclass');
            
            if(isset($_SESSION['userID']))
            {
                $mail = $_SESSION['userID'];

                $flds = array('reg_first_name', 'reg_last_name');
                $where = array('reg_email' => $mail);

                $result = $CI->Dbclass->select_where($flds, 'tbl_registration', $where);
                if(!empty($result))
                {
                    return $result[0];
                }
                else
                {
                    if($_SESSION['role_id'] == 1)
                    {
                        $result = array('reg_first_name' => 'Tagline',
                            'reg_last_name' => 'Infotech');
                    }
                    return $result;
                }
            }
        }
    }

    if( ! function_exists('get_role'))
    {
        function get_role()
        {
            $CI =& get_instance();
            $CI->load->model('Dbclass');
            
            if(isset($_SESSION['role_id']))
            {
                $role = $_SESSION['role_id'];

                $flds = array('role_id', 'user_role');
                $where = array('role_id' => $role);

                $result = $CI->Dbclass->select_where($flds, 'tbl_user_role', $where);
                if(!empty($result))
                {
                    return $result[0];
                }
                else
                {
                    return $result;
                }
            }
        }
    }

    if( ! function_exists('get_image'))
    {
        function get_image()
        {
            $CI =& get_instance();
            $CI->load->model('Dbclass');

            if(isset($_SESSION['userID']))
            {
                $user = $_SESSION['userID'];

                $flds = array('reg_image');
                $where = array('reg_email' => $user);

                $result = $CI->Dbclass->select_where($flds, 'tbl_registration', $where);

                if(!empty($result))
                {
                    return $result[0];
                }
                else
                {
                    return $result;
                }
            }
        }
    }
?>