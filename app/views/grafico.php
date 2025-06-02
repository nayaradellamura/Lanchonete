<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Vendas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Charts -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS externo -->
    <link rel="stylesheet" href="../public/css/style.css">
</head>

<body>

<div class="container py-5">
    <div class="card shadow mx-auto" style="max-width: 900px;">
        <div class="card-body">
            <h2 class="text-center text-primary mb-4">📊 Gráfico de Vendas por Produto</h2>
            <div id="grafico" style="width:100%; height:500px;"></div>

            <div class="text-center mt-4">
                <a href="index.php?controller=Produto&action=index" class="btn btn-secondary">
                   Voltar
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Produto', 'Quantidade Vendida'],
            <?php foreach ($dados as $d): ?>
            ['<?= $d['nome'] ?>', <?= $d['total'] ?>],
            <?php endforeach; ?>
        ]);

        var options = {
            title: 'Vendas por Produto',
            titleTextStyle: {color: '#007bff', fontSize: 18, bold: true},
            legend: {position: 'right', textStyle: {color: '#555'}},
            backgroundColor: 'transparent',
            pieHole: 0.4,
            chartArea: {width: '80%', height: '80%'}
        };

        var chart = new google.visualization.PieChart(document.getElementById('grafico'));
        chart.draw(data, options);
    }
</script>

</body>
</html>
