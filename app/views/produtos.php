<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produtos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Icon -->
    <link rel="icon" type="image/png" href="../public/img/icon.png">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS externo -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body class="bg-light">

<div class="container py-5">

    <!-- Cabeçalho -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">📦 Lista de Produtos</h2>
        <div>
        <a href="index.php?controller=Produto&action=venda" class="btn btn-warning me-2">
            🛒 Nova Venda
        </a>
        <a href="index.php?controller=Produto&action=create" class="btn btn-success me-2">
            ➕ Novo Produto
        </a>
        <a href="index.php?controller=Produto&action=grafico" class="btn btn-info text-white">
            📊 Ver Gráfico
        </a>
        </div>
    </div>

    <!-- Tabela -->
    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($produtos)): ?>
                        <?php foreach($produtos as $p): ?>
                        <tr>
                            <td><?= $p->id ?></td>
                            <td><?= htmlspecialchars($p->nome) ?></td>
                            <td><?= htmlspecialchars($p->categoria) ?></td>
                            <td>R$ <?= number_format($p->preco, 2, ',', '.') ?></td>
                            <td><?= $p->quantidade ?></td>
                            <td class="text-center">
                                <a href="index.php?controller=Produto&action=edit&id=<?= $p->id ?>" 
                                   class="btn btn-warning btn-sm me-1">
                                    ✏️ Editar
                                </a>
                                <a href="index.php?controller=Produto&action=delete&id=<?= $p->id ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Deseja realmente excluir este produto?')">
                                    🗑️ Excluir
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">Nenhum produto cadastrado.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

</body>
</html>
