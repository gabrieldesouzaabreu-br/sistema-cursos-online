<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsavel_model extends CI_Model{

  public function info_responsavel(){
    $escola_id = $this->session->userdata("escola_id");
    return $this->db->query("select * FROM usuario where tipo = 'responsavel' and escola_id = '$escola_id'")->result_array();
  }

  public function consulta_id($login){
    return $this->db->query("select id from usuario where login = '$login'")->row_array();
  }

  public function remove_relacao_responsavel_aluno($id){
    $this->db->query("delete from aluno_tem_responsavel where responsavel_id = '$id'");
  }

}
