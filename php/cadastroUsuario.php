<?php

require 'autoload.php';

if($_POST){
    if(empty($_POST['login']) || empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || $_POST['nivel'] == 3){
        echo "Preencha todos os campos!<br><br><a href='../user_register'>Voltar</a>";
    }else{
        $login = $_POST['login'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password']; 
        $nivel = $_POST['nivel'];

        $sql = "SELECT * FROM usuario WHERE login = :login";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $login);
      
        if($stmt->execute()){  
            if($stmt->rowCount() > 0){ 
                echo "O login já está em uso! Tente utilizar outro.<br><br><a href='../cadastro_usuario'>Voltar</a>";
            }else{
                $sql = "SELECT * FROM usuario WHERE email = :email";

                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':email', $email);
            
                if($stmt->execute()){  
                    if($stmt->rowCount() > 0){ 
                        echo "O email já está em uso! Tente utilizar outro.<br><br><a href='../user_register'>Voltar</a>";
                    }else{
                        $sql = "INSERT INTO usuario VALUES (:id, :login, :name, :email, :password, :nivel)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindValue(':id', '');
                        $stmt->bindParam(':login',$login);
                        $stmt->bindParam(':name', $name);
                        $stmt->bindParam(':email', $email);
                        $stmt->bindParam(':password', $password);
                        $stmt->bindParam(':nivel', $nivel);

                        if($stmt->execute()){
                            echo "O cadastro foi realizado com sucesso!<br><br><a href='../cadastro_usuario'>Voltar</a>";
                        }
                    }
                }else{
                    echo "Erro ao verificar email!<br><br><a href='../cadastro_usuario'>Voltar</a>";
                }
            }
        }else{
            echo "Erro ao verificar login!<br><br><a href='../cadastro_usuario'>Voltar</a>";
        }
    }
}