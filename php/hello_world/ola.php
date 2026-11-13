<?php
/**
 * ============================================================
 * 🌍 Olá, Mundo em PHP — Primeiro Script
 * ============================================================
 *
 * Este arquivo demonstra os conceitos fundamentais do PHP:
 * - Saída de dados com echo
 * - Variáveis e concatenação
 * - Funções simples
 * - Iteração sobre arrays
 *
 * Para executar este script:
 *   php ola.php
 *
 * Ou pelo servidor embutido:
 *   php -S localhost:8000
 *   Acesse: http://localhost:8000/ola.php
 */

// ============================================================
// 1. O Clássico "Olá, Mundo!"
// ============================================================

echo "Olá, Mundo!" . PHP_EOL;
// PHP_EOL é a constante de quebra de linha do sistema operacional

// ============================================================
// 2. Variáveis e Tipos de Dados
// ============================================================

// String — texto entre aspas
$nome = "Maria";
$sobrenome = "Silva";

// Integer (inteiro) — número sem casas decimais
$idade = 25;

// Float (decimal) — número com casas decimais
$altura = 1.68;

// Boolean — verdadeiro ou falso
$estudante = true;

// Exibindo informações com interpolação de variáveis (aspas duplas)
echo "Nome: $nome $sobrenome" . PHP_EOL;
echo "Idade: $idade anos" . PHP_EOL;
echo "Altura: $altura m" . PHP_EOL;
echo "Estudante: " . ($estudante ? "Sim" : "Não") . PHP_EOL;

// ============================================================
// 3. Concatenação de Strings
// ============================================================

// Em PHP, usamos o ponto (.) para concatenar strings
$nomeCompleto = $nome . " " . $sobrenome;
echo "Nome completo: " . $nomeCompleto . PHP_EOL;

// Concatenação com atribuição (.=)
$saudacao = "Olá, ";
$saudacao .= $nomeCompleto;
$saudacao .= "! Bem-vinda ao PHP!";
echo $saudacao . PHP_EOL;

// Separador visual
echo PHP_EOL . str_repeat("=", 50) . PHP_EOL;

// ============================================================
// 4. Função Simples
// ============================================================

/**
 * Gera uma mensagem de boas-vindas personalizada.
 *
 * @param string $nomeUsuario Nome do usuário
 * @param string $linguagem   Linguagem de programação (padrão: "PHP")
 * @return string Mensagem de boas-vindas formatada
 */
function boasVindas(string $nomeUsuario, string $linguagem = "PHP"): string
{
    return "🎉 Bem-vindo(a), $nomeUsuario! Você está aprendendo $linguagem!";
}

// Chamando a função com os dois argumentos
echo boasVindas($nome, "PHP") . PHP_EOL;

// Chamando com o valor padrão do segundo parâmetro
echo boasVindas("Carlos") . PHP_EOL;

echo PHP_EOL . str_repeat("=", 50) . PHP_EOL;

// ============================================================
// 5. Iteração sobre Arrays
// ============================================================

// Array indexado (numérico) — lista de linguagens web
$linguagens = ["HTML", "CSS", "JavaScript", "PHP", "SQL"];

echo PHP_EOL . "📚 Linguagens Web que estamos estudando:" . PHP_EOL;

// Usando foreach para percorrer o array
foreach ($linguagens as $indice => $linguagem) {
    // $indice é a posição (0, 1, 2, ...)
    // $linguagem é o valor ("HTML", "CSS", ...)
    $numero = $indice + 1; // Para exibir a partir de 1
    echo "  {$numero}. {$linguagem}" . PHP_EOL;
}

echo PHP_EOL . str_repeat("-", 50) . PHP_EOL;

// Array associativo — dados de um curso
$curso = [
    "nome"     => "Desenvolvimento Web Full Stack",
    "duracao"  => "6 meses",
    "modulos"  => 12,
    "online"   => true,
    "preco"    => 1497.00
];

echo PHP_EOL . "📖 Informações do Curso:" . PHP_EOL;

// Percorrendo array associativo com chave => valor
foreach ($curso as $chave => $valor) {
    // Tratamento especial para booleanos e floats
    if (is_bool($valor)) {
        $valorFormatado = $valor ? "Sim" : "Não";
    } elseif (is_float($valor)) {
        $valorFormatado = "R$ " . number_format($valor, 2, ',', '.');
    } else {
        $valorFormatado = $valor;
    }

    // ucfirst() capitaliza a primeira letra da chave
    echo "  " . ucfirst($chave) . ": $valorFormatado" . PHP_EOL;
}

echo PHP_EOL . str_repeat("=", 50) . PHP_EOL;

// ============================================================
// 6. Exemplo Extra — Contagem de Elementos
// ============================================================

$totalLinguagens = count($linguagens);
echo PHP_EOL . "📊 Total de linguagens listadas: $totalLinguagens" . PHP_EOL;

// Verificando se uma linguagem está no array
$busca = "PHP";
if (in_array($busca, $linguagens)) {
    echo "✅ '$busca' encontrada na lista!" . PHP_EOL;
} else {
    echo "❌ '$busca' não encontrada na lista." . PHP_EOL;
}

echo PHP_EOL . "🎓 Script executado com sucesso!" . PHP_EOL;
