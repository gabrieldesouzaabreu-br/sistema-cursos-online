<div class="row">
  <div class="col-md-4">
    <div class="panel panel primary">

      <div class="panel-heading" style="text-align:center;font-size:20px;">
        Alunos
      </div>

      <div class="panel-body">

        <table class="table table-striped table-bordered table-hover table-condensed">

          <thead>
              <tr>
                  <th>Nome</th>
                  <th>Idade</th>
                  <?php if($turma['id'] != $turma_nao_matriculados) : ?>
                  <th>Desmatricular</th>
                  <?php endif; ?>

              </tr>
          </thead>

          <tbody id="tb_alunos">
            <?php foreach ($aluno as $a) :?>

              <tr>
                <td><?php echo $a['aluno_nome']; ?></td>
                <td><?php echo $a['idade']." anos"; ?></td>
                <?php if($turma['id'] != $turma_nao_matriculados) : ?>
                <td style="text-align:center">
                  <button type="button" class="btn btn-danger btn-sm" onclick="remove_aluno(this)" id="id_usuario_aluno/<?php echo $a['usuario_aluno_id']; ?>" value="<?php echo $a['usuario_aluno_id']; ?>"><i class="fas fa-times-circle fa-lg"></i></button>
                </td>
                <?php endif; ?>
              </tr>

            <?php endforeach; ?>
          </tbody>

        </table>
        <?php if($turma['id'] != $turma_nao_matriculados) : ?> <!-- Testa se é a turma dos não matriculados, se for, não mostra a lista dos professores -->

        <p>Adicionar Aluno</p>
        <select id="add_aluno" class="selectpicker aluno" multiple data-live-search="true" onchange="add_array_alunos()">
          <?php foreach ($alunos as $a): ?>
            <option value="<?=$a['id_aluno']?>"><?=$a['nome']?></option>
          <?php endforeach; ?>
        </select>
        <button type="button" class="btn btn-success" style="float:right" onclick="inclui_alunos_turma()" name="button"><i class="fa fa-plus"></i></button>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="panel panel primary">

      <div class="panel-heading" style="text-align:center;font-size:20px">
        Professores
      </div>

      <div class="panel-body">

        <table class="table table-striped table-bordered table-hover table-condensed" >

          <thead>
              <tr>
                  <th>Nome</th>
                  <th>Disciplina</th>
                  <th>Desvincular</th>
              </tr>
          </thead>

          <tbody id="tb_prof">
            <?php foreach ($professor_turma as $p) :?>

                <tr>
                  <td><?php echo $p['professor_nome']; ?></td>
                  <td><?php echo $p['disciplina_nome']; ?></td>
                  <td style="text-align:center">
                    <button type="button" name="" class="btn btn-danger btn-sm" id="id_professor/<?php echo $p['professor_usuario_id'];?>" onclick="remove_professor(this)" value="<?=$p['professor_usuario_id'];?>"><i class="fas fa-times-circle fa-lg"></i></button>
                  </td>
                </tr>

            <?php endforeach; ?>
          </tbody>

        </table>

        <p>Adicionar Professor</p>
        <select id="add_prof" class="selectpicker professor" data-live-search="true">
          <?php foreach ($todos_prof as $t): ?>
            <option value="<?=$t['id']?>"><?=$t['nome']?></option>
          <?php endforeach; ?>
        </select>

        <p style="margin-top:5%">Selecionar a(s) Disciplina(s)</p>
        <select id="disciplina" class="selectpicker disciplinas" multiple data-live-search="true" onchange="add_array_disciplinas()">
          <?php foreach ($disciplinas as $d): ?>
            <option value="<?=$d['id']?>"><?=$d['nome']?></option>
          <?php endforeach; ?>
        </select>

        <button type="button" class="btn btn-success" style="float:right" onclick="inclui_professor_turma()" name="button"><i class="fa fa-plus"></i></button>
      </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="card">
        <div class="panel panel primary">

          <div class="panel-heading" style="text-align:center;font-size:20px">
            Informações da Turma
          </div>

          <div class="panel-body">
            <div class="form-group">
                <p>Nome </p>
                <input type="text" id="nome_turma" class="form-control" value="<?=$turma['nome']?>">
            </div>

            <div class="form-group">
                <p>Descrição</p>
                <input type="text" id="descricao" class="form-control" value="<?=$turma['descricao']?>">
            </div>

            <div class="form-group">

              <p style="display:inline-block">Turno</p>
              <select class="form-control" id="turno" style="max-width:100px;display:inline-block;margin-left:60px">
                <option <?php if($turma['turno'] == "Manhã"){ echo "selected";} ?> value="Manhã">Manhã</option>
                <option <?php if($turma['turno'] == "Tarde"){ echo "selected";} ?> value="Tarde">Tarde</option>
                <option <?php if($turma['turno'] == "Integral"){ echo "selected";} ?> value="Integral">Integral</option>
              </select>

            </div>

            <div class="form-group">
                <p style="display:inline-block">Numero de Alunos</p>
                <input type="text" id="numero_alunos" class="form-control" disabled style="max-width:35px;display:inline-block;margin-left:35px" value="<?=$turma['numero_alunos']?>">
            </div>

            <div class="form-group">
              <button type="button" class="btn btn-success" style="float:right" onclick="edita_turma()" name="button">Editar</button>
            </div>

          </div>

      </div>
    </div>
  </div>

  <?php endif; ?>

</div>

<script>
var base_url = '<?=base_url()?>';
var id_turma = '<?=$turma['id']?>';
var alunos = null;
var disciplinas = null;

  $(function(){

    add_array_alunos = function(){
      alunos = $('#add_aluno').val();

      console.log(alunos);
    }

    add_array_disciplinas = function(){
      disciplinas = $('#disciplina').val();

      console.log(disciplinas);
    }

    inclui_alunos_turma = function(){
      console.log(alunos);

      if(alunos){

        if(confirm("Incluir Aluno(s) na turma?")){

          $.post(
            base_url+'index.php/ajax/inclui_aluno_turma',{
              alunos: alunos,
              id_turma: id_turma
            },

            function(data){
              $('#numero_alunos').val(data[0]['numero_alunos']);

              for (var i = 0; i < data.length; i++) {

                var nascimento = data[i]['data_nascimento'].split("-");
                var ano_nascimento = parseInt(nascimento[0]);

                var ano = new Date();
                var ano_atual = ano.getFullYear();

                var idade = ano_atual - ano_nascimento;

                tr = "<tr><td>"+data[i]['nome']+"</td><td>"+idade+" anos</td><td style='text-align:center' ><button type='button' class='btn btn-danger btn-sm' onclick='remove_aluno(this)'' id='id_usuario_aluno/"+data[i]['id']+"' value="+data[i]['id']+"><i class='fas fa-times-circle fa-lg'></i></button></td></tr>"
                $('#tb_alunos').append(tr);

              }
              console.log(data);
            }
          );

          for (var k = 0; k < alunos.length; k++) {
            $('.aluno').find('[value='+alunos[k]+']').remove();
            $('.aluno').selectpicker('refresh');
          }
          alunos = null;
        }
      } else{
        alert("É necessário selecionar um ou mais alunos para o cadastro.");
      }
    }

    inclui_professor_turma = function(){
      console.log(disciplinas);

      if(disciplinas){

        if(confirm("Incluir Professor(a) na turma?")){

          var id_professor = $('#add_prof').val();

          $.post(
            base_url+'index.php/ajax/inclui_professor_turma',{
              id_turma: id_turma,
              disciplinas : disciplinas,
              id_professor : id_professor
            },

            function(data){
                console.log(data);
                tr = "<tr><td>"+data['nome']+"</td><td>"+data['disciplinas']+"</td><td style='text-align:center' ><button type='button' class='btn btn-danger btn-sm' onclick='remove_professor(this)' id='id_professor/"+data['id']+"' value="+data['id']+"><i class='fas fa-times-circle fa-lg'></i></button></td></tr>"
                $('#tb_prof').append(tr);
              }

            );

            $('.professor').find('[value='+id_professor+']').remove();
            $('.professor').selectpicker('refresh');
            $('.disciplinas').selectpicker('deselectAll');

            disciplinas = null;

          }
        } else{
          alert("É necessário selecionar uma ou mais disciplinas para o cadastro de professor.");
        }
      }

    remove_aluno = function(item) {

      if(confirm("Tem certeza que deseja desmatricular este aluno da turma?")){
        var array_aluno = item.id.split("/");
        var id_usuario_aluno = array_aluno[1];

        var tr = $(item).closest('tr');

        tr.fadeOut(400, function() {
  	      tr.remove();
        });

        $.post(
          base_url+'index.php/ajax/remove_aluno_turma',{
            id_usuario_aluno: id_usuario_aluno,
            id_turma: id_turma
          },

          function(data){
            $('#numero_alunos').val(data['numero_alunos']);

            $("#add_aluno").append('<option value="'+data['id_aluno']+'" >'+data['nome']+'</option>');
            $("#add_aluno").selectpicker("refresh");
          }
        );

      }

      return false;
    }

    remove_professor = function(item){

      if(confirm("Tem certeza que deseja desnvincular este professor desta turma?")){
        var array_prof = item.id.split("/");

        var id_professor = array_prof[1];

        var tr = $(item).closest('tr');

        tr.fadeOut(400, function() {
  	      tr.remove();
        });

        $.post(
          base_url+'index.php/ajax/remove_professor_turma',{
            id_professor: id_professor,
            id_turma: id_turma
          },

          function(data){
            console.log(data);
            $("#add_prof").append('<option value="'+data['id']+'" >'+data['nome']+'</option>');
            $("#add_prof").selectpicker("refresh");
          }
        );

      }

      return false;
    }

    edita_turma = function(){
      if(confirm("Deseja alterar as informações da turma?")){
        var nome_turma = $('#nome_turma').val();
        var descricao = $('#descricao').val();
        var turno = $('#turno').val();


        $.post(
          base_url+'index.php/ajax/edita_turma',{
            id_turma : id_turma,
            nome_turma : nome_turma,
            descricao : descricao,
            turno : turno
          },

          function(data){
          }
        );

      }
    }

  });

</script>
