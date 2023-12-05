<?php

require 'autoload.php';

if($_POST){
    if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['price'])){
        echo "Preencha todos os campos!<br><br><a href='../cadastro_produto'>Voltar</a>";
    }else{
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price']; 

        $sql = "SELECT * FROM usuario WHERE name = :name";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':name', $name);
    
        if($stmt->execute()){  
            if($stmt->rowCount() > 0){ 
                echo "O produto já foi cadastrado!<br><br><a href='../cadastro_produto'>Voltar</a>";
            }else{
                $sql = "INSERT INTO produto VALUES (:id, :name, :description, :price)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':id', '');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);
               
                if($stmt->execute()){
                    echo "O cadastro foi realizado com sucesso!<br><br><a href='../cadastro_produto'>Voltar</a>";
                }else{
                    echo "Erro ao realizar cadastro!<br><br><a href='../cadastro_produto'>Voltar</a>";
                }
            }
        }else{
            echo "Erro ao cadastrar produto!<br><br><a href='../cadastro_produto'>Voltar</a>";
        }
    }
}