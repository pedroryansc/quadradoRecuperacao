<?php
    require_once("class/Quadrado.class.php");
    require_once("class/Tabuleiro.class.php");

    function listaQuadrado($tipo, $info){
        $quad = new Quadrado(1, 1, 1, 1);
        $lista = $quad->listar($tipo, $info);
        return $lista;
    }

    function listaTabuleiro($tipo, $info){
        $tab = new Tabuleiro(1, 1);
        $lista = $tab->listar($tipo, $info);
        return $lista;
    }
?>