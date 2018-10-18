<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function index() {

    $this->load->model("Usuario_model");
    $this->load->model("Escola_model");
    $login = $this->input->post('login');

    $info_usuario = $this->Usuario_model->verifica_login($login);

    if($info_usuario){

      if($info_usuario['tipo'] == "admin" || $info_usuario['tipo'] == "professor"){

        $senha = $this->input->post('senha');
        $hash = $info_usuario['senha'];

        $validasenha = descriptografa($senha,$hash);

        if($validasenha){

          if($info_usuario['tipo'] == "professor") {
            $this->load->model("Professor_model");
            $info_prof = $this->Professor_model->consulta_ids($info_usuario['id']);
            array_push($info_usuario,$info_prof);
          }

          $nome_escola = $this->Escola_model->consulta_nome_escola($info_usuario['escola_id']);
          $info_usuario['status_flashdata'] = "success";
          $info_usuario['nome_escola'] = $nome_escola['nome'];
          $this->session->set_userdata($info_usuario);
          $this->session->set_flashdata('success','<b>Bem Vindo</b>, você foi logado com sucesso!');

          redirect('Front/turmas');

        }
      }
    }

    $this->session->set_flashdata('danger', 'Usuário ou senha não encontrado, tente novamente'); //seta o estado da função como danger
    redirect(''); //redireciona para a pagina inicial
  }

  public function cadastro(){
    $this->load->view('cadastro_teste.php');
  }

  public function cadastrar(){
    $this->load->model("Login_model");

    $login = $this->input->post('login');

    $valida = $this->Login_model->verifica_login($login);

    if($valida){
      $this->session->set_flashdata('danger','Nome de Usuário já cadastrado, favor inserir outro');
    } else{
      $senha = criptografa($this->input->post('senha'));
      $this->Login_model->salva_cadastro($login,$senha);
      redirect('Front');
    }

  }

}
