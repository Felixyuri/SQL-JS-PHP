<?php

define('DB_HOST'        , "user\SQLEXPRESS");
define('DB_USER'        , "yuri");
define('DB_PASSWORD'    , "");
define('DB_NAME'        , "LOJA");
define('DB_DRIVER'      , "sqlsrv");

require_once "connection.php";

try{

    $connection    = connection::getConnection();
    $query      = $connection->query("SELECT nome, email, cpf, investimento FROM Cliente");
    $cliente   = $query->fetchAll();

 }catch(Exception $e){

    echo $e->getMessage();
    exit;

 }
 ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="utf-8">
	<title>Cadastro</title>

	
</head>
<style type="text/css">
	.margem {
		margin-bottom: 20px;
	}
	label {
		font-weight: bold;
	}
</style>


<body>
  <form>
        <table border=1>
            <tr>
               <td>Nome</td>
               <td>Email</td>
               <td>Cpf</td>
               <td>Investimento</td>
            </tr>
            <?php
               foreach($cliente as $cliente) {
            ?>
            <tr>
                <td><?php echo $cliente['nome']; ?></td>
                <td> <?php echo $cliente['email']; ?></td>
                <td> <?php echo $cliente['cpf'] = md5($cliente['cpf']); ?></td>
                <td>R$ <?php echo $cliente['investimento']; ?></td>
            </tr>
            <?php
               }
            ?>
        </table>
    </form>
</body>




</html>