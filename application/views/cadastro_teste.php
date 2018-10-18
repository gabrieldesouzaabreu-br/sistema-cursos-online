<?php echo form_open('Login/cadastrar'); ?>

  <input type="text" placeholder="Login" name="login" autofocus required>
  <br><br><br>
  <input type="password" placeholder="Senha" name="senha" required >

  <button type="submit">cadastrar</button>

<?php echo form_close(); ?>
