<!DOCTYPE html>
<?php
    require("utils.php");
    
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 0;
    $info = isset($_POST["info"]) ? $_POST["info"] : "";

    //$lista = listaQuadrado($tipo, $info);
    //$vetor = listaQuadrado(1, $id);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ctrl/ctrl_quadrado.php" method="post">
        Lado: <input type="text" name="lado" value="<?php if($acao == "editar") echo $vetor[0][1]; ?>"><br>
        <br>
        Cor: <input type="color" name="cor" value="<?php if($acao == "editar") echo $vetor[0][2]; ?>"><br>
        <br>
        Tabuleiro: <select name="tabela">
            <?php
                //$lista = listaTabuleiro(0, 0);

                $tab = new Tabuleiro(1, 1);
                $lista = $tab->listar(0, 0);
                foreach($lista as $linha){
            ?>
                <option value="<?php echo $linha["idtabuleiro"]; ?>" <?php if($linha["idtabuleiro"] == $id) echo "selected"; ?>>
                    <?php echo "Tab. ".$linha["idtabuleiro"]." (Lado - ".$linha["lado"].")"; ?>
                </option>
            <?php
                }
            ?>
        </select><br>
        <br>
        <button type="submit" name="acao" value="salvar">Criar</button>
    </form>
    <br><br>
    <form method="post">
        Pesquisar por: <br>
        <input type="radio" name="tipo" value="1" <?php if($tipo == 1) echo "checked"; ?>> ID<br>
        <input type="radio" name="tipo" value="2" <?php if($tipo == 2) echo "checked"; ?>> Lado<br>
        <input type="radio" name="tipo" value="3" <?php if($tipo == 3) echo "checked"; ?>> Cor<br>
        <br>
        <input type="search" name="info" placeholder="Pesquisa" value="<?php echo $info; ?>"><br>
        <br>
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table border=1>
        <tr>
            <th>ID</th>
            <th>Lado</th>
            <th>Cor</th>
        </tr>
        <?php

        ?>
    </table>
</body>
</html>