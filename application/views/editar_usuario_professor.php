<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Edição de usuário</h4>
          </div>
          <div class="content">
              <?php echo form_open('Professor/edita_professor'); ?>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Nome completo</p>
                              <input type="text" name="nome" class="form-control" required value="<?=$this->session->userdata("nome")?>">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Email</p>
                              <input type="text" name="email" class="form-control" required value="<?=$this->session->userdata("email")?>">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Data de nascimento</p>
                              <input type="date" name="data_nascimento" class="form-control" required value="<?=$this->session->userdata("data_nascimento")?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>CPF</p>
                              <input type="text" name="cpf" class="form-control" required value="<?=$this->session->userdata("cpf")?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Endereço</p>
                              <input type="text" name="endereco" class="form-control" required value="<?=$this->session->userdata("endereco")?>">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Numero</p>
                              <input type="number" name="numero" class="form-control" required value="<?=$this->session->userdata("numero")?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Complemento</p>
                              <input type="text" name="complemento" class="form-control" required value="<?=$this->session->userdata("complemento")?>">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Bairro</p>
                              <input type="text" name="bairro" class="form-control" required value="<?=$this->session->userdata("bairro")?>">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Cidade</p>
                              <input type="text" name="cidade" class="form-control" required value="<?=$this->session->userdata("cidade")?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">

                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Estado</p>
                              <input type="text" name="estado" class="form-control" required value="<?=$this->session->userdata("estado")?>">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Telefone</p>
                              <input type="int" name="telefone" class="form-control" required value="<?=$this->session->userdata("telefone")?>">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Login</p>
                              <input type="text" name="login" class="form-control" required value="<?=$this->session->userdata("login")?>">
                          </div>
                      </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <p>Nova senha</p>
                          <input type="password" name="senha" class="form-control" placeholder="Deixe em Branco para não alterar">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <p>Redigite a nova senha</p>
                          <input type="password" name="re_senha" class="form-control" placeholder="Deixe em Branco para não alterar">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <button type="submit" class="btn btn-info btn-fill pull-right" style="margin-top:10%;margin-right:30%;">Editar usuário</button>
                      </div>
                    </div>
                  </div>

              		<?php echo form_close(); ?>
          </div>
      </div>
  </div>


</div>
</div>
</div>
