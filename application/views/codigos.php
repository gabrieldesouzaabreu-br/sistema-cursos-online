<div class="col-m4-4">
  <div class="form-group">
    <p>Responsáveis vinculados</p>
    <select class="selectpicker" data-live-search="true" name="responsavel[]" multiple>
      <?php foreach ($responsaveis as $r) : ?>
        <option value="<?=$r['id']?>"<?php foreach ($aluno_responsavel as $a){if($r['id'] == $a['responsavel_id']){echo "selected";}}?>><?=$r['nome']?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
