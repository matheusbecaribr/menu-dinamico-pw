<?php
    require '../php/autoload.php';
    if(!VerifyNivel($_SESSION['nivel'], NIVEL_ADM)){
        header('Location: ../');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
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
            margin-bottom: 20px;
            display: inline-block;
        }
        fieldset {
            border: 1px solid #ddd;
            padding: 20px;
            max-width: 400px;
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        legend {
            font-size: 1.2em;
            font-weight: bold;
            color: #4CAF50;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input, select {
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
        h3 {
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <a href="../home">Voltar</a>
    <fieldset>
        <legend>Cadastro de usuário</legend>
        <form action="../php/cadastroUsuario.php" method="post">
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
            <br><br>
            <label for="name">Nome</label>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="email">Email</label>
            <input type="email" name="email" id="email">
            <br><br>
            <label for="password">Senha</label>
            <input type="password" name="password" id="password">
            <br><br>
            <label for="nivel">Nível</label>
            <select name="nivel" id="nivel">
                <option value="3">Nível de usuário</option>
                <option value="1">Nível 1</option>
                <option value="2">Nível 2</option>
            </select>
            <br><br>
            <button type="submit" name="submit">Cadastrar</button>
        </form>        
    </fieldset>
    <fieldset>
        <?php
            $sql = "SELECT * FROM usuario";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                echo "<h3>Usuários cadastrados</h3>";
                foreach($stmt as $row){
                    echo "
                        Id:".$row['id']."<br>
                        Login:".$row['login']."<br>
                        Nome:".$row['name']."<br>
                        Email:".$row['email']."<br>
                        Nível:".$row['nivel']."<br><br>
                    ";
                }
            }else{
                echo "<h2>Não há clientes cadastrados</h2>";
            }
        ?>
    </fieldset>
</body>
</html>