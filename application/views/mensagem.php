<div class="col-md-12" style="padding: 0;">

    <div class="col-md-4 conversas" >

      <div class="titulo" >
        <p class="titulo_letra" >Conversas</p>
      </div>

      <div class="divisoria" >

        <ul class="lista" >
          <?php foreach ($mensagem_origem as $m): ?>
            <li class="lista_letra" id="origem_<?=$m['escravo']?>_<?=$m['tipo']?>"  onclick="consulta_mensagem_usuario(this)">
              <?=$m['nome_escravo']?>

              <div id="icone<?php echo $m['escravo'];?><?php echo $m['tipo'];?>" style="display:none;">
                <i class="fas fa-info-circle" style="float:right;font-size:2em;color:red;margin-top: -7%;"></i>
              </div>

            </li>
          <?php endforeach; ?>
        </ul>

        <?php echo anchor('front/envia_mensagem','Nova Mensagem', 'class="btn btn-success botao_mensagem"'); ?>

      </div>

    </div>

    <div class="col-md-8 mensagens" >

      <div class="titulo" >
        <p class="titulo_letra">Mensagens</p>
      </div>
      <div id="fundo_mensagem" class="fundo_mensagens" >

        <!-- <div class="row row_mensagem">
          <div id="md" class="md">
            <span class="nome_md">Vitor Wolff Bordignon</span>
            <p class="letra_mensagem" >Lorem ipsum eros ultrices commodo semper neque nec, imperdiet non vehicula etiam mattis conubia varius</p>
            <span class="data">24/24/2424 24:24:24</span>
          </div>
        </div> 

         <div class="row row_mensagem">
          <div id="mr" class="mr">
            <span class="nome_mr">Victor de Souza Abreu</span>
            <p class="letra_mensagem">Lorem ipsum eros ultrices commodo semper neque nec, imperdiet non vehicula etiam mattis conubia varius</p>
            <span class="data">24/24/2424 24:24:24</span>
          </div>
        </div> -->

      </div>

      <div class="div_input" >
        <input class="form-control input_mensagem" type="text" id="mensagem" value="">
        <button type="button" class="btn btn-success botao" name="button" style="" onclick="envia_mensagem()"><i class="fas fa-arrow-right"></i></button>
      </div>

    </div>

</div>

<script>

window.setInterval('verifica_mensagem()', 2000);

var base_url = '<?=base_url()?>';

  $(function(){

    consulta_mensagem_usuario = function(item){

      console.log(item);

      $("ul li").removeClass("ativo");

      $(item).addClass("ativo");

      var array = item.id.split("_");
      var id_escravo = array[1];
      var tipo = array[2];

      var icone = "#icone";
      var icone = icone.concat(id_escravo,tipo);
      console.log(icone);
      $(icone).hide("slow");

      $.post(
        base_url+'index.php/mensagem/consulta_mensagem_usuario',{
          id_escravo : id_escravo,
          tipo : tipo
        },

        function(data){
          //console.log(data);

          $(".fundo_mensagens").html("");

          for (var i = 0; i < data.length; i++) {
            console.log(data[i]);
            if (data[i]['controle'] == "E") {
              var controle = "mr";
              var nome_class = "nome_mr";
              var nome = '<?=$this->session->userdata("nome")?>'
            } else{
              var controle = "md";
              var nome_class = "nome_md";
              var nome = data[i]['escravo_nome'];
            }

            $(".fundo_mensagens").append("<div class='row row_mensagem'><div id='"+controle+"' class='"+controle+"'><span class='"+nome_class+"'>"+nome+"</span><p class='letra_mensagem' >"+data[i]['mensagem']+"</p><span class='data'>"+data[i]['data']+"</span></div></div>");

          }

        }
      );

      var div = $('#fundo_mensagem');
      div.prop("scrollTop", div.prop("scrollHeight"));

    }

    envia_mensagem = function(){
      var div = $('.ativo').attr('id');

      if (div) {
        var res = div.split("_");
        var mensagem = $('#mensagem').val();

        $.post(
          base_url+'index.php/mensagem/envia_mensagem_chat',{
            id_escravo : res[1],
            tipo : res[2],
            mensagem : mensagem
          },

          function(data){
            $("#"+div+"").trigger('click');
            $("#mensagem").val("");
          }
        );

      }else{
        alert("Para enviar uma mensagem é necessário selecionar algum destinatário.");
      }

      console.log(div);
    }

    teste = function(){
      console.log("Testeee");
    }

    verifica_mensagem = function(data){
      $.post(
        base_url+'index.php/mensagem/verifica_usuario_mensagem',{
        },

        function(data){
          if (data.length > 0) {
            //console.log(data);
            var icone = "#icone";

            for (var i = 0; i < data.length; i++) {

              var id = "#icone"+data[i]['escravo']+""+data[i]['tipo']+"";
              $(id).show("slow");
              //console.log(id);

              var teste = $('.ativo').attr('id');
              if (teste) {
                var res = teste.split("_");
                var id_ativo = "#icone"+res[1]+""+res[2]+"";
                //console.log(id_ativo);

                if (id_ativo == id) {
                  console.log("classe ativa selecionada");
                  $(id).hide();

                  $("#"+teste+"").trigger('click');
                }

              } else{
                console.log("sem classe ativa");
              }
            }

          } else{
            console.log("sem novas mensagens");
          }
        }
      );

    }

  });

</script>
