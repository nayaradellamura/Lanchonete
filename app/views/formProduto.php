<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title><?= isset($produto) ? "Editar Produto" : "Novo Produto" ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="../public/img/icon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS externo -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

<div class="container py-5">
    <div class="card mx-auto shadow" style="max-width: 600px;">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4">
                <?= isset($produto) ? "✏️ Editar Produto" : "➕ Novo Produto" ?>
            </h2>

            <form method="post" action="index.php?controller=Produto&action=<?= isset($produto) ? "update" : "store" ?>" enctype="multipart/form-data">
                <?php if (isset($produto)): ?>
                    <input type="hidden" name="id" value="<?= htmlspecialchars($produto->id) ?>">
                <?php endif; ?>

                <div class="mb-3">
                    <input type="text" name="nome" placeholder="Nome" class="form-control" required
                           value="<?= isset($produto) ? htmlspecialchars($produto->nome) : "" ?>">
                </div>
                <div class="mb-3">
                    <textarea name="descricao" placeholder="Descrição" class="form-control" rows="3"><?= isset($produto) ? htmlspecialchars($produto->descricao) : "" ?></textarea>
                </div>
                <div class="mb-3">
                    <input type="number" step="0.01" name="preco" placeholder="Preço (R$)" class="form-control" required
                           value="<?= isset($produto) ? htmlspecialchars($produto->preco) : "" ?>">
                </div>
                <div class="mb-3">
                    <input type="number" name="quantidade" placeholder="Quantidade" class="form-control" required
                           value="<?= isset($produto) ? htmlspecialchars($produto->quantidade) : "" ?>">
                </div>
                <div class="mb-3">
                    <input type="text" name="categoria" placeholder="Categoria" class="form-control" required
                           value="<?= isset($produto) ? htmlspecialchars($produto->categoria) : "" ?>">
                </div>


                <div class="d-grid">
                    <button class="btn btn-success"><?= isset($produto) ? "💾 Atualizar Produto" : "💾 Salvar Produto" ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
