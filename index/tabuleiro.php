<!DOCTYPE html>
<?php
    require("../utils.php");

    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 0;
    $info = isset($_POST["info"]) ? $_POST["info"] : "";

    $vetor = listaTabuleiro(1, $id);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="../ctrl/ctrl_tabuleiro.php?id=<?php echo $id; ?>" method="post">
        Lado: <input type="text" name="lado" value="<?php if($acao == "editar") echo $vetor[0][1]; ?>"><br>
        <br>
        <button type="submit" name="acao" value="salvar">Criar</button>
    </form>
    <br><br>
    <form method="post">
        Pesquisar por: <br>
        <input type="radio" name="tipo" value="1" <?php if($tipo == 1) echo "checked"; ?>> ID<br>
        <input type="radio" name="tipo" value="2" <?php if($tipo == 2) echo "checked"; ?>> Lado<br>
        <br>
        <input type="search" name="info" placeholder="Pesquisa" value="<?php echo $info; ?>"><br>
        <br>
        <button type="submit">Pesquisar</button>
    </form>
    <br>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Lado</th>
        </tr>
        <?php
            $lista = listaTabuleiro($tipo, $info);
            foreach($lista as $linha){
        ?>
            <tr>
                <th><?php echo $linha["idtabuleiro"]; ?></th>
                <th><?php echo $linha["lado"]; ?></th>
                <td><a href="show.php?obj=tab&id=<?php echo $linha["idtabuleiro"]; ?>">Visualizar tabuleiro</a></td>
                <td><a href="tabuleiro.php?acao=editar&id=<?php echo $linha["idtabuleiro"]; ?>">Editar</a></td>
                <td><a href="javascript:excluirRegistro('../ctrl/ctrl_tabuleiro.php?acao=excluir&id=<?php echo $linha["idtabuleiro"]; ?>')">Excluir</a></td>
            </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro será excluído. Tem certeza?"))
            location.href = url;
    }
</script>