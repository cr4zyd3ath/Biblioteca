<!DOCTYPE html>
<html lang="pt-pt">
<head>
<meta charset="UTF-8">
<title> Mostrar Registos </title>
<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/css.css" rel="stylesheet">
<link href="css/css.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.html">biblioteca</a>
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
        <br>
        <br>
    <div class="form-style-5">
	<h2> Resultados encontrados </h2>
	
	<?php
  $nomeproc=$_POST['na'];
	if (!$nomeproc) {
		echo "Volte atrás e escreva o nome do livro";
		exit;
	}
	echo "<p> Nome procurado: $nomeproc </p>";
	//Configuração da ligação ao servidor
	$liga=mysqli_connect('localhost','root');

	//verificação da ligação
	if (!$liga) {
		echo "<h2> ERROR!!! Falha na ligação ao Servidor! </h2>";
		exit;
	}

	//Ligação à base de dados BEPedrov
	mysqli_select_db($liga,'bepedrov');
  $procura="select * from livros where na like '%".$nomeproc."%'";
	$resultado=mysqli_query($liga,$procura);
	$nregistos=mysqli_num_rows($resultado);
	echo "<p>Foram encontrados $nregistos registos.</p>";
	?>
<hr>
<?php
	if($nregistos > 0)
	{
?>
<table border='1'>
	<tr>
			      <th>Código</th>
            <th>Nome do Autor</th>
            <th>Nome do Livro</th>
            <th>ISBN</th>
            <th>Categoria</th>
            <th>Editora</th>
            <th>Ano de edição</th>
	</tr>
<?php  
	for ($i=0; $i<$nregistos; $i++)
	{
		$registo=mysqli_fetch_assoc($resultado);
		echo '<tr>';
        echo '<td>'.$registo['codlivro'].'</td>';
        echo '<td>'.$registo ['na'].'</td>';
        echo '<td>'.$registo ['nl'].'</td>';
        echo '<td>'.$registo ['isbn'].'</td>';
        echo '<td>'.$registo ['ctg'].'</td>';
        echo '<td>'.$registo ['edit'].'</td>';
        echo '<td>'.$registo ['ae'].'</td>';
		echo '</tr>';
		//echo "</p>";
	}
?>
</table>
<?php 
	}
	else{
		echo "<p>Não existem registos na base de dados</p>";
	}
?>
</div>
<style>

table, td, th {  
  border: 1px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 15px;
}
.form-style-5{
        max-width: 1200px;
        padding: 10px 20px;
        background: #f4f7f8;
        margin: 10px auto;
        padding: 50px;
        background: #f4f7f8;
        border-radius: 8px;
        font-family: Georgia, "Times New Roman", Times, serif;
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
      h2, p{
        text-align: center;
      }

</style>
</body>
</html>

