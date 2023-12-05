<?php

require 'autoload.php';

if($_POST){
    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])){
        echo "Preencha todos os campos!<br><br><a href='../client_register'>Voltar</a>";
    }else{
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password']; 

        $sql = "SELECT * FROM usuario WHERE email = :email";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
    
        if($stmt->execute()){  
            if($stmt->rowCount() > 0){ 
                echo "O email já está em uso! Tente utilizar outro.<br><br><a href='../cadastro_cliente'>Voltar</a>";
            }else{
                $sql = "INSERT INTO cliente VALUES (:id, :name, :email, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindValue(':id', '');
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':password', $password);
               
                if($stmt->execute()){
                    echo "O cadastro foi realizado com sucesso!<br><br><a href='../cadastro_cliente'>Voltar</a>";
                }else{
                    echo "Erro ao realizar cadastro!<br><br><a href='../cadastro_cliente'>Voltar</a>";
                }
            }
        }else{
            echo "Erro ao verificar email!<br><br><a href='../cadastro_cliente'>Voltar</a>";
        }
    }
}