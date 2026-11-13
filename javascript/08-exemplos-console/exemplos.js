// Exemplos para execução no Console do Navegador ou Node.js

// 1. Variáveis e Template Literals
const nome = "Maria";
let idade = 25;
console.log(`Olá, meu nome é ${nome} e tenho ${idade} anos.`);

// 2. Arrays e Métodos Modernos (Map, Filter, Reduce)
const numeros = [1, 2, 3, 4, 5, 6];

// filter: filtra elementos pares
const pares = numeros.filter(n => n % 2 === 0);
console.log("Números pares:", pares);

// map: dobra o valor de cada elemento
const dobrados = numeros.map(n => n * 2);
console.log("Números dobrados:", dobrados);

// reduce: soma todos os valores
const soma = numeros.reduce((acumulador, n) => acumulador + n, 0);
console.log("Soma total:", soma);

// 3. Desestruturação (Destructuring) e Spread
const usuario = { id: 1, email: "user@teste.com", cidade: "São Paulo" };
const { email, cidade } = usuario;
console.log(`Email: ${email}, Cidade: ${cidade}`);

const novoArray = [...numeros, 7, 8];
console.log("Array expandido com spread:", novoArray);

// 4. Arrow Functions
const calcularArea = (largura, altura) => largura * altura;
console.log("Área de 5x10:", calcularArea(5, 10));

