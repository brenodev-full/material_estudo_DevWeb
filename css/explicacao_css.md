# 📘 Guia Completo de CSS3

## Sumário

1. [O que é CSS?](#1-o-que-é-css)
2. [Formas de Conectar CSS ao HTML](#2-formas-de-conectar-css-ao-html)
3. [Seletores CSS](#3-seletores-css)
4. [Especificidade e Cascata](#4-especificidade-e-cascata)
5. [Box Model (Modelo de Caixa)](#5-box-model-modelo-de-caixa)
6. [Cores, Backgrounds e Gradientes](#6-cores-backgrounds-e-gradientes)
7. [Tipografia](#7-tipografia)
8. [Display](#8-display)
9. [Flexbox](#9-flexbox)
10. [Grid Layout](#10-grid-layout)
11. [Posicionamento](#11-posicionamento)
12. [Pseudo-classes](#12-pseudo-classes)
13. [Pseudo-elementos](#13-pseudo-elementos)
14. [Transições e Animações](#14-transições-e-animações)
15. [Media Queries e Design Responsivo](#15-media-queries-e-design-responsivo)
16. [Variáveis CSS (Custom Properties)](#16-variáveis-css-custom-properties)
17. [Introdução ao Bootstrap](#17-introdução-ao-bootstrap)

---

## 1. O que é CSS?

**CSS** (Cascading Style Sheets — Folhas de Estilo em Cascata) é a linguagem usada para
**estilizar** e **formatar** a apresentação visual de documentos HTML. Enquanto o HTML define
a **estrutura** e o **conteúdo** da página, o CSS controla **como** esse conteúdo é exibido:
cores, fontes, espaçamentos, layouts, animações, e muito mais.

### Por que CSS é importante?

- **Separação de responsabilidades**: conteúdo (HTML) separado da apresentação (CSS).
- **Reutilização**: um único arquivo CSS pode estilizar múltiplas páginas.
- **Manutenção**: alterar o visual de um site inteiro modificando apenas o CSS.
- **Acessibilidade**: permite adaptar a apresentação a diferentes dispositivos e necessidades.
- **Performance**: reduz a repetição de código ao centralizar estilos.

---

## 2. Formas de Conectar CSS ao HTML

Existem três maneiras de aplicar CSS a um documento HTML:

### 2.1. CSS Inline (Na linha)

Os estilos são aplicados diretamente no atributo `style` de um elemento HTML.

```html
<p style="color: blue; font-size: 18px;">Texto azul com 18px</p>
```

> **⚠️ Desvantagem**: difícil de manter, não reutilizável, mistura conteúdo com apresentação.
> Use apenas para testes rápidos ou exceções muito pontuais.

### 2.2. CSS Interno (Incorporado)

Os estilos são escritos dentro de uma tag `<style>` no `<head>` do HTML.

```html
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>CSS Interno</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Olá, CSS Interno!</h1>
</body>
</html>
```

> **Uso recomendado**: páginas únicas ou protótipos rápidos.

### 2.3. CSS Externo (Recomendado ✅)

Os estilos ficam em um arquivo separado com extensão `.css`, vinculado ao HTML com `<link>`.

```html
<!-- No arquivo HTML -->
<head>
    <link rel="stylesheet" href="estilos.css">
</head>
```

```css
/* No arquivo estilos.css */
body {
    background-color: #f0f0f0;
    font-family: Arial, sans-serif;
}
```

> **✅ Melhor prática**: mantém o código organizado, reutilizável e fácil de manter.

---

## 3. Seletores CSS

Seletores definem **quais elementos HTML** serão estilizados.

### 3.1. Seletor de Elemento (Tag)

Seleciona todos os elementos de um determinado tipo.

```css
/* Todos os parágrafos terão cor cinza escuro */
p {
    color: #333;
}

/* Todos os títulos h1 terão sublinhado */
h1 {
    text-decoration: underline;
}
```

### 3.2. Seletor de Classe (`.`)

Seleciona elementos que possuem um atributo `class` específico. **Pode ser reutilizado**
em múltiplos elementos.

```html
<p class="destaque">Texto em destaque</p>
<span class="destaque">Outro destaque</span>
```

```css
.destaque {
    color: red;
    font-weight: bold;
}
```

### 3.3. Seletor de ID (`#`)

Seleciona um elemento com um `id` específico. O `id` deve ser **único** na página.

```html
<h1 id="titulo-principal">Bem-vindo!</h1>
```

```css
#titulo-principal {
    font-size: 2.5rem;
    color: navy;
}
```

### 3.4. Seletor Universal (`*`)

Seleciona **todos** os elementos da página.

```css
/* Reset básico — remove margem e padding padrão de todos os elementos */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
```

### 3.5. Seletor de Atributo

Seleciona elementos com base em seus atributos.

```css
/* Links que abrem em nova aba */
a[target="_blank"] {
    color: orange;
}

/* Inputs do tipo email */
input[type="email"] {
    border: 2px solid blue;
}

/* Elementos cujo atributo href começa com "https" */
a[href^="https"] {
    color: green;
}

/* Elementos cujo atributo href termina com ".pdf" */
a[href$=".pdf"] {
    color: red;
}

/* Elementos cujo atributo class contém a palavra "btn" */
[class*="btn"] {
    cursor: pointer;
}
```

### 3.6. Combinadores

Combinadores permitem criar seletores mais específicos combinando múltiplos seletores.

```css
/* DESCENDENTE (espaço) — seleciona <p> dentro de <article>, em qualquer nível */
article p {
    line-height: 1.8;
}

/* FILHO DIRETO (>) — seleciona <li> que são filhos diretos de <ul> */
ul > li {
    list-style: square;
}

/* IRMÃO ADJACENTE (+) — seleciona o <p> imediatamente após um <h2> */
h2 + p {
    font-size: 1.2rem;
    color: #555;
}

/* IRMÃO GERAL (~) — seleciona todos os <p> irmãos que vêm após um <h2> */
h2 ~ p {
    margin-left: 20px;
}
```

### 3.7. Agrupamento de Seletores

Use vírgula para aplicar os mesmos estilos a múltiplos seletores.

```css
h1, h2, h3 {
    font-family: 'Georgia', serif;
    color: #2c3e50;
}
```

---

## 4. Especificidade e Cascata

### 4.1. O que é a Cascata?

O "C" em CSS significa **Cascata**. Quando há conflitos entre regras, o navegador decide
qual aplicar seguindo esta ordem de prioridade:

1. **Origem**: estilos do autor > estilos do usuário > estilos do navegador.
2. **Especificidade**: regras mais específicas vencem regras mais genéricas.
3. **Ordem no código**: entre regras de mesma especificidade, a **última** declarada vence.

### 4.2. Cálculo de Especificidade

A especificidade é calculada como um "peso" com quatro níveis `(a, b, c, d)`:

| Nível | O que conta                         | Exemplo          | Peso  |
|-------|-------------------------------------|------------------|-------|
| a     | Estilos inline (`style=""`)         | `style="..."`    | 1,0,0,0 |
| b     | Seletores de ID (`#`)              | `#menu`          | 0,1,0,0 |
| c     | Classes (`.`), pseudo-classes, atributos | `.ativo`, `:hover` | 0,0,1,0 |
| d     | Elementos e pseudo-elementos       | `div`, `::before`| 0,0,0,1 |

### Exemplos práticos:

```css
p { }                    /* Especificidade: 0,0,0,1 */
.texto { }               /* Especificidade: 0,0,1,0 */
p.texto { }              /* Especificidade: 0,0,1,1 */
#conteudo { }            /* Especificidade: 0,1,0,0 */
#conteudo p.texto { }    /* Especificidade: 0,1,1,1 */
```

### 4.3. `!important`

Força uma regra a ter prioridade máxima. **Evite usar** — dificulta a manutenção.

```css
p {
    color: red !important; /* Vence qualquer outra regra sem !important */
}
```

---

## 5. Box Model (Modelo de Caixa)

Todo elemento HTML é representado como uma **caixa retangular** composta por quatro camadas:

```
┌─────────────────────────────────────────────┐
│                 MARGIN                      │  ← Espaço externo (transparente)
│   ┌─────────────────────────────────────┐   │
│   │             BORDER                  │   │  ← Borda visível
│   │   ┌─────────────────────────────┐   │   │
│   │   │          PADDING            │   │   │  ← Espaço interno
│   │   │   ┌─────────────────────┐   │   │   │
│   │   │   │      CONTENT        │   │   │   │  ← Conteúdo (texto, imagem...)
│   │   │   └─────────────────────┘   │   │   │
│   │   └─────────────────────────────┘   │   │
│   └─────────────────────────────────────┘   │
└─────────────────────────────────────────────┘
```

### 5.1. Propriedades do Box Model

```css
.caixa {
    /* CONTEÚDO — largura e altura */
    width: 300px;
    height: 200px;

    /* PADDING — espaço interno entre o conteúdo e a borda */
    padding: 20px;                /* todos os lados */
    padding: 10px 20px;           /* vertical | horizontal */
    padding: 10px 20px 15px 25px; /* topo | direita | baixo | esquerda */

    /* BORDER — borda do elemento */
    border: 2px solid #333;
    border-radius: 8px;          /* cantos arredondados */

    /* MARGIN — espaço externo entre este e outros elementos */
    margin: 20px;
    margin: 0 auto;              /* centralizar horizontalmente */
}
```

### 5.2. `box-sizing: border-box` ✅

Por padrão (`content-box`), `width` e `height` se referem **apenas ao conteúdo**.
Padding e border são somados, tornando o elemento maior que o especificado.

Com `border-box`, `width` e `height` **incluem** padding e border.

```css
/* Reset recomendado — aplicar em todos os elementos */
*, *::before, *::after {
    box-sizing: border-box;
}

/* Exemplo comparativo */
.content-box {
    box-sizing: content-box; /* padrão */
    width: 300px;
    padding: 20px;
    border: 5px solid black;
    /* Largura REAL: 300 + 20*2 + 5*2 = 350px */
}

.border-box {
    box-sizing: border-box; /* recomendado */
    width: 300px;
    padding: 20px;
    border: 5px solid black;
    /* Largura REAL: 300px (padding e border estão inclusos) */
}
```

---

## 6. Cores, Backgrounds e Gradientes

### 6.1. Formatos de Cores

```css
.cores {
    /* Nome da cor (limitado, mas útil para testes) */
    color: red;
    color: tomato;
    color: dodgerblue;

    /* Hexadecimal — formato mais comum */
    color: #ff0000;      /* vermelho */
    color: #333;         /* cinza escuro (atalho de #333333) */
    color: #00ff0080;    /* verde com 50% de transparência (8 dígitos) */

    /* RGB — Red, Green, Blue (0-255) */
    color: rgb(255, 0, 0);         /* vermelho */
    color: rgb(51, 51, 51);        /* cinza escuro */

    /* RGBA — RGB com canal Alpha (transparência 0.0 a 1.0) */
    color: rgba(0, 0, 0, 0.5);    /* preto com 50% de opacidade */
    color: rgba(255, 255, 255, 0.8); /* branco com 80% de opacidade */

    /* HSL — Hue (0-360°), Saturation (0-100%), Lightness (0-100%) */
    color: hsl(0, 100%, 50%);     /* vermelho */
    color: hsl(210, 80%, 50%);    /* azul */
    color: hsla(120, 60%, 40%, 0.7); /* verde com 70% de opacidade */
}
```

### 6.2. Backgrounds

```css
.fundo {
    /* Cor de fundo sólida */
    background-color: #f5f5f5;

    /* Imagem de fundo */
    background-image: url('imagem.jpg');
    background-repeat: no-repeat;    /* não repetir */
    background-size: cover;          /* cobrir todo o elemento */
    background-position: center;     /* centralizar imagem */
    background-attachment: fixed;    /* fundo fixo no scroll (parallax) */

    /* Shorthand (atalho) para background */
    background: #f5f5f5 url('imagem.jpg') no-repeat center / cover;
}
```

### 6.3. Gradientes

```css
.gradientes {
    /* Gradiente linear — de cima para baixo */
    background: linear-gradient(to bottom, #3498db, #2c3e50);

    /* Gradiente linear — com ângulo */
    background: linear-gradient(135deg, #667eea, #764ba2);

    /* Gradiente com múltiplas cores */
    background: linear-gradient(to right, #ff6b6b, #feca57, #48dbfb);

    /* Gradiente radial — circular, do centro para fora */
    background: radial-gradient(circle, #fff, #ccc, #999);

    /* Gradiente cônico */
    background: conic-gradient(#ff6b6b, #feca57, #48dbfb, #ff6b6b);
}
```

---

## 7. Tipografia

### 7.1. Propriedades de Fonte

```css
.tipografia {
    /* Família da fonte — sempre inclua uma fonte genérica como fallback */
    font-family: 'Roboto', 'Helvetica Neue', Arial, sans-serif;

    /* Tamanho da fonte */
    font-size: 16px;          /* pixels (fixo) */
    font-size: 1rem;          /* relativo ao elemento raiz (16px padrão) */
    font-size: 1.2em;         /* relativo ao pai */
    font-size: clamp(14px, 2vw, 18px); /* responsivo com limites */

    /* Peso/espessura da fonte */
    font-weight: normal;      /* 400 */
    font-weight: bold;        /* 700 */
    font-weight: 300;         /* light */
    font-weight: 900;         /* extra bold */

    /* Estilo da fonte */
    font-style: italic;
    font-style: normal;

    /* Altura da linha — afeta a legibilidade */
    line-height: 1.6;         /* 1.5 a 1.8 é ideal para texto corrido */

    /* Espaçamento entre letras e palavras */
    letter-spacing: 1px;
    word-spacing: 2px;
}
```

### 7.2. Propriedades de Texto

```css
.texto {
    /* Alinhamento */
    text-align: left;         /* padrão */
    text-align: center;       /* centralizado */
    text-align: right;        /* à direita */
    text-align: justify;      /* justificado */

    /* Decoração */
    text-decoration: none;          /* remove sublinhado (útil para links) */
    text-decoration: underline;     /* sublinhado */
    text-decoration: line-through;  /* riscado */
    text-decoration: underline wavy red; /* sublinhado ondulado vermelho */

    /* Transformação */
    text-transform: uppercase;    /* MAIÚSCULAS */
    text-transform: lowercase;    /* minúsculas */
    text-transform: capitalize;   /* Primeira Letra Maiúscula */

    /* Sombra no texto */
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);

    /* Indentação do primeiro parágrafo */
    text-indent: 2em;

    /* Controle de overflow de texto */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;  /* mostra "..." quando o texto não cabe */
}
```

### 7.3. Google Fonts

O [Google Fonts](https://fonts.google.com/) oferece centenas de fontes gratuitas.

```html
<!-- Incluir no <head> do HTML -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Merriweather:wght@400;700&display=swap" rel="stylesheet">
```

```css
/* Usar no CSS */
body {
    font-family: 'Inter', sans-serif;
}

h1, h2, h3 {
    font-family: 'Merriweather', serif;
}
```

---

## 8. Display

A propriedade `display` controla **como um elemento se comporta** no layout.

### 8.1. Valores Principais

```css
/* BLOCK — ocupa toda a largura disponível, começa em nova linha */
/* Exemplos de elementos block: <div>, <p>, <h1>-<h6>, <section>, <article> */
.bloco {
    display: block;
    width: 100%;  /* comportamento padrão */
}

/* INLINE — ocupa apenas o espaço do seu conteúdo, não aceita width/height */
/* Exemplos de elementos inline: <span>, <a>, <strong>, <em> */
.linha {
    display: inline;
    /* width e height são IGNORADOS */
}

/* INLINE-BLOCK — inline, mas aceita width, height, margin e padding vertical */
.inline-bloco {
    display: inline-block;
    width: 200px;
    height: 100px;
    margin: 10px;
}

/* NONE — remove completamente o elemento do layout (não ocupa espaço) */
.oculto {
    display: none;
}

/* Diferença entre display: none e visibility: hidden */
.invisivel {
    visibility: hidden; /* fica invisível, mas MANTÉM o espaço ocupado */
}
```

### 8.2. Flex e Grid

Os valores `flex` e `grid` são os pilares do layout moderno e serão detalhados
nas próximas seções.

```css
.container-flex {
    display: flex;  /* ativa o Flexbox */
}

.container-grid {
    display: grid;  /* ativa o Grid Layout */
}
```

---

## 9. Flexbox

O **Flexbox** (Flexible Box Layout) é um modelo de layout unidimensional projetado para
distribuir espaço e alinhar itens em uma **única direção** (linha ou coluna).

### 9.1. Conceitos Fundamentais

```
┌─────────────────── Flex Container ───────────────────────┐
│                                                          │
│  ┌──────────┐  ┌──────────┐  ┌──────────┐              │
│  │  Item 1   │  │  Item 2   │  │  Item 3   │   → Eixo   │
│  │           │  │           │  │           │   Principal │
│  └──────────┘  └──────────┘  └──────────┘    (main axis)│
│                      ↓                                   │
│               Eixo Transversal                           │
│               (cross axis)                               │
└──────────────────────────────────────────────────────────┘
```

### 9.2. Propriedades do Container (pai)

```css
.flex-container {
    display: flex; /* ou inline-flex */

    /* DIREÇÃO — define o eixo principal */
    flex-direction: row;            /* → padrão: itens em linha (esquerda → direita) */
    flex-direction: row-reverse;    /* ← itens em linha (direita → esquerda) */
    flex-direction: column;         /* ↓ itens em coluna (cima → baixo) */
    flex-direction: column-reverse; /* ↑ itens em coluna (baixo → cima) */

    /* QUEBRA DE LINHA — permite que itens passem para a próxima linha */
    flex-wrap: nowrap;    /* padrão: todos em uma única linha */
    flex-wrap: wrap;      /* quebra para a próxima linha quando necessário */
    flex-wrap: wrap-reverse; /* quebra para a linha anterior */

    /* ALINHAMENTO NO EIXO PRINCIPAL (horizontal se row) */
    justify-content: flex-start;    /* início (padrão) */
    justify-content: flex-end;      /* final */
    justify-content: center;        /* centralizado */
    justify-content: space-between; /* espaço igual ENTRE os itens */
    justify-content: space-around;  /* espaço igual AO REDOR dos itens */
    justify-content: space-evenly;  /* espaço igual ENTRE e NAS BORDAS */

    /* ALINHAMENTO NO EIXO TRANSVERSAL (vertical se row) */
    align-items: stretch;     /* padrão: itens esticam para preencher */
    align-items: flex-start;  /* alinhados ao topo */
    align-items: flex-end;    /* alinhados ao fundo */
    align-items: center;      /* centralizados verticalmente */
    align-items: baseline;    /* alinhados pela linha de base do texto */

    /* ALINHAMENTO DAS LINHAS (quando há wrap com múltiplas linhas) */
    align-content: flex-start;
    align-content: center;
    align-content: space-between;

    /* GAP — espaçamento entre os itens (moderno e simples) */
    gap: 20px;              /* mesmo espaço em linhas e colunas */
    gap: 10px 20px;         /* linha | coluna */
    row-gap: 10px;          /* espaço entre linhas */
    column-gap: 20px;       /* espaço entre colunas */
}
```

### 9.3. Propriedades dos Itens (filhos)

```css
.flex-item {
    /* FLEX-GROW — proporção de espaço extra que o item deve ocupar */
    flex-grow: 0;   /* padrão: não cresce */
    flex-grow: 1;   /* cresce para ocupar espaço disponível */
    flex-grow: 2;   /* cresce o dobro em relação a itens com flex-grow: 1 */

    /* FLEX-SHRINK — proporção de quanto o item pode encolher */
    flex-shrink: 1; /* padrão: pode encolher */
    flex-shrink: 0; /* não encolhe (mantém o tamanho) */

    /* FLEX-BASIS — tamanho base do item antes de distribuir espaço */
    flex-basis: auto;   /* usa o width/height do item */
    flex-basis: 200px;  /* tamanho base de 200px */
    flex-basis: 30%;    /* 30% do container */

    /* SHORTHAND: flex: grow shrink basis */
    flex: 1;            /* equivale a flex: 1 1 0% */
    flex: 0 0 200px;    /* não cresce, não encolhe, 200px fixos */

    /* ALIGN-SELF — sobrescreve o align-items do container para ESTE item */
    align-self: center;
    align-self: flex-start;
    align-self: flex-end;
    align-self: stretch;

    /* ORDER — muda a ordem visual do item (padrão: 0) */
    order: -1;  /* aparece antes dos outros */
    order: 1;   /* aparece depois dos outros */
}
```

### 9.4. Exemplo Prático — Layout com Flexbox

```css
/* Navbar horizontal com Flexbox */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background-color: #2c3e50;
}

.navbar .logo {
    font-size: 1.5rem;
    color: white;
    font-weight: bold;
}

.navbar .menu {
    display: flex;
    gap: 20px;
    list-style: none;
}

.navbar .menu a {
    color: #ecf0f1;
    text-decoration: none;
}
```

---

## 10. Grid Layout

O **CSS Grid** é um sistema de layout **bidimensional** que permite controlar tanto
**linhas** quanto **colunas** ao mesmo tempo.

### 10.1. Propriedades do Container Grid

```css
.grid-container {
    display: grid;

    /* COLUNAS — define a quantidade e tamanho das colunas */
    grid-template-columns: 200px 200px 200px;         /* 3 colunas de 200px */
    grid-template-columns: 1fr 1fr 1fr;               /* 3 colunas iguais */
    grid-template-columns: 1fr 2fr 1fr;               /* a do meio é o dobro */
    grid-template-columns: repeat(3, 1fr);             /* atalho para 3 iguais */
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); /* responsivo! */

    /* LINHAS — define a quantidade e tamanho das linhas */
    grid-template-rows: 80px 1fr 60px;  /* header, conteúdo flexível, footer */
    grid-template-rows: auto;           /* altura automática */

    /* GAP — espaçamento entre as células */
    gap: 20px;             /* linhas e colunas */
    row-gap: 15px;         /* apenas linhas */
    column-gap: 20px;      /* apenas colunas */

    /* ÁREAS NOMEADAS — define um "mapa" visual do layout */
    grid-template-areas:
        "header  header  header"
        "sidebar content content"
        "footer  footer  footer";
}
```

### 10.2. Posicionando Itens no Grid

```css
/* Usando grid-area com nomes definidos no container */
.header  { grid-area: header; }
.sidebar { grid-area: sidebar; }
.content { grid-area: content; }
.footer  { grid-area: footer; }

/* Usando linhas e colunas (grid lines) */
.item-especial {
    grid-column: 1 / 3;     /* da coluna 1 até a 3 (ocupa 2 colunas) */
    grid-row: 2 / 4;        /* da linha 2 até a 4 (ocupa 2 linhas) */
}

/* Usando span */
.item-largo {
    grid-column: span 2;    /* ocupa 2 colunas a partir da posição atual */
}
```

### 10.3. Exemplo Prático — Layout de Página com Grid

```css
.pagina {
    display: grid;
    grid-template-columns: 250px 1fr;
    grid-template-rows: 80px 1fr 60px;
    grid-template-areas:
        "header  header"
        "sidebar conteudo"
        "footer  footer";
    min-height: 100vh;
    gap: 0;
}

.pagina-header   { grid-area: header;   background: #2c3e50; }
.pagina-sidebar  { grid-area: sidebar;  background: #34495e; }
.pagina-conteudo { grid-area: conteudo; background: #ecf0f1; }
.pagina-footer   { grid-area: footer;   background: #2c3e50; }
```

---

## 11. Posicionamento

A propriedade `position` controla **como** e **onde** um elemento é posicionado na página.

### 11.1. Valores de Position

```css
/* STATIC — padrão, fluxo normal do documento */
.estatico {
    position: static;
    /* top, right, bottom, left NÃO funcionam */
}

/* RELATIVE — posicionado em relação à sua posição original */
.relativo {
    position: relative;
    top: 10px;      /* desloca 10px para baixo da posição original */
    left: 20px;     /* desloca 20px para a direita */
    /* O espaço original do elemento É preservado */
}

/* ABSOLUTE — posicionado em relação ao ancestral posicionado mais próximo */
.absoluto {
    position: absolute;
    top: 0;
    right: 0;
    /* Removido do fluxo normal — o espaço NÃO é preservado */
    /* Se nenhum ancestral for posicionado, usa o <html> como referência */
}

/* FIXED — posicionado em relação à janela do navegador (viewport) */
.fixo {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    /* Fica fixo na tela mesmo ao rolar a página */
    /* Útil para: navbars fixas, botões "voltar ao topo" */
}

/* STICKY — combina relative e fixed */
.pegajoso {
    position: sticky;
    top: 0;
    /* Se comporta como relative até atingir a posição definida (top: 0) */
    /* Depois se comporta como fixed (fica "grudado") */
    /* Útil para: cabeçalhos de tabela, menus de navegação */
}
```

### 11.2. Z-Index

Controla a **ordem de empilhamento** de elementos posicionados (sobreposição).

```css
.camada-fundo {
    position: relative;
    z-index: 1;     /* atrás */
}

.camada-frente {
    position: relative;
    z-index: 10;    /* na frente */
}

.modal-overlay {
    position: fixed;
    z-index: 999;   /* acima de tudo */
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
}

.modal-conteudo {
    position: fixed;
    z-index: 1000;  /* acima do overlay */
}
```

---

## 12. Pseudo-classes

Pseudo-classes selecionam elementos em **estados específicos** ou **posições** na árvore DOM.
São escritas com **um dois-pontos** (`:`).

```css
/* :hover — quando o mouse está sobre o elemento */
a:hover {
    color: #e74c3c;
    text-decoration: underline;
}

button:hover {
    background-color: #2980b9;
    cursor: pointer;
}

/* :active — enquanto o elemento está sendo clicado/ativado */
button:active {
    transform: scale(0.98);
    background-color: #1a5276;
}

/* :focus — quando o elemento recebe foco (teclado ou clique) */
input:focus {
    outline: none;
    border-color: #3498db;
    box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.3);
}

/* :focus-visible — foco APENAS por teclado (melhor acessibilidade) */
button:focus-visible {
    outline: 3px solid #3498db;
    outline-offset: 2px;
}

/* :first-child — primeiro filho do pai */
li:first-child {
    font-weight: bold;
}

/* :last-child — último filho do pai */
li:last-child {
    border-bottom: none;
}

/* :nth-child() — seleciona por posição */
tr:nth-child(even) { background-color: #f2f2f2; }  /* linhas pares */
tr:nth-child(odd) { background-color: #fff; }       /* linhas ímpares */
li:nth-child(3) { color: red; }                      /* terceiro item */
li:nth-child(3n) { color: blue; }                    /* cada 3º item */

/* :not() — seleciona todos EXCETO o especificado */
input:not([type="submit"]) {
    border: 1px solid #ccc;
}

a:not(.externo) {
    color: #2c3e50;
}

/* :checked — inputs marcados (checkbox, radio) */
input[type="checkbox"]:checked + label {
    text-decoration: line-through;
    color: #999;
}

/* :disabled e :enabled */
input:disabled {
    background-color: #eee;
    cursor: not-allowed;
}
```

---

## 13. Pseudo-elementos

Pseudo-elementos criam **partes virtuais** de um elemento que não existem no HTML.
São escritos com **dois dois-pontos** (`::`).

```css
/* ::before — insere conteúdo ANTES do conteúdo do elemento */
.obrigatorio::before {
    content: "* ";
    color: red;
    font-weight: bold;
}

/* ::after — insere conteúdo DEPOIS do conteúdo do elemento */
a[href^="http"]::after {
    content: " ↗";   /* ícone de link externo */
    font-size: 0.8em;
}

/* Uso decorativo — linhas, ícones, badges */
.titulo::after {
    content: "";
    display: block;
    width: 60px;
    height: 3px;
    background-color: #3498db;
    margin-top: 10px;
}

/* ::first-letter — estiliza a primeira letra */
p.artigo::first-letter {
    font-size: 3rem;
    font-weight: bold;
    color: #2c3e50;
    float: left;
    margin-right: 8px;
    line-height: 1;
}

/* ::first-line — estiliza a primeira linha */
p.artigo::first-line {
    font-weight: bold;
    color: #34495e;
}

/* ::placeholder — estiliza o placeholder de inputs */
input::placeholder {
    color: #aaa;
    font-style: italic;
}

/* ::selection — estiliza o texto selecionado pelo usuário */
::selection {
    background-color: #3498db;
    color: white;
}
```

---

## 14. Transições e Animações

### 14.1. Transições

Transições criam mudanças **suaves** entre dois estados de uma propriedade CSS.

```css
.botao {
    background-color: #3498db;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    cursor: pointer;

    /* Propriedades da transição */
    transition-property: background-color, transform;  /* quais propriedades */
    transition-duration: 0.3s;                          /* duração */
    transition-timing-function: ease;                   /* curva de velocidade */
    transition-delay: 0s;                               /* atraso */

    /* Shorthand (atalho) */
    transition: all 0.3s ease;

    /* Timing functions comuns */
    /* ease       — início e fim lentos (padrão) */
    /* linear     — velocidade constante */
    /* ease-in    — começa lento, termina rápido */
    /* ease-out   — começa rápido, termina lento */
    /* ease-in-out — lento nas duas pontas */
    /* cubic-bezier(n,n,n,n) — personalizado */
}

.botao:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}
```

### 14.2. Animações com `@keyframes`

Animações permitem mudanças complexas com **múltiplos estágios**.

```css
/* Definição da animação */
@keyframes pulsar {
    0% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.05);
        opacity: 0.8;
    }
    100% {
        transform: scale(1);
        opacity: 1;
    }
}

/* Aplicar a animação */
.card-destaque {
    animation-name: pulsar;
    animation-duration: 2s;
    animation-timing-function: ease-in-out;
    animation-iteration-count: infinite;    /* repete infinitamente */
    animation-direction: alternate;         /* alterna a direção */
    animation-delay: 0s;
    animation-fill-mode: forwards;          /* mantém o estado final */

    /* Shorthand */
    animation: pulsar 2s ease-in-out infinite alternate;
}

/* Animação de entrada — slide de baixo para cima */
@keyframes slideUp {
    from {
        transform: translateY(30px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}

.elemento-animado {
    animation: slideUp 0.5s ease-out forwards;
}

/* Animação de loading (carregamento) */
@keyframes girar {
    from { transform: rotate(0deg); }
    to   { transform: rotate(360deg); }
}

.spinner {
    width: 40px;
    height: 40px;
    border: 4px solid #f3f3f3;
    border-top: 4px solid #3498db;
    border-radius: 50%;
    animation: girar 1s linear infinite;
}
```

---

## 15. Media Queries e Design Responsivo

### 15.1. O que é Design Responsivo?

Design responsivo é a abordagem de criar layouts que se **adaptam automaticamente**
a diferentes tamanhos de tela (celular, tablet, desktop).

### 15.2. Viewport Meta Tag

```html
<!-- OBRIGATÓRIO no <head> para design responsivo -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
```

### 15.3. Media Queries

```css
/* Mobile First — estilos base para celular, depois expande */

/* Estilos base (mobile) */
.container {
    width: 100%;
    padding: 15px;
}

.grid {
    display: grid;
    grid-template-columns: 1fr;    /* 1 coluna no mobile */
    gap: 15px;
}

/* Tablet (a partir de 768px) */
@media (min-width: 768px) {
    .container {
        width: 750px;
        margin: 0 auto;
    }

    .grid {
        grid-template-columns: repeat(2, 1fr);  /* 2 colunas */
        gap: 20px;
    }
}

/* Desktop (a partir de 1024px) */
@media (min-width: 1024px) {
    .container {
        width: 960px;
    }

    .grid {
        grid-template-columns: repeat(3, 1fr);  /* 3 colunas */
        gap: 30px;
    }
}

/* Desktop grande (a partir de 1200px) */
@media (min-width: 1200px) {
    .container {
        width: 1140px;
    }

    .grid {
        grid-template-columns: repeat(4, 1fr);  /* 4 colunas */
    }
}
```

### 15.4. Breakpoints Comuns

| Dispositivo       | Largura mínima | Classe Bootstrap |
|-------------------|----------------|------------------|
| Celular (retrato) | < 576px        | (padrão)         |
| Celular (paisagem)| ≥ 576px        | `sm`             |
| Tablet            | ≥ 768px        | `md`             |
| Desktop           | ≥ 992px        | `lg`             |
| Desktop grande    | ≥ 1200px       | `xl`             |
| Tela extra grande | ≥ 1400px       | `xxl`            |

### 15.5. Unidades Responsivas

```css
.responsivo {
    /* Viewport Width — percentual da largura da tela */
    width: 80vw;        /* 80% da largura da viewport */

    /* Viewport Height — percentual da altura da tela */
    height: 100vh;      /* 100% da altura da viewport */

    /* REM — relativo ao font-size do <html> (padrão: 16px) */
    font-size: 1.2rem;  /* 19.2px */
    padding: 2rem;      /* 32px */

    /* Percentual — relativo ao pai */
    width: 50%;

    /* clamp() — valor fluido com limites */
    font-size: clamp(1rem, 2.5vw, 2rem); /* mín: 1rem, ideal: 2.5vw, máx: 2rem */
    width: clamp(300px, 80%, 1200px);
}
```

---

## 16. Variáveis CSS (Custom Properties)

Variáveis CSS permitem armazenar valores reutilizáveis e facilitar a **manutenção**
e **consistência** do design.

```css
/* Definição de variáveis — geralmente na pseudo-classe :root (global) */
:root {
    /* Cores do tema */
    --cor-primaria: #3498db;
    --cor-primaria-escura: #2980b9;
    --cor-secundaria: #2ecc71;
    --cor-perigo: #e74c3c;
    --cor-texto: #2c3e50;
    --cor-texto-claro: #7f8c8d;
    --cor-fundo: #f8f9fa;
    --cor-borda: #dee2e6;

    /* Tipografia */
    --fonte-principal: 'Inter', sans-serif;
    --fonte-titulo: 'Merriweather', serif;
    --tamanho-base: 16px;

    /* Espaçamentos */
    --espaco-sm: 8px;
    --espaco-md: 16px;
    --espaco-lg: 24px;
    --espaco-xl: 32px;

    /* Bordas e sombras */
    --raio-borda: 8px;
    --sombra-suave: 0 2px 8px rgba(0, 0, 0, 0.1);
    --sombra-media: 0 4px 16px rgba(0, 0, 0, 0.15);

    /* Transições */
    --transicao-padrao: all 0.3s ease;
}

/* Uso das variáveis */
body {
    font-family: var(--fonte-principal);
    font-size: var(--tamanho-base);
    color: var(--cor-texto);
    background-color: var(--cor-fundo);
}

.botao-primario {
    background-color: var(--cor-primaria);
    border-radius: var(--raio-borda);
    padding: var(--espaco-sm) var(--espaco-md);
    transition: var(--transicao-padrao);
}

.botao-primario:hover {
    background-color: var(--cor-primaria-escura);
    box-shadow: var(--sombra-media);
}

.card {
    border: 1px solid var(--cor-borda);
    border-radius: var(--raio-borda);
    padding: var(--espaco-lg);
    box-shadow: var(--sombra-suave);
}

/* Valor fallback — usado se a variável não existir */
.elemento {
    color: var(--cor-inexistente, #333); /* usa #333 como fallback */
}

/* Tema escuro com variáveis */
@media (prefers-color-scheme: dark) {
    :root {
        --cor-texto: #ecf0f1;
        --cor-fundo: #1a1a2e;
        --cor-borda: #34495e;
    }
}

/* Tema escuro manual com classe no body */
body.tema-escuro {
    --cor-texto: #ecf0f1;
    --cor-fundo: #1a1a2e;
    --cor-borda: #34495e;
}
```

---

## 17. Introdução ao Bootstrap

O **Bootstrap** é o framework CSS mais popular do mundo. Ele fornece um sistema de grid
responsivo, componentes prontos e utilitários CSS que aceleram o desenvolvimento.

> Para um estudo mais aprofundado sobre frameworks CSS, consulte o arquivo
> `frameworks_css/frameworks_css.md`.

### 17.1. Incluindo o Bootstrap via CDN

```html
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página com Bootstrap</title>
    <!-- CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body>

    <div class="container">
        <h1 class="text-center my-4">Olá, Bootstrap!</h1>

        <div class="row g-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card 1</h5>
                        <p class="card-text">Conteúdo do primeiro card.</p>
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card 2</h5>
                        <p class="card-text">Conteúdo do segundo card.</p>
                        <a href="#" class="btn btn-success">Saiba mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Card 3</h5>
                        <p class="card-text">Conteúdo do terceiro card.</p>
                        <a href="#" class="btn btn-danger">Saiba mais</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript do Bootstrap (necessário para componentes interativos) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```

### 17.2. Sistema de Grid do Bootstrap

```html
<!-- 12 colunas disponíveis por linha -->
<div class="container">
    <!-- Linha com 3 colunas iguais -->
    <div class="row">
        <div class="col-md-4">Coluna 1/3</div>
        <div class="col-md-4">Coluna 2/3</div>
        <div class="col-md-4">Coluna 3/3</div>
    </div>

    <!-- Linha com sidebar e conteúdo -->
    <div class="row">
        <div class="col-md-3">Sidebar (25%)</div>
        <div class="col-md-9">Conteúdo (75%)</div>
    </div>
</div>
```

---

## 📚 Referências e Recursos

- [MDN Web Docs — CSS](https://developer.mozilla.org/pt-BR/docs/Web/CSS)
- [W3Schools CSS Tutorial](https://www.w3schools.com/css/)
- [CSS-Tricks — Guia Flexbox](https://css-tricks.com/snippets/css/a-guide-to-flexbox/)
- [CSS-Tricks — Guia Grid](https://css-tricks.com/snippets/css/complete-guide-grid/)
- [Google Fonts](https://fonts.google.com/)
- [Bootstrap 5 Documentação](https://getbootstrap.com/docs/5.3/)
- [Can I Use — Compatibilidade de CSS](https://caniuse.com/)
