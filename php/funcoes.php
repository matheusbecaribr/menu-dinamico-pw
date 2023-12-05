<?php

// Verificando nível da conta
function VerifyNivel($nivel, $nivelMin){
    if($nivel == $nivelMin){
        return true;
    }
    return false;
}

// Verificando se o login foi efetuado
function VerifyLogin(){
    if(!isset($_SESSION['login-effect'])){
        header('Location: ../');
    }
}