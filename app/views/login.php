<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="../public/img/icon.png">
    
    <!-- Bootstrap -->
    <link 
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" 
      rel="stylesheet">
    <!-- CSS externo -->
    <link rel="stylesheet" href="../public/css/style.css">

</head>
<body class="login-page">

<div class="card p-4" style="width: 100%; max-width: 400px;">
    <h2 class="text-center mb-4">Login</h2>
    <form method="post" action="index.php?controller=Login&action=auth">
        <div class="mb-3">
            <input type="text" name="usuario" class="form-control" placeholder="Usuário" required>
        </div>
        <div class="mb-3">
            <input type="password" name="senha" class="form-control" placeholder="Senha" required>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Entrar</button>
        </div>
    </form>
</div>

</body>
</html>
