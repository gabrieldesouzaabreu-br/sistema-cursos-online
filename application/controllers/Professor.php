<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Professor extends CI_Controller{

  public function edita_professor(){
    if(!$this->session->userdata("id")){
      redirect('/');
    }
      $this->load->model("Professor_model");
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
          redirect('Front/editar_usuario_professor');
          }
        } else{
        $info['senha'] = $this->session->userdata("senha");
      }

    $info_prof = $this->Professor_model->consulta_ids($info['id']);

    $this->Usuario_model->edita_usuario($info);
    array_push($info,$info_prof);
    $this->session->set_userdata($info);
    $this->session->set_userdata('status_flashdata','success');

    $this->session->set_flashdata('success','Usuário Alterado com sucesso');
    redirect('Front/turmas');
  }

}
