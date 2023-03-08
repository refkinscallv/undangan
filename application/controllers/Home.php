<?php

    Class Home extends CI_Controller{

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $data   = [
                "site"      => $this->global->site(),
                "package"   => $this->global->package()
            ];

            $this->load->view("home/index", $data);
        }

    }