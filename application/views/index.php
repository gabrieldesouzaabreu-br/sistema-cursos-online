<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Agendare</title>
    <!-- Bootstrap core CSS -->
    <link href="<?=base_url('assets/login/css/bootstrap.css')?>" rel="stylesheet">
    <!--external css-->
    <script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Custom styles for this template -->
    <link href="<?=base_url('assets/login/css/style.css')?>" rel="stylesheet">
    <link href="<?=base_url('assets/login/css/style-responsive.css')?>" rel="stylesheet">

  </head>

  <body>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">

          <?php echo form_open('Login', array('class' => 'form-login')) ?>
		        <h2 class="form-login-heading">Agendare</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" placeholder="Login" name="login" autofocus required>
		            <br>
		            <input type="password" class="form-control" placeholder="Senha" name="senha" required >
		            <label class="checkbox">
		                <span class="pull-right">
		                    <!-- <a data-toggle="modal" href="#">Esqueceu sua senha?</a> -->
		                </span>
		            </label>

		            <button class="btn btn-theme btn-block" type="submit">LOGAR <i class="fas fa-sign-in-alt"></i></button>
		            <hr>

		            <div class="login-social-link centered">
                  <?php if($this->session->flashdata('danger')) :?>
                    <p style="text-align:center;font-size:20px;"><strong>Erro: </strong> <?php echo $this->session->flashdata('danger'); ?></p>
                  <?php endif; ?>
		            </div>
		            <div class="registration">
		                <!-- Don't have an account yet?<br/>
		                <a class="" href="#">
		                    Create an account
		                </a> -->
		            </div>

		        </div>


		      <?php echo form_close(); ?>

	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?=base_url('assets/login/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/login/js/bootstrap.min.js')?>"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?=base_url('assets/login/js/jquery.backstretch.min.js')?>"></script>
    <script>
        $.backstretch("<?=base_url('assets/login/img/escola.png')?>", {speed: 500});
    </script>


  </body>
</html>
