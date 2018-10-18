<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Edição de professor</h4>
          </div>
          <div class="content">
              <?php echo form_open('admin/edita_professor','id = edita_professor'); ?>
                  <div class="row">
                      <div class="col-md-5">

                        <input type="hidden" id="id" name="id" class="form-control" value="<?=$info['id']?>">

                          <div class="form-group">
                              <p>Nome completo</p>
                              <input type="text" id="nome" name="nome" class="form-control" required value="<?=$info['nome']?>">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Email</p>
                              <input type="email" id="email" name="email" class="form-control" required value="<?=$info['email']?>">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Data de nascimento</p>
                              <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required value="<?=$info['data_nascimento']?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>CPF</p>
                              <input type="number" id="cpf" placeholder="Somente números" name="cpf" class="form-control" required value="<?=$info['cpf']?>">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Endereço</p>
                              <input type="text" id="endereco" name="endereco" class="form-control" required value="<?=$info['endereco']?>">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Número</p>
                              <input type="number" id="numero" name="numero" class="form-control" required value="<?=$info['numero']?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Complemento</p>
                              <input type="text" id="complemento" name="complemento" class="form-control" required value="<?=$info['complemento']?>">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Bairro</p>
                              <input type="text" id="bairro" name="bairro" class="form-control" required value="<?=$info['bairro']?>">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Cidade</p>
                              <input type="text" id="cidade" name="cidade" class="form-control" required value="<?=$info['cidade']?>">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <p>Estado</p>
                            <select class="selectpicker form-control" data-live-search="true" id="estado" name="estado" required>
                              <option <?php if($info['estado'] == "AC"){ echo "selected";} ?> value="AC">AC</option>
                              <option <?php if($info['estado'] == "AL"){ echo "selected";} ?> value="AL">AL</option>
                              <option <?php if($info['estado'] == "AP"){ echo "selected";} ?> value="AP">AP</option>
                              <option <?php if($info['estado'] == "AM"){ echo "selected";} ?> value="AM">AM</option>
                              <option <?php if($info['estado'] == "BA"){ echo "selected";} ?> value="BA">BA</option>
                              <option <?php if($info['estado'] == "CE"){ echo "selected";} ?> value="CE">CE</option>
                              <option <?php if($info['estado'] == "DF"){ echo "selected";} ?> value="DF">DF</option>
                              <option <?php if($info['estado'] == "ES"){ echo "selected";} ?> value="ES">ES</option>
                              <option <?php if($info['estado'] == "GO"){ echo "selected";} ?> value="GO">GO</option>
                              <option <?php if($info['estado'] == "MA"){ echo "selected";} ?> value="MA">MA</option>
                              <option <?php if($info['estado'] == "MT"){ echo "selected";} ?> value="MT">MT</option>
                              <option <?php if($info['estado'] == "MS"){ echo "selected";} ?> value="MS">MS</option>
                              <option <?php if($info['estado'] == "MG"){ echo "selected";} ?> value="MG">MG</option>
                              <option <?php if($info['estado'] == "PA"){ echo "selected";} ?> value="PA">PA</option>
                              <option <?php if($info['estado'] == "PB"){ echo "selected";} ?> value="PB">PB</option>
                              <option <?php if($info['estado'] == "PR"){ echo "selected";} ?> value="PR">PR</option>
                              <option <?php if($info['estado'] == "PE"){ echo "selected";} ?> value="PE">PE</option>
                              <option <?php if($info['estado'] == "PI"){ echo "selected";} ?> value="PI">PI</option>
                              <option <?php if($info['estado'] == "RJ"){ echo "selected";} ?> value="RJ">RJ</option>
                              <option <?php if($info['estado'] == "RN"){ echo "selected";} ?> value="RN">RN</option>
                              <option <?php if($info['estado'] == "RS"){ echo "selected";} ?> value="RS">RS</option>
                              <option <?php if($info['estado'] == "RO"){ echo "selected";} ?> value="RO">RO</option>
                              <option <?php if($info['estado'] == "RR"){ echo "selected";} ?> value="RR">RR</option>
                              <option <?php if($info['estado'] == "SC"){ echo "selected";} ?> value="SC">SC</option>
                              <option <?php if($info['estado'] == "SE"){ echo "selected";} ?> value="SE">SE</option>
                              <option <?php if($info['estado'] == "TO"){ echo "selected";} ?> value="TO">TO</option>
                            </select>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Telefone</p>
                              <input type="number" id="telefone" name="telefone" class="form-control" required value="<?=$info['telefone']?>">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Login</p>
                              <input type="text" id="login" name="login" class="form-control" required value="<?=$info['login']?>">
                          </div>
                      </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <p>Nova senha</p>
                          <input type="password" id="senha" name="senha" class="form-control" placeholder="Deixe em Branco para não alterar">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <p>Redigite a nova senha</p>
                          <input type="password" id="re_senha" name="re_senha" class="form-control" placeholder="Deixe em Branco para não alterar">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <button type="button" class="btn btn-info btn-fill pull-right" onclick="verifica_info()" style="margin-top:10%;margin-right:30%;">Salvar alterações</button>
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

<script>

var base_url = '<?=base_url()?>';

  $(function(){

    verifica_info = function(){

      var id = $('#id').val();
      var nome = $('#nome').val();
      var email = $('#email').val();
      var data_nascimento = $('#data_nascimento').val();
      var cpf = $('#cpf').val();
      var endereco = $('#endereco').val();
      var numero = $('#numero').val();
      var complemento = $('#complemento').val();
      var bairro = $('#bairro').val();
      var cidade = $('#cidade').val();
      var estado = $('#estado').val();
      var telefone = $('#telefone').val();
      var login = $('#login').val();
      var senha = $('#senha').val();
      var re_senha = $('#re_senha').val();

      if(!nome || !email || !data_nascimento || !cpf || !endereco || !numero || !complemento || !bairro || !cidade || !estado || !telefone || !login){
        alert("O formulário possui algum campo vazio, favor preencher.");
      } else{

        $.post(
          base_url+'index.php/ajax/verifica_login_proprio',{
            id : id,
            login : login
          },

          function(data){
            if(data){

              if (senha) {
                if(senha == re_senha){
                  $('#edita_professor').submit();
                } else{
                  alert("As senhas digitadas não correspondem, favor verificar.");
                }
              } else{
                $('#edita_professor').submit();
              }

            } else{
              alert("Login já existente, favor escolher outro.");
            }
          }

        );

      }

    }

  });

</script>
