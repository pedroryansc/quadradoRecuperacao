<?php
    require_once("../utils.php");

    $id = isset($_GET["id"]) ? $_GET["id"] : 0;
    $linha = listaTabuleiro(1, $id);

    $tab = new Tabuleiro($linha[0]["idtabuleiro"], $linha[0]["lado"]);
    echo $tab->desenha();
?>