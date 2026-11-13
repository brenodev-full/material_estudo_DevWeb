<?php
require_once __DIR__ . '/includes/topo.php';
?>

<div class="card">
    <h2>Lançamento de Notas</h2>
    <p>Preencha os dados do aluno e as notas para calcular a média e verificar a situação final.</p>

    <form action="resultado.php" method="POST" id="form-boletim">
        <div class="form-group">
            <label for="aluno">Nome do Aluno:</label>
            <input type="text" id="aluno" name="aluno" placeholder="Ex: Maria Silva" required>
        </div>

        <div class="grid-notas">
            <div class="form-group">
                <label for="nota1">1ª Nota:</label>
                <input type="number" id="nota1" name="nota1" min="0" max="10" step="0.1" placeholder="0.0" required>
            </div>
            <div class="form-group">
                <label for="nota2">2ª Nota:</label>
                <input type="number" id="nota2" name="nota2" min="0" max="10" step="0.1" placeholder="0.0" required>
            </div>
            <div class="form-group">
                <label for="nota3">3ª Nota:</label>
                <input type="number" id="nota3" name="nota3" min="0" max="10" step="0.1" placeholder="0.0" required>
            </div>
            <div class="form-group">
                <label for="nota4">4ª Nota:</label>
                <input type="number" id="nota4" name="nota4" min="0" max="10" step="0.1" placeholder="0.0" required>
            </div>
        </div>

        <button type="submit" class="btn">Calcular Resultado</button>
    </form>
</div>

<?php
require_once __DIR__ . '/includes/rodape.php';
?>

