<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">

      <div class="panel panel primary">

        <div class="panel-heading" style="text-align:center;font-size:25px">
          Alunos
          <br>
          <?php echo anchor('Front/incluir_aluno', '<button type="button" class="btn btn-success" name="button"><i class="fa fa-plus"></i> Adicionar Aluno</button>'); ?>
        </div>

        <div class="panel-body">

          <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Turma</th>
                    <th>Turno</th>
                    <th>Visualizar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
              <?php foreach ($aluno as $a) :?>

                <tr class="odd gradeX">
                  <td><?php echo $a['nome']; ?></td>
                  <td><?php echo $a['turma']; ?></td>
                  <td><?php echo $a['turno']; ?></td>

                  <?php echo form_open('Front/visualiza_aluno') ?>
                  <td style="text-align:center"><button type="submit" name="aluno_ids" class="btn btn-primary" value="<?php echo $a['aluno_usuario_id']."/".$a['aluno_id']; ?>"><i class="fas fa-eye fa-lg"></i></button></td>
                  <?php echo form_close(); ?>

                  <?php echo form_open('Front/edita_aluno') ?>
                  <td style="text-align:center"><button type="submit" name="aluno_usuario_id" class="btn btn-primary" value="<?php echo $a['aluno_usuario_id']."/".$a['aluno_id']; ?>"><i class="fas fa-edit fa-lg"></i></button></td>
                  <?php echo form_close(); ?>
                  <td><button type='button' onclick='exclui_aluno(this,<?=$a['aluno_id']?>)' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td>
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

    exclui_aluno = function(item,id){

      var teste = confirm("Deseja remover os vinculos entre este aluno seus responsaveis e turma, e excluí-lo permanentemente?");

      if (teste == true) {

        $.post(
          base_url+'index.php/ajax/exclui_aluno',{
            id_aluno : id
          },

          function(data){
            var tr = $(item).closest('tr');

            tr.fadeOut(400, function() {
              tr.remove();
            });
          }

        );
      }

    }

  });

</script>
