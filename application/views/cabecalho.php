<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" type="image/png" href="<?=base_url('assets/img/favicon.ico')?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Agendare</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

		<link href="<?php echo base_url('assets/css/light-bootstrap-dashboard.css?v=1.4.0')?>" rel="stylesheet"/>
		<link href="<?php echo base_url('assets/tabela/js/dataTables/dataTables.bootstrap.css')?>" rel="stylesheet" />  <!--link tabela-->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' /> <!--link tabela-->
		<link href="<?php echo base_url('assets/tabela/css/style.css')?>" rel="stylesheet" /> <!--link tabela-->
		<link href="<?php echo base_url('assets/tabela/css/bootstrap.css')?>" rel='stylesheet' type='text/css' /><!--link tabela-->

    <!-- Bootstrap core CSS     -->
		<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel='stylesheet' />
    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url('assets/css/animate.min.css')?>" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url('assets/css/demo.css')?>" rel="stylesheet" />

    <!--     Fonts and icons     -->

    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="<?=base_url('assets/css/pe-icon-7-stroke.css')?>" rel="stylesheet" />

		<!--  Links Bootstrap Select  -->

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

		<link href="<?php echo base_url('assets/css/mensagem.css')?>" rel="stylesheet" type='text/css'/>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="<?php echo base_url('assets/img/Educacao1.png')?>">

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
									<?php echo $this->session->userdata('nome_escola'); ?>
                </a>
            </div>

            <ul class="nav">
                <li <?php if($pagina == "Minhas turmas" || $pagina == "Turmas"){ echo "class='active'";}?> >
                    <?php
											if($this->session->userdata("tipo") == "professor"){
												echo anchor('front/turmas','<i class="fas fa-graduation-cap"></i><p>Minhas Turmas</p>');
											} else{
												echo anchor('front/turmas','<i class="fas fa-graduation-cap"></i><p>Turmas</p>');
											}
										?>
                </li>

                <li <?php if($pagina == "Professores" || $pagina == "Agenda"){ echo "class='active'";}?> >
									<?php if($this->session->userdata("tipo") == "professor"){
													echo anchor('front/user','<i class="fas fa-book"></i><p>Agenda</p>');
												} else{
													echo anchor('front/professores','<i class="fas fa-user"></i><p>Professores</p>');
												}
									 ?>
                </li>

                <li <?php if($pagina == "Alunos" || $pagina == "Alimentação"){ echo "class='active'";}?> >
									<?php if($this->session->userdata("tipo") == "professor"){
													echo anchor('Front/turmas','<i class="fas fa-utensils"></i><p>Alimentação</p>');
												} else{
													echo anchor('Front/alunos','<i class="fas fa-child"></i></i><p>Alunos</p>');
												}
									 ?>
                </li>

                <li <?php if($pagina == "Responsáveis"){ echo "class='active'";}?> >
									<?php if($this->session->userdata("tipo") == "professor"){
													//echo anchor('Front/turmas','<i class="fas fa-comments"></i><p>Notificações</p>');
												} else{
													echo anchor('Front/responsaveis','<i class="fas fa-users"></i><p>Responsáveis</p>');
												}
									 ?>
                </li>

                <li <?php if($pagina == "Diario do aluno"){ echo "class='active'";}?> >
									<?php if($this->session->userdata("tipo") == "professor"){
													// echo anchor('Front\icons','<i class="pe-7s-science"></i><p>Icons</p>');
												} else{
													echo anchor('Front/diario_aluno','<i class="fas fa-book"></i><p>Diario do Aluno</p>');
												}
									 ?>
                </li>

                <li <?php if($pagina == "Mensagens"){ echo "class='active'";}?> >
									<?php if($this->session->userdata("tipo") == "professor"){
													 echo anchor('Front/mensagens','<i class="fas fa-comments"></i><p>Mensagens</p>');
												} else{
													echo anchor('Front/mensagens','<i class="fas fa-comments"></i><p>Mensagens</p>');
												}
									 ?>

                </li>

								<li <?php if($pagina == "Configuração"){ echo "class='active'";}?> >
									<?php if($this->session->userdata("tipo") == "professor"){
													// echo anchor('Front\table','<i class="pe-7s-note2"></i><p>Notificações</p>');
												} else{
													echo anchor('Front/configuracao','<i class="fas fa-cogs"></i><p>Configuração</p>');
												}
									 ?>

								</li>

								<!-- <li class="active-pro">
                    <a href="#">
                        <i class="pe-7s-rocket"></i>
                        <p>Upgrade to PRO</p>
                    </a>
                </li> -->

            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?=$pagina?></a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">

                        <li>
													<span class="navbar-brand">
														<?php
															if($this->session->userdata("tipo") == "professor"){
																echo "Professor ";
															} else{
																echo "Administrador ";
															}
															echo $this->session->userdata("nome")
														?>
												</span>
                        </li>

                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
													<?php if($this->session->userdata("tipo") == "professor"){
																	echo anchor('front/editar_usuario_professor','<p>Editar Usuario</p>');
																} else{
																	echo anchor('front/editar_usuario_admin','<p>Editar Usuario</p>');
																}
														?>
                        </li>
                        <!-- <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
															Funções
															<b class="caret"></b>
														</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                              </ul>
                        </li> -->
                        <li>
													<?php echo anchor('/','<p>Deslogar</p>'); ?>
                        </li>
												<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
