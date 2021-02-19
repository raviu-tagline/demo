<?php

    ob_start();
    require_once('../index.php');
    ob_end_clean();

    class Cron extends CI_Loader
    {
        function index()
        {
            $CI =& get_instance();
            if($CI)
            {
                $CI->load->model('Dbclass');

                $day = date('d');

                $month = date('m');

                $flds = array('reg_first_name', 'reg_last_name', 'reg_email');

                $where = array('DAY(reg_birth_date)' => $day, 'MONTH(reg_birth_date)' => $month);

                $result = $CI->Dbclass->select_where($flds, 'tbl_registration', $where);

                $name = '';

                $email = '';

                if(!empty($result))
                {
                    foreach($result as $key => $val)
                    {
                        foreach($val as $sub_key => $sub_val)
                        {
                            if($sub_key == 'reg_first_name' || $sub_key == 'reg_last_name')
                            {
                                $name .= $sub_val." ";
                            }
                            else
                            {
                                $email = $sub_val;
                            }
                        }

                        if($name != '' and $email != '')
                        {
                            $name = rtrim($name, " ");
                            $this->send_wishes($name, $email, $CI);

                            $name = $email = '';
                        }
                    }
                }
                else
                {
                    echo "No record found";
                }
            }
            else
            {
                echo "Instace not Initialize";
            }
        }

        function send_wishes($name, $email, $CI)
        {
            $from = 'Tagline Infotech';
            $subject = 'Greeting Wishes';
            $msg = 'Dear '.$name.',';
            $msg .= '<br><br><b><h2>Wish you a,<br><br> "MANY MANY HAPPY RETURNS OF THE DAY HAPPY BIRTHDAY "</h2></b>';

            // $msg = $CI->load->view('birthday.php','',TRUE);

            /********* --------- Code for send verification mail below --------------- **************/

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'raviu.tagline@gmail.com',
                'smtp_pass' => '@vFw_3Sy',
                'mailtype' => 'html',
                'charset' => 'iso-8859-1'
            );

            if($CI->load->library('email', $config))
            {
                $CI->email->set_newline("\r\n");

                $CI->email->from($from);
                $CI->email->to($email);
                $CI->email->subject($subject);
                $CI->email->message($msg);

                if ($CI->email->send()) {
                    echo $msg;
                } else {
                    show_error($CI->email->print_debugger());
                }
            }
        }
    }

    $obj = new Cron();
    $obj->index();
?>