<!DOCTYPE html>
<html lang="pt-pt">
<head>
<meta charset="UTF-8">
<title> Atualiza Livros </title>
<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.html">biblioteca</a> <button aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarSupportedContent" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
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
            </li>

				</ul>
			</div>
		</div>
	</nav>

    <fieldset>
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
		$codigo = $_POST["codlivro"];
		$isbn = $_POST["isbn"];
		$na = $_POST["na"];
		$nl = $_POST["nl"];
		$ctg = $_POST["ctg"];
		$edit = $_POST["edit"];
		$ae = $_POST ["ae"];
	
	 //verificação se algum campo está vazio
	 /*if (!$id || !$na || !$nl || !$isbn || !$ctg || !$edit|| !$ae){
			echo "Campos vazios. Volte atrás e preencha-os!";
			exit; //não executa mais nenhum código
		}*/
	?>

<div>
	<?php
		echo "<h3> Livro Atualizado: </h3>";
		echo "Dados atualizados: <br>";
		echo " Código do livro: $codigo <br>";
		echo " ISBN: $isbn <br>";
        echo "Nome do Livro: $nl <br>";
        echo "Nome do Autor: $na <br>";
        echo "A categoria: $ctg <br>";
        echo "Editora: $edit <br>";
        echo "Ano de edição: $ae <br>";
	?>
</div>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bepedrov";
    
    // Criação da conexão à base de dados
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Verifica a ligação à base de dados
    if (!$conn) {
      die("Falha na conexão: " . mysqli_connect_error());
    }
    
    //Intrução SQL para atualizar um regoisto na base de dados
	$querySQL ="UPDATE livros SET isbn='$isbn', nl='$nl', na='$na', ctg='$ctg', edit='$edit', ae='$ae'WHERE	codlivro=$codigo";

	if (mysqli_query($conn, $querySQL)) {
        echo "<p>Registo atualizado com sucesso</p>";
    } else {
        echo "<p>Erro ao atualizar o registo: " . mysqli_error($conn)."</p>";
    }
	
	//Fechar a conexão à base de dados
	mysqli_close($conn);
	?>
	<a href="index.html"><button class="button">Voltar ao Ínicio</button></a>
	<a href="listar.php"> <button class="button">Listar Registos</button></a>
	</div>
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
      .form-style-5 .number {
        background: #1abc9c;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255,255,255,0.2);
        border-radius: 15px 15px 15px 0px;
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
</body>
</html>