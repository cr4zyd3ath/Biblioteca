<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
	<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
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

    <legend><h2>Listar Livros</h2><legend>
    <?php
        $servidor = "localhost";
        $username = "root";
        $password = "";
        $db = "bepedrov"; 
        
        // Criação da conexão à base de dados
        $conn = mysqli_connect($servidor, $username, $password, $db);
        // Verifica a ligação à base de dados
        if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
        }

        //Instrução SQL para listar na base de dados
        $querySQL = "SELECT * FROM livros";
        
        //Retorna true (1) ou false (0)
	    $resultado = mysqli_query($conn, $querySQL);

        //Retorna o número de registos
        $numregistos = mysqli_num_rows($resultado);

        if($numregistos > 0)
        {
            echo "<p>Foram encontrado $numregistos registos</p>";
        }
        else{
            echo "<p>Não existem registos na base de dados</p>";
        }
    ?>

    <hr>
    <table border="1">
        <tr>
            <th>Código</th>
            <td>Nome do Autor</td>
            <td>Nome do Livro</td>
            <td>ISBN</td>
            <td>Categoria</td>
            <td>Editora</td>
            <td>Ano de edição</td>
            <th>Eliminar</th>
            <th>Editar</th>
        </tr>
    <?php
        while($linha = mysqli_fetch_assoc($resultado))
        {
            echo "<tr>";
            echo "<td>".$linha['codlivro']."</td>";
            echo '<td>'.$linha['na'].'</td>';
            echo '<td>'.$linha['nl'].'</td>';
            echo '<td>'.$linha['isbn'].'</td>';
            echo '<td>'.$linha['ctg'].'</td>';
            echo '<td>'.$linha['edit'].'</td>';
            echo '<td>'.$linha['ae'].'</td>';
            echo "<td><a href='eliminar.php?id=".$linha['codlivro']."'>Eliminar</a></td>";
            echo "<td><a href='atualizar.php?idlivro=".$linha['codlivro']."'>Editar</a></td>";
            echo "</tr>";
        }
        mysqli_close($conn);
    ?>
    </table>
    </div>
    <style>

table, td, th {  
  border: 0.8px solid #ddd;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  padding: 6px;
}
.form-style-5{
        max-width: 1200px;
        padding: 10px 20px;
        background: #f4f7f8;
        margin: 10px auto;
        padding: 20px;
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
      legend{
        text-align: center;
      }
</style>
</body>
</html>