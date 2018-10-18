<div class="row">

  <div class="col-md-3">

  </div>

  <div class="col-md-6 ">
    <div class="card">

        <div class="header">
            <h4 class="title">Nova Mensagem</h4>
        </div>

        <div class="content">

          <p>Selecione para quem deseja enviar</p>

          <button type="button" onclick="escola()" style="margin-right:10px" name="button" class="btn btn-primary">Escola</button>
          <button type="button" onclick="turma()" style="margin-right:10px" name="button" class="btn btn-success">Turma</button>
          <button type="button" onclick="aluno()" style="margin-right:10px" name="button" class="btn btn-info">Aluno</button>
          <button type="button" onclick="responsavel()" name="button" class="btn btn-warning">Responsavel</button>

          <div class="row">

            <div class="col-md-12" id="escola" style="display:none;width: 75%;">

              <br>
              <p>Enviar mensagem para <?=$escola['nome']?></p>
              <p>Digite sua Mensagem</p>
              <textarea class="form-control" rows="3" id="mensagem_escola"></textarea>
              <br>
              <button type="button" name="button" onclick="envia_escola()" class="btn btn-success">Enviar</button>

            </div>

            <div class="col-md-12" id="turma" style="display:none;">

              <br>
              <p>Selecione a turma a qual deseja enviar a mensagem</p>
              <select id="id_turma" class="selectpicker" data-live-search="true" >
                <?php foreach ($turmas as $t): ?>
                  <?php if ($t['nome'] != "Não Matriculado"): ?>
                    <option value="<?=$t['id']?>"><?=$t['nome']?></option>
                  <?php endif; ?>
                <?php endforeach; ?>
              </select>

              <br><br>

              <p>Digite sua Mensagem</p>
              <textarea class="form-control" rows="3" id="mensagem_turma"></textarea>

              <br>
              <button type="button" name="button" onclick="envia_turma()" class="btn btn-success">Enviar</button>

            </div>

            <div class="col-md-12" id="aluno" style="display:none;">

              <br>
              <p>Selecione o aluno a qual deseja enviar a mensagem</p>
              <select id="id_aluno" class="selectpicker" data-live-search="true" >
                <?php foreach ($alunos as $a): ?>
                  <option value="<?=$a['aluno_id']?>"><?=$a['nome']?></option>
                <?php endforeach; ?>
              </select>

              <br><br>

              <p>Digite sua Mensagem</p>
              <textarea class="form-control" rows="3" id="mensagem_aluno"></textarea>

              <br>
              <button type="button" name="button" onclick="envia_aluno()" class="btn btn-success">Enviar</button>

            </div>

            <div class="col-md-12" id="responsavel" style="display:none;">

              <br>
              <p>Selecione o responsavel a qual deseja enviar a mensagem</p>
              <select id="id_responsavel" class="selectpicker" data-live-search="true" >
                <?php foreach ($responsaveis as $r): ?>
                  <option value="<?=$r['id']?>"><?=$r['nome']?></option>
                <?php endforeach; ?>
              </select>

              <br><br>

              <p>Digite sua Mensagem</p>
              <textarea class="form-control" rows="3" id="mensagem_responsavel"></textarea>

              <br>
              <button type="button" name="button" onclick="envia_responsavel()" class="btn btn-success">Enviar</button>

            </div>

          </div>

          <?php
                // print_r($escola);
                // echo "<br><br>";
                // print_r($turmas);
                // echo "<br><br>";
                // print_r($alunos);
                // echo "<br><br>";
                // print_r($responsaveis);
                // echo "<br><br>";
           ?>

        </div>
    </div>
  </div>
</div>

<script>

var base_url = '<?=base_url()?>';

$(function(){

    escola = function(){
      if ($("#escola").is(":visible")) {
        $("#escola").hide();
      } else{
        $("#turma").hide();
        $("#aluno").hide();
        $("#responsavel").hide();
        $("#escola").show();
      }

    }

    envia_escola = function(){
      var mensagem = $('#mensagem_escola').val();

      if (mensagem) {

        $.post(
          base_url+'index.php/mensagem/envia_mensagem_escola',{
            mensagem : mensagem
          },

          function(data){
            }
        );

        $("#escola").hide();

      } else{
        alert("É necessário digitar uma mensagem para enviar.");
      }

    }

    turma = function(){
      if ($("#turma").is(":visible")) {
        $("#turma").hide();
      } else{
        $("#escola").hide();
        $("#aluno").hide();
        $("#responsavel").hide();
        $("#turma").show();
      }
    }

    envia_turma = function(){
      var mensagem = $('#mensagem_turma').val();

      if (mensagem) {

        $.post(
          base_url+'index.php/mensagem/envia_mensagem_turma',{
            mensagem : mensagem,
            id_turma : $('#id_turma').val()
          },

          function(data){
            console.log(data);
            }
        );

        $("#turma").hide();

      } else{
        alert("É necessário digitar uma mensagem para enviar.");
      }

    }

    aluno = function(){
      if ($("#aluno").is(":visible")) {
        $("#aluno").hide();
      } else{
        $("#escola").hide();
        $("#responsavel").hide();
        $("#turma").hide();
        $("#aluno").show();
      }
    }

    envia_aluno = function(){

      var mensagem = $('#mensagem_aluno').val();

      if (mensagem) {

        $.post(
          base_url+'index.php/mensagem/envia_mensagem_aluno',{
            mensagem : mensagem,
            id_aluno : $('#id_aluno').val()
          },

          function(data){
            console.log(data);
            }
        );

        $("#aluno").hide();

      } else{
        alert("É necessário digitar uma mensagem para enviar.");
      }

    }

    responsavel = function(){
      if ($("#responsavel").is(":visible")) {
        $("#responsavel").hide();
      } else{
        $("#escola").hide();
        $("#aluno").hide();
        $("#turma").hide();
        $("#responsavel").show();
      }
    }

    envia_responsavel = function(){

      var mensagem = $('#mensagem_responsavel').val();

      if (mensagem) {

        $.post(
          base_url+'index.php/mensagem/envia_mensagem_responsavel',{
            mensagem : mensagem,
            id_responsavel : $('#id_responsavel').val()
          },

          function(data){
            console.log(data);
            }
        );

        $("#responsavel").hide();

      } else{
        alert("É necessário digitar uma mensagem para enviar.");
      }


    }

});

</script>
