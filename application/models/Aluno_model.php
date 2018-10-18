<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aluno_model extends CI_Model{

  public function info_aluno(){
    $escola_id = $this->session->userdata("escola_id");
    return $this->db->query("select a.id as aluno_id, u.id as aluno_usuario_id, u.nome as nome, t.nome as turma, t.turno as turno
                            from aluno a join usuario u on a.usuario_id = u.id
                            join turma t on a.turma_id = t.id where u.escola_id = '$escola_id'")->result_array();
  }

  public function consulta_aluno($id_usuario_aluno){
    return $this->db->query("select * from aluno where usuario_id = '$id_usuario_aluno'")->row_array();
  }

  public function consulta_id_nome_aluno($id_usuario){
    return $this->db->query("select a.id as aluno_id, u.nome FROM aluno a join usuario u on a.usuario_id = u.id
                            where u.id = '$id_usuario'")->row_array();
  }

  public function consulta_id_usuario_aluno($id_aluno){
    return $this->db->query("select usuario_id from aluno where id='$id_aluno'")->row_array();
  }

  public function consulta_turma_aluno($id_aluno){
    return $this->db->query("select t.nome, t.descricao,t.turno,t.numero_alunos FROM aluno a join turma t on a.turma_id = t.id
                            where a.id = '$id_aluno'")->row_array();
  }

  public function remove_aluno_turma($id_aluno){
    $data = array(
      'turma_id'   => 99
    );

      $this->db->where('usuario_id', $id_aluno);
      $this->db->update('aluno', $data);
  }

  public function relaciona_aluno_responsavel($info){
    $data = array(
      'aluno_id' => $info['aluno_id'],
      'responsavel_id' => $info['id_responsavel'],
      'financeiro' => $info['financeiro'],
      'retirada' => $info['retirada'],
      'parentesco' => $info['parentesco']
    );

      $this->db->insert('aluno_tem_responsavel', $data);
  }

  public function deleta_relacao_aluno_responsavel($aluno_id){
    return $this->db->query("delete FROM aluno_tem_responsavel where aluno_id = '$aluno_id'");
  }

  public function inclui_aluno_turma($turma_id,$aluno_id){
    $data = array(
      'turma_id'   => $turma_id
    );

    $this->db->where('id', $aluno_id);
    $this->db->update('aluno', $data);
  }

  public function inclui_aluno($info){
    $data = array(
      'usuario_id' => $info['id'],
      'turma_id' => $info['turma_id'],
      'sexo' => $info['sexo'],
      'naturalidade' => $info['naturalidade'],
      'altura' => $info['altura'],
      'peso' => $info['peso'],
      'telefone_emergencia' => $info['telefone_emergencia'],
      'restricoes' => $info['restricoes'][0],
      'crm' => $info['crm']
    );

      $this->db->insert('aluno', $data);
  }

  public function edita_aluno($info_aluno){
    $data = array(
      'sexo'   => $info_aluno['sexo'],
      'naturalidade' => $info_aluno['naturalidade'],
      'altura' => $info_aluno['altura'],
      'peso' => $info_aluno['peso'],
      'telefone_emergencia' => $info_aluno['telefone_emergencia'],
      'restricoes' => $info_aluno['restricoes'],
      'crm' => $info_aluno['crm']
    );

      $this->db->where('usuario_id', $info_aluno['usuario_id']);
      $this->db->update('aluno', $data);
  }

  public function exclui_aluno($id){
    $this->db->query("delete from aluno where id='$id'");
  }

  public function consulta_responsavel_aluno($id_aluno){
    return $this->db->query("select * FROM aluno_tem_responsavel where aluno_id = '$id_aluno'")->result_array();
  }

  public function consulta_responsavel_aluno_info($id_aluno){
    return $this->db->query("select ar.responsavel_id, ar.financeiro,ar.retirada,ar.parentesco, u.nome, u.email,u.telefone
    FROM aluno_tem_responsavel ar join usuario u on ar.responsavel_id = u.id
    where ar.aluno_id = '$id_aluno'")->result_array();
  }

  public function consulta_id_aluno(){
    return $this->db->query("select MAX(id) as id from aluno")->row_array();
  }

}
