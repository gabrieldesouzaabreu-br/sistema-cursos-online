<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Inclusão de professor</h4>
          </div>
          <div class="content">
              <?php echo form_open('admin/inclui_professor','id = inclui_professor'); ?>
                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Nome completo</p>
                              <input type="text" id="nome" name="nome" class="form-control" required value="">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Email</p>
                              <input type="email" id="email" name="email" class="form-control" required value="">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Data de nascimento</p>
                              <input type="date" id="data_nascimento" name="data_nascimento" class="form-control" required value="">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>CPF</p>
                              <input type="number" id="cpf" placeholder="Somente números" name="cpf" class="form-control" required value="">
                          </div>
                      </div>
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Endereço</p>
                              <input type="text" id="endereco" name="endereco" class="form-control" required value="">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Número</p>
                              <input type="number" id="numero" name="numero" class="form-control" required value="">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-5">
                          <div class="form-group">
                              <p>Complemento</p>
                              <input type="text" id="complemento" name="complemento" class="form-control" required value="">
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="form-group">
                              <p>Bairro</p>
                              <input type="text" id="bairro" name="bairro" class="form-control" required value="">
                          </div>
                      </div>
                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Cidade</p>
                              <input type="text" id="cidade" name="cidade" class="form-control" required value="">
                          </div>
                      </div>
                  </div>

                  <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">

                              <p>Estado</p>
                              <select class="selectpicker form-control" data-live-search="true" id="estado" name="estado" required>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MT">MT</option>
                                <option value="MS">MS</option>
                                <option value="MG">MG</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PR">PR</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RS">RS</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="TO">TO</option>
                              </select>

                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Telefone</p>
                              <input type="number" id="telefone" name="telefone" class="form-control" required value="">
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                              <p>Login</p>
                              <input type="text" id="login" name="login" class="form-control" required value="">
                          </div>
                      </div>

                  </div>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <p>Nova senha</p>
                          <input type="password"  id="senha" name="senha" class="form-control" required placeholder="Deixe em Branco para não alterar">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                          <p>Redigite a nova senha</p>
                          <input type="password" id="re_senha" name="re_senha" class="form-control" required placeholder="Deixe em Branco para não alterar">
                      </div>
                    </div>

                    <div class="col-md-4">
                      <div class="form-group">
                        <button type="button" class="btn btn-info btn-fill pull-right" onclick="verifica_info()" style="margin-top:10%;margin-right:30%;">Incluir Professor</button>
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

    if(!nome || !email || !data_nascimento || !cpf || !endereco || !numero || !complemento || !bairro || !cidade || !estado || !telefone || !login || !senha || !re_senha){
      alert("O formulário possui algum campo vazio, favor preencher.");
    } else{

      if (senha == re_senha) {

        $.post(
          base_url+'index.php/ajax/verifica_login',{
            login : login
          },

          function(data){
              if(data){
                alert("Login já existente, favor escolher outro");
              } else{
                $('#inclui_professor').submit();
              }
            }

        );

      } else{
        alert("As senhas digitadas não correspondem, favor verificar.");
      }

    }

  }

  });

</script>
