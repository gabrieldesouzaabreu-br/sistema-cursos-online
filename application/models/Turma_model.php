<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma_model extends CI_Model{

  public function cria_turma($turma){
    $data = array(
      'nome' => $turma['nome'],
      'descricao' => $turma['descricao'],
      'turno' => $turma['turno'],
      'numero_alunos' => $turma['numero_alunos'],
      'escola_id' => $this->session->userdata('escola_id')
    );

    $this->db->insert('turma', $data);
  }

  public function exclui_turma($id_turma){
    $this->db->query("delete from turma where id = '$id_turma'");
  }

  public function info_turma(){
    $escola_id = $this->session->userdata("escola_id");
    return $this->db->query("select * from turma where escola_id= '$escola_id'")->result_array();
  }

  public function consulta_turma_nao_matriculado(){
    $escola_id = $this->session->userdata("escola_id");
    return $this->db->query("select id FROM turma where nome='Não Matriculado' and escola_id = '$escola_id'")->row_array();
  }

  public function consulta_alunos_desmatriculados(){
    $id = $this->consulta_turma_nao_matriculado();
    $turma = $id['id'];
    return $this->db->query("select a.usuario_id, a.id as id_aluno, u.nome FROM aluno a
                            join usuario u on a.usuario_id = u.id where a.turma_id = '$turma'")->result_array();
  }

  public function ultima_turma(){
    return $this->db->query("select * FROM turma where id = (select max(id) from turma)")->row_array();
  }

  public function consulta_turma($id_turma){
    return $this->db->query("select * from turma where id = '$id_turma'")->row_array();
  }

  public function consulta_alunos_turma($turma_id){
    $escola_id = $this->session->userdata('escola_id');
    return $this->db->query("select a.id as aluno_id, u.id as usuario_aluno_id, u.nome as aluno_nome, u.data_nascimento
    from aluno a join usuario u on a.usuario_id = u.id where a.turma_id = '$turma_id' and u.escola_id = '$escola_id'")->result_array();
  }

  public function consulta_professor_turma($id_turma){
    $escola_id = $this->session->userdata('escola_id');
    return $this->db->query("select u.id as professor_usuario_id, u.nome as professor_nome, tpd.disciplina_id, d.nome as disciplina_nome
    from turma_professor_disciplina tpd join usuario u on tpd.usuario_id = u.id
    join disciplina d on tpd.disciplina_id = d.id
    where tpd.turma_id = '$id_turma' and u.escola_id = '$escola_id' order by professor_usuario_id")->result_array();
  }

  public function consulta_professor_nao_turma($id_turma){
    $escola_id = $this->session->userdata('escola_id');
    return $this->db->query("select u.id,u.nome,u.email,u.telefone from usuario u
                    where u.id not in (select t.usuario_id from turma_professor_disciplina t where t.turma_id = '$id_turma')
                    and u.tipo = 'professor' and u.escola_id = '$escola_id'")->result_array();
  }

  public function insere_aluno_turma($id_turma){
    $turma = $this->consulta_turma($id_turma);
    $numero_alunos = $turma['numero_alunos'] + 1;

    $data = array(
      'numero_alunos' => $numero_alunos,
    );

    $this->db->where('id', $id_turma);
    $this->db->update('turma', $data);
  }

  public function remove_aluno_turma($id_turma){
    $turma = $this->consulta_turma($id_turma);
    $numero_alunos = $turma['numero_alunos'] - 1;

    $data = array(
      'numero_alunos' => $numero_alunos,
    );

    $this->db->where('id', $id_turma);
    $this->db->update('turma', $data);
  }

  public function desmatricula_aluno($id_aluno){
    $escola_id = $this->session->userdata('escola_id');
    $id = $this->consulta_turma_nao_matriculado();
    $id_turma = $id['id'];

    $data = array(
      'turma_id'   => $id_turma
    );

      $this->db->where('usuario_id', $id_aluno);
      $this->db->update('aluno', $data);
  }

  public function remove_professor_turma($id_professor,$id_turma){
    return $this->db->query("delete from turma_professor_disciplina where usuario_id = '$id_professor' and turma_id = '$id_turma'");
  }

  public function inclui_professor_turma($id_turma,$id_professor,$disciplina_id){
    $data = array(
      'usuario_id' => $id_professor,
      'disciplina_id' => $disciplina_id,
      'turma_id' => $id_turma
    );

    $this->db->insert('turma_professor_disciplina', $data);
  }

  public function edita_turma($turma){
    $data = array(
      'nome' => $turma['nome_turma'],
      'descricao' => $turma['descricao'],
      'turno' => $turma['turno']
    );

    $this->db->where('id', $turma['id_turma']);
    $this->db->update('turma', $data);
  }

  public function consulta_disciplinas(){
    return $this->db->query("select id, nome FROM disciplina")->result_array();
  }

  public function consulta_disciplinas_professor($id_professor){
    return $this->db->query("select d.nome FROM turma_professor_disciplina t join disciplina
    d on t.disciplina_id = d.id where usuario_id = '$id_professor'")->result_array();
  }

}
