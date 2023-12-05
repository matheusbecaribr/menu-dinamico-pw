<?php
    require '../php/autoload.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
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
        input, textarea, select {
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
        <legend>Cadastro de produtos</legend>
        <form action="../php/cadastroProduto.php" method="post">
            <label for="name">Nome</label><br>
            <input type="text" name="name" id="name">
            <br><br>
            <label for="description">Descrição</label><br>
            <textarea name="description" id="description" cols="30" rows="10"></textarea>
            <br><br>
            <label for="price">Preço</label><br>
            <input type="number" name="price" id="price">
            <br><br>
            <button type="submit" name="submit">Cadastrar</button>
        </form>        
    </fieldset>
    <fieldset>
        <?php
            $sql = "SELECT * FROM produto";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();

            if($stmt->rowCount() > 0){
                echo "<h3>Produtos cadastrados: </h3>";
                foreach($stmt as $row){
                    echo "
                        Id: ".$row['id']."<br>
                        Nome: ".$row['name']."<br>
                        Descrição: ".$row['description']."<br>
                       Preço: ".$row['price']."<br><br>
                    ";
                }
            }else{
                echo "<h2>Não há produtos cadastrados</h2>";
            }
        ?>
    </fieldset>
</body>
</html>