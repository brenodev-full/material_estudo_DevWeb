// ============================================
// 🌍 Hello World em JavaScript
// Arquivo: helloworld.js
// Descrição: Primeiro contato com JavaScript —
// exibe mensagens, declara variáveis e funções.
// ============================================

// === 1. Olá, Mundo! ===
// O console.log() imprime mensagens no console do navegador ou terminal
console.log("Olá, Mundo! 🌍");
console.log("Bem-vindo(a) ao JavaScript!");

// === 2. Declaração de Variáveis ===

// --- var (escopo de função — evite usar em código moderno) ---
var saudacao = "Olá!";
console.log("var saudacao:", saudacao);

// --- let (escopo de bloco — use para valores que mudam) ---
let idade = 25;
console.log("let idade:", idade);

idade = 26; // Reatribuição permitida com let
console.log("let idade (atualizada):", idade);

// --- const (escopo de bloco — use para valores fixos) ---
const PI = 3.14159;
console.log("const PI:", PI);

const linguagem = "JavaScript";
console.log("const linguagem:", linguagem);

// PI = 3.14; // ❌ Isso geraria um erro! const não permite reatribuição.

// === 3. Tipos de Dados Básicos ===
const nome = "Maria";         // String (texto)
const numero = 42;            // Number (número)
const decimal = 9.99;         // Number (decimal)
const verdadeiro = true;      // Boolean (verdadeiro/falso)
const nulo = null;            // Null (ausência intencional de valor)
let indefinido;               // Undefined (valor não definido)

console.log("\n--- Tipos de Dados ---");
console.log("String:", nome, "| typeof:", typeof nome);
console.log("Number:", numero, "| typeof:", typeof numero);
console.log("Decimal:", decimal, "| typeof:", typeof decimal);
console.log("Boolean:", verdadeiro, "| typeof:", typeof verdadeiro);
console.log("Null:", nulo, "| typeof:", typeof nulo); // "object" — bug histórico!
console.log("Undefined:", indefinido, "| typeof:", typeof indefinido);

// === 4. Função Tradicional (Function Declaration) ===
// Funções encapsulam blocos de código reutilizáveis
function saudar(nomeUsuario) {
    // Template literal (crase) permite interpolar variáveis com ${}
    return `Olá, ${nomeUsuario}! Seja bem-vindo(a) ao mundo do JavaScript! 🎉`;
}

// Chamando a função e exibindo o resultado
console.log("\n--- Função Tradicional ---");
console.log(saudar("Carlos"));
console.log(saudar("Ana"));

// === 5. Arrow Function (Função Seta — ES6) ===
// Sintaxe mais moderna e concisa para escrever funções

// Arrow function com múltiplas linhas
const calcularSoma = (a, b) => {
    const resultado = a + b;
    return resultado;
};

// Arrow function com retorno implícito (uma linha)
const calcularProduto = (a, b) => a * b;

// Arrow function sem parâmetros
const dizerOla = () => "Olá do Arrow Function! 🏹";

// Arrow function com um parâmetro (parênteses opcionais)
const dobrar = n => n * 2;

console.log("\n--- Arrow Functions ---");
console.log("Soma (5 + 3):", calcularSoma(5, 3));
console.log("Produto (4 × 7):", calcularProduto(4, 7));
console.log(dizerOla());
console.log("Dobro de 8:", dobrar(8));

// === 6. Comparação: Função Tradicional vs Arrow Function ===
console.log("\n--- Comparação ---");

// Função tradicional
function somar(x, y) {
    return x + y;
}

// Mesma função como arrow function
const somarArrow = (x, y) => x + y;

console.log("Tradicional - somar(10, 20):", somar(10, 20));
console.log("Arrow - somarArrow(10, 20):", somarArrow(10, 20));

// === 7. Pequeno exemplo com Array e forEach ===
console.log("\n--- Array com forEach ---");
const frutas = ["🍎 Maçã", "🍌 Banana", "🍇 Uva", "🍊 Laranja"];

frutas.forEach((fruta, indice) => {
    console.log(`${indice + 1}. ${fruta}`);
});

// === Fim do Hello World ===
console.log("\n✅ Parabéns! Você executou seu primeiro arquivo JavaScript!");
console.log("Continue praticando e explorando os outros exemplos do repositório.");
