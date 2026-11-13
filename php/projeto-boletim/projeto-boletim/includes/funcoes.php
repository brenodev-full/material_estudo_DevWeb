<?php
/**
 * ============================================================
 * 📦 Funções Auxiliares — Sistema de Boletim Escolar
 * ============================================================
 *
 * Este arquivo contém todas as funções de cálculo, validação
 * e formatação utilizadas pelo sistema de boletim.
 *
 * Funções disponíveis:
 *   - calcularMedia()      → Calcula a média aritmética das notas
 *   - determinarSituacao()  → Determina se o aluno foi aprovado/reprovado
 *   - validarNota()         → Valida se a nota está entre 0 e 10
 *   - formatarNota()        → Formata a nota com 1 casa decimal
 *   - obterCorSituacao()    → Retorna a classe CSS correspondente
 */

/**
 * Calcula a média aritmética de um array de notas.
 *
 * Soma todos os valores do array e divide pela quantidade
 * de elementos para obter a média aritmética simples.
 *
 * @param array $notas Array contendo as notas numéricas do aluno.
 *                      Exemplo: [8.5, 7.0, 9.0, 6.5]
 *
 * @return float A média aritmética das notas.
 *               Retorna 0 se o array estiver vazio.
 *
 * @example
 *   $media = calcularMedia([8.0, 7.5, 9.0, 6.0]); // Retorna 7.625
 */
function calcularMedia(array $notas): float
{
    // Verifica se o array não está vazio para evitar divisão por zero
    if (count($notas) === 0) {
        return 0.0;
    }

    // array_sum() soma todos os elementos do array
    // count() retorna a quantidade de elementos
    $soma = array_sum($notas);
    $quantidade = count($notas);

    return $soma / $quantidade;
}

/**
 * Determina a situação acadêmica do aluno com base na média.
 *
 * Critérios de avaliação:
 *   - Média >= 7.0 → "Aprovado"
 *   - Média >= 5.0 e < 7.0 → "Recuperação"
 *   - Média < 5.0 → "Reprovado"
 *
 * @param float $media A média aritmética do aluno.
 *
 * @return string A situação do aluno: "Aprovado", "Recuperação" ou "Reprovado".
 *
 * @example
 *   echo determinarSituacao(8.5);  // "Aprovado"
 *   echo determinarSituacao(6.0);  // "Recuperação"
 *   echo determinarSituacao(3.5);  // "Reprovado"
 */
function determinarSituacao(float $media): string
{
    // Avaliação por faixas de nota
    if ($media >= 7.0) {
        return "Aprovado";
    } elseif ($media >= 5.0) {
        return "Recuperação";
    } else {
        return "Reprovado";
    }
}

/**
 * Valida se uma nota está dentro do intervalo permitido (0 a 10).
 *
 * Verifica se o valor fornecido é numérico e se está dentro
 * dos limites aceitáveis para uma nota escolar.
 *
 * @param mixed $nota O valor a ser validado. Pode ser int, float ou string numérica.
 *
 * @return bool True se a nota for válida (entre 0 e 10), false caso contrário.
 *
 * @example
 *   validarNota(8.5);    // true
 *   validarNota(-1);     // false
 *   validarNota(10.5);   // false
 *   validarNota("abc");  // false
 */
function validarNota($nota): bool
{
    // Primeiro verifica se o valor é numérico
    if (!is_numeric($nota)) {
        return false;
    }

    // Converte para float para garantir comparação correta
    $notaFloat = (float) $nota;

    // Verifica se está dentro do intervalo válido [0, 10]
    return $notaFloat >= 0 && $notaFloat <= 10;
}

/**
 * Formata uma nota para exibição com 1 casa decimal.
 *
 * Utiliza number_format() para padronizar a exibição das notas
 * com vírgula como separador decimal (padrão brasileiro).
 *
 * @param float $nota A nota a ser formatada.
 *
 * @return string A nota formatada como string.
 *                Exemplo: 8.5 → "8,5" | 10.0 → "10,0"
 *
 * @example
 *   echo formatarNota(8.5);    // "8,5"
 *   echo formatarNota(10);     // "10,0"
 *   echo formatarNota(7.123);  // "7,1"
 */
function formatarNota(float $nota): string
{
    // number_format(número, casas_decimais, separador_decimal, separador_milhar)
    // Usa vírgula como separador decimal (padrão brasileiro)
    return number_format($nota, 1, ',', '.');
}

/**
 * Retorna a classe CSS correspondente à situação do aluno.
 *
 * Mapeia cada situação acadêmica para uma classe CSS que define
 * a cor de exibição no resultado:
 *   - "Aprovado"    → "status-aprovado"    (verde)
 *   - "Recuperação" → "status-recuperacao"  (amarelo)
 *   - "Reprovado"   → "status-reprovado"    (vermelho)
 *
 * @param string $situacao A situação do aluno ("Aprovado", "Recuperação" ou "Reprovado").
 *
 * @return string O nome da classe CSS correspondente.
 *
 * @example
 *   echo obterCorSituacao("Aprovado");    // "status-aprovado"
 *   echo obterCorSituacao("Reprovado");   // "status-reprovado"
 */
function obterCorSituacao(string $situacao): string
{
    // Usa match (PHP 8+) ou switch para mapear situação → classe CSS
    // Aqui usamos um array associativo para compatibilidade
    $cores = [
        "Aprovado"    => "status-aprovado",
        "Recuperação" => "status-recuperacao",
        "Reprovado"   => "status-reprovado"
    ];

    // Retorna a classe correspondente ou uma classe padrão
    return $cores[$situacao] ?? "status-padrao";
}
