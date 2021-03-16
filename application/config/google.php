<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
| 
| To get API details you have to create a Google Project
| at Google API Console (https://console.developers.google.com)
| 
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '1042162510092-cfc7b5bi66n2jr0ru09hfbu1j009e403.apps.googleusercontent.com';
$config['google']['client_secret']    = '0VGT-F2W2X-4vqUTi0ujLQPP';
$config['google']['redirect_uri']     = 'http://localhost/demo/';
$config['google']['application_name'] = 'GoogleAPI Integration';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array();

?>