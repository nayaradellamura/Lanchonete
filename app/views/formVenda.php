<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar Venda</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2 class="mb-4 text-primary">Registrar Venda</h2>

    <form action="index.php?controller=Produto&action=storeVenda" method="post">
        <div class="mb-3">
            <label for="produto_id" class="form-label">Produto</label>
            <select name="produto_id" id="produto_id" class="form-select" required>
                <option value="">Selecione o produto</option>
                <?php foreach ($produtos as $produto): ?>
                    <option value="<?= $produto->id ?>"><?= htmlspecialchars($produto->nome) ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="quantidade" class="form-label">Quantidade</label>
            <input type="number" min="1" name="quantidade" id="quantidade" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Registrar Venda</button>
        <a href="index.php?controller=Produto&action=index" class="btn btn-secondary">Voltar</a>
    </form>
</div>
</body>
</html>
