<?php
require_once __DIR__ . '/includes/funcoes.php';
require_once __DIR__ . '/includes/topo.php';

// Validação dos dados recebidos via POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit;
}

$aluno = htmlspecialchars(trim($_POST['aluno'] ?? 'Aluno Não Informado'), ENT_QUOTES, 'UTF-8');

$notas = [
    isset($_POST['nota1']) ? (float)$_POST['nota1'] : 0,
    isset($_POST['nota2']) ? (float)$_POST['nota2'] : 0,
    isset($_POST['nota3']) ? (float)$_POST['nota3'] : 0,
    isset($_POST['nota4']) ? (float)$_POST['nota4'] : 0
];

$media = calcularMedia($notas);
$situacao = determinarSituacao($media);
$corClasse = obterCorSituacao($situacao);
?>

<div class="card">
    <h2>Resultado do Boletim</h2>
    
    <div class="detalhes-aluno">
        <p><strong>Aluno:</strong> <?= $aluno ?></p>
    </div>

    <table class="tabela-resultado">
        <thead>
            <tr>
                <th>Avaliação</th>
                <th>Nota</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($notas as $index => $nota): ?>
                <tr>
                    <td>Nota <?= $index + 1 ?></td>
                    <td><?= formatarNota($nota) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <th>Média Final</th>
                <th><?= formatarNota($media) ?></th>
            </tr>
        </tfoot>
    </table>

    <div class="status-box <?= $corClasse ?>">
        <p>Situação: <strong><?= $situacao ?></strong></p>
    </div>

    <div style="margin-top: 20px;">
        <a href="index.php" class="btn btn-voltar">← Novo Cálculo</a>
    </div>
</div>

<?php
require_once __DIR__ . '/includes/rodape.php';
?>

