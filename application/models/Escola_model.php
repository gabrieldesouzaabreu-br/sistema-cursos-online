<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Escola_model extends CI_Model{

  public function consulta_nome_escola($id){
    return $this->db->query("select nome FROM escola where id='$id'")->row_array();
  }

  public function consulta_escola(){
    $escola_id = $this->session->userdata("escola_id");
    return $this->db->query("select * from escola where id='$escola_id'")->row_array();
  }

}
