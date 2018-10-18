<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor_model extends CI_Model{

  public function consulta_ids($id_usuario){
    return $this->db->query("select disciplina_id, turma_id from
                            turma_professor_disciplina where usuario_id = '$id_usuario'")->result_array();
  }

  public function consulta_turma($id_usuario){
    $escola_id = $this->session->userdata("escola_id");
    return $this->db->query("select t.* FROM turma t join turma_professor_disciplina tpd
      on t.id = tpd.turma_id where t.escola_id = '$escola_id' and tpd.usuario_id = '$id_usuario' group by t.id")->result_array();
  }

  public function consulta_professores(){
    $escola_id = $this->session->userdata("escola_id");
    return $this->db->query("select id,nome,email,telefone from usuario where tipo = 'professor' and escola_id = '$escola_id'")->result_array();
  }

  public function inclui_professor($info){
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

      $this->db->insert('usuario', $data);
  }

}
