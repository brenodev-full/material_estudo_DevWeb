# 📘 Guia Completo de JavaScript

## Sumário

1. [O que é JavaScript?](#o-que-é-javascript)
2. [Variáveis: var, let e const](#variáveis-var-let-e-const)
3. [Tipos de Dados](#tipos-de-dados)
4. [Operadores](#operadores)
5. [Estruturas de Controle](#estruturas-de-controle)
6. [Funções](#funções)
7. [Arrays](#arrays)
8. [Objetos](#objetos)
9. [Manipulação do DOM](#manipulação-do-dom)
10. [Eventos](#eventos)
11. [Template Literals e Métodos de String](#template-literals-e-métodos-de-string)
12. [Expressões Regulares](#expressões-regulares)
13. [Tratamento de Erros](#tratamento-de-erros)
14. [Recursos do ES6+](#recursos-do-es6)
15. [JSON](#json)

---

## O que é JavaScript?

JavaScript é uma **linguagem de programação interpretada**, de alto nível, dinâmica e multiparadigma. Foi criada por **Brendan Eich** em 1995 enquanto trabalhava na Netscape Communications. Inicialmente chamada de "Mocha", depois "LiveScript", e finalmente "JavaScript".

### Histórico

| Ano  | Acontecimento                                                |
| ---- | ------------------------------------------------------------ |
| 1995 | Brendan Eich cria o JavaScript em apenas 10 dias             |
| 1997 | ECMAScript 1 (ES1) — primeira padronização pela ECMA         |
| 1999 | ECMAScript 3 — expressões regulares, try/catch               |
| 2009 | ECMAScript 5 — strict mode, JSON, métodos de array           |
| 2015 | ECMAScript 6 (ES2015) — let/const, arrow functions, classes  |
| 2016+ | Atualizações anuais (ES2016, ES2017, ES2018...)             |

### ECMAScript

**ECMAScript** é a especificação padronizada pela ECMA International que define a linguagem. JavaScript é a implementação mais popular dessa especificação. Outros exemplos incluem ActionScript e JScript.

### Onde o JavaScript é utilizado?

- **Front-end**: Manipulação do DOM, interatividade em páginas web
- **Back-end**: Node.js permite rodar JavaScript no servidor
- **Mobile**: React Native, Ionic, Flutter (Dart, mas usa conceitos JS)
- **Desktop**: Electron (VS Code, Discord, Slack)
- **IoT**: Johnny-Five, Espruino

---

## Variáveis: var, let e const

Variáveis são espaços na memória que armazenam valores. Em JavaScript, temos três formas de declarar variáveis:

### `var` (evite usar em código moderno)

```javascript
// var tem escopo de função (function scope)
// Pode ser redeclarada e reatribuída
// Sofre "hoisting" — é elevada ao topo do escopo
var nome = "Maria";
var nome = "João"; // Redeclaração permitida (perigoso!)
nome = "Pedro";    // Reatribuição permitida

// Problema do var: escopo de função, não de bloco
if (true) {
    var vazou = "Eu vazei do bloco!";
}
console.log(vazou); // "Eu vazei do bloco!" — var ignora blocos!
```

### `let` (use para valores que mudam)

```javascript
// let tem escopo de bloco (block scope)
// NÃO pode ser redeclarada no mesmo escopo
// PODE ser reatribuída
let idade = 25;
// let idade = 30; // ❌ Erro! Não pode redeclarar
idade = 30;        // ✅ Reatribuição permitida

// let respeita o escopo de bloco
if (true) {
    let dentroDoBloco = "Só existo aqui";
}
// console.log(dentroDoBloco); // ❌ Erro! Não existe fora do bloco
```

### `const` (use para valores que NÃO mudam)

```javascript
// const tem escopo de bloco (block scope)
// NÃO pode ser redeclarada
// NÃO pode ser reatribuída
const PI = 3.14159;
// PI = 3.14; // ❌ Erro! Não pode reatribuir

// ATENÇÃO: const com objetos e arrays
// A referência não muda, mas o conteúdo pode ser alterado!
const pessoa = { nome: "Ana" };
pessoa.nome = "Beatriz"; // ✅ Isso funciona!
// pessoa = {};          // ❌ Isso dá erro!

const lista = [1, 2, 3];
lista.push(4);  // ✅ Funciona! O array é o mesmo, só adicionamos um item
// lista = [];  // ❌ Erro! Não pode reatribuir a referência
```

### Regra Prática

> 🎯 **Use `const` por padrão. Use `let` quando precisar reatribuir. Evite `var`.**

### Hoisting (Içamento)

```javascript
// var é "içada" ao topo do escopo, mas sem o valor
console.log(x); // undefined (hoisting — var x é içada, mas não o valor)
var x = 10;

// let e const também sofrem hoisting, mas ficam na "Temporal Dead Zone"
// console.log(y); // ❌ ReferenceError — y está na TDZ
let y = 20;
```

---

## Tipos de Dados

JavaScript possui **8 tipos de dados**, divididos em **primitivos** e **referência**.

### Tipos Primitivos (armazenam valor direto)

```javascript
// 1. String — texto
let nome = "JavaScript";
let sobrenome = 'da Silva';
let frase = `Olá, ${nome}!`; // Template literal (ES6)

// 2. Number — números inteiros e decimais
let inteiro = 42;
let decimal = 3.14;
let negativo = -10;
let infinito = Infinity;
let naoNumero = NaN; // Not a Number (resultado de operações inválidas)

// 3. Boolean — verdadeiro ou falso
let ativo = true;
let bloqueado = false;

// 4. Null — ausência intencional de valor
let vazio = null; // "Eu sei que não tem nada aqui"

// 5. Undefined — variável declarada mas sem valor atribuído
let indefinido;        // undefined
let tambem = undefined; // explicitamente undefined

// 6. Symbol (ES6) — valor único e imutável, usado como identificador
let id = Symbol("id");
let outroId = Symbol("id");
console.log(id === outroId); // false — cada Symbol é único!

// 7. BigInt (ES2020) — números inteiros muito grandes
let grande = 9007199254740991n; // note o 'n' no final
let outroBig = BigInt("123456789012345678901234567890");
```

### Tipo de Referência (armazena referência na memória)

```javascript
// 8. Object — estrutura de dados chave-valor
let pessoa = {
    nome: "Carlos",
    idade: 30
};

// Arrays são objetos especiais
let frutas = ["maçã", "banana", "uva"];

// Funções também são objetos!
function saudacao() {
    return "Olá!";
}
```

### Verificando Tipos com `typeof`

```javascript
console.log(typeof "texto");       // "string"
console.log(typeof 42);            // "number"
console.log(typeof true);          // "boolean"
console.log(typeof undefined);     // "undefined"
console.log(typeof null);          // "object" ← Bug histórico do JS!
console.log(typeof {});            // "object"
console.log(typeof []);            // "object" ← Use Array.isArray([])
console.log(typeof function(){}); // "function"
console.log(typeof Symbol());     // "symbol"
console.log(typeof 10n);          // "bigint"
```

### Valores Falsy e Truthy

```javascript
// Valores FALSY (avaliados como false em contexto booleano):
// false, 0, -0, 0n, "", null, undefined, NaN

// Valores TRUTHY (tudo que não é falsy):
// "texto", 1, -1, [], {}, function(){}, "0", "false"

if ("") console.log("Não aparece"); // string vazia é falsy
if ("0") console.log("Aparece!");    // string "0" é truthy
if (0) console.log("Não aparece");   // zero é falsy
if ([]) console.log("Aparece!");     // array vazio é truthy (cuidado!)
```

---

## Operadores

### Operadores Aritméticos

```javascript
let a = 10, b = 3;

console.log(a + b);  // 13  — Adição
console.log(a - b);  // 7   — Subtração
console.log(a * b);  // 30  — Multiplicação
console.log(a / b);  // 3.333... — Divisão
console.log(a % b);  // 1   — Módulo (resto da divisão)
console.log(a ** b); // 1000 — Exponenciação (ES2016)

// Incremento e Decremento
let x = 5;
x++;      // x = 6 (pós-incremento)
++x;      // x = 7 (pré-incremento)
x--;      // x = 6 (pós-decremento)

// Operadores de atribuição combinados
x += 3;   // x = x + 3
x -= 2;   // x = x - 2
x *= 4;   // x = x * 4
x /= 2;   // x = x / 2
x %= 3;   // x = x % 3
```

### Operadores de Comparação: `==` vs `===`

```javascript
// == (igualdade abstrata) — compara VALOR, fazendo coerção de tipo
console.log(5 == "5");     // true  — "5" é convertido para número
console.log(0 == false);   // true  — false é convertido para 0
console.log(null == undefined); // true — caso especial
console.log("" == false);  // true  — ambos viram 0

// === (igualdade estrita) — compara VALOR E TIPO, sem coerção
console.log(5 === "5");    // false — number !== string
console.log(0 === false);  // false — number !== boolean
console.log(null === undefined); // false — tipos diferentes

// != (diferente com coerção) vs !== (diferente sem coerção)
console.log(5 != "5");    // false — são "iguais" com coerção
console.log(5 !== "5");   // true  — tipos diferentes

// Operadores de comparação relacional
console.log(10 > 5);   // true
console.log(10 < 5);   // false
console.log(10 >= 10); // true
console.log(10 <= 9);  // false
```

> 🎯 **Sempre use `===` e `!==` para evitar bugs de coerção!**

### Operadores Lógicos

```javascript
// && (E lógico) — retorna o primeiro valor falsy OU o último truthy
console.log(true && true);    // true
console.log(true && false);   // false
console.log("Olá" && 42);    // 42 (ambos truthy, retorna o último)
console.log(0 && "texto");   // 0  (primeiro é falsy, retorna ele)

// || (OU lógico) — retorna o primeiro valor truthy OU o último falsy
console.log(false || true);   // true
console.log("" || "padrão"); // "padrão" (primeiro é falsy)
console.log("valor" || "padrão"); // "valor" (primeiro é truthy)

// ! (NÃO lógico) — inverte o valor booleano
console.log(!true);    // false
console.log(!0);       // true (0 é falsy, invertido vira true)
console.log(!!"texto"); // true (dupla negação converte para boolean)

// ?? (Nullish Coalescing — ES2020) — retorna o lado direito apenas se
// o lado esquerdo for null ou undefined (diferente do ||)
console.log(null ?? "padrão");      // "padrão"
console.log(undefined ?? "padrão"); // "padrão"
console.log(0 ?? "padrão");         // 0 (0 NÃO é null/undefined)
console.log("" ?? "padrão");        // "" ("" NÃO é null/undefined)
```

### Operador Ternário

```javascript
// condição ? valorSeVerdadeiro : valorSeFalso
let idade = 18;
let status = idade >= 18 ? "Maior de idade" : "Menor de idade";
console.log(status); // "Maior de idade"

// Ternários encadeados (use com moderação — prejudica legibilidade)
let nota = 8;
let conceito = nota >= 9 ? "A"
             : nota >= 7 ? "B"
             : nota >= 5 ? "C"
             : "D";
```

---

## Estruturas de Controle

### if / else if / else

```javascript
let temperatura = 30;

if (temperatura > 35) {
    console.log("Está muito quente! 🥵");
} else if (temperatura > 25) {
    console.log("Está quente ☀️");
} else if (temperatura > 15) {
    console.log("Temperatura agradável 😊");
} else {
    console.log("Está frio! 🥶");
}
```

### switch

```javascript
let diaDaSemana = 3;

switch (diaDaSemana) {
    case 1:
        console.log("Segunda-feira");
        break; // Sem break, "cai" para o próximo case!
    case 2:
        console.log("Terça-feira");
        break;
    case 3:
        console.log("Quarta-feira");
        break;
    case 4:
        console.log("Quinta-feira");
        break;
    case 5:
        console.log("Sexta-feira");
        break;
    case 6:
    case 7:
        console.log("Final de semana! 🎉");
        break;
    default:
        console.log("Dia inválido");
}
```

### for (clássico)

```javascript
// for (inicialização; condição; incremento)
for (let i = 0; i < 5; i++) {
    console.log(`Iteração ${i}`);
}
// Resultado: 0, 1, 2, 3, 4
```

### while

```javascript
// Executa enquanto a condição for verdadeira
// A condição é verificada ANTES de cada iteração
let contador = 0;
while (contador < 3) {
    console.log(`Contagem: ${contador}`);
    contador++;
}
```

### do...while

```javascript
// Executa pelo menos UMA VEZ, depois verifica a condição
let numero = 10;
do {
    console.log(`Número: ${numero}`);
    numero++;
} while (numero < 3);
// Imprime "Número: 10" mesmo que a condição seja falsa
```

### for...of (itera sobre VALORES de iteráveis)

```javascript
// Perfeito para arrays, strings, Map, Set
const frutas = ["maçã", "banana", "uva"];

for (const fruta of frutas) {
    console.log(fruta); // "maçã", "banana", "uva"
}

// Funciona com strings também
for (const letra of "Olá") {
    console.log(letra); // "O", "l", "á"
}
```

### for...in (itera sobre CHAVES/PROPRIEDADES de objetos)

```javascript
// Ideal para objetos (não recomendado para arrays)
const carro = {
    marca: "Toyota",
    modelo: "Corolla",
    ano: 2024
};

for (const chave in carro) {
    console.log(`${chave}: ${carro[chave]}`);
}
// "marca: Toyota", "modelo: Corolla", "ano: 2024"
```

---

## Funções

### Declaração de Função (Function Declaration)

```javascript
// Sofre hoisting — pode ser chamada antes da declaração
function saudacao(nome) {
    return `Olá, ${nome}! Bem-vindo(a)!`;
}

console.log(saudacao("Maria")); // "Olá, Maria! Bem-vindo(a)!"
```

### Expressão de Função (Function Expression)

```javascript
// NÃO sofre hoisting — deve ser declarada antes de usar
const calcularArea = function(largura, altura) {
    return largura * altura;
};

console.log(calcularArea(5, 3)); // 15
```

### Arrow Function (Função Seta — ES6)

```javascript
// Sintaxe mais curta e concisa
const dobrar = (numero) => {
    return numero * 2;
};

// Se tiver apenas uma expressão, pode omitir { } e return
const triplicar = (numero) => numero * 3;

// Se tiver apenas um parâmetro, pode omitir os parênteses
const quadruplicar = numero => numero * 4;

// Sem parâmetros, precisa dos parênteses vazios
const dizerOla = () => "Olá!";

// Retornando um objeto literal (precisa de parênteses extras)
const criarPessoa = (nome, idade) => ({ nome, idade });
```

### Parâmetros Padrão (Default Parameters)

```javascript
function criarUsuario(nome, papel = "visitante", ativo = true) {
    return { nome, papel, ativo };
}

console.log(criarUsuario("Ana"));
// { nome: "Ana", papel: "visitante", ativo: true }

console.log(criarUsuario("Carlos", "admin"));
// { nome: "Carlos", papel: "admin", ativo: true }
```

### Rest Parameters (Parâmetros Rest)

```javascript
// Coleta argumentos extras em um array
function somar(...numeros) {
    return numeros.reduce((total, num) => total + num, 0);
}

console.log(somar(1, 2, 3, 4, 5)); // 15
```

### Callbacks (Funções como Argumentos)

```javascript
// Uma callback é uma função passada como argumento para outra função
function processarDados(dados, callback) {
    const resultado = callback(dados);
    console.log(`Resultado: ${resultado}`);
}

processarDados(5, (x) => x * 2);     // "Resultado: 10"
processarDados("olá", (s) => s.toUpperCase()); // "Resultado: OLÁ"

// Exemplo prático: simulando uma operação assíncrona
function buscarUsuario(id, sucesso, erro) {
    if (id > 0) {
        sucesso({ id, nome: "Usuário " + id });
    } else {
        erro("ID inválido!");
    }
}

buscarUsuario(
    1,
    (usuario) => console.log("Encontrado:", usuario),
    (mensagem) => console.log("Erro:", mensagem)
);
```

### IIFE (Immediately Invoked Function Expression)

```javascript
// Função que executa imediatamente ao ser definida
(function() {
    const segredo = "Estou encapsulado!";
    console.log(segredo);
})();
// 'segredo' não existe fora deste escopo
```

### Closures (Fechamentos)

```javascript
// Uma closure é uma função que "lembra" do ambiente onde foi criada
function criarContador() {
    let contagem = 0; // Esta variável fica "presa" na closure

    return {
        incrementar: () => ++contagem,
        decrementar: () => --contagem,
        valor: () => contagem
    };
}

const contador = criarContador();
console.log(contador.incrementar()); // 1
console.log(contador.incrementar()); // 2
console.log(contador.decrementar()); // 1
console.log(contador.valor());       // 1
```

---

## Arrays

Arrays são listas ordenadas de valores, acessados por índice (começando em 0).

```javascript
// Criando arrays
const numeros = [10, 20, 30, 40, 50];
const misto = [1, "texto", true, null, { nome: "Ana" }];
const vazio = [];
const comNew = new Array(5); // Cria array com 5 posições vazias
```

### Métodos de Modificação (alteram o array original)

```javascript
let frutas = ["maçã", "banana"];

// push — adiciona no FINAL e retorna o novo tamanho
frutas.push("uva");          // ["maçã", "banana", "uva"]
frutas.push("manga", "kiwi"); // Pode adicionar vários

// pop — remove do FINAL e retorna o elemento removido
let ultima = frutas.pop();   // Remove "kiwi"

// unshift — adiciona no INÍCIO
frutas.unshift("morango");   // ["morango", "maçã", "banana", "uva", "manga"]

// shift — remove do INÍCIO e retorna o elemento removido
let primeira = frutas.shift(); // Remove "morango"

// splice — remove/insere elementos em qualquer posição
// splice(índiceInício, quantidadeRemover, ...elementosAdicionar)
let cores = ["vermelho", "azul", "verde", "amarelo"];
cores.splice(1, 2);              // Remove "azul" e "verde"
// ["vermelho", "amarelo"]
cores.splice(1, 0, "roxo", "rosa"); // Insere sem remover
// ["vermelho", "roxo", "rosa", "amarelo"]

// sort — ordena o array (in-place)
let letras = ["c", "a", "b"];
letras.sort(); // ["a", "b", "c"]

// Para números, precisa de função comparadora!
let nums = [10, 1, 21, 2];
nums.sort();                    // ["1", "10", "2", "21"] ❌ Ordena como string!
nums.sort((a, b) => a - b);    // [1, 2, 10, 21] ✅ Ordem crescente
nums.sort((a, b) => b - a);    // [21, 10, 2, 1] Ordem decrescente

// reverse — inverte a ordem
nums.reverse();
```

### Métodos de Acesso (NÃO alteram o original)

```javascript
let numeros = [1, 2, 3, 4, 5, 3];

// slice — retorna uma cópia parcial do array
let parte = numeros.slice(1, 4);  // [2, 3, 4] (índice 1 até 3)
let copia = numeros.slice();       // Cópia completa

// includes — verifica se o elemento existe (retorna boolean)
console.log(numeros.includes(3));  // true
console.log(numeros.includes(99)); // false

// indexOf — retorna o índice da primeira ocorrência (-1 se não encontrar)
console.log(numeros.indexOf(3));   // 2

// concat — junta arrays
let a = [1, 2];
let b = [3, 4];
let c = a.concat(b); // [1, 2, 3, 4]

// join — transforma em string
console.log(numeros.join(", ")); // "1, 2, 3, 4, 5, 3"
```

### Métodos de Iteração (os mais importantes!)

```javascript
const produtos = [
    { nome: "Notebook", preco: 3500 },
    { nome: "Mouse", preco: 80 },
    { nome: "Teclado", preco: 200 },
    { nome: "Monitor", preco: 1500 },
    { nome: "Webcam", preco: 150 }
];

// forEach — executa uma função para cada elemento (não retorna nada)
produtos.forEach((produto, indice) => {
    console.log(`${indice + 1}. ${produto.nome} — R$ ${produto.preco}`);
});

// map — transforma cada elemento e retorna um NOVO array
const nomes = produtos.map(produto => produto.nome);
// ["Notebook", "Mouse", "Teclado", "Monitor", "Webcam"]

const comDesconto = produtos.map(produto => ({
    ...produto,
    precoComDesconto: produto.preco * 0.9 // 10% de desconto
}));

// filter — filtra elementos que passam no teste (retorna NOVO array)
const caros = produtos.filter(produto => produto.preco > 500);
// [{ nome: "Notebook", preco: 3500 }, { nome: "Monitor", preco: 1500 }]

const baratos = produtos.filter(produto => produto.preco <= 200);

// find — retorna o PRIMEIRO elemento que passa no teste (ou undefined)
const mouse = produtos.find(produto => produto.nome === "Mouse");
// { nome: "Mouse", preco: 80 }

// reduce — reduz o array a um único valor (acumulador)
const total = produtos.reduce((acumulador, produto) => {
    return acumulador + produto.preco;
}, 0); // 0 é o valor inicial do acumulador
console.log(total); // 5430

// Encadeamento de métodos (method chaining) — muito poderoso!
const resultado = produtos
    .filter(p => p.preco > 100)       // Filtra produtos acima de R$100
    .map(p => p.nome)                  // Pega só os nomes
    .join(", ");                        // Junta em uma string
console.log(resultado); // "Notebook, Teclado, Monitor, Webcam"

// some — verifica se ALGUM elemento passa no teste (retorna boolean)
const temCaro = produtos.some(p => p.preco > 3000); // true

// every — verifica se TODOS passam no teste
const todosCasos = produtos.every(p => p.preco > 50); // true

// findIndex — retorna o ÍNDICE do primeiro elemento que passa
const indiceMouse = produtos.findIndex(p => p.nome === "Mouse"); // 1
```

---

## Objetos

Objetos são coleções de propriedades (pares chave-valor).

```javascript
// Criando objetos
const pessoa = {
    nome: "Ana Maria",
    idade: 28,
    profissao: "Desenvolvedora",
    hobbies: ["leitura", "programação", "música"],

    // Método (função dentro de um objeto)
    apresentar() {
        return `Olá! Sou ${this.nome}, tenho ${this.idade} anos.`;
    },

    // Getter — acessa como propriedade, mas executa lógica
    get maiorDeIdade() {
        return this.idade >= 18;
    }
};

// Acessando propriedades
console.log(pessoa.nome);          // Notação de ponto
console.log(pessoa["profissao"]);  // Notação de colchete

// Adicionando novas propriedades
pessoa.email = "ana@email.com";

// Removendo propriedades
delete pessoa.email;

// Verificando se propriedade existe
console.log("nome" in pessoa); // true
console.log(pessoa.hasOwnProperty("idade")); // true
```

### Destructuring (Desestruturação — ES6)

```javascript
// Extraindo propriedades em variáveis individuais
const { nome, idade, profissao } = pessoa;
console.log(nome); // "Ana Maria"

// Renomeando durante a desestruturação
const { nome: nomeCompleto, idade: anos } = pessoa;
console.log(nomeCompleto); // "Ana Maria"

// Valor padrão se a propriedade não existir
const { telefone = "Não informado" } = pessoa;

// Desestruturação aninhada
const empresa = {
    nome: "TechCorp",
    endereco: {
        cidade: "São Paulo",
        estado: "SP"
    }
};
const { endereco: { cidade, estado } } = empresa;

// Desestruturação de arrays
const [primeiro, segundo, ...resto] = [1, 2, 3, 4, 5];
console.log(primeiro); // 1
console.log(resto);    // [3, 4, 5]

// Desestruturação em parâmetros de função
function exibirProduto({ nome, preco, categoria = "Geral" }) {
    console.log(`${nome} - R$ ${preco} (${categoria})`);
}
exibirProduto({ nome: "Notebook", preco: 3500 });
```

### Spread Operator (Operador de Espalhamento — ES6)

```javascript
// Espalhando arrays
const nums1 = [1, 2, 3];
const nums2 = [4, 5, 6];
const todos = [...nums1, ...nums2]; // [1, 2, 3, 4, 5, 6]

// Copiando arrays (cópia rasa)
const copiaArray = [...nums1];

// Espalhando objetos
const baseConfig = { tema: "escuro", idioma: "pt-BR" };
const userConfig = { ...baseConfig, idioma: "en", fonte: 14 };
// { tema: "escuro", idioma: "en", fonte: 14 } — idioma foi sobrescrito

// Mesclando objetos
const objetoFinal = { ...obj1, ...obj2, ...obj3 };
```

### Métodos Úteis de Object

```javascript
const carro = { marca: "Ford", modelo: "Ka", ano: 2022 };

// Object.keys — retorna array com as chaves
console.log(Object.keys(carro));   // ["marca", "modelo", "ano"]

// Object.values — retorna array com os valores
console.log(Object.values(carro)); // ["Ford", "Ka", 2022]

// Object.entries — retorna array de pares [chave, valor]
console.log(Object.entries(carro));
// [["marca", "Ford"], ["modelo", "Ka"], ["ano", 2022]]

// Object.assign — copia propriedades (superficialmente)
const novoCarro = Object.assign({}, carro, { cor: "prata" });

// Object.freeze — torna o objeto imutável
Object.freeze(carro);
carro.marca = "Chevrolet"; // Silenciosamente ignorado (ou erro em strict mode)
```

---

## Manipulação do DOM

O **DOM (Document Object Model)** é a representação em árvore do HTML que o JavaScript pode manipular.

### Selecionando Elementos

```javascript
// Por ID (retorna UM elemento ou null)
const titulo = document.getElementById("titulo");

// Por classe (retorna HTMLCollection — lista viva)
const cards = document.getElementsByClassName("card");

// Por tag (retorna HTMLCollection)
const paragrafos = document.getElementsByTagName("p");

// querySelector — seleciona o PRIMEIRO que corresponde ao seletor CSS
const primeiroBotao = document.querySelector(".btn");
const elementoId = document.querySelector("#meu-id");
const inputEmail = document.querySelector('input[type="email"]');

// querySelectorAll — seleciona TODOS (retorna NodeList — lista estática)
const todosOsBotoes = document.querySelectorAll(".btn");
const todosOsLinks = document.querySelectorAll("a[href^='https']");
```

### Modificando Elementos

```javascript
const elemento = document.querySelector("#conteudo");

// textContent — texto puro (mais seguro, mais performático)
elemento.textContent = "Novo texto aqui";

// innerHTML — HTML interpretado (cuidado com XSS!)
elemento.innerHTML = "<strong>Texto em negrito</strong>";

// innerText — similar ao textContent, mas respeita estilos CSS
elemento.innerText = "Texto visível";

// Atributos
elemento.setAttribute("data-id", "123");
elemento.getAttribute("data-id");    // "123"
elemento.removeAttribute("data-id");
elemento.id = "novoId";
elemento.src = "imagem.jpg";

// Classes CSS
elemento.classList.add("ativo", "destaque");
elemento.classList.remove("ativo");
elemento.classList.toggle("visivel"); // Adiciona se não tem, remove se tem
elemento.classList.contains("destaque"); // true ou false
elemento.classList.replace("destaque", "sutil");

// Estilos inline
elemento.style.color = "red";
elemento.style.backgroundColor = "#f0f0f0"; // camelCase!
elemento.style.display = "none";
elemento.style.fontSize = "18px";
```

### Criando e Inserindo Elementos

```javascript
// Criando um novo elemento
const novoDiv = document.createElement("div");
novoDiv.textContent = "Eu fui criado com JavaScript!";
novoDiv.classList.add("card");

// Adicionando ao final de um elemento pai
document.querySelector("#container").appendChild(novoDiv);

// Inserindo em posições específicas (método moderno)
const pai = document.querySelector("#lista");
const referencia = document.querySelector("#item3");

// Antes de um elemento específico
pai.insertBefore(novoDiv, referencia);

// Métodos modernos (mais intuitivos)
pai.prepend(novoDiv);       // No início do pai
pai.append(novoDiv);        // No final do pai
referencia.before(novoDiv); // Antes do elemento
referencia.after(novoDiv);  // Depois do elemento

// Removendo elementos
novoDiv.remove(); // Remove o próprio elemento

// Removendo um filho
pai.removeChild(referencia);

// Clonando elementos
const clone = novoDiv.cloneNode(true); // true = clona filhos também
```

---

## Eventos

Eventos são ações que ocorrem no navegador (cliques, teclas, scroll, etc.).

### addEventListener (melhor abordagem)

```javascript
const botao = document.querySelector("#meuBotao");

// addEventListener(tipoEvento, funçãoCallback)
botao.addEventListener("click", function(evento) {
    console.log("Botão clicado!");
    console.log("Elemento:", evento.target);
});

// Com arrow function
botao.addEventListener("click", (e) => {
    e.target.textContent = "Clicado!";
});
```

### Tipos de Eventos Comuns

```javascript
// === EVENTOS DE MOUSE ===
elemento.addEventListener("click", () => {});       // Clique
elemento.addEventListener("dblclick", () => {});     // Duplo clique
elemento.addEventListener("mouseenter", () => {});   // Mouse entra
elemento.addEventListener("mouseleave", () => {});   // Mouse sai
elemento.addEventListener("mousemove", (e) => {      // Mouse move
    console.log(`X: ${e.clientX}, Y: ${e.clientY}`);
});

// === EVENTOS DE TECLADO ===
document.addEventListener("keydown", (e) => {        // Tecla pressionada
    console.log(`Tecla: ${e.key}, Código: ${e.code}`);
    if (e.key === "Escape") console.log("ESC pressionado!");
    if (e.ctrlKey && e.key === "s") {
        e.preventDefault(); // Impede o comportamento padrão (salvar)
        console.log("Ctrl+S interceptado!");
    }
});
document.addEventListener("keyup", () => {});        // Tecla solta

// === EVENTOS DE FORMULÁRIO ===
const form = document.querySelector("form");

form.addEventListener("submit", (e) => {
    e.preventDefault(); // Impede o envio padrão do formulário!
    const dados = new FormData(form);
    console.log("Nome:", dados.get("nome"));
});

const input = document.querySelector("input");
input.addEventListener("input", (e) => {             // Cada alteração
    console.log("Valor atual:", e.target.value);
});
input.addEventListener("change", () => {});           // Ao sair do campo
input.addEventListener("focus", () => {});            // Ao focar
input.addEventListener("blur", () => {});             // Ao desfocar

// === EVENTOS DE JANELA ===
window.addEventListener("load", () => {});            // Página totalmente carregada
window.addEventListener("resize", () => {});          // Janela redimensionada
window.addEventListener("scroll", () => {});          // Rolagem da página

// DOMContentLoaded — DOM pronto (não espera imagens/CSS)
document.addEventListener("DOMContentLoaded", () => {
    console.log("DOM carregado e pronto!");
});
```

### Objeto Event (evento)

```javascript
botao.addEventListener("click", function(evento) {
    // Propriedades importantes do objeto evento:
    console.log(evento.type);          // "click"
    console.log(evento.target);        // O elemento que disparou o evento
    console.log(evento.currentTarget); // O elemento que tem o listener
    console.log(evento.timeStamp);     // Quando o evento ocorreu

    // Métodos importantes:
    evento.preventDefault();   // Impede comportamento padrão
    evento.stopPropagation();  // Impede propagação (bubbling)
});
```

### preventDefault

```javascript
// Impede o comportamento padrão do navegador
const link = document.querySelector("a");
link.addEventListener("click", (e) => {
    e.preventDefault(); // O link NÃO vai navegar
    console.log("Link clicado, mas navegação impedida!");
});

// Muito usado em formulários
const formulario = document.querySelector("form");
formulario.addEventListener("submit", (e) => {
    e.preventDefault(); // Impede o recarregamento da página
    // Agora podemos processar os dados com JavaScript
});
```

### Event Delegation (Delegação de Eventos)

```javascript
// Em vez de adicionar listener em cada item, adiciona no pai
const lista = document.querySelector("#minha-lista");

lista.addEventListener("click", (e) => {
    // Verifica se o clique foi em um <li>
    if (e.target.tagName === "LI") {
        e.target.classList.toggle("concluido");
    }
});
// Vantagem: funciona mesmo para itens adicionados dinamicamente!
```

---

## Template Literals e Métodos de String

### Template Literals (Crases — ES6)

```javascript
const nome = "Carlos";
const idade = 30;

// Interpolação de variáveis
const mensagem = `Olá, ${nome}! Você tem ${idade} anos.`;

// Expressões dentro de ${}
const preco = 49.90;
const desconto = 0.15;
console.log(`Preço com desconto: R$ ${(preco * (1 - desconto)).toFixed(2)}`);

// Strings multilinhas (sem necessidade de \n)
const html = `
    <div class="card">
        <h2>${nome}</h2>
        <p>Idade: ${idade}</p>
    </div>
`;

// Chamada de funções dentro de ${}
const formatarMoeda = (valor) =>
    valor.toLocaleString("pt-BR", { style: "currency", currency: "BRL" });
console.log(`Total: ${formatarMoeda(1499.90)}`); // "Total: R$ 1.499,90"
```

### Métodos de String

```javascript
const texto = "  JavaScript é incrível!  ";

// Verificação
texto.includes("incrível");    // true — contém a substring?
texto.startsWith("  Java");    // true — começa com?
texto.endsWith("!  ");         // true — termina com?

// Busca
texto.indexOf("Script");       // 6 — posição da primeira ocorrência
texto.lastIndexOf("é");        // 15 — posição da última ocorrência
texto.search(/incrível/i);     // 16 — busca com regex

// Extração
texto.slice(2, 12);            // "JavaScript" — extrai do índice 2 ao 11
texto.substring(2, 12);        // "JavaScript" — similar ao slice
texto.charAt(2);               // "J" — caractere na posição

// Transformação
texto.toUpperCase();           // "  JAVASCRIPT É INCRÍVEL!  "
texto.toLowerCase();           // "  javascript é incrível!  "
texto.trim();                  // "JavaScript é incrível!" — remove espaços
texto.trimStart();             // "JavaScript é incrível!  "
texto.trimEnd();               // "  JavaScript é incrível!"

// Substituição
texto.replace("incrível", "fantástico");    // Substitui primeira ocorrência
texto.replaceAll("a", "@");                 // Substitui todas (ES2021)

// Divisão
"maçã,banana,uva".split(",");  // ["maçã", "banana", "uva"]
"Olá Mundo".split(" ");        // ["Olá", "Mundo"]
"abc".split("");                // ["a", "b", "c"]

// Repetição
"ha".repeat(3);                // "hahaha"

// Preenchimento (padding)
"5".padStart(3, "0");          // "005"
"42".padEnd(5, ".");           // "42..."
```

---

## Expressões Regulares

Expressões regulares (regex) são padrões usados para busca e validação de texto.

```javascript
// Criando regex
const regex1 = /padrão/;              // Literal
const regex2 = new RegExp("padrão"); // Construtor

// Flags (modificadores)
const regexI = /javascript/i;   // i = case-insensitive
const regexG = /a/g;            // g = global (todas as ocorrências)
const regexM = /^linha/m;       // m = multiline

// Métodos
const texto = "Meu CPF é 123.456.789-00";
console.log(/\d{3}/.test(texto));        // true — tem 3 dígitos?
console.log(texto.match(/\d+/g));        // ["123", "456", "789", "00"]
console.log(texto.replace(/\d/g, "X")); // "Meu CPF é XXX.XXX.XXX-XX"
```

### Metacaracteres Essenciais

```javascript
// .     — Qualquer caractere (exceto \n)
// \d    — Dígito [0-9]
// \D    — NÃO dígito
// \w    — Palavra [a-zA-Z0-9_]
// \W    — NÃO palavra
// \s    — Espaço em branco
// \S    — NÃO espaço
// ^     — Início da string
// $     — Final da string
// []    — Conjunto de caracteres
// [^]   — Negação do conjunto
// |     — OU
// ()    — Grupo de captura
// {n}   — Exatamente n repetições
// {n,m} — De n até m repetições
// +     — Uma ou mais repetições
// *     — Zero ou mais repetições
// ?     — Zero ou uma repetição

// Exemplos práticos de validação
const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexCPF = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
const regexTelefone = /^\(\d{2}\)\s?\d{4,5}-\d{4}$/;
const regexCEP = /^\d{5}-\d{3}$/;
```

---

## Tratamento de Erros

### try / catch / finally

```javascript
try {
    // Código que pode gerar erro
    const resultado = funcaoPerigosa();
    console.log(resultado);
} catch (erro) {
    // Executado se houver erro no try
    console.error("Ocorreu um erro:", erro.message);
    console.error("Tipo:", erro.name);      // TypeError, ReferenceError, etc.
    console.error("Stack:", erro.stack);     // Rastreamento da pilha
} finally {
    // SEMPRE é executado, com ou sem erro
    console.log("Bloco finally: limpeza de recursos");
}
```

### Lançando Erros Personalizados (throw)

```javascript
function dividir(a, b) {
    if (typeof a !== "number" || typeof b !== "number") {
        throw new TypeError("Os argumentos devem ser números!");
    }
    if (b === 0) {
        throw new Error("Divisão por zero não é permitida!");
    }
    return a / b;
}

try {
    console.log(dividir(10, 0));
} catch (e) {
    console.error(e.message); // "Divisão por zero não é permitida!"
}

// Erros personalizados
class ValidacaoErro extends Error {
    constructor(campo, mensagem) {
        super(mensagem);
        this.name = "ValidacaoErro";
        this.campo = campo;
    }
}

function validarIdade(idade) {
    if (idade < 0 || idade > 150) {
        throw new ValidacaoErro("idade", `Idade inválida: ${idade}`);
    }
    return true;
}
```

---

## Recursos do ES6+

### Classes (ES6)

```javascript
class Animal {
    // Construtor — chamado ao criar uma instância com 'new'
    constructor(nome, tipo) {
        this.nome = nome;
        this.tipo = tipo;
    }

    // Método
    falar() {
        console.log(`${this.nome} faz um som.`);
    }

    // Método estático — chamado na classe, não na instância
    static criarGato(nome) {
        return new Animal(nome, "Gato");
    }
}

// Herança
class Cachorro extends Animal {
    constructor(nome, raca) {
        super(nome, "Cachorro"); // Chama o construtor pai
        this.raca = raca;
    }

    falar() {
        console.log(`${this.nome} late: Au au! 🐕`);
    }
}

const rex = new Cachorro("Rex", "Pastor Alemão");
rex.falar(); // "Rex late: Au au! 🐕"
```

### Promises e Async/Await

```javascript
// Promise — representa uma operação assíncrona
function buscarDados(url) {
    return new Promise((resolve, reject) => {
        // Simulando uma requisição
        setTimeout(() => {
            if (url) {
                resolve({ dados: "Sucesso!", url });
            } else {
                reject(new Error("URL não fornecida"));
            }
        }, 1000);
    });
}

// Usando .then/.catch
buscarDados("https://api.exemplo.com")
    .then(resultado => console.log(resultado))
    .catch(erro => console.error(erro))
    .finally(() => console.log("Finalizado"));

// Async/Await (ES2017) — forma mais elegante
async function carregarDados() {
    try {
        const resultado = await buscarDados("https://api.exemplo.com");
        console.log(resultado);
    } catch (erro) {
        console.error("Erro:", erro.message);
    }
}

// Fetch API — requisições HTTP nativas
async function buscarUsuarios() {
    try {
        const resposta = await fetch("https://jsonplaceholder.typicode.com/users");
        if (!resposta.ok) throw new Error(`HTTP Error: ${resposta.status}`);
        const usuarios = await resposta.json();
        console.log(usuarios);
    } catch (erro) {
        console.error("Falha na requisição:", erro);
    }
}
```

### Map e Set (ES6)

```javascript
// Map — coleção de pares chave-valor (chaves podem ser qualquer tipo)
const mapa = new Map();
mapa.set("nome", "Ana");
mapa.set(42, "quarenta e dois");
mapa.set(true, "verdadeiro");
console.log(mapa.get("nome")); // "Ana"
console.log(mapa.size);        // 3
mapa.has("nome");               // true
mapa.delete(42);

// Set — coleção de valores ÚNICOS
const conjunto = new Set([1, 2, 3, 3, 3, 4, 5]);
console.log(conjunto); // Set {1, 2, 3, 4, 5} — sem duplicatas!
conjunto.add(6);
conjunto.has(3);    // true
conjunto.delete(1);

// Uso prático: remover duplicatas de um array
const comDuplicatas = [1, 2, 2, 3, 3, 3, 4];
const semDuplicatas = [...new Set(comDuplicatas)]; // [1, 2, 3, 4]
```

### Optional Chaining e Nullish Coalescing (ES2020)

```javascript
// Optional Chaining (?.) — acessa propriedades sem erro se undefined/null
const usuario = {
    nome: "João",
    endereco: {
        rua: "Av. Brasil"
    }
};

// Sem optional chaining:
// console.log(usuario.contato.telefone); // ❌ TypeError!

// Com optional chaining:
console.log(usuario.contato?.telefone); // undefined (sem erro!)
console.log(usuario.endereco?.rua);     // "Av. Brasil"

// Funciona com métodos também
const resultado = usuario.calcular?.(); // undefined se calcular não existir

// Nullish Coalescing (??) — valor padrão apenas para null/undefined
const config = {
    tema: "",     // string vazia é intencional
    fonte: 0,     // zero é intencional
    idioma: null  // null indica "não definido"
};

console.log(config.tema || "claro");   // "claro" ❌ (|| trata "" como falsy)
console.log(config.tema ?? "claro");   // "" ✅ (?? só age com null/undefined)
console.log(config.fonte || 14);       // 14 ❌
console.log(config.fonte ?? 14);       // 0 ✅
console.log(config.idioma ?? "pt-BR"); // "pt-BR" ✅
```

---

## JSON

**JSON (JavaScript Object Notation)** é um formato leve de troca de dados.

```javascript
// Objeto JavaScript
const usuario = {
    nome: "Maria Silva",
    idade: 25,
    ativo: true,
    hobbies: ["leitura", "yoga"],
    endereco: {
        cidade: "São Paulo",
        estado: "SP"
    }
};

// JSON.stringify — Objeto JS → String JSON
const jsonString = JSON.stringify(usuario);
console.log(jsonString);
// '{"nome":"Maria Silva","idade":25,"ativo":true,...}'

// Com formatação (indent de 2 espaços)
const jsonFormatado = JSON.stringify(usuario, null, 2);
console.log(jsonFormatado);

// Com função replacer (filtrar ou transformar valores)
const jsonFiltrado = JSON.stringify(usuario, (chave, valor) => {
    if (chave === "idade") return undefined; // Remove a chave "idade"
    return valor;
}, 2);

// JSON.parse — String JSON → Objeto JS
const objetoRecuperado = JSON.parse(jsonString);
console.log(objetoRecuperado.nome); // "Maria Silva"

// Com função reviver (transformar valores durante o parse)
const comDatas = '{"nome": "Ana", "nascimento": "1998-05-15"}';
const parsed = JSON.parse(comDatas, (chave, valor) => {
    if (chave === "nascimento") return new Date(valor);
    return valor;
});
console.log(parsed.nascimento instanceof Date); // true

// Uso com localStorage
localStorage.setItem("config", JSON.stringify({ tema: "escuro" }));
const config = JSON.parse(localStorage.getItem("config"));

// Uso com Fetch API
async function enviarDados() {
    const resposta = await fetch("https://api.exemplo.com/usuarios", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            nome: "Novo Usuário",
            email: "novo@email.com"
        })
    });
    const resultado = await resposta.json();
    return resultado;
}
```

### Regras do JSON

```
✅ Chaves DEVEM ser strings com aspas duplas
✅ Valores podem ser: string, number, boolean, null, array, object
❌ NÃO aceita: undefined, funções, Symbol, NaN, Infinity
❌ NÃO aceita comentários
❌ NÃO aceita trailing commas (vírgula depois do último item)
```

---

## 🎯 Dicas Finais

1. **Use `const` por padrão**, `let` quando precisar reatribuir
2. **Sempre use `===`** em vez de `==`
3. **Use arrow functions** para callbacks simples
4. **Manipule o DOM** com `querySelector` e `querySelectorAll`
5. **Sempre use `addEventListener`** em vez de `onclick` inline
6. **Use `preventDefault()`** em formulários para controle via JS
7. **Encadeie métodos de array** (filter, map, reduce) para código elegante
8. **Trate erros** com try/catch em operações arriscadas
9. **Use async/await** para código assíncrono legível
10. **Pratique!** A melhor forma de aprender é codificando

---

> 📚 **Recursos para estudo:**
> - [MDN Web Docs](https://developer.mozilla.org/pt-BR/docs/Web/JavaScript)
> - [JavaScript.info](https://javascript.info/)
> - [W3Schools](https://www.w3schools.com/js/)
> - [ECMAScript Specification](https://tc39.es/ecma262/)
