<?php
    class EmailVerification extends CI_Model
    {
        function __construct()
        {
            parent::__construct();
        }

        function index()
        {

        }

        function sendVerificationLink($user, $email, $token)
        {
            $from = 'raviu.tagline@gmail.com';
            $subject = 'Please verify your mail here';
            $msg = 'Dear '.$user."<br /><br />";
            $msg .= 'Please click on below link to verify your email and set password<br /><br />';
            $msg .= "<a href='".base_url('email_verify/').$token."'>verify your mail here</a>";

            $data['from'] = $from;
            $data['to'] = $email;
            $data['subject'] = $subject;
            $data['message'] = $msg;

           /********* --------- Code for send verification mail below --------------- **************/

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'raviu.tagline@gmail.com',
                'smtp_pass' => '@vFw_3Sy',
                // 'smtp_crypto' => 'ssl', //can be 'ssl' or 'tls' for example
                'mailtype' => 'html', //plaintext 'text' mails or 'html'
                // 'smtp_timeout' => '4', //in seconds
                'charset' => 'iso-8859-1'
            );

            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->email->from($from);
            $this->email->to($email);
            $this->email->subject($subject);
            $this->email->message($msg);

            if ($this->email->send()) {
                return TRUE;
            } else {
                return $this->email->print_debugger();
            }
        }
    }
?>