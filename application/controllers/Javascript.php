<?php

    Class Javascript extends CI_Controller{

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $raw_referer    = isset($_SERVER["HTTP_REFERER"])? $_SERVER["HTTP_REFERER"] : "";
            $referer        = parse_url($raw_referer, PHP_URL_HOST);

            header("Content-Type: Application/JavaScript");
            header("Access-Control-Allow-Origin: *");

            if($referer == $_SERVER["SERVER_NAME"]){
                http_response_code(200);
                echo file_get_contents(base_url("assets/js/basic.js"));
            } else {
                http_response_code(404);
                echo "Not Found";
            }
        }

    }