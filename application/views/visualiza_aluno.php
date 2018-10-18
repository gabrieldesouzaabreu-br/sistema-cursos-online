<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="header">
          <h4 class="title">Informações do Aluno</h4>
      </div>

      <div class="content">

        <div class="row">

          <div class="col-md-4">
            <ul class="list-group">
              <li style="word-wrap: break-word;" class="list-group-item disabled">Informações Pessoais</li>
              <li style="word-wrap: break-word;" class="list-group-item">Nome: <?=$usuario['nome']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Data de Nascimento: <?php $data = nice_date($usuario['data_nascimento'],'d/m/Y'); echo $data; ?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Sexo: <?=$aluno['sexo']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Naturalidade: <?=$aluno['naturalidade']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Altura: <?=$aluno['altura']?> m</li>
              <li style="word-wrap: break-word;" class="list-group-item">Peso: <?=$aluno['peso']?> Kg</li>
              <li style="word-wrap: break-word;" class="list-group-item">Restrições:
                <?php
                  $res = explode("/",$aluno['restricoes']);
                  $teste = count($res);
                  if($teste>=2){
                    unset($res[0]);
                    $res = array_values($res);
                  }
                  $k = count($res);
                  for ($i=0; $i < $k; $i++) {
                    if(!(($i+1) < $k)){
                      echo $res[$i];
                    } else{
                      echo $res[$i].", ";
                    }
                  }
                ?>
              </li>

              <li style="word-wrap: break-word;" class="list-group-item" >Registro Médico (CRM): <span><?=$aluno['crm']?><span></li>
            </ul>
          </div>

          <div class="col-md-4">
            <ul class="list-group">
              <li style="word-wrap: break-word;" class="list-group-item disabled">Endereço e contato</li>
              <li style="word-wrap: break-word;" class="list-group-item">Telefone: <?=$usuario['telefone']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Telefone de emergência: <?=$aluno['telefone_emergencia']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Endereço: <?=$usuario['endereco']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Número: <?=$usuario['numero']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Complemento: <?=$usuario['complemento']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Bairro: <?=$usuario['bairro']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Cidade: <?=$usuario['cidade']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Estado: <?=$usuario['estado']?></li>
            </ul>
          </div>

          <div class="col-md-4">
            <ul class="list-group">
              <li style="word-wrap: break-word;" class="list-group-item disabled">Turma do Aluno</li>
              <li style="word-wrap: break-word;" class="list-group-item">Turma: <?=$turma_aluno['nome']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Descrição: <?=$turma_aluno['descricao']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Turno: <?=$turma_aluno['turno']?></li>
              <li style="word-wrap: break-word;" class="list-group-item">Número de alunos: <?=$turma_aluno['numero_alunos']?></li>
            </ul>
          </div>

        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading" style="text-align:center">Responsaveis Vinculados ao aluno</div>
            </div>
          </div>

          <?php foreach ($responsavel_aluno as $r): ?>
          <div class="col-md-4">
            <ul class="list-group">
                <li style="word-wrap: break-word;" class="list-group-item">Nome: <?=$r['nome']?></li>
                <li style="word-wrap: break-word;" class="list-group-item">Parentesco: <?=$r['parentesco']?></li>
                <li style="word-wrap: break-word;" class="list-group-item">Email: <?=$r['email']?></li>
                <li style="word-wrap: break-word;" class="list-group-item">Telefone: <?=$r['telefone']?></li>
                <li style="word-wrap: break-word;" class="list-group-item">Responsavel por retirada: <?php if($r['retirada'] == 1){ echo "Sim"; }else{echo "Não";}?></li>
                <li style="word-wrap: break-word;" class="list-group-item">Responsavel financeiro: <?php if($r['financeiro'] == 1){ echo "Sim"; }else{echo "Não";}?></li>
            </ul>
          </div>
          <?php endforeach; ?>

        </div>

      </div>

      </div>
    </div>
  </div>
</div>
