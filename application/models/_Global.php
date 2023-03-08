<?php

    Class _Global extends CI_Model{

        protected function table(){
            return (object) [
                "site"      => "site",
                "package"   => "package"
            ];
        }

        public function site(){
            return $this->db->get_where($this->table()->site, ["id" => 1])->row();
        }

        public function package($where = "", $order = ""){
            if($order != ""){
                $this->db->order_by($order->col, $order->val);
            }

            if($where == ""){
                return $this->db->get($this->table()->package);
            } else {
                return $this->db->get_where($this->table()->package, $where);
            }
        }

    }