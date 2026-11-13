# 📘 Guia Completo de PHP

## Índice

1. [O que é PHP](#o-que-é-php)
2. [Tags PHP e Saída de Dados](#tags-php-e-saída-de-dados)
3. [Variáveis e Tipos de Dados](#variáveis-e-tipos-de-dados)
4. [Operadores](#operadores)
5. [Estruturas de Controle](#estruturas-de-controle)
6. [Arrays](#arrays)
7. [Funções](#funções)
8. [Superglobais](#superglobais)
9. [Manipulação de Formulários](#manipulação-de-formulários)
10. [Funções de String](#funções-de-string)
11. [Segurança](#segurança)
12. [Inclusão de Arquivos](#inclusão-de-arquivos)
13. [Servidor Embutido do PHP](#servidor-embutido-do-php)

---

## O que é PHP

### Definição

**PHP** (acrônimo recursivo para **PHP: Hypertext Preprocessor**) é uma linguagem de programação de código aberto, amplamente utilizada para o desenvolvimento web do lado do servidor (*server-side*). Diferente de linguagens como JavaScript, que são executadas no navegador do usuário, o código PHP é processado no servidor e o resultado (geralmente HTML) é enviado ao navegador.

### Breve Histórico

| Ano  | Evento |
|------|--------|
| 1994 | Rasmus Lerdorf cria o **Personal Home Page Tools** (PHP/FI) |
| 1997 | PHP 3 é lançado — reescrita completa por Andi Gutmans e Zeev Suraski |
| 2000 | PHP 4 com o motor Zend Engine |
| 2004 | PHP 5 introduz orientação a objetos robusta |
| 2015 | PHP 7 — enorme ganho de performance (2x mais rápido que PHP 5) |
| 2020 | PHP 8 — JIT compiler, named arguments, match expression, union types |
| 2023 | PHP 8.3 — melhorias contínuas de tipagem e performance |

### Como Funciona o Processamento Server-Side

```
┌──────────┐    Requisição HTTP     ┌──────────────┐
│ Navegador │ ──────────────────────▶ │ Servidor Web │
│ (Cliente) │                        │ (Apache/Nginx)│
└──────────┘                        └──────┬───────┘
      ▲                                    │
      │          Resposta HTML             ▼
      │◀──────────────────────── ┌──────────────────┐
      │                          │ Interpretador PHP │
      │                          │ (processa o .php) │
      │                          └──────────────────┘
```

1. O navegador faz uma requisição HTTP ao servidor
2. O servidor identifica que o arquivo é `.php` e repassa ao interpretador PHP
3. O PHP processa o código, pode acessar banco de dados, arquivos, etc.
4. O resultado (HTML puro) é enviado de volta ao navegador
5. O navegador renderiza o HTML — o usuário **nunca** vê o código PHP

---

## Tags PHP e Saída de Dados

### Tags de Abertura e Fechamento

```php
<?php
// Todo código PHP deve estar entre as tags <?php e ?>
// A tag de fechamento ?> é OPCIONAL em arquivos que contêm apenas PHP
// (e é recomendado omiti-la para evitar problemas com espaços em branco)
?>
```

### `echo` — Comando de Saída Principal

```php
<?php
// echo pode exibir uma ou mais strings separadas por vírgula
echo "Olá, Mundo!";
echo "Nome: ", "João", " - Idade: ", 25;

// echo com HTML embutido
echo "<h1>Título da Página</h1>";
echo "<p>Parágrafo com <strong>negrito</strong></p>";

// Sintaxe alternativa (shorthand) — útil em templates
// Equivale a <?php echo $variavel; ?>
?>
<p>O valor é: <?= $variavel ?></p>
```

### `print` — Alternativa ao echo

```php
<?php
// print funciona de forma similar ao echo, mas:
// - Aceita apenas UM argumento
// - Retorna sempre 1 (pode ser usado em expressões)
print "Olá, Mundo!";

// Pode ser usado em expressões (echo não pode)
$resultado = print "Texto"; // $resultado recebe 1
?>
```

### Diferenças entre `echo` e `print`

| Característica | `echo` | `print` |
|---------------|--------|---------|
| Argumentos | Múltiplos (separados por vírgula) | Apenas um |
| Retorno | Nenhum (void) | Retorna 1 |
| Velocidade | Levemente mais rápido | Levemente mais lento |
| Uso em expressões | Não | Sim |

---

## Variáveis e Tipos de Dados

### Declaração de Variáveis

```php
<?php
// Em PHP, toda variável começa com o símbolo $ (cifrão)
// PHP é uma linguagem de tipagem dinâmica — o tipo é inferido automaticamente

// String — texto entre aspas simples ou duplas
$nome = "Maria Silva";        // aspas duplas: interpretam variáveis dentro
$sobrenome = 'Santos';        // aspas simples: texto literal

// Integer (int) — números inteiros
$idade = 28;
$anoNascimento = 1996;
$temperaturaAbaixoZero = -5;

// Float (double) — números decimais (ponto flutuante)
$altura = 1.75;
$preco = 49.99;
$pi = 3.14159;

// Boolean (bool) — verdadeiro ou falso
$ativo = true;
$bloqueado = false;

// NULL — ausência de valor
$endereco = null;
?>
```

### Interpolação de Variáveis em Strings

```php
<?php
$nome = "Carlos";
$idade = 30;

// Aspas DUPLAS — variáveis são interpretadas
echo "Meu nome é $nome e tenho $idade anos.";
// Saída: Meu nome é Carlos e tenho 30 anos.

// Aspas SIMPLES — variáveis NÃO são interpretadas
echo 'Meu nome é $nome e tenho $idade anos.';
// Saída: Meu nome é $nome e tenho $idade anos.

// Sintaxe com chaves — útil quando a variável está grudada em texto
echo "O {$nome}zinho chegou!";
// Saída: O Carloszinho chegou!
?>
```

### Verificando Tipos

```php
<?php
$valor = 42;

// gettype() retorna o tipo como string
echo gettype($valor); // "integer"

// var_dump() mostra tipo E valor — ótimo para debug
var_dump($valor);  // int(42)

// Funções de verificação de tipo (retornam bool)
is_string($valor);  // false
is_int($valor);     // true
is_float($valor);   // false
is_bool($valor);    // false
is_null($valor);    // false
is_array($valor);   // false
?>
```

### Conversão de Tipos (Type Casting)

```php
<?php
$texto = "42";

// Casting explícito
$numero = (int) $texto;      // Converte para inteiro: 42
$decimal = (float) "3.14";   // Converte para float: 3.14
$string = (string) 100;      // Converte para string: "100"
$booleano = (bool) 1;        // Converte para boolean: true

// intval(), floatval(), strval() — funções alternativas
$num = intval("55");         // 55
$dec = floatval("9.8");      // 9.8
?>
```

---

## Operadores

### Operadores Aritméticos

```php
<?php
$a = 10;
$b = 3;

echo $a + $b;   // Adição:        13
echo $a - $b;   // Subtração:     7
echo $a * $b;   // Multiplicação: 30
echo $a / $b;   // Divisão:       3.333...
echo $a % $b;   // Módulo (resto): 1
echo $a ** $b;  // Exponenciação: 1000 (10 elevado a 3)

// Operadores de atribuição combinados
$a += 5;   // Equivale a: $a = $a + 5
$a -= 2;   // Equivale a: $a = $a - 2
$a *= 3;   // Equivale a: $a = $a * 3
$a /= 2;   // Equivale a: $a = $a / 2

// Incremento e decremento
$a++;   // Pós-incremento: usa o valor, depois soma 1
++$a;   // Pré-incremento: soma 1, depois usa o valor
$a--;   // Pós-decremento
--$a;   // Pré-decremento
?>
```

### Operadores de Comparação

```php
<?php
$a = 5;
$b = "5";

// == (igual) — compara VALORES (com conversão de tipo)
var_dump($a == $b);   // true (5 é igual a "5" após conversão)

// === (idêntico) — compara VALORES E TIPOS
var_dump($a === $b);  // false (int !== string)

// != ou <> (diferente)
var_dump($a != 10);   // true

// !== (não idêntico)
var_dump($a !== $b);  // true (tipos diferentes)

// > (maior que), < (menor que)
var_dump($a > 3);     // true
var_dump($a < 3);     // false

// >= (maior ou igual), <= (menor ou igual)
var_dump($a >= 5);    // true
var_dump($a <= 4);    // false

// <=> (spaceship) — retorna -1, 0 ou 1
var_dump(1 <=> 2);    // -1 (1 é menor)
var_dump(1 <=> 1);    //  0 (iguais)
var_dump(2 <=> 1);    //  1 (2 é maior)
?>
```

### Operadores Lógicos

```php
<?php
$idade = 20;
$temCarteira = true;

// && ou and — E lógico (ambas condições devem ser verdadeiras)
if ($idade >= 18 && $temCarteira) {
    echo "Pode dirigir!";
}

// || ou or — OU lógico (pelo menos uma condição verdadeira)
if ($idade < 12 || $idade >= 65) {
    echo "Tem direito a meia-entrada!";
}

// ! — NÃO lógico (inverte o valor booleano)
if (!$temCarteira) {
    echo "Não tem carteira de motorista.";
}
?>
```

### Operador de Concatenação

```php
<?php
$nome = "Ana";
$sobrenome = "Costa";

// O ponto (.) concatena (junta) strings em PHP
$nomeCompleto = $nome . " " . $sobrenome;
echo $nomeCompleto; // "Ana Costa"

// .= concatena e atribui
$saudacao = "Olá, ";
$saudacao .= $nome;     // "Olá, Ana"
$saudacao .= "!";       // "Olá, Ana!"
echo $saudacao;
?>
```

---

## Estruturas de Controle

### if / else / elseif

```php
<?php
$nota = 7.5;

// Estrutura condicional simples
if ($nota >= 7) {
    echo "Aprovado! ✅";
} elseif ($nota >= 5) {
    echo "Recuperação ⚠️";
} else {
    echo "Reprovado ❌";
}

// Operador ternário — forma curta do if/else
$status = ($nota >= 7) ? "Aprovado" : "Reprovado";

// Null coalescing — retorna o primeiro valor não-null
$usuario = $_GET['usuario'] ?? 'Visitante';
// Se $_GET['usuario'] existir e não for null, usa ele; senão, 'Visitante'
?>
```

### switch

```php
<?php
$diaSemana = 3;

// switch é ideal para comparar uma variável contra múltiplos valores
switch ($diaSemana) {
    case 1:
        echo "Segunda-feira";
        break;
    case 2:
        echo "Terça-feira";
        break;
    case 3:
        echo "Quarta-feira";
        break;
    case 4:
        echo "Quinta-feira";
        break;
    case 5:
        echo "Sexta-feira";
        break;
    case 6:
    case 7:
        echo "Final de semana! 🎉";
        break;
    default:
        echo "Dia inválido";
        break;
}

// PHP 8+ — match expression (alternativa mais moderna ao switch)
$resultado = match($diaSemana) {
    1 => "Segunda-feira",
    2 => "Terça-feira",
    3 => "Quarta-feira",
    4 => "Quinta-feira",
    5 => "Sexta-feira",
    6, 7 => "Final de semana! 🎉",
    default => "Dia inválido",
};
echo $resultado;
?>
```

### for

```php
<?php
// Loop for — quando sabemos quantas iterações teremos
// Sintaxe: for (inicialização; condição; incremento)

echo "Tabuada do 7:" . PHP_EOL;
for ($i = 1; $i <= 10; $i++) {
    echo "7 x $i = " . (7 * $i) . PHP_EOL;
}

// PHP_EOL é a constante de quebra de linha do sistema operacional
?>
```

### while

```php
<?php
// while — repete ENQUANTO a condição for verdadeira
// Útil quando NÃO sabemos quantas iterações teremos

$contador = 1;
while ($contador <= 5) {
    echo "Iteração número: $contador" . PHP_EOL;
    $contador++;
}

// do...while — executa pelo menos UMA vez antes de verificar a condição
$tentativa = 0;
do {
    echo "Tentativa $tentativa" . PHP_EOL;
    $tentativa++;
} while ($tentativa < 3);
?>
```

### foreach

```php
<?php
// foreach — ideal para percorrer arrays e objetos

$frutas = ["Maçã", "Banana", "Laranja", "Uva"];

// Percorrendo apenas valores
foreach ($frutas as $fruta) {
    echo "Fruta: $fruta" . PHP_EOL;
}

// Percorrendo chaves e valores
$aluno = [
    "nome" => "Pedro",
    "idade" => 16,
    "turma" => "9º A"
];

foreach ($aluno as $chave => $valor) {
    echo "$chave: $valor" . PHP_EOL;
}
// Saída:
// nome: Pedro
// idade: 16
// turma: 9º A
?>
```

---

## Arrays

### Array Indexado (Numérico)

```php
<?php
// Arrays indexados usam índices numéricos (começando do 0)

// Forma 1: usando a função array()
$cores = array("Vermelho", "Azul", "Verde");

// Forma 2: sintaxe curta com colchetes (preferida)
$frutas = ["Maçã", "Banana", "Laranja", "Uva"];

// Acessando elementos pelo índice
echo $frutas[0]; // "Maçã"
echo $frutas[2]; // "Laranja"

// Adicionando elementos ao final
$frutas[] = "Manga";       // Adiciona no próximo índice disponível
$frutas[10] = "Abacaxi";   // Adiciona no índice 10 especificamente
?>
```

### Array Associativo

```php
<?php
// Arrays associativos usam chaves (strings) em vez de índices numéricos

$pessoa = [
    "nome"   => "Ana Souza",
    "idade"  => 25,
    "email"  => "ana@email.com",
    "cidade" => "São Paulo"
];

// Acessando valores pela chave
echo $pessoa["nome"];   // "Ana Souza"
echo $pessoa["cidade"]; // "São Paulo"

// Adicionando/modificando elementos
$pessoa["telefone"] = "(11) 99999-1234";
$pessoa["idade"] = 26; // Atualiza o valor existente
?>
```

### Array Multidimensional

```php
<?php
// Arrays multidimensionais — arrays dentro de arrays

$turma = [
    [
        "nome"  => "Carlos",
        "notas" => [8.5, 7.0, 9.0, 6.5]
    ],
    [
        "nome"  => "Maria",
        "notas" => [9.0, 8.5, 10.0, 7.5]
    ],
    [
        "nome"  => "João",
        "notas" => [6.0, 5.5, 7.0, 4.5]
    ]
];

// Acessando dados
echo $turma[0]["nome"];      // "Carlos"
echo $turma[1]["notas"][2];  // 10.0 (terceira nota da Maria)

// Percorrendo com foreach
foreach ($turma as $aluno) {
    $media = array_sum($aluno["notas"]) / count($aluno["notas"]);
    echo "{$aluno['nome']}: média = $media" . PHP_EOL;
}
?>
```

### Funções de Array Essenciais

```php
<?php
$numeros = [5, 3, 8, 1, 9, 2];
$frutas = ["Banana", "Maçã"];

// ─── Adicionar e Remover ───

// array_push() — adiciona um ou mais elementos ao FINAL
array_push($frutas, "Uva", "Laranja");
// $frutas = ["Banana", "Maçã", "Uva", "Laranja"]

// array_pop() — remove e retorna o ÚLTIMO elemento
$ultimo = array_pop($frutas);
// $ultimo = "Laranja", $frutas = ["Banana", "Maçã", "Uva"]

// array_unshift() — adiciona ao INÍCIO
array_unshift($frutas, "Manga");
// $frutas = ["Manga", "Banana", "Maçã", "Uva"]

// array_shift() — remove do INÍCIO
$primeiro = array_shift($frutas);
// $primeiro = "Manga"

// ─── Informações ───

// count() — conta o número de elementos
echo count($numeros); // 6

// in_array() — verifica se um valor EXISTE no array
if (in_array(8, $numeros)) {
    echo "O número 8 está no array!";
}

// array_search() — busca um valor e retorna sua chave
$indice = array_search(8, $numeros); // 2

// ─── Ordenação ───

// sort() — ordena em ordem crescente (modifica o array original)
sort($numeros);
// $numeros = [1, 2, 3, 5, 8, 9]

// rsort() — ordena em ordem decrescente
rsort($numeros);
// $numeros = [9, 8, 5, 3, 2, 1]

// ─── Combinação e Extração ───

$a = [1, 2, 3];
$b = [4, 5, 6];

// array_merge() — combina dois ou mais arrays
$c = array_merge($a, $b);
// $c = [1, 2, 3, 4, 5, 6]

// Spread operator (PHP 7.4+) — alternativa moderna
$c = [...$a, ...$b];

// ─── Chaves e Valores ───

$pessoa = ["nome" => "Ana", "idade" => 25, "cidade" => "SP"];

// array_keys() — retorna todas as chaves
$chaves = array_keys($pessoa);
// $chaves = ["nome", "idade", "cidade"]

// array_values() — retorna todos os valores
$valores = array_values($pessoa);
// $valores = ["Ana", 25, "SP"]

// array_key_exists() — verifica se uma chave existe
if (array_key_exists("email", $pessoa)) {
    echo "E-mail cadastrado!";
}

// ─── Transformação ───

// array_map() — aplica uma função a cada elemento
$dobrados = array_map(function($n) { return $n * 2; }, $a);
// $dobrados = [2, 4, 6]

// array_filter() — filtra elementos com base em uma condição
$pares = array_filter($numeros, function($n) { return $n % 2 === 0; });
?>
```

---

## Funções

### Declaração Básica

```php
<?php
// Funções encapsulam blocos de código reutilizáveis

// Função sem parâmetros e sem retorno
function saudacao() {
    echo "Bem-vindo ao sistema!" . PHP_EOL;
}

// Chamando a função
saudacao(); // "Bem-vindo ao sistema!"

// Função com parâmetros
function somar($a, $b) {
    return $a + $b;
}

$resultado = somar(5, 3); // 8
?>
```

### Parâmetros com Valores Padrão

```php
<?php
// Valores padrão são usados quando o argumento não é fornecido
function criarUsuario($nome, $cargo = "Visitante", $ativo = true) {
    echo "Nome: $nome | Cargo: $cargo | Ativo: " . ($ativo ? "Sim" : "Não") . PHP_EOL;
}

criarUsuario("Ana");                    // Cargo: Visitante, Ativo: Sim
criarUsuario("Carlos", "Admin");        // Cargo: Admin, Ativo: Sim
criarUsuario("João", "Editor", false);  // Cargo: Editor, Ativo: Não
?>
```

### Type Hints (Declaração de Tipos)

```php
<?php
// PHP 7+ permite declarar tipos nos parâmetros e no retorno

// Tipos nos parâmetros e retorno
function calcularDesconto(float $preco, float $percentual): float {
    return $preco - ($preco * $percentual / 100);
}

echo calcularDesconto(100.0, 15.0); // 85.0

// Tipo de retorno void — não retorna nada
function logMensagem(string $mensagem): void {
    echo "[LOG] $mensagem" . PHP_EOL;
}

// Tipos anuláveis (nullable) — aceita o tipo OU null
function buscarUsuario(int $id): ?string {
    // O ? antes do tipo permite retornar null
    if ($id === 1) return "Admin";
    return null;
}

// Union types (PHP 8+) — aceita múltiplos tipos
function processar(int|float $numero): string {
    return "Valor: $numero";
}
?>
```

### Arrow Functions (PHP 7.4+)

```php
<?php
// Arrow functions — sintaxe curta para funções anônimas simples
// Capturam variáveis do escopo pai automaticamente

$numeros = [1, 2, 3, 4, 5];

// Função anônima tradicional
$dobrados = array_map(function($n) {
    return $n * 2;
}, $numeros);

// Arrow function — equivalente e mais concisa
$dobrados = array_map(fn($n) => $n * 2, $numeros);
// [2, 4, 6, 8, 10]
?>
```

---

## Superglobais

As **superglobais** são variáveis especiais do PHP que estão disponíveis em qualquer escopo (dentro de funções, classes, etc.) sem necessidade de usar `global`.

### `$_GET` — Dados da URL (Query String)

```php
<?php
// URL: pagina.php?nome=Ana&idade=25

// $_GET contém os parâmetros passados pela URL
$nome = $_GET['nome'] ?? 'Não informado';  // "Ana"
$idade = $_GET['idade'] ?? 0;              // "25"

// ATENÇÃO: sempre sanitize dados recebidos via GET!
$nomeSafe = htmlspecialchars($_GET['nome'] ?? '', ENT_QUOTES, 'UTF-8');
?>
```

### `$_POST` — Dados de Formulários

```php
<?php
// $_POST contém dados enviados via método POST de um formulário
// Mais seguro que GET — dados não aparecem na URL

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = $_POST['senha'] ?? '';

    // Processar o login...
}
?>
```

### `$_REQUEST` — GET + POST + COOKIE

```php
<?php
// $_REQUEST combina $_GET, $_POST e $_COOKIE
// Evite usar — prefira $_GET ou $_POST explicitamente para clareza
$dado = $_REQUEST['campo'] ?? '';
?>
```

### `$_SERVER` — Informações do Servidor

```php
<?php
// $_SERVER contém informações sobre o servidor e a requisição

echo $_SERVER['SERVER_NAME'];     // Nome do servidor (ex: "localhost")
echo $_SERVER['REQUEST_METHOD'];  // Método HTTP: "GET" ou "POST"
echo $_SERVER['REQUEST_URI'];     // URI requisitada: "/pagina.php?id=1"
echo $_SERVER['HTTP_USER_AGENT']; // Navegador do usuário
echo $_SERVER['REMOTE_ADDR'];     // IP do visitante
echo $_SERVER['DOCUMENT_ROOT'];   // Diretório raiz do site
echo $_SERVER['PHP_SELF'];        // Nome do script atual
?>
```

### `$_SESSION` — Sessões

```php
<?php
// Sessões permitem armazenar dados do usuário ENTRE páginas
// Os dados ficam no SERVIDOR (diferente dos cookies)

// Deve ser chamado no INÍCIO de toda página que usa sessão
session_start();

// Armazenando dados na sessão
$_SESSION['usuario'] = 'admin';
$_SESSION['logado'] = true;

// Lendo dados (em outra página)
if (isset($_SESSION['logado']) && $_SESSION['logado'] === true) {
    echo "Bem-vindo, " . $_SESSION['usuario'] . "!";
}

// Removendo uma variável de sessão
unset($_SESSION['usuario']);

// Destruindo toda a sessão (logout)
session_destroy();
?>
```

### `$_COOKIE` — Cookies

```php
<?php
// Cookies armazenam dados no NAVEGADOR do usuário
// São enviados a cada requisição HTTP

// Criando um cookie (expira em 30 dias)
setcookie("tema", "escuro", time() + (86400 * 30), "/");
//        nome    valor    expiração (30 dias)     caminho

// Lendo um cookie
$tema = $_COOKIE['tema'] ?? 'claro';
echo "Tema atual: $tema";

// Removendo um cookie (define expiração no passado)
setcookie("tema", "", time() - 3600, "/");
?>
```

---

## Manipulação de Formulários

### Formulário HTML com Método POST

```html
<!-- formulario.html -->
<form action="processar.php" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email" required>

    <label for="mensagem">Mensagem:</label>
    <textarea id="mensagem" name="mensagem" rows="4"></textarea>

    <button type="submit">Enviar</button>
</form>
```

### Processando os Dados no PHP

```php
<?php
// processar.php — recebe os dados do formulário

// Verifica se a requisição é POST (boa prática)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Sanitiza os dados recebidos para prevenir XSS
    $nome     = htmlspecialchars(trim($_POST['nome'] ?? ''), ENT_QUOTES, 'UTF-8');
    $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $mensagem = htmlspecialchars(trim($_POST['mensagem'] ?? ''), ENT_QUOTES, 'UTF-8');

    // Validação
    $erros = [];

    if (empty($nome)) {
        $erros[] = "O campo nome é obrigatório.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "E-mail inválido.";
    }

    // Exibe resultado
    if (empty($erros)) {
        echo "<h2>Dados recebidos com sucesso!</h2>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Mensagem:</strong> $mensagem</p>";
    } else {
        echo "<h2>Erros encontrados:</h2>";
        echo "<ul>";
        foreach ($erros as $erro) {
            echo "<li>$erro</li>";
        }
        echo "</ul>";
    }
} else {
    // Se acessar diretamente (sem POST), redireciona
    header("Location: formulario.html");
    exit;
}
?>
```

### Formulário com Método GET

```php
<?php
// busca.php — exemplo de busca usando GET
// A URL ficará: busca.php?termo=php&categoria=tutorial

$termo = htmlspecialchars($_GET['termo'] ?? '', ENT_QUOTES, 'UTF-8');
$categoria = htmlspecialchars($_GET['categoria'] ?? 'todos', ENT_QUOTES, 'UTF-8');
?>

<form action="busca.php" method="GET">
    <input type="text" name="termo" value="<?= $termo ?>" placeholder="Buscar...">
    <select name="categoria">
        <option value="todos">Todas categorias</option>
        <option value="tutorial" <?= $categoria === 'tutorial' ? 'selected' : '' ?>>Tutoriais</option>
        <option value="artigo" <?= $categoria === 'artigo' ? 'selected' : '' ?>>Artigos</option>
    </select>
    <button type="submit">Buscar</button>
</form>

<?php if (!empty($termo)): ?>
    <p>Resultados para: <strong><?= $termo ?></strong> na categoria <strong><?= $categoria ?></strong></p>
<?php endif; ?>
```

---

## Funções de String

```php
<?php
$texto = "  Olá, Mundo PHP!  ";

// ─── Tamanho ───
echo strlen($texto);  // 21 (incluindo espaços)
echo mb_strlen($texto); // 21 (seguro para caracteres multibyte/UTF-8)

// ─── Maiúsculas e Minúsculas ───
echo strtolower("OLÁ MUNDO");    // "olá mundo"
echo strtoupper("olá mundo");    // "OLÁ MUNDO"
echo ucfirst("olá mundo");       // "Olá mundo"   (primeira letra maiúscula)
echo ucwords("olá mundo php");   // "Olá Mundo Php" (cada palavra)
// Para acentos UTF-8:
echo mb_strtolower("OLÁ MUNDO"); // "olá mundo"
echo mb_strtoupper("olá mundo"); // "OLÁ MUNDO"

// ─── Substrings ───
echo substr("Olá, Mundo!", 5, 5);  // "Mundo"
//         string, início, comprimento

echo substr("Olá, Mundo!", -6);    // "Mundo!" (do final)

// ─── Busca e Substituição ───
echo str_replace("PHP", "JavaScript", "Eu amo PHP");
// "Eu amo JavaScript"

echo str_replace(
    ["gato", "cachorro"],     // buscar
    ["felino", "canino"],     // substituir
    "O gato e o cachorro"
);
// "O felino e o canino"

// strpos() — encontra a POSIÇÃO de uma substring
$pos = strpos("Olá, Mundo!", "Mundo"); // 5
if ($pos !== false) {
    echo "Encontrado na posição: $pos";
}

// str_contains() (PHP 8+) — verifica se contém substring
if (str_contains("Olá, Mundo!", "Mundo")) {
    echo "Contém 'Mundo'!";
}

// str_starts_with() e str_ends_with() (PHP 8+)
str_starts_with("Olá Mundo", "Olá");    // true
str_ends_with("arquivo.php", ".php");    // true

// ─── Dividir e Juntar ───

// explode() — divide string em array
$csv = "João,Maria,Pedro,Ana";
$nomes = explode(",", $csv);
// $nomes = ["João", "Maria", "Pedro", "Ana"]

// implode() (ou join()) — junta array em string
$lista = ["PHP", "JavaScript", "Python"];
echo implode(" | ", $lista);
// "PHP | JavaScript | Python"

// ─── Limpeza ───

// trim() — remove espaços (e outros caracteres) do início e fim
echo trim("  Olá  ");     // "Olá"
echo ltrim("  Olá  ");    // "Olá  " (apenas esquerda)
echo rtrim("  Olá  ");    // "  Olá" (apenas direita)

// Removendo caracteres específicos
echo trim("***Olá***", "*"); // "Olá"

// ─── Formatação ───
echo number_format(1234567.891, 2, ',', '.'); // "1.234.567,89" (formato BR)
echo sprintf("Nome: %s, Idade: %d, Média: %.2f", "Ana", 20, 8.567);
// "Nome: Ana, Idade: 20, Média: 8.57"
?>
```

---

## Segurança

### Prevenção de XSS (Cross-Site Scripting)

```php
<?php
// XSS ocorre quando dados do usuário são exibidos sem sanitização
// Um atacante pode injetar código JavaScript malicioso

// ❌ VULNERÁVEL — NUNCA faça isso:
// echo $_GET['nome'];
// Se o usuário enviar: ?nome=<script>alert('Hackeado!')</script>
// O script será executado no navegador!

// ✅ SEGURO — use htmlspecialchars():
$nome = htmlspecialchars($_GET['nome'] ?? '', ENT_QUOTES, 'UTF-8');
echo $nome;
// Caracteres especiais são convertidos em entidades HTML inofensivas:
// < vira &lt;   > vira &gt;   " vira &quot;   ' vira &#039;
?>
```

### Validação e Filtragem de Dados

```php
<?php
// filter_input() — filtra uma variável de entrada específica
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

// filter_var() — filtra uma variável qualquer
$emailLimpo = filter_var($emailInput, FILTER_SANITIZE_EMAIL);

// Validação (retorna o valor ou false)
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "E-mail válido!";
} else {
    echo "E-mail inválido!";
}

// Validar inteiro dentro de um intervalo
$idade = filter_var($idadeInput, FILTER_VALIDATE_INT, [
    "options" => ["min_range" => 1, "max_range" => 150]
]);

// Validar URL
$url = filter_var($urlInput, FILTER_VALIDATE_URL);

// Validar IP
$ip = filter_var($ipInput, FILTER_VALIDATE_IP);

// ─── Filtros de sanitização úteis ───
// FILTER_SANITIZE_EMAIL      — remove caracteres inválidos de e-mail
// FILTER_SANITIZE_URL        — remove caracteres inválidos de URL
// FILTER_SANITIZE_NUMBER_INT — remove tudo exceto dígitos e +/-
// FILTER_SANITIZE_SPECIAL_CHARS — equivale a htmlspecialchars()
?>
```

### Prevenção de SQL Injection (Conceitos)

```php
<?php
// SQL Injection ocorre quando dados do usuário são inseridos
// diretamente em consultas SQL

// ❌ VULNERÁVEL — NUNCA faça isso:
// $sql = "SELECT * FROM usuarios WHERE email = '$email'";
// Se o usuário enviar: ' OR '1'='1' --
// A consulta se torna: SELECT * FROM usuarios WHERE email = '' OR '1'='1' --'
// Isso retorna TODOS os registros!

// ✅ SEGURO — use Prepared Statements (PDO):
$pdo = new PDO('mysql:host=localhost;dbname=escola', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Os placeholders (?) são substituídos de forma segura
$stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = ? AND senha = ?");
$stmt->execute([$email, $senhaHash]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

// Ou com placeholders nomeados (:nome)
$stmt = $pdo->prepare("INSERT INTO alunos (nome, nota) VALUES (:nome, :nota)");
$stmt->execute([
    ':nome' => $nome,
    ':nota' => $nota
]);

// ─── Dicas de Segurança Geral ───
// 1. SEMPRE use prepared statements para consultas SQL
// 2. SEMPRE sanitize dados exibidos com htmlspecialchars()
// 3. SEMPRE valide dados do lado do servidor (não confie no JS do cliente)
// 4. Use password_hash() e password_verify() para senhas
// 5. Configure error_reporting para NÃO exibir erros em produção
?>
```

---

## Inclusão de Arquivos

```php
<?php
// PHP permite incluir outros arquivos PHP para organizar e reutilizar código

// ─── include ───
// Inclui o arquivo. Se não encontrar, emite um WARNING e continua a execução.
include 'cabecalho.php';
include 'sidebar.php';

// ─── require ───
// Inclui o arquivo. Se não encontrar, emite um FATAL ERROR e PARA a execução.
require 'config.php';           // Arquivo crítico — deve parar se não existir
require 'funcoes-essenciais.php';

// ─── include_once / require_once ───
// Garantem que o arquivo seja incluído APENAS UMA VEZ
// Útil para evitar redeclaração de funções, classes ou constantes
require_once 'database.php';   // Mesmo se chamado em múltiplos lugares
include_once 'helpers.php';    // só será incluído na primeira vez

// ─── Exemplo Prático de Organização ───
// Estrutura de diretórios:
// /projeto
// ├── index.php
// ├── includes/
// │   ├── config.php
// │   ├── funcoes.php
// │   ├── topo.php
// │   └── rodape.php
// └── assets/
//     ├── css/
//     └── js/

// No index.php:
require_once 'includes/config.php';
require_once 'includes/funcoes.php';
include 'includes/topo.php';

echo "<main>Conteúdo da página</main>";

include 'includes/rodape.php';
?>
```

---

## Servidor Embutido do PHP

O PHP possui um **servidor web embutido** ideal para desenvolvimento local. Não requer Apache ou Nginx.

### Iniciando o Servidor

```bash
# Navegue até a pasta do projeto
cd /caminho/do/projeto

# Inicie o servidor na porta 8000
php -S localhost:8000

# O servidor estará disponível em: http://localhost:8000
```

### Opções Úteis

```bash
# Usar uma porta diferente
php -S localhost:3000

# Especificar o diretório raiz (document root)
php -S localhost:8000 -t public/

# Especificar um arquivo de roteamento
php -S localhost:8000 router.php

# Tornar acessível em toda a rede local
php -S 0.0.0.0:8000
```

### Arquivo de Roteamento (Opcional)

```php
<?php
// router.php — roteamento personalizado para o servidor embutido

$uri = $_SERVER['REQUEST_URI'];
$caminho = parse_url($uri, PHP_URL_PATH);

// Serve arquivos estáticos diretamente
if (file_exists(__DIR__ . $caminho) && !is_dir(__DIR__ . $caminho)) {
    return false; // Deixa o servidor servir o arquivo normalmente
}

// Redireciona todas as outras requisições para index.php
require __DIR__ . '/index.php';
?>
```

> ⚠️ **Importante:** O servidor embutido do PHP é apenas para **desenvolvimento local**. Para produção, use Apache, Nginx ou serviços como Vercel, Heroku, etc.

---

## Resumo de Boas Práticas

| Prática | Descrição |
|---------|-----------|
| 🔒 Sanitizar entrada | Sempre use `htmlspecialchars()` e `filter_input()` |
| 🛡️ Prepared Statements | Nunca concatene dados do usuário em SQL |
| 📦 Organizar código | Use `require_once` para separar funções e config |
| 🏷️ Type hints | Declare tipos nos parâmetros e retornos de funções |
| 📝 Convenções | Use camelCase para variáveis e funções |
| 🧪 Testar | Valide dados no servidor (não confie apenas no JavaScript) |
| 🚫 Não exibir erros em produção | Configure `display_errors = Off` |
| 📁 Estrutura de pastas | Separe includes, assets, public |

---

> 📚 **Próximos passos:** Explore os exemplos práticos na pasta `hello_world/` e no projeto `projeto-boletim/` para ver esses conceitos aplicados em código funcional!
