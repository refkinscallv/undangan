<?php

    Class _Global extends CI_Model{

        protected function table(){
            return (object) [
                "site"      => "site",
            ];
        }

        public function site(){
            return $this->db->get_where($this->table()->site, ["id" => 1])->row();
        }

    }