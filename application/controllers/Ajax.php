<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller{

  public function verifica_login(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");

    $login = $this->input->post('login');

    $valida = $this->Usuario_model->verifica_login($login);

    if($valida){
      $retorno = 1; // se retorno for igual a um, existe um login correpondente no banco de dados
    } else{
        $retorno = null;
      }

    echo $retorno;

  }

  public function verifica_login_proprio(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");

    $id = $this->input->post('id');
    $login = $this->input->post('login');

    $usuario = $this->Usuario_model->consulta_usuario($id);

    if($usuario['login'] == $login){
      $valida = 1; // significa que o login digitado é o mesmo que o já cadastrado no banco de dados
    } else{
      $teste = $this->Usuario_model->verifica_login_existente($id,$login);
      if($teste){
        $valida = null;
      } else{
        $valida = 1;
      }
    }

    echo $valida;

  }

  public function cadastro_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");
    $this->load->model("Aluno_model");
    $this->load->model("Turma_model");
    $this->load->model("Responsavel_model");

    //começo do cadastro de aluno
    $aluno = $this->input->post('aluno');

    $this->Usuario_model->inclui_usuario($aluno);
    $id_aluno = $this->Usuario_model->consulta_id_max();
    $aluno['id'] = $id_aluno['id'];

    $turma = $this->Turma_model->consulta_turma_nao_matriculado();

    $aluno['turma_id'] = $turma['id'];
    $this->Aluno_model->inclui_aluno($aluno);

    $this->Turma_model->insere_aluno_turma($turma['id']);
    //fim do cadastro de alunos

    //começo do cadastro de novo responsavel
    $responsaveis = $this->input->post('responsavel_novo');

    if($responsaveis){
      foreach ($responsaveis as $r) {
        $r['senha'] = criptografa($r['senha']);
        $this->Usuario_model->inclui_usuario($r);
      }
    }
    //fim do cadastro de responsavel

    //começo da relação entre aluno e responsavel
    $aluno_id = $this->Aluno_model->consulta_id_aluno();
    $info_res = $this->input->post('responsavel');

    for ($i = 0; $i < count($info_res); $i++) {

      $info_res[$i]['aluno_id'] = $aluno_id['id'];

      if(is_array($info_res[$i]['id_responsavel'])){
        $info_res[$i]['id_responsavel'] = $info_res[$i]['id_responsavel'][0];
      }

      if(is_array($info_res[$i]['nome_responsavel'])){
        $info_res[$i]['nome_responsavel'] = $info_res[$i]['nome_responsavel'][0];
      }

      if(is_array($info_res[$i]['parentesco'])){
        $info_res[$i]['parentesco'] = $info_res[$i]['parentesco'][0];
      }

      if(is_array($info_res[$i]['financeiro'])){
        $info_res[$i]['financeiro'] = $info_res[$i]['financeiro'][0];
      }

      if(is_array($info_res[$i]['retirada'])){
        $info_res[$i]['retirada'] = $info_res[$i]['retirada'][0];
      }

      if($info_res[$i]['id_responsavel'] == 0){

        if(is_array($info_res[$i]['login'])){
          $info_res[$i]['login'] = $info_res[$i]['login'][0];
        }

        $id = $this->Responsavel_model->consulta_id($info_res[$i]['login']);
        $info_res[$i]['id_responsavel'] = $id['id'];
      }

      $this->Aluno_model->relaciona_aluno_responsavel($info_res[$i]);

    } // fecha o for

    // print_r($aluno);
    // print_r($info_res);
    // print_r($responsaveis);
  } // fecha a função

  public function edita_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");
    $this->load->model("Aluno_model");
    $this->load->model("Turma_model");
    $this->load->model("Responsavel_model");

    //começo do edição do aluno
    $aluno = $this->input->post('aluno');

    $aluno['id'] = $aluno['id_usuario'];
    $this->Usuario_model->edita_usuario($aluno);

    if(!empty($aluno['restricoes'])){
      if(is_array($aluno['restricoes'])){
        $aluno['restricoes'] = $aluno['restricoes'][0];
      }
    } else{
      $aluno['restricoes'] = null;
    }

    $aluno['usuario_id'] = $aluno['id_usuario'];
    $this->Aluno_model->edita_aluno($aluno);
    //fim edição do aluno

    //começo do cadastro de novo responsavel
    $responsaveis = $this->input->post('responsavel_novo');

    if($responsaveis){
      foreach ($responsaveis as $r) {
        $r['senha'] = criptografa($r['senha']);
        $this->Usuario_model->inclui_usuario($r);
      }
    }
    //fim do cadastro de novo responsavel

    //começo da relação entre aluno e responsavel

    $info_res = $this->input->post('responsavel');
    $this->Aluno_model->deleta_relacao_aluno_responsavel($aluno['id_aluno']);

    for ($i = 0; $i < count($info_res); $i++) {

      $info_res[$i]['aluno_id'] = $aluno['id_aluno'];

      if(is_array($info_res[$i]['id_responsavel'])){
        $info_res[$i]['id_responsavel'] = $info_res[$i]['id_responsavel'][0];
      }

      if(is_array($info_res[$i]['nome_responsavel'])){
        $info_res[$i]['nome_responsavel'] = $info_res[$i]['nome_responsavel'][0];
      }

      if(is_array($info_res[$i]['parentesco'])){
        $info_res[$i]['parentesco'] = $info_res[$i]['parentesco'][0];
      }

      if(is_array($info_res[$i]['financeiro'])){
        $info_res[$i]['financeiro'] = $info_res[$i]['financeiro'][0];
      }

      if(is_array($info_res[$i]['retirada'])){
        $info_res[$i]['retirada'] = $info_res[$i]['retirada'][0];
      }

      if($info_res[$i]['id_responsavel'] == 0){

        if(is_array($info_res[$i]['login'])){
          $info_res[$i]['login'] = $info_res[$i]['login'][0];
        }

        $id = $this->Responsavel_model->consulta_id($info_res[$i]['login']);
        $info_res[$i]['id_responsavel'] = $id['id'];
      }

      $this->Aluno_model->relaciona_aluno_responsavel($info_res[$i]);

    }

    // print_r($aluno);
    // print_r($info_res);
    // print_r($responsaveis);

  } //fecha função edita_aluno

  public function inclui_aluno_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Aluno_model");
    $this->load->model("Turma_model");
    $this->load->model("Usuario_model");

    $alunos = $this->input->post('alunos');
    $id_turma = $this->input->post('id_turma');

    $alunos_novos = array();

    $desmatriculados = $this->Turma_model->consulta_turma_nao_matriculado();

    foreach ($alunos as $a) {
      $this->Aluno_model->inclui_aluno_turma($id_turma,$a);
      $this->Turma_model->insere_aluno_turma($id_turma);
      $this->Turma_model->remove_aluno_turma($desmatriculados['id']);

      $id_usuario_aluno = $this->Aluno_model->consulta_id_usuario_aluno($a);

      $aluno_novo = $this->Usuario_model->consulta_usuario($id_usuario_aluno['usuario_id']);

      array_push($alunos_novos,$aluno_novo);

    }

    $turma = $this->Turma_model->consulta_turma($id_turma);

    $alunos_novos[0]['numero_alunos'] = $turma['numero_alunos'];

    header('content-type: application/json');
    echo json_encode($alunos_novos);

  }

  public function remove_aluno_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Aluno_model");
    $this->load->model("Turma_model");

    $id_usuario_aluno = $this->input->post('id_usuario_aluno');
    $id_turma = $this->input->post('id_turma');

    $this->Turma_model->desmatricula_aluno($id_usuario_aluno);
    $this->Turma_model->remove_aluno_turma($id_turma);

    $id = $this->Turma_model->consulta_turma_nao_matriculado();

    $this->Turma_model->insere_aluno_turma($id['id']);

    $turma = $this->Turma_model->consulta_turma($id_turma);
    $aluno = $this->Aluno_model->consulta_id_nome_aluno($id_usuario_aluno);

    $array = array(
      'numero_alunos' => $turma['numero_alunos'],
      'nome' => $aluno['nome'],
      'id_aluno' => $aluno['aluno_id']
    );

    header('content-type: application/json');
    echo json_encode($array);

  }

  public function remove_professor_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Turma_model");
    $this->load->model("Usuario_model");

    $id_professor = $this->input->post('id_professor');
    $id_turma = $this->input->post('id_turma');

    $this->Turma_model->remove_professor_turma($id_professor,$id_turma);

    $professor = $this->Usuario_model->consulta_usuario($id_professor);

    header('content-type: application/json');
    echo json_encode($professor);

  }

  public function edita_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Turma_model");

    $turma = array(
      'id_turma' => $this->input->post('id_turma'),
      'nome_turma' => $this->input->post('nome_turma'),
      'descricao' => $this->input->post('descricao'),
      'turno' => $this->input->post('turno')
    );

    $this->Turma_model->edita_turma($turma);

    $turma_nova = $this->Turma_model->consulta_turma($turma['id_turma']);

  }

  public function inclui_professor_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Turma_model");
    $this->load->model("Usuario_model");

    $id_turma = $this->input->post('id_turma');
    $id_professor = $this->input->post('id_professor');
    $disciplinas = $this->input->post('disciplinas');

    foreach ($disciplinas as $d) {
      $this->Turma_model->inclui_professor_turma($id_turma,$id_professor,$d);
    }

    $professor = $this->Usuario_model->consulta_usuario($id_professor);

    $disciplinas = $this->Turma_model->consulta_disciplinas_professor($id_professor);

    $disciplinas_string = "";

    for ($i=0; $i < count($disciplinas); $i++) {

      if($i+1 < count($disciplinas)){
        $disciplinas_string .= $disciplinas[$i]['nome'].", ";
      } else{
        $disciplinas_string .= $disciplinas[$i]['nome'];
      }

    }

    $professor['disciplinas'] = $disciplinas_string;

    header('content-type: application/json');
    echo json_encode($professor);

  }

  public function inclui_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Turma_model");

    $turma = array(
      'nome' => $this->input->post('nome_turma'),
      'descricao' => $this->input->post('descricao'),
      'turno' => $this->input->post('turno'),
      'numero_alunos' => 0
    );

    $turmas_existentes = $this->Turma_model->info_turma();
    $teste_turma = null;

    foreach ($turmas_existentes as $t) {
      if($t['nome'] == $turma['nome'] && $t['turno'] == $turma['turno']){
        $teste_turma = 1;
      }
    }

    if(!$teste_turma){

      $this->Turma_model->cria_turma($turma);

      $turma_nova = $this->Turma_model->ultima_turma();

      header('content-type: application/json');
      echo json_encode($turma_nova);

    } else{
      $data = null;
      echo $data;
    }

  }

  public function verifica_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Turma_model");

    $id_turma = $this->input->post('id_turma');

    $alunos = $this->Turma_model->consulta_alunos_turma($id_turma);

    $professores = $this->Turma_model->consulta_professor_turma($id_turma);

    if ($alunos || $professores) {
      $resp = 1;
    } else{
      $resp = 0;
    }

    echo $resp;

  }

  public function exclui_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Turma_model");

    $id_turma = $this->input->post('id_turma');

    $alunos = $this->Turma_model->consulta_alunos_turma($id_turma);

    $professores = $this->Turma_model->consulta_professor_turma($id_turma);

    if ($alunos) {
      foreach ($alunos as $a) {
        $this->Turma_model->desmatricula_aluno($a['usuario_aluno_id']);
        $this->Turma_model->remove_aluno_turma($id_turma);
      }
    }

    if ($professores) {
      foreach ($professores as $p) {
        $this->Turma_model->remove_professor_turma($p['professor_usuario_id'],$id_turma);
      }
    }

    $this->Turma_model->exclui_turma($id_turma);

  }

  public function verifica_professor(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Professor_model");

    $id = $this->input->post("id_professor");

    $turma_professor = $this->Professor_model->consulta_turma($id);

    if ($turma_professor) {
      $res = 1;
    } else{
      $res = 0;
    }

    echo $res;

  }

  public function exclui_professor(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Professor_model");
    $this->load->model("Turma_model");
    $this->load->model("Usuario_model");
    $this->load->model("Mensagem_model");

    $id = $this->input->post("id_professor");

    $turma_professor = $this->Professor_model->consulta_turma($id);

    if ($turma_professor) {
      foreach ($turma_professor as $t) {
        $this->Turma_model->remove_professor_turma($id,$t['id']);
      }
    }

    $this->Mensagem_model->exclui_mensagem_admin($id);
    $this->Usuario_model->exclui_usuario($id);

  }

  public function exclui_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Aluno_model");
    $this->load->model("Usuario_model");
    $this->load->model("Turma_model");
    $this->load->model("Mensagem_model");

    $id = $this->input->post("id_aluno");
    $id_usuario = $this->Aluno_model->consulta_id_usuario_aluno($id);
    $id_usuario = $id_usuario['usuario_id'];
    $tipo = "A";

    $aluno = $this->Aluno_model->consulta_aluno($id_usuario);

    $this->Turma_model->remove_aluno_turma($aluno['turma_id']);
    $this->Aluno_model->deleta_relacao_aluno_responsavel($id);
    $this->Aluno_model->exclui_aluno($id);
    $this->Usuario_model->exclui_usuario($id_usuario);
    $this->Mensagem_model->exclui_mensagem_escravo($id,$tipo);

  }

  public function exclui_responsavel(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");
    $this->load->model("Responsavel_model");
    $this->load->model("Mensagem_model");

    $id = $this->input->post("id");
    $tipo = "R";

    $this->Responsavel_model->remove_relacao_responsavel_aluno($id);
    $this->Mensagem_model->exclui_mensagem_escravo($id,$tipo);
    $this->Usuario_model->exclui_usuario($id);

  }

} // fecha o controle
