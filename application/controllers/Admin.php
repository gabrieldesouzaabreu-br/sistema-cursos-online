<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function edita_admin(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");

    $info = $this->input->post();
    $info['id'] = $this->session->userdata("id");
    $info['tipo'] = $this->session->userdata("tipo");

    if($info['senha'] || $info['re_senha']){

      if($info['senha'] == $info['re_senha']){
        $info['senha'] = criptografa($info['senha']);
      } else{
        $this->session->set_userdata('status_flashdata','danger');
        $this->session->set_flashdata('danger','As senhas digitadas não correspondem, tente novamente.');
        redirect('Front/editar_usuario_admin');
        }
      } else{
        $info['senha'] = $this->session->userdata("senha");
      }

      $this->Usuario_model->edita_usuario($info);
      $this->session->set_userdata($info);
      $this->session->set_userdata('status_flashdata','success');
      $this->session->set_flashdata('success','Usuário Alterado com sucesso');
      redirect('Front/turmas');

  }

  public function inclui_admin(){
    $this->load->model("Usuario_model");

    $info = $this->input->post();

    $info['tipo'] = "admin";
    $info['senha'] = criptografa($info['senha']);

    $this->Usuario_model->inclui_usuario($info);

    $this->session->set_userdata('status_flashdata','success');
    $this->session->set_flashdata('success','Administrador incluido com sucesso!');
    redirect('Front/turmas');
  }

  public function inclui_professor(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }
    $this->load->model("Usuario_model");

    $info = $this->input->post();
    $info['tipo'] = "professor";
    $info['senha'] = criptografa($info['senha']);

    $this->Usuario_model->inclui_usuario($info);

    $this->session->set_userdata('status_flashdata','success');
    $this->session->set_flashdata('success','Professor incluido com sucesso!');
    redirect('Front/professores');

    }

  public function edita_professor(){
      if(!$this->session->userdata("id")){
        redirect('/');
      }

      $this->load->model("Usuario_model");

      $info = $this->input->post();
      $info['tipo'] = "professor";

      if($info['senha']){
        $info['senha'] = criptografa($info['senha']);

      } else{
        $usuario = $this->Usuario_model->consulta_usuario($info['id']);
        $info['senha'] = $usuario['senha'];
      }

      $this->Usuario_model->edita_usuario($info);

      // header('content-type: application/json');
      // echo json_encode($info,JSON_PRETTY_PRINT);

      $this->session->set_userdata('status_flashdata','success');
      $this->session->set_flashdata('success','Professor editado com sucesso!');
      redirect('Front/professores');

    }

  public function edita_aluno(){
      if(!$this->session->userdata("id")){
        redirect('/');
      }

      $this->load->model("Usuario_model");
      $this->load->model("Aluno_model");

      $info = $this->input->post();
      $info['tipo'] = "aluno";
      $info['login'] = NULL;
      $info['senha'] = NULL;

      $this->Usuario_model->edita_usuario($info);
      $this->Aluno_model->edita_aluno($info);

      $this->session->set_userdata('status_flashdata','success');
      $this->session->set_flashdata('success','Aluno editado com sucesso!');
      redirect('Front/alunos');
    }

  public function inclui_responsavel(){
    $this->load->model("Usuario_model");
    $this->load->model("Responsavel_model");

    $info = $this->input->post();

    $info['tipo'] = "responsavel";
    $info['senha'] = criptografa($info['senha']);

    $this->Usuario_model->inclui_usuario($info);

    $this->session->set_userdata('status_flashdata','success');
    $this->session->set_flashdata('success','Professor incluido com sucesso!');
    redirect('Front/responsaveis');
  }

  public function edita_responsavel(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }

    $this->load->model("Usuario_model");

    $info = $this->input->post();
    $info['tipo'] = "responsavel";

    if($info['senha']){
      $info['senha'] = criptografa($info['senha']);

    } else{
      $usuario = $this->Usuario_model->consulta_usuario($info['id']);
      $info['senha'] = $usuario['senha'];
    }

    $this->Usuario_model->edita_usuario($info);

    $this->session->set_userdata('status_flashdata','success');
    $this->session->set_flashdata('success','Responsavel editado com sucesso!');
    redirect('Front/responsaveis');

    // header('content-type: application/json');
    // echo json_encode($info,JSON_PRETTY_PRINT);

    }

  }
