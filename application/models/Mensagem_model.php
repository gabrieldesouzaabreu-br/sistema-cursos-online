<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagem_model extends CI_Model{

  public function consulta_usuario_mensagem($id){
    return $this->db->query("select id,mestre,escravo,controle,data,status,tipo FROM mensagem
      where mestre = '$id' group by escravo,tipo order by data desc")->result_array();
  }

  public function consulta_responsavel_mensagem($id_responsavel){
    return $this->db->query("select nome FROM usuario where id = '$id_responsavel'")->row_array();
  }

  public function consulta_aluno_mensagem($id_aluno){
    return $this->db->query("select u.nome from aluno a join usuario u on a.usuario_id = u.id
    where a.id = '$id_aluno'")->row_array();
  }

  public function consulta_turma_mensagem($id_turma){
    return $this->db->query("select nome FROM turma where id = '$id_turma'")->row_array();
  }

  public function consulta_escola_mensagem($id_escola){
    return $this->db->query("select nome FROM escola where id = '$id_escola'")->row_array();
  }

  public function consulta_mensagem_usuario($id_escravo,$tipo){
    $id_mestre = $this->session->userdata("id");
    return $this->db->query("select * FROM mensagem where mestre = '$id_mestre' and
    escravo = '$id_escravo' and tipo = '$tipo' order by data")->result_array();
  }

  public function seta_status_mensagens($id_escravo,$tipo,$id_mensagem){
    $id_mestre = $this->session->userdata("id");

    $data = array(
      'status' => 1
    );

    $where = array(
      'mestre' => $id_mestre,
      'escravo' => $id_escravo,
      'tipo' => $tipo,
      'id' => $id_mensagem
    );

    $this->db->where($where);
    $this->db->update('mensagem', $data);
  }

  public function envia_mensagem_escola($mensagem){
    $data = array(
      'mestre' => $this->session->userdata("id"),
      'escravo' => $this->session->userdata("escola_id"),
      'controle' => "E",
      'data' => date("Y/m/d H:i:s"),
      'status' => 0,
      'mensagem' => $mensagem,
      'tipo' => "E"
    );

    $this->db->insert('mensagem', $data);
  }

  public function envia_mensagem_turma($id_turma,$mensagem){
    $data = array(
      'mestre' => $this->session->userdata("id"),
      'escravo' => $id_turma,
      'controle' => "E",
      'data' => date("Y/m/d H:i:s"),
      'status' => 0,
      'mensagem' => $mensagem,
      'tipo' => "T"
    );

    $this->db->insert('mensagem', $data);
  }

  public function envia_mensagem_aluno($id_aluno,$mensagem){
    $data = array(
      'mestre' => $this->session->userdata("id"),
      'escravo' => $id_aluno,
      'controle' => "E",
      'data' => date("Y/m/d H:i:s"),
      'status' => 0,
      'mensagem' => $mensagem,
      'tipo' => "A"
    );

    $this->db->insert('mensagem', $data);
  }

  public function envia_mensagem_responsavel($id_responsavel,$mensagem){
    $data = array(
      'mestre' => $this->session->userdata("id"),
      'escravo' => $id_responsavel,
      'controle' => "E",
      'data' => date("Y/m/d H:i:s"),
      'status' => 0,
      'mensagem' => $mensagem,
      'tipo' => "R"
    );

    $this->db->insert('mensagem', $data);
  }

  public function envia_mensagem_chat($id_escravo,$tipo,$mensagem){

    $data = array(
      'mestre' => $this->session->userdata("id"),
      'escravo' => $id_escravo,
      'controle' => "E",
      'data' => date("Y/m/d H:i:s"),
      'status' => 0,
      'mensagem' => $mensagem,
      'tipo' => $tipo
    );

    $this->db->insert('mensagem', $data);

  }

  public function verifica_usuario_mensagem(){
    $id = $this->session->userdata("id");
    return $this->db->query("select escravo,tipo FROM mensagem where mestre = '$id' and controle = 'R'
    and status = 0 group by escravo,tipo")->result_array();
  }

  public function exclui_mensagem_admin($id){
    $this->db->query("delete from mensagem where mestre = '$id'");
  }

  public function exclui_mensagem_escravo($id_escravo,$tipo){
    $this->db->query("delete from mensagem where escravo = '$id_escravo' and tipo = '$tipo'");
  }

}
