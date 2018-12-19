<?php

/**********

Author: Haroldo da Costa .
Company: Orb Digital Branding.
Site: 
Location: Fortaleza-CE, Brasil.
Name: San Miguel - Landing Page
Last update: 2017/10/24 
Standards: PHP, HTML, CSS, Javascript
Components: jQuery, jQuery Validate, CSS Reset.
Software: Cadastro de novos clientes

**********/

//Grava dados no arquivo cadastro_landpage_soho.
/*$fp = fopen('cadastro_landpage_soho.csv', 'a+');
fputcsv($fp, $_POST);
fclose($fp);*/


// Verifica se a variável $_POST não é vazia...
// ou seja: houve um submit no formulário
$messages = array();
$recorded = false;
if (!empty($_POST))
{

	$messages["bloqueado"] = false;

	// Verifica se a variável $_POST['nome'] existe
	if ( isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["telefone"]) )
	{
		$nome  = $_POST["nome"];
		$email = $_POST["email"];
		$telefone = $_POST["telefone"];
		// Verifica se o usuário digitou o seu nome
        if ( empty($nome) )
        {
        	$messages["nome"] = '<label for="nome" class="error" style="display: block;">Nome obrigatório</label>';
        	$messages["bloqueado"] = true;
        }

	    // Verifica email
	    if ( empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL) )
	    {
	    	$messages["email"] = '<label for="email" class="error">Por favor, informe um endereço de email válido</label>';
	    	$messages["bloqueado"] = true;
	    }
	    if ( empty($telefone) )
        {
        	$messages["telefone"] = '<label for="telefone" class="error" style="display: block;">Telefone obrigatório</label>';
        	$messages["bloqueado"] = true;
        }


	    if ( !$messages["bloqueado"] = false){

			$fp = fopen('dados/cadastro_landpage_soho.csv', 'a+');
			unset($_POST["enviar"]);
			$recorded = fputcsv($fp, $_POST);
			fclose($fp);

	    }
	}

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt" lang="pt">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>San Miguel</title>
<meta name="description" content="Default Description" />
<meta name="keywords" content="san miguel" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,900' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Josefin+Slab:400,600' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
<link rel="stylesheet" type="text/css" href="css/style.css">
<body class="">
	<div id="bg">
		<!-- <img src="img/fundo-wr.jpg" alt="San Miguel"> -->
	</div>
	<!-- <div class="pattern" >
	</div> -->
	<div class="container_topo" >
			<div class="texto">
				<p>
				</p>
			</div>
		</div>
	<div class="container" >

		<div class="cadastro">
			 <?php if ( $recorded ):?>
				<div class="container_sucesso">
					<h1>Seu cadastro foi efetuado com Sucesso</h1>
					<hr />
					<p class="sucesso">Realizar novo cadastro.</p>
				</div>
			<?php endif; ?>

			 <div class="cadastro_inner" <?php if ( $recorded ) { echo 'style="display: none;"'; } ?> >
				<div class="wr"><a target="_blank" href="http://www.pscparticipacoes.com/"><img src="img/logo-wr.png" > </a></div>
				<p>Receba <strong>informações exclusivas</strong> e conheça<br/> este que pode ser o seu mais novo lar.</p>
				<hr />
				<form action="index.php" method="post" id="form-cadastro" >
					<span class="warning" >* Campos obrigatórios.</span>
					<div class="field" >
						<input type="text" name="nome" id="nome" value="<?php if( isset($messages['nome']) ) { echo $_POST['nome']; }?>" />
						<label for="nome" class="main" >Nome *</label>
						<?php if( isset($messages["nome"]) ) { echo $messages["nome"]; } ?>
					</div>

					<div class="field" >
						<input type="text" name="email" id="email" value="<?php if( isset($messages['nome']) ) { echo $_POST['nome']; }?>" />
						<label for="email" class="main" >Email *</label>
						<?php if( isset($messages["email"]) ) { echo $messages["email"]; } ?>
					</div>

					<div class="field field_m" >
						<input type="text" name="telefone" id="telefone" class="required" title="Telefone obrigatório." value="<?php if( isset($messages['nome']) ) { echo $_POST['nome']; }?>" />
						<label for="telefone" class="main" >Telefone *</label>
						<?php if( isset($messages["telefone"]) ) { echo $messages["telefone"]; } ?>
					</div>

					<div class="field" >
						<input type="submit" value="CADASTRE-SE" name="enviar" id="enviar" />
					</div>
					<p>Prometemos não utilizar suas informações<br/>de contato para enviar qualquer tipo de SPAM.</p>
					
				</form>
				<a style="text-decoration: none;color: #515151;display: block;text-align: center;"target="_blank" href="https://www.facebook.com/pages/category/Property-Management-Company/San-Miguel-Residence-Parquel%C3%A2ndia-778865278915112/">Facebook</a>
			</div>
		</div>
	</div>
	<div class="footer" >		
		
	</div>
<script type="text/javascript" src="js/jquery-1.10.2.min.js" ></script>
<script type="text/javascript" src="js/jquery.validate.js" ></script>
<script type="text/javascript" src="js/soho.js" ></script>
</body>