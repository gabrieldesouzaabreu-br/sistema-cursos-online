<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model{

  public function verifica_login($login){
    $this->db->where("login",$login);
    return $this->db->get("usuario")->row_array();
  }

  public function verifica_login_existente($id,$login){
    return $this->db->query("select * FROM usuario where login = '$login' and id != '$id'")->row_array();
  }

  public function consulta_usuario($id){
    $this->db->where("id",$id);
    return $this->db->get("usuario")->row_array();
  }

  public function edita_usuario($info){

    $data = array(
      'nome' => $info['nome'],
      'data_nascimento' => $info['data_nascimento'],
      'cpf' => $info['cpf'],
      'email' => $info['email'],
      'endereco' => $info['endereco'],
      'numero' => $info['numero'],
      'complemento' => $info['complemento'],
      'bairro' => $info['bairro'],
      'cidade' => $info['cidade'],
      'estado' => $info['estado'],
      'login' => $info['login'],
      'senha' => $info['senha'],
      'tipo' => $info['tipo'],
      'telefone' => $info['telefone']);

      $this->db->where('id', $info['id']);
      $this->db->update('usuario', $data);

  }

  public function inclui_usuario($info){
    $data = array(
      'nome' => $info['nome'],
      'data_nascimento' => $info['data_nascimento'],
      'cpf' => $info['cpf'],
      'email' => $info['email'],
      'endereco' => $info['endereco'],
      'numero' => $info['numero'],
      'complemento' => $info['complemento'],
      'bairro' => $info['bairro'],
      'cidade' => $info['cidade'],
      'estado' => $info['estado'],
      'login' => $info['login'],
      'senha' => $info['senha'],
      'tipo' => $info['tipo'],
      'telefone' => $info['telefone'],
      'escola_id' => $this->session->userdata('escola_id'));

      $this->db->insert('usuario', $data);
  }

  public function exclui_usuario($id){
    $this->db->query("delete from usuario where id='$id'");
  }

  public function consulta_id_max(){
    return $this->db->query("select MAX(id) as id from usuario")->row_array();
  }

}
