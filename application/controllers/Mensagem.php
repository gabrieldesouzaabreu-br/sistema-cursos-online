<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensagem extends CI_Controller{

  public function consulta_mensagem_usuario(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $id_escravo = $this->input->post('id_escravo');
    $tipo = $this->input->post('tipo');

    $mensagens = $this->Mensagem_model->consulta_mensagem_usuario($id_escravo,$tipo);

    for ($i=0; $i <count($mensagens) ; $i++) {

      if($tipo == "R" ){
        $nome = $this->Mensagem_model->consulta_responsavel_mensagem($id_escravo);
        $mensagens[$i]['escravo_nome'] = $nome['nome'];

      } else if($tipo == "A"){
          $nome = $this->Mensagem_model->consulta_aluno_mensagem($id_escravo);
          $mensagens[$i]['escravo_nome'] = $nome['nome'];

        } else if($tipo == "T"){
            $nome = $this->Mensagem_model->consulta_turma_mensagem($id_escravo);
            $mensagens[$i]['escravo_nome'] = $nome['nome'];

          } else{
              $nome = $this->Mensagem_model->consulta_escola_mensagem($id_escravo);
              $mensagens[$i]['escravo_nome'] = $nome['nome'];
            }

      if ($mensagens[$i]['controle'] == "R") {
        $this->Mensagem_model->seta_status_mensagens($id_escravo,$tipo,$mensagens[$i]['id']);
      }

    }

    header('content-type: application/json');
    echo json_encode($mensagens);

  }

  public function envia_mensagem_escola(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $mensagem = $this->input->post('mensagem');

    $this->Mensagem_model->envia_mensagem_escola($mensagem);

  }

  public function envia_mensagem_turma(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $id_turma = $this->input->post('id_turma');
    $mensagem = $this->input->post('mensagem');

    $this->Mensagem_model->envia_mensagem_turma($id_turma,$mensagem);

  }

  public function envia_mensagem_aluno(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $id_aluno = $this->input->post('id_aluno');
    $mensagem = $this->input->post('mensagem');

    $this->Mensagem_model->envia_mensagem_aluno($id_aluno,$mensagem);

  }

  public function envia_mensagem_responsavel(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $id_responsavel = $this->input->post('id_responsavel');
    $mensagem = $this->input->post('mensagem');

    $this->Mensagem_model->envia_mensagem_responsavel($id_responsavel,$mensagem);
  }

  public function envia_mensagem_chat(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $id_escravo = $this->input->post("id_escravo");
    $tipo = $this->input->post("tipo");
    $mensagem = $this->input->post("mensagem");

    $this->Mensagem_model->envia_mensagem_chat($id_escravo,$tipo,$mensagem);

  }

  public function verifica_usuario_mensagem(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Mensagem_model");

    $usuario = $this->Mensagem_model->verifica_usuario_mensagem();

    header('content-type: application/json');
    echo json_encode($usuario);
  }

}
