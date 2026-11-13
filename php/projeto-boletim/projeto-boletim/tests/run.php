<?php
/**
 * ============================================================
 * 🧪 Testes Automatizados — Sistema de Boletim Escolar
 * ============================================================
 *
 * Script de testes simples que valida todas as funções do arquivo
 * funcoes.php sem necessidade de frameworks externos.
 *
 * Para executar:
 *   php tests/run.php
 *
 * O script testa:
 *   - calcularMedia() com diversos cenários
 *   - determinarSituacao() com valores limítrofes
 *   - validarNota() com valores válidos e inválidos
 *   - formatarNota() com diferentes formatos
 *   - obterCorSituacao() com cada situação possível
 */

// ============================================================
// Carrega o arquivo de funções a ser testado
// ============================================================

// __DIR__ retorna o diretório do arquivo atual (tests/)
// Subimos um nível (..) para acessar includes/funcoes.php
require_once __DIR__ . '/../includes/funcoes.php';

// ============================================================
// Variáveis de controle dos testes
// ============================================================

$totalTestes = 0;     // Contador total de testes executados
$testesAprovados = 0; // Contador de testes que passaram
$testesFalhos = 0;    // Contador de testes que falharam
$errosDetalhes = [];  // Array para armazenar detalhes dos erros

// ============================================================
// Função auxiliar de asserção
// ============================================================

/**
 * Verifica se o valor obtido é igual ao valor esperado.
 * Registra o resultado (passou/falhou) nos contadores globais.
 *
 * @param string $descricao Descrição do teste
 * @param mixed  $esperado  Valor esperado
 * @param mixed  $obtido    Valor obtido pela função testada
 */
function assertIgual(string $descricao, $esperado, $obtido): void
{
    // Usa 'global' para acessar as variáveis de controle
    global $totalTestes, $testesAprovados, $testesFalhos, $errosDetalhes;

    $totalTestes++;

    // Comparação com tolerância para floats (evita problemas de precisão)
    if (is_float($esperado) && is_float($obtido)) {
        $passou = abs($esperado - $obtido) < 0.001;
    } else {
        $passou = $esperado === $obtido;
    }

    if ($passou) {
        $testesAprovados++;
        echo "  ✅ PASSOU: $descricao" . PHP_EOL;
    } else {
        $testesFalhos++;
        $detalhe = "  ❌ FALHOU: $descricao" . PHP_EOL;
        $detalhe .= "     Esperado: " . var_export($esperado, true) . PHP_EOL;
        $detalhe .= "     Obtido:   " . var_export($obtido, true) . PHP_EOL;
        echo $detalhe;
        $errosDetalhes[] = $descricao;
    }
}

/**
 * Verifica se um valor booleano é verdadeiro (true).
 *
 * @param string $descricao Descrição do teste
 * @param bool   $valor     Valor a ser verificado
 */
function assertVerdadeiro(string $descricao, bool $valor): void
{
    assertIgual($descricao, true, $valor);
}

/**
 * Verifica se um valor booleano é falso (false).
 *
 * @param string $descricao Descrição do teste
 * @param bool   $valor     Valor a ser verificado
 */
function assertFalso(string $descricao, bool $valor): void
{
    assertIgual($descricao, false, $valor);
}

// ============================================================
// Início dos Testes
// ============================================================

echo PHP_EOL;
echo "============================================================" . PHP_EOL;
echo "🧪 Executando Testes — Sistema de Boletim Escolar" . PHP_EOL;
echo "============================================================" . PHP_EOL;
echo PHP_EOL;

// ────────────────────────────────────────────────────────────────
// TESTE 1: calcularMedia()
// ────────────────────────────────────────────────────────────────

echo "📐 Testando calcularMedia():" . PHP_EOL;
echo str_repeat("-", 50) . PHP_EOL;

// Caso padrão: 4 notas normais
assertIgual(
    "Média de [8.0, 7.0, 9.0, 6.0] = 7.5",
    7.5,
    calcularMedia([8.0, 7.0, 9.0, 6.0])
);

// Todas as notas iguais
assertIgual(
    "Média de [5.0, 5.0, 5.0, 5.0] = 5.0",
    5.0,
    calcularMedia([5.0, 5.0, 5.0, 5.0])
);

// Todas as notas máximas (10)
assertIgual(
    "Média de [10.0, 10.0, 10.0, 10.0] = 10.0",
    10.0,
    calcularMedia([10.0, 10.0, 10.0, 10.0])
);

// Todas as notas mínimas (0)
assertIgual(
    "Média de [0.0, 0.0, 0.0, 0.0] = 0.0",
    0.0,
    calcularMedia([0.0, 0.0, 0.0, 0.0])
);

// Notas com casas decimais
assertIgual(
    "Média de [7.5, 8.3, 6.7, 9.1] ≈ 7.9",
    7.9,
    calcularMedia([7.5, 8.3, 6.7, 9.1])
);

// Array com apenas uma nota
assertIgual(
    "Média de [8.0] = 8.0",
    8.0,
    calcularMedia([8.0])
);

// Array vazio — deve retornar 0
assertIgual(
    "Média de array vazio = 0.0",
    0.0,
    calcularMedia([])
);

// Array com 2 notas
assertIgual(
    "Média de [6.0, 4.0] = 5.0",
    5.0,
    calcularMedia([6.0, 4.0])
);

echo PHP_EOL;

// ────────────────────────────────────────────────────────────────
// TESTE 2: determinarSituacao()
// ────────────────────────────────────────────────────────────────

echo "📊 Testando determinarSituacao():" . PHP_EOL;
echo str_repeat("-", 50) . PHP_EOL;

// Aprovado — acima de 7
assertIgual(
    "Média 8.5 → Aprovado",
    "Aprovado",
    determinarSituacao(8.5)
);

assertIgual(
    "Média 10.0 → Aprovado",
    "Aprovado",
    determinarSituacao(10.0)
);

// Caso limite: exatamente 7.0 → deve ser Aprovado
assertIgual(
    "Média 7.0 (limite) → Aprovado",
    "Aprovado",
    determinarSituacao(7.0)
);

// Recuperação — entre 5.0 (inclusive) e 7.0 (exclusive)
assertIgual(
    "Média 6.5 → Recuperação",
    "Recuperação",
    determinarSituacao(6.5)
);

assertIgual(
    "Média 5.5 → Recuperação",
    "Recuperação",
    determinarSituacao(5.5)
);

// Caso limite: exatamente 5.0 → deve ser Recuperação
assertIgual(
    "Média 5.0 (limite) → Recuperação",
    "Recuperação",
    determinarSituacao(5.0)
);

// Caso limite: 6.9 → deve ser Recuperação (não Aprovado)
assertIgual(
    "Média 6.9 → Recuperação",
    "Recuperação",
    determinarSituacao(6.9)
);

// Reprovado — abaixo de 5
assertIgual(
    "Média 4.9 → Reprovado",
    "Reprovado",
    determinarSituacao(4.9)
);

assertIgual(
    "Média 3.0 → Reprovado",
    "Reprovado",
    determinarSituacao(3.0)
);

assertIgual(
    "Média 0.0 → Reprovado",
    "Reprovado",
    determinarSituacao(0.0)
);

echo PHP_EOL;

// ────────────────────────────────────────────────────────────────
// TESTE 3: validarNota()
// ────────────────────────────────────────────────────────────────

echo "✔️  Testando validarNota():" . PHP_EOL;
echo str_repeat("-", 50) . PHP_EOL;

// Notas válidas (dentro do intervalo 0-10)
assertVerdadeiro("Nota 0 é válida", validarNota(0));
assertVerdadeiro("Nota 5 é válida", validarNota(5));
assertVerdadeiro("Nota 7.5 é válida", validarNota(7.5));
assertVerdadeiro("Nota 10 é válida", validarNota(10));
assertVerdadeiro("Nota 0.0 é válida", validarNota(0.0));
assertVerdadeiro("Nota 10.0 é válida", validarNota(10.0));

// String numérica válida
assertVerdadeiro("String '8.5' é válida", validarNota("8.5"));

// Notas inválidas (fora do intervalo)
assertFalso("Nota -1 é inválida", validarNota(-1));
assertFalso("Nota -0.1 é inválida", validarNota(-0.1));
assertFalso("Nota 10.1 é inválida", validarNota(10.1));
assertFalso("Nota 11 é inválida", validarNota(11));
assertFalso("Nota 100 é inválida", validarNota(100));

// Valores não numéricos
assertFalso("String 'abc' é inválida", validarNota("abc"));
assertFalso("String vazia é inválida", validarNota(""));

echo PHP_EOL;

// ────────────────────────────────────────────────────────────────
// TESTE 4: formatarNota()
// ────────────────────────────────────────────────────────────────

echo "📝 Testando formatarNota():" . PHP_EOL;
echo str_repeat("-", 50) . PHP_EOL;

assertIgual("Formatar 8.5 → '8,5'", "8,5", formatarNota(8.5));
assertIgual("Formatar 10.0 → '10,0'", "10,0", formatarNota(10.0));
assertIgual("Formatar 0.0 → '0,0'", "0,0", formatarNota(0.0));
assertIgual("Formatar 7.123 → '7,1'", "7,1", formatarNota(7.123));
assertIgual("Formatar 6.789 → '6,8'", "6,8", formatarNota(6.789));
assertIgual("Formatar 5.0 → '5,0'", "5,0", formatarNota(5.0));

echo PHP_EOL;

// ────────────────────────────────────────────────────────────────
// TESTE 5: obterCorSituacao()
// ────────────────────────────────────────────────────────────────

echo "🎨 Testando obterCorSituacao():" . PHP_EOL;
echo str_repeat("-", 50) . PHP_EOL;

assertIgual(
    "Aprovado → 'status-aprovado'",
    "status-aprovado",
    obterCorSituacao("Aprovado")
);

assertIgual(
    "Recuperação → 'status-recuperacao'",
    "status-recuperacao",
    obterCorSituacao("Recuperação")
);

assertIgual(
    "Reprovado → 'status-reprovado'",
    "status-reprovado",
    obterCorSituacao("Reprovado")
);

assertIgual(
    "Valor desconhecido → 'status-padrao'",
    "status-padrao",
    obterCorSituacao("Outro")
);

echo PHP_EOL;

// ============================================================
// Relatório Final
// ============================================================

echo "============================================================" . PHP_EOL;
echo "📊 RELATÓRIO FINAL DOS TESTES" . PHP_EOL;
echo "============================================================" . PHP_EOL;
echo PHP_EOL;
echo "  Total de testes:  $totalTestes" . PHP_EOL;
echo "  ✅ Aprovados:     $testesAprovados" . PHP_EOL;
echo "  ❌ Falhos:        $testesFalhos" . PHP_EOL;
echo PHP_EOL;

// Taxa de sucesso
if ($totalTestes > 0) {
    $taxa = round(($testesAprovados / $totalTestes) * 100, 1);
    echo "  Taxa de sucesso: $taxa%" . PHP_EOL;
}

echo PHP_EOL;

// Mensagem final
if ($testesFalhos === 0) {
    echo "  🎉 TODOS OS TESTES PASSARAM! Parabéns!" . PHP_EOL;
} else {
    echo "  ⚠️  Alguns testes falharam. Verifique os erros acima." . PHP_EOL;
    echo PHP_EOL;
    echo "  Testes que falharam:" . PHP_EOL;
    foreach ($errosDetalhes as $i => $erro) {
        echo "    " . ($i + 1) . ". $erro" . PHP_EOL;
    }
}

echo PHP_EOL;
echo "============================================================" . PHP_EOL;

// Define código de saída (0 = sucesso, 1 = falha)
// Útil para integração com scripts de CI/CD
exit($testesFalhos > 0 ? 1 : 0);
