<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model{

  public function verifica_login($login){
    $this->db->where("login",$login);
    return $this->db->get("usuario")->row_array();
  }

  public function salva_cadastro($login,$senha){
    $data = array('login' => $login,
                  'senha' => $senha,
                  'tipo' => "admin",
                  'nome' => "Admin",
                  'escola_id' => 1
                );

   $this->db->insert('usuario', $data);
  }

}
