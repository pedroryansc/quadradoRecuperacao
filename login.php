<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Quabulário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="shortcut icon" href="fav/favicon.ico">
</head>
<body>
    <br><br><br><br><br>
    <center>
        <h2>Login</h2>
    </center>
    <br>
    <form action="ctrl/ctrl_usuario.php" method="post">
        <div class="form-floating col-3 mx-auto">
            <input required="true" type="text" class="form-control" name="login" placeholder="login"><br>
            <label for="login">Login</label>
        </div>
        <div class="form-floating col-3 mx-auto">
            <input required="true" type="password" class="form-control" name="senha" placeholder="senha"><br>
            <label for="senha">Senha</label>
        </div>
        <br>
        <div class="d-grid gap-2 d-md-flex col-3 mx-auto justify-content-md-end">
            <a class="btn btn-danger btn-lg" href="menu.html">Voltar à página inicial</a>
            <button type="submit" class="btn btn-success btn-lg" name="acao" value="login">Entrar</button>
        </div>
    </form>
    <footer class="footer fixed-bottom mt-auto py-3 bg-success">
        <center>  
            <div class="container">
                <span class="text-light"><br> ©2022 3º INFO</span>
            </div>
        </center>
    </footer>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>