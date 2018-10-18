<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">

      <div class="panel panel primary">

        <div class="panel-heading" style="text-align:center;font-size:25px">
          Turmas
        </div>

        <div class="panel-body">

          <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-3">
              <div class="form-group">
                  <p>Nome da Turma</p>
                  <input type="text" id="nome_turma" class="form-control" value="">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                  <p>Descrição</p>
                  <input type="text" id="descricao" class="form-control" value="">
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <p>Turno</p>
                <select class="form-control" id="turno">
                  <option value="Manhã">Manhã</option>
                  <option value="Tarde">Tarde</option>
                  <option value="Integral">Integral</option>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <button type="button" class="btn btn-success" style="margin-top:34px" name="button" onclick="inclui_turma()"><i class="fa fa-plus"></i> Adicionar turma</button>
              </div>

            </div>

          </div>

          <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Turno</th>
                    <th>Nº de alunos</th>
                    <th>Visualizar/Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody id="tb_turmas">
              <?php foreach ($turma as $t) :?>

                <tr class="odd gradeX">
                  <td><?php echo $t['nome']; ?></td>
                  <td><?php echo $t['descricao']; ?></td>
                  <td><?php echo $t['turno']; ?></td>
                  <td><?php echo $t['numero_alunos'] ?></td>
                  <td style="text-align:center"><button type="button" name="editar_turma" id="turma_id/<?php echo $t['id']; ?>" onclick="redireciona_turma(this)" class="btn btn-primary" value="<?php echo $t['id']; ?>" ><i class="fas fa-edit fa-lg"></i></button></td>
                  <td> <?php if ($t['nome'] != "Não Matriculado"): ?>
                        <button type='button' onclick='verifica_turma(this,<?=$t['id']?>)' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button>
                       <?php endif; ?>
                  </td>
                </tr>

              <?php endforeach; ?>
            </tbody>

          </table>

        </div>
      </div>

    </div>
  </div>
</div>

<script>

var base_url = '<?=base_url()?>';

  $(function(){

    inclui_turma = function(){
      var nome_turma = $('#nome_turma').val();
      var descricao = $('#descricao').val();
      var turno = $('#turno').val();

      console.log(nome_turma);

      if (nome_turma == "") {
        alert("Nome de turma necessário, favor preencher antes de incluir.");
      } else{

          $.post(
            base_url+'index.php/ajax/inclui_turma',{
              nome_turma : nome_turma,
              descricao : descricao,
              turno : turno
            },

            function(data){
              if (data) {

                tr = "<tr><td>"+data['nome']+"</td><td>"+data['descricao']+"</td><td>"+data['turno']+"</td><td>"+data['numero_alunos']+"</td><td style='text-align:center'><button type='button' name='editar_turma' id='turma_id/"+data['id']+"' onclick='redireciona_turma(this)' class='btn btn-primary' value='"+data['id']+"'><i class='fas fa-edit fa-lg'></i></button></td><td><button type='button' onclick='verifica_turma(this,"+data['id']+")' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td></tr>";

                $('#tb_turmas').append(tr);

              } else{
                alert("Não é permitido criar uma turma com o mesmo nome e turno de outra já existente, favor verificar.");
                }

              }

            );

            $('#nome_turma').val("");
            $('#descricao').val("");

      }
    }

    verifica_turma = function(item,id){
      console.log(id);

      $.post(
        base_url+'index.php/ajax/verifica_turma',{
          id_turma : id
        },

        function(data){
          if (data == 1) {
            var resp = confirm("Existem alunos e (ou) professores vinculados a esta turma, deseja remover o vinculo e excluir a turma permanentemente?");
          } else{
            var resp = confirm("Tem certeza que deseja excluir esta turma permanentemente?");
          }

          if (resp == true) {
            exclui_turma(item,id);
          }

        }

      );

    }

    function exclui_turma(item,id){
      $.post(
        base_url+'index.php/ajax/exclui_turma',{
          id_turma : id
        },

        function(data){

          var tr = $(item).closest('tr');

          tr.fadeOut(400, function() {
            tr.remove();
          });

        }
      );
    }

    redireciona_turma = function(item){
      var id_array = item.id.split("/");
      var turma_id = id_array[1];

      window.location.href = base_url+'index.php/Front/edita_turma?id='+turma_id;
    }

  });

</script>
