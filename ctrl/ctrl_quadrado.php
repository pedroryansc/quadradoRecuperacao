<?php
    require_once("class/Quadrado.class.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    if($acao == "excluir"){
        try{
            $quad = new Quadrado($id, 1, 1);
            $quad->excluir();
            header("location:../index/quadrado.php");
        } catch(Exception $e){
            echo "Erro ao excluir quadrado".
                "<br>".
                $e->getMessage();
        }
    }

    $acao = isset($_POST["acao"]) ? $_POST["acao"] : "";

    if($acao == "salvar"){
        $lado = isset($_POST["lado"]) ? $_POST["lado"] : 0;
        $cor = isset($_POST["cor"]) ? $_POST["cor"] : "";
        $quad = new Quadrado($id, $lado, $cor);
        if($id == 0){
            try{
                $quad->insere2();
            } catch(Exception $e){
                echo "Erro ao criar quadrado <br>".
                    "<br>".
                    $e->getMessage();
            }
        } else{
            try{
                $quad->editar();
            } catch(Exception $e){
                echo "Erro ao editar os dados do quadrado <br>".
                    "<br>".
                    $e->getMessage();
            }
        }
        header("location:index.php");
    }

    function listaQuadrado($tipo, $info){
        $quad = new Quadrado(1, 1, 1);
        $lista = $quad->listar($tipo, $info);
        return $lista;
    }
?>