<!DOCTYPE html>
<html lang="pt-pt">
<head>
<meta charset="UTF-8">
<title> Atualiza Livro </title>
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
    <div class="form-style-5">
    <h2> Atualizar Registo do livro </h2>

	<?php
	$id = $_GET['idlivro'];
	echo "<h2> O livro a atualizar é o $id. </h2>";
	?>
	<hr>
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

	$querySQL = "SELECT * FROM livros WHERE codlivro=$id";

	$resultado = mysqli_query($conn,$querySQL);
	
    $registo = mysqli_fetch_assoc($resultado);
	?>
	<form method="POST" action="editar.php">
	<table border='0'>
		<tr>
			<td>Código</td>
			<td><input readonly type="text" name="codlivro" value='<?php echo $id; ?>'></td>
		</tr>
		<tr>
			<td>ISBN</td>
			<td><input type="text" name="isbn" value='<?php echo $registo['isbn']; ?>'></td>
		</tr>
		<tr>
			<td>Nome do Livro</td>
			<td><input type="text" name="nl" value='<?php echo $registo['nl']; ?>'></td>
		</tr>
		<tr>
			<td>Nome do Autor</td>
			<td><input type="text" name="na" value='<?php echo $registo["na"]; ?>'></td>
		</tr>
			<td>Categoria</td>
			<td><input type="text" name="ctg" value='<?php echo $registo['ctg']; ?>'></td>
		</tr>
			<td>Editora</td>
			<td><input type="text" name="edit" value='<?php echo $registo['edit']; ?>'></td>
		</tr>
			<td>Ano de edição</td>
			<td><input type="text" name="ae" value='<?php echo $registo['ae']; ?>'></td>
		</tr>
	</table>
	<input class="button" type="submit" value="Atualiza">
</form>
<?php
    //Fechar ligação à base de dados
    mysqli_close($conn);
?>
</div>
<hr>
<style>
     .form-style-5{
        max-width: 800px;
        padding: 10px 20px;
        background: #f4f7f8;
        margin: 10px auto;
        padding: 20px;
        background: #f4f7f8;
        border-radius: 8px;
        font-family: Georgia, "Times New Roman", Times, serif;
      }
      .form-style-5 input[type="text"],
      .form-style-5 select {
        font-family: Georgia, "Times New Roman", Times, serif;
        background: rgba(255,255,255,.1);
        border: none;
        border-radius: 8px;
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
        margin-bottom: 20px;
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