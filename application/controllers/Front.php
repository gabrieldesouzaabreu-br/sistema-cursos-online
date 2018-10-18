<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller{

  public function index() {
    if($this->session->userdata("id")){ //testa se existe a sessão, se existir, ela é destruida
      $this->session->sess_destroy();
      }

		$this->load->view('index.php');
	}

  public function teste(){
    $dados = array('pagina' => "teste");

    $this->load->template('teste.php',$dados);

    //$this->load->view('teste.php');
  }

  public function turmas() {
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    if($this->session->userdata("tipo") == "professor"){

      $this->load->model("Professor_model");
      $pagina = "Minhas turmas";
      $turma = $this->Professor_model->consulta_turma($this->session->userdata("id"));

    } else{

      $this->load->model("Turma_model");
      $turma = $this->Turma_model->info_turma();
      $pagina = "Turmas";

    }

    $dados = array('pagina' => $pagina, 'turma' => $turma);

    $this->load->template('turmas.php',$dados);
  }

  public function edita_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Turma_model");
    $this->load->model("Aluno_model");
    $this->load->model("Professor_model");

    $id_turma = $this->input->get('id');

    $aluno = $this->Turma_model->consulta_alunos_turma($id_turma);
    $professor_turma = $this->Turma_model->consulta_professor_turma($id_turma);
    $turma = $this->Turma_model->consulta_turma($id_turma);
    $alunos = $this->Turma_model->consulta_alunos_desmatriculados();
    $todos_prof = $this->Turma_model->consulta_professor_nao_turma($id_turma);
    $turma_nao_matriculados = $this->Turma_model->consulta_turma_nao_matriculado();
    $disciplinas = $this->Turma_model->consulta_disciplinas();

    $j = count($professor_turma);

    refazfor:
    for ($h=0; $h < $j; $h++) {
      if(isset($professor_turma[$h+1]['professor_usuario_id'])){

        if($professor_turma[$h]['professor_usuario_id'] == $professor_turma[$h+1]['professor_usuario_id']){
          $professor_turma[$h]['disciplina_nome'] .= ", ".$professor_turma[$h+1]['disciplina_nome'];

          unset($professor_turma[$h+1]);
          $professor_turma = array_values($professor_turma);
          $j = count($professor_turma);
          goto refazfor;

          }
        }
      }

    $i = count($aluno);

    for ($k=0; $k < $i; $k++) {
      $data = nice_date($aluno[$k]['data_nascimento'], 'd/m/Y');
      //Separa em dia, mês e ano
      list($dia, $mes, $ano) = explode('/', $data);

      // Descobre que dia é hoje e retorna a unix timestamp
      $hoje = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
      // Descobre a unix timestamp da data de nascimento do fulano
      $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

      // Depois apenas fazemos o cálculo já citado :)
      $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
      $aluno[$k]['idade'] = $idade;

    }

    $dados = array(
      'pagina' => $turma['nome'],
      'aluno' => $aluno,
      'professor_turma' => $professor_turma,
      'turma' => $turma,
      'alunos' => $alunos,
      'todos_prof' => $todos_prof,
      'disciplinas' => $disciplinas,
      'turma_nao_matriculados' => $turma_nao_matriculados['id']
    );

    $this->load->template('edita_turma.php',$dados);
  }

  public function user(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $dados = array('pagina' => 'Perfil');

    $this->load->template('user.php',$dados);
  }

  public function configuracao(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $dados = array('pagina' => 'Configuração');

    $this->load->template('configuracao.php',$dados);
  }

  public function icons(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $dados = array('pagina' => 'Icones');

    $this->load->template('icons.php',$dados);
  }

  public function notifications(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $dados = array('pagina' => 'Notificações');

    $this->load->template('notifications.php',$dados);
  }

  public function editar_usuario_professor(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }
    $dados = array('pagina' => 'Editar usuario');

    $this->load->template('editar_usuario_professor.php',$dados);
  }

  public function editar_usuario_admin(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }
    $dados = array('pagina' => 'Editar usuario');

    $this->load->template('editar_usuario_admin.php',$dados);
  }

  public function professores(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Professor_model");

    $professor = $this->Professor_model->consulta_professores();

    $dados = array('pagina' => 'Professores', 'professor' => $professor);
    $this->load->template('professores.php',$dados);
  }

  public function incluir_professor(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $dados = array('pagina' => 'Incluir professor');
    $this->load->template('inclui_professor.php',$dados);
  }

  public function editar_professor(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $id = $this->input->post('id_prof');

    $this->load->model("Usuario_model");
    $info = $this->Usuario_model->consulta_usuario($id);

    $dados = array('pagina' => 'Editar professor', 'info' => $info);
    $this->load->template('editar_professor.php',$dados);
  }

  public function alunos(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Aluno_model");

    $aluno = $this->Aluno_model->info_aluno();

    $dados = array('pagina' => 'Alunos', 'aluno' => $aluno);
    $this->load->template('alunos.php',$dados);
  }

  public function incluir_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Responsavel_model");

    $responsavel = $this->Responsavel_model->info_responsavel();

    $dados = array('pagina' => 'Incluir aluno', 'responsavel' => $responsavel);
    $this->load->template('inclui_aluno.php',$dados);
  }

  public function edita_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }
    $this->load->model("Usuario_model");
    $this->load->model("Aluno_model");
    $this->load->model("Responsavel_model");

    $ids_aluno = $this->input->post('aluno_usuario_id');

    $ids_aluno = explode("/",$ids_aluno);

    $usuario_id = $ids_aluno[0];
    $aluno_id = $ids_aluno[1];

    $usuario_aluno = $this->Usuario_model->consulta_usuario($usuario_id);

    $aluno = $this->Aluno_model->consulta_aluno($usuario_id);

    $responsaveis = $this->Responsavel_model->info_responsavel();

    $aluno_responsavel = $this->Aluno_model->consulta_responsavel_aluno($aluno_id);

    $dados = array(
      'pagina' => 'Editar aluno',
      'usuario_aluno' => $usuario_aluno,
      'aluno' => $aluno,
      'responsaveis' => $responsaveis,
      'aluno_responsavel' => $aluno_responsavel
    );

    $this->load->template('editar_aluno.php',$dados);

  }

  public function visualiza_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");
    $this->load->model("Aluno_model");

    $ids = $this->input->post('aluno_ids');

    $ids_aluno = explode("/",$ids);

    $id_usuario = $ids_aluno[0];
    $id_aluno = $ids_aluno[1];

    $usuario = $this->Usuario_model->consulta_usuario($id_usuario);
    $aluno = $this->Aluno_model->consulta_aluno($id_usuario);
    $responsavel_aluno = $this->Aluno_model->consulta_responsavel_aluno_info($id_aluno);
    $turma_aluno = $this->Aluno_model->consulta_turma_aluno($id_aluno);

    $dados = array(
      'pagina' => 'Visualizar Aluno',
      'usuario' => $usuario,
      'aluno' => $aluno,
      'responsavel_aluno' => $responsavel_aluno,
      'turma_aluno' => $turma_aluno
    );

    $this->load->template('visualiza_aluno.php',$dados);

  }

  public function responsaveis(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Responsavel_model");

    $responsavel = $this->Responsavel_model->info_responsavel();

    $dados = array('pagina' => 'Responsáveis', 'responsavel' => $responsavel);
    $this->load->template('responsavel.php',$dados);
  }

  public function incluir_responsavel(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $dados = array('pagina' => 'Incluir responsavel');
    $this->load->template('inclui_responsavel.php',$dados);
  }

  public function edita_responsavel(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }
    $this->load->model("Usuario_model");

    $id_usuario = $this->input->post('id_usuario');

    $info = $this->Usuario_model->consulta_usuario($id_usuario);

    $dados = array('pagina' => 'Editar responsavel', 'info' => $info);
    $this->load->template('editar_responsavel.php',$dados);

  }

  public function mensagens(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $mo = $this->Mensagem_model->consulta_usuario_mensagem($this->session->userdata("id")); // $mo = mensagem_origem

    for ($i=0; $i <count($mo) ; $i++) {
      if($mo[$i]['tipo'] == "R"){
        $nome = $this->Mensagem_model->consulta_responsavel_mensagem($mo[$i]['escravo']);
        $mo[$i]['nome_escravo'] = $nome['nome'];
      }
        else if($mo[$i]['tipo'] == "A"){
          $nome = $this->Mensagem_model->consulta_aluno_mensagem($mo[$i]['escravo']);
          $mo[$i]['nome_escravo'] = $nome['nome'];
        }
          else if($mo[$i]['tipo'] == "T"){
            $nome = $this->Mensagem_model->consulta_turma_mensagem($mo[$i]['escravo']);
            $mo[$i]['nome_escravo'] = $nome['nome'];
          }
            else{
              $nome = $this->Mensagem_model->consulta_escola_mensagem($mo[$i]['escravo']);
              $mo[$i]['nome_escravo'] = $nome['nome'];
            }
    }

    $dados = array(
      'pagina' => 'Mensagens',
      'mensagem_origem' => $mo
    );

    $this->load->template('mensagem.php', $dados);
    // header('content-type: application/json');
    // echo json_encode($usuario_mensagem,JSON_PRETTY_PRINT);
  }

  public function envia_mensagem(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Escola_model");
    $this->load->model("Turma_model");
    $this->load->model("Aluno_model");
    $this->load->model("Usuario_model");
    $this->load->model("Responsavel_model");
    $this->load->model("Mensagem_model");

    $escola = $this->Escola_model->consulta_escola();
    $turmas = $this->Turma_model->info_turma();
    $alunos = $this->Aluno_model->info_aluno();
    $responsaveis = $this->Responsavel_model->info_responsavel();

    $dados = array(
      'pagina' => 'Nova Mensagem',
      'escola' => $escola,
      'turmas' => $turmas,
      'alunos' => $alunos,
      'responsaveis' => $responsaveis
    );

    $this->load->template('nova_mensagem.php', $dados);

  }

  public function cadastra_admin(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    if($this->session->userdata("tipo") == "admin"){
      $dados = array(
        'pagina' => 'Cadastro de administrador'
      );

      $this->load->template('inclui_admin.php', $dados);
    }

  }

  public function diario_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $dados = array(
      'pagina' => 'Diario do aluno'
    );

    $this->load->template('diario_aluno.php', $dados);
  }

  public function cadastro_teste(){

    $this->load->view('cadastro_teste.php');
  }

}
