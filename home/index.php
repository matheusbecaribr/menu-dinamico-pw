<?php
    require '../php/autoload.php';

    VerifyLogin();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
        }
        aside {
            width: 200px;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h2 {
            color: #4CAF50;
        }
        a {
            text-decoration: none;
            color: #333;
            display: block;
            margin-bottom: 10px;
        }
        a:hover {
            color: #4CAF50;
        }
        main {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <aside> <!-- Menu lateral obrigatório da atividade -->
        <h2>Menu</h2>
        <a href="../trocar_senha/">Alterar senha</a> 
        <br><br>
        <a href="../cadastro_usuario/">Cadastro de usuários</a>
        <?php 
            if(VerifyNivel($_SESSION['nivel'], NIVEL_ADM)){
                echo '<br><br><a href="../cadastro_cliente/">Cadastro de clientes</a>';
            }
        ?>
        <br><br>
        <a href="../cadastro_produto/">Cadastro de produtos</a>
        <br><br>
        <a href="../sair/">Sair</a>
    </aside>
    <main> <!-- Resto do conteúdo do site -->
            <h1>Conteúdo site</h1>
    </main>
</body>
</html>