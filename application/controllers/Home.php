<?php

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data   = [
            "site"      => "",
        ];

        // $this->load->view("home/index", $data);
        $this->template->load("Template/Content", "home/index", $data);
    }
}
