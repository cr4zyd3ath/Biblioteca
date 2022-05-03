<!DOCTYPE html>
<html lang="pt">
<head>
	<meta charset="UTF-8">
	<title>Projeto</title>
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.html">D.Pedro V</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Inicio</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="entrar.html">Registro</a>
					</li>
          				<li class="nav-item">
						<a class="nav-link" href="procurar.html">procurar</a>
					</li>
          				<li class="nav-item">
						<a class="nav-link" href="listar.php">listar</a>
						</li>

				</ul>
			</div>
		</div>
	</nav>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>


      <div class="form-style-5">
		  	<?php
		//recebe os dados do form e guarda-os em variáveis
		$codigo = $_POST["codlivro"];
		$isbn = $_POST["isbn"];
		$na = $_POST["na"];
		$nl = $_POST["nl"];
		$ctg = $_POST["ctg"];
		$edit = $_POST["edit"];
		$ae = $_POST ["ae"];
		//verificação se algum campo está vazio
		/*if (!$codigo || !$na || !$nl || !$isbn || !$ctg || !$edit || !$ae){
			echo "Campos vazios. Volte atrás e preencha-os!";
			exit; //não executa mais nenhum código
		}*/
	?>

<div class="form-style-5">
	<?php
		echo "<h3> Livro Registado: </h3>";
		echo "Dados recebidos: <br>";
		echo " Código do livro: $codigo <br>";
		echo " ISBN: $isbn <br>";
        echo "Nome do Livro: $nl <br>";
        echo "Nome do Autor: $na <br>";
        echo "A categoria: $ctg <br>";
        echo "Editora: $edit <br>";
        echo "Ano de edição: $ae <br>";
	?>

	
	<?php
	$servidor = "localhost";
    $username = "root";
    $password = "";
    $db = "bepedrov"; 
    

    $conn = mysqli_connect($servidor, $username, $password, $db);
    

    if (!$conn) {
      die("Falha na conexão: " . mysqli_connect_error());
    }


    $querySQL = "INSERT INTO livros VALUES('$codigo', '$isbn', '$na', '$nl', '$ctg', '$edit', '$ae')";
	

	$resultado = mysqli_query($conn, $querySQL);
	
	if ($resultado) {
		echo "<h2> Dados inseridos corretamente! </h2>";
	}else{
		echo "<h2>Upps! Ocorreu um ERRO!!! </h2>";
	}
	mysqli_close($conn);
	?>
<hr>
<a href="entrar.html" class="button">Voltar a Ínicio</button></a>
<a href="listar.php" class="button">Listar Registos</button></a>
<style>
      .form-style-5{
        max-width: 900px;
        padding: 10px 20px;
        background: #f4f7f8;
        margin: 10px auto;
        padding: 20px;
        background: #f4f7f8;
        border-radius: 8px;
        font-family: Georgia, "Times New Roman", Times, serif;
      }
      .button {
	      position: relative;
        display: block;
        padding: 10px 29px 8px 29px;
        color: #FFF;
        margin: 0 auto;
        background: #1abc9c;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        width: 100%;
        border: 1px solid #16a085;
        border-width: 1px 1px 3px;
        margin-bottom: 10px;
}
      .form-style-5 fieldset{
        border: none;
      }
      .form-style-5 legend {
        font-size: 1.4em;
        margin-bottom: 10px;
      }
      .form-style-5 label {
        display: block;
        margin-bottom: 8px;
      }
      .form-style-5 input[type="text"],
      .form-style-5 input[type="date"],
      .form-style-5 input[type="datetime"],
      .form-style-5 input[type="search"],
      .form-style-5 input[type="time"],
      .form-style-5 input[type="url"],
      .form-style-5 textarea,
      .form-style-5 select {
        font-family: Georgia, "Times New Roman", Times, serif;
        background: rgba(255,255,255,.1);
        border: none;
        border-radius: 4px;
        font-size: 15px;
        margin: 0;
        outline: 0;
        padding: 10px;
        width: 100%;
        box-sizing: border-box; 
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box; 
        background-color: #e8eeef;
        color:#8a97a0;
        -webkit-box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
        margin-bottom: 30px;
      }

      .form-style-5 input[type="text"]:focus,
      .form-style-5 input[type="date"]:focus,
      .form-style-5 input[type="datetime"]:focus,
      .form-style-5 input[type="email"]:focus,
      .form-style-5 input[type="number"]:focus,
      .form-style-5 input[type="search"]:focus,
      .form-style-5 textarea:focus,
      .form-style-5 select:focus{
        background: #d2d9dd;
      }
      .form-style-5 select{
        -webkit-appearance: menulist-button;
        height:35px;
      }
      body{
              background-size: cover;
              background-image: url(https://image.freepik.com/vetores-gratis/estante-de-livros-na-biblioteca-ilustracao-de-conhecimento_64235-95.jpg);
          }
      .form-style-5 input[type="submit"],
      .form-style-5 input[type="reset"],
      .form-style-5 input[type="button"]
      {
        position: relative;
        display: block;
        padding: 10px 29px 8px 29px;
        color: #FFF;
        margin: 0 auto;
        background: #1abc9c;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        width: 100%;
        border: 1px solid #16a085;
        border-width: 1px 1px 3px;
        margin-bottom: 10px;
      }
      .form-style-5 input[type="submit"]:hover,
      .form-style-5 input[type="button"]:hover
      {
        background: #109177;
      }
      legend{
        text-align: center;
      }
        </style>
</div>
</body>
</html>
