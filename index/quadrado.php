<!DOCTYPE html>
<?php
    require("../utils.php");
    
    $acao = isset($_GET["acao"]) ? $_GET["acao"] : "";
    $id = isset($_GET["id"]) ? $_GET["id"] : 0;

    $tipo = isset($_POST["tipo"]) ? $_POST["tipo"] : 0;
    $info = isset($_POST["info"]) ? $_POST["info"] : "";

    $vetor = listaQuadrado(1, $id);
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadrado - Quabulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="fav/favicon.ico">
</head>
<body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="../principal.php">
                <img src="../img/IFCriodosul.png" alt="Instituto Federal Catarinense - Campus Rio do Sul" width="230" class="d-inline-block align-top">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <span><b>Quabulário | </a></span>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-success" aria-current="page" href="quadrado.php">Quadrado</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" aria-current="page" href="tabuleiro.php">Tabuleiro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-success" aria-current="page" href="usuario.php">Usuário</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a class="nav-link text-success" href="menu.html">Sair</a>
            </div>
        </div>
    </nav></b>
    <form action="../ctrl/ctrl_quadrado.php?id=<?php echo $id; ?>" method="post">
        Lado: <input type="text" name="lado" value="<?php if($acao == "editar") echo $vetor[0][1]; ?>"><br>
        <br>
        Cor: <input type="color" name="cor" value="<?php if($acao == "editar") echo $vetor[0][2]; ?>"><br>
        <br>
        Tabuleiro: <select name="tabuleiro">
            <?php
                $lista = listaTabuleiro(0, 0);
                foreach($lista as $linha){
            ?>
                <option value="<?php echo $linha["idtabuleiro"]; ?>" <?php if($acao == "editar" && $linha["idtabuleiro"] == $vetor[0][3]) echo "selected"; ?>>
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
        <input type="radio" name="tipo" value="4" <?php if($tipo == 4) echo "checked"; ?>> Tabuleiro<br>
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
            <th>Tabuleiro (ID)</th>
        </tr>
        <?php
            $lista = listaQuadrado($tipo, $info);
            foreach($lista as $linha){
        ?>
            <tr>
                <th><?php echo $linha["idquadrado"]; ?></th>
                <th><?php echo $linha["lado"]; ?></th>
                <th><?php echo $linha["cor"]; ?></th>
                <th><?php echo $linha["tabuleiro_idtabuleiro"]; ?></th>
                <td><a href="show.php?obj=quad&id=<?php echo $linha["idquadrado"]; ?>">Visualizar quadrado</a></td>
                <td><a href="quadrado.php?acao=editar&id=<?php echo $linha["idquadrado"]; ?>">Editar</a></td>
                <td><a href="javascript:excluirRegistro('../ctrl/ctrl_quadrado.php?acao=excluir&id=<?php echo $linha["idquadrado"]; ?>')">Excluir</a></td>
            </tr>
        <?php
            }
        ?>
    </table>
    <footer class="footer fixed-bottom mt-auto py-3 bg-success">
        <center>  
            <div class="container">
                <span class="text-light"><br>©2022 3º INFO</span>
            </div>
        </center>
    </footer>
</body>
</html>
<script>
    function excluirRegistro(url){
        if(confirm("Este registro será excluído. Tem certeza?"))
            location.href = url;
    }    
</script>