<?php include('config.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Projeto 01</title>
	<link rel="stylesheet" href="<?php echo INCLUDE_PATH; ?>estilo/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
	<link href="<?php echo INCLUDE_PATH; ?>estilo/style.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Descrição do Site" />
	<meta name="keywords" content="palavras-chave,chave,separadas,por,vírgula" />
	<link rel="icon" href="<?php echo INCLUDE_PATH; ?>favicon.ico" type="image/x-icon" />	
	<meta charset="utf-8" />
</head>
<body>
	<?php
		if(isset($_POST['acao']) && $_POST['identificador'] == 'form_home'){
			//Enviei o formulário. 
		if($_POST['email'] != ''){
			$email = $_POST['email'];
			if (filter_var($email, FILTER_VALIDATE_EMAIL)){
				//Tudo certo, é um email
				//Só enviar
				$mail = new Email('smtp.gmail.com','cadu.negociosdigitais@gmail.com','Cadux1001','Carlos');
				$mail->addAdress('cadu.negociosdigitais@gmail.com','Carlos');
				
				$corpo = "E-mail cadastrado na home do site:<hr>$email";
				$info = array('assunto'=>'Um novo e-mail cadastrado no site!','corpo'=>$corpo);
				//$info = ['assunto'=>'Um novo e-mail cadastrado no site!','corpo'=>$email];
				$mail->formatarEmail($info);
				if($mail->enviarEmail()){
					echo '<script>alert("Enviado com sucesso!")</script>';	
				}else{
					echo '<script>alert("Algo deu errado.")</script>';
				}
			}else{
				echo '<script>alert("Não é um email válido")</script>';
			}
		}else{
				echo '<script>alert("Campos vazios não são permitidos!")</script>';
			}
		}else if(isset($_POST['acao']) && $_POST['identificador'] == 'form_contato'){
			/*
			$nome = $_POST['nome'];
			$email = $_POST['email'];
			$mensagem = $_POST['mensagem'];
			$telefone = $_POST['telefone'];*/	
			$assunto = 'Nova mensagem do site!';
			$corpo = '';
			foreach ($_POST as $key => $value) {
				$corpo.=ucfirst($key).": ".$value;
				$corpo.="<hr>";
			}
			$info = array('assunto'=>$assunto,'corpo'=>$corpo);
			$mail = new Email('smtp.gmail.com','cadu.negociosdigitais@gmail.com','SENHA','Carlos');
			$mail->addAdress('cadu.negociosdigitais@gmail.com','Carlos');
			$mail->formatarEmail($info);
			if($mail->enviarEmail()){
				echo '<script>alert("Enviado com sucesso!")</script>';	
			}else{
				echo '<script>alert("Algo deu errado.")</script>';
				}
			} 
	?>
<base base="<?php echo INCLUDE_PATH; ?>" />
	<?php
		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		switch ($url) {
			case 'Depoimentos':
				echo '<target target="Depoimentos" />';
				break;
			
			case 'Servicos':
				echo '<target target="Servicos" />';
				break;
		}
	?>

	<?php new Email(); ?>

	<header>
		<div class="center">
			<div class="logo left"><a href="/">Logomarca</a></div><!--logo-->
			<nav class="desktop right">
			<ul>
					<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>Depoimentos">Depoimentos</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>Servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>Contato">Contato</a></li>
			</ul>
			</nav><!--desktop-->
			<nav class="mobile right">
			<div class="botao-menu-mobile">
			<i class="fa fa-bars" aria-hidden="true"></i>
			<!-- <img src="images/menu.png"> -->
		</div>		
			<ul>
				<li><a href="<?php echo INCLUDE_PATH; ?>">Home</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>Depoimentos">Depoimentos</a></li>
				<li><a href="<?php echo INCLUDE_PATH; ?>Servicos">Serviços</a></li>
					<li><a href="<?php echo INCLUDE_PATH; ?>Contato">Contato</a></li> 
			</ul>
		</nav><!--mobile-->
		<div class="clear"></div><!--clear-->
		</div><!--center-->
	</header>

<?php

	if(file_exists('pages/'.$url.'.php')){
		include('pages/'.$url.'.php');
	}else{
		//Podemos fazer o que quiser pois a pagina não existe.
		if($url != 'Depoimentos' && $url != 'Servicos'){
		$pagina404 = true;
		include('pages/404.php');
		}else{
			include('pages/home.php');
		}
	}

?>
				

	<footer <?php if(isset($pagina404) && $pagina404 == true) echo 'class="fixed"'; ?>>
		<div class="center"> 
		<p>Cadu 2020 © Todos os Direitos Reservados.</p>
		</div><!--center-->
	</footer>

	<script src="<?php echo INCLUDE_PATH; ?>js/jquery.js"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/script.js"></script>
	<?php 
		if($url == 'home' || $url == ''){
	?>
	<script src="<?php echo INCLUDE_PATH; ?>js/slider.js"></script>
	<?php } ?>
	<?php
		if($url == 'contato'){
	?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBnv7y3NuVB3H7-6XXXbtFUYOsvWql_d-8"></script>
	<script src="<?php echo INCLUDE_PATH; ?>js/map.js"></script>
	<?php } ?>
</body>
</html> 