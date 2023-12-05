<?php
    require '../php/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
        fieldset {
            margin-top: 20px;
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
        }
        legend {
            font-size: 1.2em;
            font-weight: bold;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <a href="../home">Voltar</a>
    <fieldset>
        <legend>Cadastro de cliente</legend>
        <form action="../php/cadastroCliente.php" method="post">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <br><br>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password">
            <br><br>
            <button type="submit" name="submit">Cadastrar</button>
        </form>        
    </fieldset>
    <fieldset>
        <?php
            $sql = "SELECT * FROM cliente";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                echo "<h3>Clientes cadastrados:</h3>";
                foreach($stmt as $row){
                    echo "
                        Id: ".$row['id']."<br>
                        Nome: ".$row['name']."<br>
                        Email: ".$row['email']."<br><br>
                        ";
                }
            }else{
                echo "<h2>Não há clientes cadastrados ainda</h2>";
            }
            
        ?>
    </fieldset>
</body>
</html>