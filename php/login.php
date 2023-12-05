<?php

require 'autoload.php';

if($_POST){
    if(empty($_POST['login']) || empty($_POST['senha'])){
        echo "Preencha todos os campos!<br><br><a href='../'>Voltar</a>";
    }else{
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM usuario WHERE login = :login AND password = :senha";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':login', $login);
        $stmt->bindParam(':senha', $senha);
      
        if($stmt->execute()){  
            if($stmt->rowCount() > 0){ 
                $fields = $stmt->fetch(PDO::FETCH_ASSOC);

                $_SESSION['nome'] = $fields['nome'];
                $_SESSION['nivel'] = $fields['nivel'];                     
                $_SESSION['login'] = $login;           
                $_SESSION['login-effect'] = true;
                header('Location: ../home');
            }else{
                echo "Login e/ou senha inválidos! Tente novamente.<br><br><a href='../'>Voltar</a>";
            }
        }
    }
}