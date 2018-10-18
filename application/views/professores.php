<div class="row">
  <div class="col-md-12">
    <div class="table-responsive">

      <div class="panel panel primary">

        <div class="panel-heading" style="text-align:center;font-size:25px">
          Professores
          <br>
          <?php echo anchor('Front/incluir_professor', '<button type="button" class="btn btn-success" name="button"><i class="fa fa-plus"></i> Adicionar Professor</button>'); ?>
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
              <?php foreach ($professor as $p) :?>

                <tr class="odd gradeX">
                  <td><?php echo $p['nome']; ?></td>
                  <td><?php echo $p['email']; ?></td>
                  <td><?php echo $p['telefone']; ?></td>
                  <?php echo form_open('Front/editar_professor') ?>
                  <td style="text-align:center"><button type="submit" name="id_prof" class="btn btn-primary" value="<?php echo $p['id']; ?>"><i class="fas fa-edit fa-lg"></i></button></td>
                  <?php echo form_close(); ?>
                  <td><button type='button' onclick='verifica_professor(this,<?=$p['id']?>)' class='btn btn-danger' name='button'><i class='far fa-times-circle fa-lg'></i></button></td>
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

    verifica_professor = function(item,id){
      console.log(item);
      $.post(
        base_url+'index.php/ajax/verifica_professor',{
          id_professor : id
        },

        function(data){

          if(data == 1){
            var teste = confirm("Este(a) professor(a) está vinculado(a) a uma ou mais turmas, deseja remover o vinculo e excluir o(a) professor(a) permanentemente?");
          } else{
            var teste = confirm("Deseja remover o(a) Professor(a) permanentemente?");
          }

          if (teste == true) {
            remove_professor(item,id);
          }

        }

      );

    }

    remove_professor = function(item,id){
      $.post(
        base_url+'index.php/ajax/exclui_professor',{
          id_professor : id
        },

        function(data){
          var tr = $(item).closest('tr');

          tr.fadeOut(400, function() {
            tr.remove();
          });
        }

      );
    }

  });

</script>
