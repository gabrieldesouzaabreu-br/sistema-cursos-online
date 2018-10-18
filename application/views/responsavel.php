<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">

      <div class="panel panel primary">

        <div class="panel-heading" style="text-align:center;font-size:25px">
          Responsáveis
          <br>
          <?php echo anchor('Front/incluir_responsavel', '<button type="button" class="btn btn-success" name="button"><i class="fa fa-plus"></i> Adicionar responsável</button>'); ?>
        </div>

        <div class="panel-body">

          <table class="table table-striped table-bordered table-hover" id="dataTables-example">

            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>

            <tbody>
              <?php foreach ($responsavel as $r) :?>

                <tr class="odd gradeX">
                  <td><?php echo $r['nome']; ?></td>
                  <td><?php echo $r['email']; ?></td>
                  <td><?php echo $r['telefone']; ?></td>
                  <?php echo form_open('Front/edita_responsavel') ?>
                  <td style="text-align:center"><button type="submit" name="id_usuario" class="btn btn-primary" value="<?php echo $r['id']; ?>"><i class="fas fa-edit fa-lg"></i></button></td>
                  <?php echo form_close(); ?>
                  <td><button type='button' onclick='exclui_responsavel(this,<?=$r['id']?>)' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td>
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

    exclui_responsavel = function(item,id){

      var teste = confirm("Deseja remover os vinculos (se existentes) entre este responsavel e seus dependentes, e excluí-lo permanentemente?");

      if (teste == true) {

        $.post(
          base_url+'index.php/ajax/exclui_responsavel',{
            id : id
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
