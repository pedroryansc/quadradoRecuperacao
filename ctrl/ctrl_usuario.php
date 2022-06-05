<?php
    require_once("../class/Usuario.class.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        try{
            $user = new Usuario($id, 1, 1, 1);
            $user->excluir();
            header("location:../index/usuario.php");
        } catch(Exception $e){
            echo "Erro ao excluir usuário <br>".
                "<br>".
                $e->getMessage();
        }
    }

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    $nome = isset($_POST["nome"]) ? $_POST["nome"] : "";
    $login = isset($_POST["login"]) ? $_POST["login"] : "";
    $senha = isset($_POST["senha"]) ? $_POST["senha"] : "";
    
    if($acao == "salvar"){
        $user = new Usuario($id, $nome, $login, $senha);
        if($id == 0){
            try{
                $user->insere();
            } catch(Exception $e){
                echo "Erro ao cadastrar usuário <br>".
                    "<br>".
                    $e->getMessage();
            }
        } else{
            try{
                $user->editar();
            } catch(Exception $e){
                echo "Erro ao editar os dados do usuário <br>".
                    "<br>".
                    $e->getMessage();
            }
        }
        header("location:../index/usuario.php");
    } else if($acao == "login"){
        $user = new Usuario(1, 1, 1, 1);
        if($user->efetuaLogin($login, $senha))
            header("location:../index/usuario.php");
        else
            header("location:../login.php");
    }
?>