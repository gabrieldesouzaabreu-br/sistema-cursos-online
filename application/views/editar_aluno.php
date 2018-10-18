<div class="row">
  <div class="col-md-12">
      <div class="card">
          <div class="header">
              <h4 class="title">Edição de aluno</h4>
          </div>
          <div class="content">

              <input type="hidden" name="id" class="form-control" value="<?=$usuario_aluno['id']?>">

              <div class="row">

                  <div class="col-md-4">
                      <div class="form-group">
                          <p>Nome completo</p>
                          <input type="text" id="nome" class="form-control" required value="<?=$usuario_aluno['nome']?>">
                      </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">

                        <p>Sexo</p>
                        <select class="form-control" id="sexo">
                          <option <?php if($aluno['sexo'] == "Masculino"){ echo "selected";} ?> value="Masculino">Masculino</option>
                          <option <?php if($aluno['sexo'] == "Feminino"){ echo "selected";} ?> value="Feminino">Feminino</option>
                        </select>

                      </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                          <p>Naturalidade</p>
                          <input type="text" id="naturalidade" class="form-control" required value="<?=$aluno['naturalidade']?>">
                      </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                        <p>Altura (m)</p>
                          <input type="number" id="altura" class="form-control" required value="<?=$aluno['altura']?>">
                      </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                          <p>Peso (KG)</p>
                          <input type="number" id="peso" class="form-control" required value="<?=$aluno['peso']?>">
                      </div>
                  </div>

              </div>

              <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Nascimento</p>
                        <input type="date" id="data_nascimento" class="form-control" required value="<?=$usuario_aluno['data_nascimento']?>">
                    </div>
                </div>

                  <div class="col-md-2">
                      <div class="form-group">
                          <p>Celular de contato</p>
                          <input type="number" id="telefone" class="form-control" required value="<?=$usuario_aluno['telefone']?>">
                      </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                          <p>Fone emergência</p>
                          <input type="number" id="telefone_emergencia" class="form-control" required value="<?=$aluno['telefone_emergencia']?>">
                      </div>
                  </div>

                  <div class="col-md-3">
                      <div class="form-group">
                          <p>Endereço</p>
                          <input type="text" id="endereco" class="form-control" required value="<?=$usuario_aluno['endereco']?>">
                      </div>
                  </div>

                  <div class="col-md-1">
                      <div class="form-group">
                          <p>Número</p>
                          <input type="number" id="numero" class="form-control" required value="<?=$usuario_aluno['numero']?>">
                      </div>
                  </div>

                  <div class="col-md-2">
                      <div class="form-group">
                          <p>Complemento</p>
                          <input type="text" id="complemento" class="form-control" required value="<?=$usuario_aluno['complemento']?>">
                      </div>
                  </div>

              </div>

              <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Bairro</p>
                        <input type="text" id="bairro" class="form-control" required value="<?=$usuario_aluno['bairro']?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Cidade</p>
                        <input type="text" id="cidade" class="form-control" required value="<?=$usuario_aluno['cidade']?>">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">

                        <p>Estado</p>
                        <select class="selectpicker form-control" data-live-search="true" id="estado" name="estado" required>
                          <option <?php if($usuario_aluno['estado'] == "AC"){ echo "selected";} ?> value="AC">AC</option>
                          <option <?php if($usuario_aluno['estado'] == "AL"){ echo "selected";} ?> value="AL">AL</option>
                          <option <?php if($usuario_aluno['estado'] == "AP"){ echo "selected";} ?> value="AP">AP</option>
                          <option <?php if($usuario_aluno['estado'] == "AM"){ echo "selected";} ?> value="AM">AM</option>
                          <option <?php if($usuario_aluno['estado'] == "BA"){ echo "selected";} ?> value="BA">BA</option>
                          <option <?php if($usuario_aluno['estado'] == "CE"){ echo "selected";} ?> value="CE">CE</option>
                          <option <?php if($usuario_aluno['estado'] == "DF"){ echo "selected";} ?> value="DF">DF</option>
                          <option <?php if($usuario_aluno['estado'] == "ES"){ echo "selected";} ?> value="ES">ES</option>
                          <option <?php if($usuario_aluno['estado'] == "GO"){ echo "selected";} ?> value="GO">GO</option>
                          <option <?php if($usuario_aluno['estado'] == "MA"){ echo "selected";} ?> value="MA">MA</option>
                          <option <?php if($usuario_aluno['estado'] == "MT"){ echo "selected";} ?> value="MT">MT</option>
                          <option <?php if($usuario_aluno['estado'] == "MS"){ echo "selected";} ?> value="MS">MS</option>
                          <option <?php if($usuario_aluno['estado'] == "MG"){ echo "selected";} ?> value="MG">MG</option>
                          <option <?php if($usuario_aluno['estado'] == "PA"){ echo "selected";} ?> value="PA">PA</option>
                          <option <?php if($usuario_aluno['estado'] == "PB"){ echo "selected";} ?> value="PB">PB</option>
                          <option <?php if($usuario_aluno['estado'] == "PR"){ echo "selected";} ?> value="PR">PR</option>
                          <option <?php if($usuario_aluno['estado'] == "PE"){ echo "selected";} ?> value="PE">PE</option>
                          <option <?php if($usuario_aluno['estado'] == "PI"){ echo "selected";} ?> value="PI">PI</option>
                          <option <?php if($usuario_aluno['estado'] == "RJ"){ echo "selected";} ?> value="RJ">RJ</option>
                          <option <?php if($usuario_aluno['estado'] == "RN"){ echo "selected";} ?> value="RN">RN</option>
                          <option <?php if($usuario_aluno['estado'] == "RS"){ echo "selected";} ?> value="RS">RS</option>
                          <option <?php if($usuario_aluno['estado'] == "RO"){ echo "selected";} ?> value="RO">RO</option>
                          <option <?php if($usuario_aluno['estado'] == "RR"){ echo "selected";} ?> value="RR">RR</option>
                          <option <?php if($usuario_aluno['estado'] == "SC"){ echo "selected";} ?> value="SC">SC</option>
                          <option <?php if($usuario_aluno['estado'] == "SE"){ echo "selected";} ?> value="SE">SE</option>
                          <option <?php if($usuario_aluno['estado'] == "TO"){ echo "selected";} ?> value="TO">TO</option>
                        </select>

                    </div>
                </div>

              <div class="col-md-3">
                  <div class="form-group">
                      <p>Registro Médico (CRM)</p>
                      <input type="number" id="crm" class="form-control" value="<?=$aluno['crm']?>">
                  </div>
              </div>

            </div>

            <div id="tabela_responsavel" class="row">

                <div class="col-md-6">
                  <h4><b>Responsáveis vinculados ao aluno</b></h4>
                  <div class="table-responsive">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Nome</th>
                          <th style="max-width:40px;">Parentesco</th>
                          <th style="max-width:10px;">Remover</th>
                        </tr>
                      </thead>
                      <tbody id="tb_resp">
                        <?php $i = 0; ?>
                        <?php foreach ($aluno_responsavel as $a): ?>
                          <?php foreach ($responsaveis as $r): ?>
                            <?php if ($a['responsavel_id'] == $r['id']): ?>
                              <?php $i++; ?>
                              <tr id="remove<?=$i?>">
                                <td><?=$r['nome']?></td>
                                <td><?=$a['parentesco']?></td>
                                <td><button type='button' onclick='remove(this,<?=$i?>)' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td>
                              </tr>
                          <?php endif; ?>
                        <?php endforeach; ?>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="col-md-6">
                  <h4><b>Restrições do aluno</b></h4>
                  <div class="table-responsive">

                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Restrição</th>
                          <th style="max-width:10px;">Remover</th>
                        </tr>
                      </thead>
                      <tbody id="tb_restricao">
                        <?php
                          $restricoes = explode("/",$aluno['restricoes']);
                          $i = 0;
                          foreach ($restricoes as $r) :?>
                          <?php $i++;
                          if($r){
                          ?>
                          <tr>
                            <td><?=$r?></td>
                            <td><button type='button' onclick='remove_restricao(this,<?=$i?>)' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td>
                          </tr>
                        <?php }endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                </div>

            </div>

            <div class="col-md-2" style="float:right">
                <div class="form-group">
                    <button type="button" id="add_restricao" class="btn btn-info btn-fill" style="">Adicionar Restrição </button>
                </div>
            </div>

            <div class="col-md-4" style="float:right">
              <div class="form-group">
                <span style="display:flex;font-size:16px;line-height:1.5;font-family:'Roboto','Helvetica Neue',Arial,sans-serif">Restrição:<span>
                  <input type="text" id="restricao" name="" class="form-control">
                </div>
              </div>

            <div id="resp" style="display:none;text-align:center" class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <button type="button" id="res_cadastrado" class="btn btn-success " style="">Adicionar responsável já cadastrado</button>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <button type="button" id="res_novo" class="btn btn-success " style="">Adicionar novo responsável </button>
                    </div>
                </div>

            </div>

            <div id="resp_existente" style="display:none;background-color:#eaeaea;borde-radius:7px;margin-top:40px;" class="row">

              <div class="col-md-3">

                <p>Responsável já cadastrado</p>
                <select class="selectpicker" data-live-search="true" id="responsavel">
                  <?php foreach ($responsaveis as $r) : ?>
                    <option value="<?=$r['id']."/".$r['nome']?>"> <?=$r['nome']?> </option>
                  <?php endforeach; ?>
                </select>

              </div>

              <div class="col-md-3" id="parentesco_cadastrado">
                <div class="form-group parentesco_cadastrado">
                    <p>Parentesco</p>
                    <select class="form-control" id="parentesco" onchange="verifica_parentesco()">
                      <option value="Pai">Pai</option>
                      <option value="Mãe">Mãe</option>
                      <option value="Avô">Avô</option>
                      <option value="Avó">Avó</option>
                      <option value="Outro">Outro</option>
                    </select>
                </div>
              </div>

              <div id="input_parentesco" style="display:none">
                <div class="col-md-3">
                    <div class="form-group">
                        <p>Parentesco</p>
                        <input type="text" id="parentesco_outro" placeholder="Digite o parentesco" class="form-control" value="">
                    </div>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group" style="margin-top:20%">
                    <input type="checkbox" id="financeiro" value="1"><span style="font-family:inherit;font-weight:600;"> Responsável Financeiro</span>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group" style="margin-top:20%">
                    <input type="checkbox" id="retirada" value="1"><span style="font-family:inherit;font-weight:600;"> Responsável por retirada</span>
                </div>
              </div>

              <div class="col-md-2">
                <div class="form-group" style="margin-top:22%">
                  <button type="button" id="salvar_responsavel" name="button" class="btn btn-success">Salvar responsável</button>
                </div>
              </div>

            </div>

            <div id="resp_novo" style="display:none;background-color:#eaeaea;borde-radius:7px;padding-left:20px;padding-right:20px;margin-top:40px;">

              <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Nome</p>
                        <input type="text" id="nome_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2" id="parentesco_cadastrado_novo">
                    <div class="form-group">

                        <p>Parentesco</p>
                        <select class="form-control" id="parentesco_novo" onchange="verifica_parentesco_novo()">
                          <option value="Pai">Pai</option>
                          <option value="Mãe">Mãe</option>
                          <option value="Avô">Avô</option>
                          <option value="Avó">Avó</option>
                          <option value="Outro">Outro</option>
                        </select>

                    </div>
                </div>

                <div id="input_parentesco_novo" style="display:none">
                  <div class="col-md-2">
                      <div class="form-group">
                          <p>Parentesco</p>
                          <input type="text" placeholder="Digite o parentesco" id="parentesco_outro_novo" class="form-control" value="">
                      </div>
                  </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Email</p>
                        <input type="text" id="email_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Nascimento</p>
                        <input type="date" id="data_nascimento_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>CPF</p>
                        <input type="text" id="cpf_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Endereço</p>
                        <input type="text" id="endereco_novo" class="form-control" value="">
                    </div>
                </div>

              </div>

              <div class="row">

                <div class="col-md-1">
                    <div class="form-group">
                        <p>Número</p>
                        <input type="number" id="numero_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Complemento</p>
                        <input type="text" id="complemento_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Bairro</p>
                        <input type="text" id="bairro_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Cidade</p>
                        <input type="text" id="cidade_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">

                        <p>Estado</p>
                        <select class="selectpicker form-control" data-live-search="true" id="estado_novo" name="estado" required>
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

                <div class="col-md-3">
                    <div class="form-group">
                        <p>Telefone</p>
                        <input type="int" id="telefone_novo" class="form-control" value="">
                    </div>
                </div>

              </div>

              <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <p>Login</p>
                        <input type="text" id="login_novo" class="form-control" value="">
                    </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <p>Nova senha</p>
                      <input type="password" id="senha_novo" class="form-control" >
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                      <p>Repita a senha</p>
                      <input type="password" id="re_senha_novo" class="form-control"  >
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group" style="margin-top:20%">
                      <input type="checkbox" id="financeiro_novo" value="1"><span style="font-family:inherit;font-weight:600;"> Responsável Financeiro</span>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group" style="margin-top:20%">
                      <input type="checkbox" id="retirada_novo" value="1"><span style="font-family:inherit;font-weight:600;"> Responsável por retirada</span>
                  </div>
                </div>

                <div class="col-md-2" >
                  <div class="form-group" style="margin-top:22%;">
                    <button type="button" id="salvar_responsavel_novo" name="button" class="btn btn-success">Salvar responsável</button>
                  </div>
                </div>

              </div>

            </div>

            <div class="row">

              <div class="col-md-2">
                  <div class="form-group">
                      <button type="button" id="add_res" class="btn btn-info btn-fill" style="">Adicionar responsável </button>
                  </div>
              </div>

              </div>

            <div class="row">

              <div class="col-md-2" style="float:right;">
                  <div class="form-group">
                      <button type="button" id="conclui_cadastro" class="btn btn-success">Concluir edição</button>
                  </div>
              </div>

            </div>
          </div>
      </div>
  </div>
</div>

<script>

var id_array = 0;

var aluno_responsavel = <?php echo json_encode($aluno_responsavel);?>;
var responsaveis = <?php echo json_encode($responsaveis);?>;
var responsavel_info = [];

for (var i = 0; i < responsaveis.length; i++) {
  for (var k = 0; k < aluno_responsavel.length; k++) {
    if (responsaveis[i]['id'] == aluno_responsavel[k]['responsavel_id']){
      id_array = id_array + 1;

      var array = {
        'id_array': [id_array],
        'id_responsavel': [parseInt(responsaveis[i]['id'])],
        'nome_responsavel': [responsaveis[i]['nome']],
        'parentesco': [aluno_responsavel[k]['parentesco']],
        'financeiro': [parseInt(aluno_responsavel[k]['financeiro'])],
        'retirada': [parseInt(aluno_responsavel[k]['retirada'])],
        'login': [responsaveis[i]['login']],
        'aluno_id': null
      }

      responsavel_info.push(array);

    }
  }
}

var novo_responsavel = [];
var restricoes = [];
var id_restricao = 0;

var array_res = <?php echo json_encode($restricoes); ?>;

for (var i = 0; i < array_res.length; i++) {
  id_restricao = id_restricao + 1;

  var array = {
    'id_restricao' : [id_restricao],
    'restricao' : [array_res[i]]
  }

  restricoes.push(array);
}

var base_url = '<?=base_url()?>';

$(function(){

  verifica_parentesco_novo = function(){
    var parentesco = $('#parentesco_novo').val();

    if (parentesco == "Outro") {
      $("#parentesco_cadastrado_novo").hide();
      $("#input_parentesco_novo").show();
    }
    console.log(parentesco);

  }

  verifica_parentesco = function(){
    var parentesco = $('#parentesco').val();

    if (parentesco == "Outro") {
      $("#parentesco_cadastrado").hide();
      $("#input_parentesco").show();
    }

  }

  remove = function(item,id) {

    if(confirm("Desvincular responsavel ao aluno?")){

      for (var i = 0; i < responsavel_info.length; i++) {
        if (responsavel_info[i]['id_array'][0] == id) {
          if(responsavel_info[i]['id_responsavel'] == 0){
            for (var j = 0; j < novo_responsavel.length; j++) {
              if (novo_responsavel[j]['id_array'][0] == id) {
                novo_responsavel.splice(j,1);
              }
            }
          }
          responsavel_info.splice(i,1);
        } // fecha o if maior
      } // fecha o for

      var tr = $(item).closest('tr');

      tr.fadeOut(400, function() {
        tr.remove();
      });

      console.log(responsavel_info);
      //console.log(novo_responsavel);
    }
    return false;
  }

  remove_restricao = function(item,id){

    if(confirm("Remover restrição do aluno?")){

      var tr = $(item).closest('tr');

      for (var i = 0; i < restricoes.length; i++) {
        if(restricoes[i]['id_restricao'][0] == id){
          restricoes.splice(i,1);
        }
      }

      tr.fadeOut(400, function() {
        tr.remove();
      });
    }
    //return false;
    console.log(restricoes);
  }

  $("#add_restricao").click(function(){
    var restricao = $("#restricao").val();

    if(!restricao){
      alert("É necessário digitar uma restrição para o cadastro.");
    } else{

      $("#restricao").val("");

      id_restricao = parseInt(id_restricao) + 1;

      var array_restricao = {
        'id_restricao': [id_restricao],
        'restricao': [restricao]
      };

      var tr;

      tr = "<tr><td>"+restricao+"</td><td><button type='button' onclick='remove_restricao(this,"+id_restricao+")' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td></tr>"
      $('#tb_restricao').append(tr);

      restricoes.push(array_restricao);
    }

    console.log(restricoes);

  });

  $("#add_res").click(function(){

    $("#input_parentesco").hide();
    $("#parentesco_cadastrado").show();
    $('#parentesco').val("Pai");

    $("#input_parentesco_novo").hide();
    $("#parentesco_cadastrado_novo").show();
    $('#parentesco_novo').val("Pai");

    if ($('#resp').is(":visible")) {
      $("#resp").hide();
    } else{
      $("#resp").show();
      $("#resp_existente").hide();
      $("#resp_novo").hide();
    }
  });

  $("#res_cadastrado").click(function(){
    if ($('#resp_existente').is(":visible")) {
      $("#resp_existente").hide();
    }else{
      $("#resp_existente").show();
    }

    $("#resp").hide();

  });

  $("#res_novo").click(function(){
    if ($('#resp_novo').is(":visible")) {
      $("#resp_novo").hide();
    }else{
      $("#resp_novo").show();
    }

    $("#resp").hide();

  });

  $("#salvar_responsavel").click(function(){
    var responsavel = $("#responsavel").val();
    var split = responsavel.split("/");
    var id_responsavel = parseInt(split[0]);
    var nome_responsavel = split[1];
    var parentesco = $("#parentesco").val();
    var financeiro = 0;
    var retirada = 0;

    if($('#financeiro').is(':checked')) {
      financeiro = 1;
    }

    if($('#retirada').is(':checked')){
      retirada = 1;
    }

    if (parentesco == "Outro") {
      parentesco = $('#parentesco_outro').val();
      if(!parentesco){
        alert('É necessário selecionar ou digitar o parentesco.');
        return false;
      }
    }

    id_array = parseInt(id_array) + 1;

    var info = {
      'id_array': [id_array],
      'id_responsavel': [id_responsavel],
      'nome_responsavel': [nome_responsavel],
      'parentesco': [parentesco],
      'financeiro': [financeiro],
      'retirada': [retirada],
      'login': null,
      'aluno_id': null
    };

    var tr;

    tr = "<tr id='remove"+info['id_array']+"'><td>"+info['nome_responsavel']+"</td><td>"+info['parentesco']+"</td><td><button type='button' onclick='remove(this,"+info['id_array']+")' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td></tr>"
    $('#tb_resp').append(tr);

    responsavel_info.push(info);

    $("#resp").hide();
    $("#resp_existente").hide();
    $("#resp_novo").hide();

    console.log(responsavel_info);

  });

  $("#salvar_responsavel_novo").click(function(){

        if($('#financeiro_novo').is(':checked')) {
          var financeiro_novo = 1;
        } else{
          var financeiro_novo = 0;
        }

        if($('#retirada_novo').is(':checked')){
          var retirada_novo = 1;
        } else{
          var retirada_novo = 0;
        }

        var parentesco = $('#parentesco_novo').val();

        if (parentesco == "Outro") {

          parentesco = $('#parentesco_outro_novo').val();

          if(!parentesco){
            alert('É necessário selecionar ou digitar o parentesco.');
            return false;
          }

        }

        id_array = parseInt(id_array) + 1;

        if( !$("#nome_novo").val() || !$("#email_novo").val() ||
        !$("#data_nascimento_novo").val() || !$("#cpf_novo").val() || !$("#endereco_novo").val()
        || !$("#numero_novo").val() || !$("#complemento_novo").val() || !$("#bairro_novo").val()
        || !$("#cidade_novo").val() || !$("#estado_novo").val() || !$("#telefone_novo").val()
        || !$("#login_novo").val() || !$("#senha_novo").val() || !$("#re_senha_novo").val() ){

          alert("O formulário do cadastro de novo responsavel possui algum campo vazio, favor preencher.");
        } else{

          if($("#senha_novo").val() == $("#re_senha_novo").val()){

            var responsavel_novo = {
              'id_array': [id_array],
              'nome': $("#nome_novo").val(),
              'parentesco': parentesco,
              'financeiro': [financeiro_novo],
              'retirada': [retirada_novo],
              'email': $("#email_novo").val(),
              'data_nascimento': $("#data_nascimento_novo").val(),
              'cpf': $("#cpf_novo").val(),
              'endereco': $("#endereco_novo").val(),
              'numero': $("#numero_novo").val(),
              'complemento': $("#complemento_novo").val(),
              'bairro': $("#bairro_novo").val(),
              'cidade': $("#cidade_novo").val(),
              'estado': $("#estado_novo").val(),
              'telefone': $("#telefone_novo").val(),
              'login': $("#login_novo").val(),
              'senha': $("#senha_novo").val(),
              're_senha': $("#re_senha_novo").val(),
              'tipo' : "responsavel"
            };

            $.post(
              base_url+'index.php/ajax/verifica_login',{
                login: responsavel_novo['login']
              },

              function(data){
                if(data){
                  alert("Login já existente, favor escolher outro");
                } else{
                    novo_responsavel.push(responsavel_novo); //novo_responsavel é a variavel global que contem todos os novos responsaveis

                    var info = {
                      'id_array': [id_array],
                      'id_responsavel': 0,
                      'nome_responsavel': $("#nome_novo").val(),
                      'parentesco': parentesco,
                      'financeiro': [financeiro_novo],
                      'retirada': [retirada_novo],
                      'login': [responsavel_novo['login']],
                      'aluno_id': null
                    };

                    var tr;

                    tr = "<tr id='remove"+info['id_array']+"'><td>"+info['nome_responsavel']+"</td><td>"+info['parentesco']+"</td><td><button type='button' onclick='remove(this,"+info['id_array']+")' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td></tr>"
                    $('#tb_resp').append(tr);

                    responsavel_info.push(info);

                    $('#nome_novo').val(null);
                    $('#parentesco_novo').val(null);
                    $('#email_novo').val(null);
                    $('#data_nascimento_novo').val(null);
                    $('#cpf_novo').val(null);
                    $('#endereco_novo').val(null);
                    $('#numero_novo').val(null);
                    $('#complemento_novo').val(null);
                    $('#bairro_novo').val(null);
                    $('#cidade_novo').val(null);
                    $('#estado_novo').val("AC");
                    $('#telefone_novo').val(null);
                    $('#login_novo').val(null);
                    $('#senha_novo').val(null);
                    $('#re_senha_novo').val(null);

                    $("#resp").hide();
                    $("#resp_existente").hide();
                    $("#resp_novo").hide();

                }
              }
            );

        } else{
          alert("As senhas digitadas para o cadastro de novo responsavel não coincidem, favor verificar.")
        }
      }
        console.log(novo_responsavel);
        console.log(responsavel_info);

  });

  $("#conclui_cadastro").click(function(){

    var restricoes_string = "";

    for (var i = 0; i < restricoes.length; i++) {
      if(i+1<restricoes.length){
        restricoes_string += restricoes[i]['restricao'][0]+"/";
      } else{
          restricoes_string += restricoes[i]['restricao'][0];
        }
    }

    if(!$("#nome").val() || !$("#data_nascimento").val() || !$("#endereco").val() ||
      !$("#numero").val() || !$("#complemento").val() || !$("#bairro").val() ||
      !$("#cidade").val() || !$("#estado").val() || !$("#telefone").val() ||
      !$("#sexo").val() || !$("#naturalidade").val() || !$("#telefone_emergencia").val() ||
      !$("#crm").val() || !$("#altura").val() || !$("#peso").val()){

      alert("O formulário possui algum campo vazio, favor preencher.");

    } else{

    var id_usuario = '<?=$usuario_aluno['id']?>';
    var id_aluno = '<?=$aluno['id']?>';

    var aluno = {
      'id_usuario' :id_usuario,
      'id_aluno' : id_aluno,
      'nome': $("#nome").val(),
      'data_nascimento': $("#data_nascimento").val(),
      'cpf': null,
      'email': null,
      'endereco': $("#endereco").val(),
      'numero': $("#numero").val(),
      'complemento': $("#complemento").val(),
      'bairro': $("#bairro").val(),
      'cidade': $("#cidade").val(),
      'estado': $("#estado").val(),
      'login': null,
      'senha': null,
      'tipo': "aluno",
      'telefone': $("#telefone").val(),
      'sexo': $("#sexo").val(),
      'naturalidade': $("#naturalidade").val(),
      'telefone_emergencia': $("#telefone_emergencia").val(),
      'restricoes': [restricoes_string],
      'crm': $("#crm").val(),
      'altura': $("#altura").val(),
      'peso': $("#peso").val()
    }

    $.post(
      base_url+'index.php/ajax/edita_aluno',{
        aluno: aluno,
        responsavel: responsavel_info,
        responsavel_novo: novo_responsavel
      },

      function(data){
        console.log(data);
      }
    );
    console.log(aluno);
    setTimeout(function(){window.location.replace(base_url+'index.php/Front/alunos');},100);
  }

  });

});

</script>
