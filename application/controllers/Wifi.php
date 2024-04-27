<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wifi extends CI_Controller
{

    public function index()
    {
        $output = exec('netsh wlan show profile');
        $matches = [];
        preg_match_all('/SSID Name\s*:\s*(.*?)\r\n/', $output, $matches);

        if (!empty($matches[1])) {
            echo $matches[1][0];
        } else {
            return null;
        }
    }
}
