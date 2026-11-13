# 📄 Guia Completo de HTML5

## Índice

1. [O que é HTML e sua História](#1-o-que-é-html-e-sua-história)
2. [Estrutura de um Documento HTML](#2-estrutura-de-um-documento-html)
3. [Tags Semânticas](#3-tags-semânticas)
4. [Tags de Texto](#4-tags-de-texto)
5. [Listas](#5-listas)
6. [Links e Imagens](#6-links-e-imagens)
7. [Tabelas](#7-tabelas)
8. [Formulários](#8-formulários)
9. [Multimídia](#9-multimídia)
10. [Meta Tags e SEO](#10-meta-tags-e-seo)

---

## 1. O que é HTML e sua História

### Definição

**HTML** (HyperText Markup Language — Linguagem de Marcação de Hipertexto) é a linguagem padrão utilizada para criar e estruturar páginas na web. Ela define o **conteúdo** e a **estrutura** de uma página, utilizando um sistema de **tags** (etiquetas) que indicam ao navegador como exibir cada elemento.

> ⚠️ **Importante:** HTML **não** é uma linguagem de programação. Ela é uma linguagem de **marcação**, ou seja, serve para organizar e descrever conteúdo, não para criar lógica ou algoritmos.

### Breve Histórico

| Ano  | Versão       | Marco Principal                                                    |
|------|--------------|--------------------------------------------------------------------|
| 1991 | HTML 1.0     | Tim Berners-Lee cria a primeira versão no CERN                     |
| 1995 | HTML 2.0     | Primeira especificação padronizada pela IETF                       |
| 1997 | HTML 3.2     | Adição de tabelas, applets e texto flutuante                       |
| 1999 | HTML 4.01    | Separação de estrutura (HTML) e apresentação (CSS)                 |
| 2000 | XHTML 1.0    | HTML reformulado com regras rígidas do XML                         |
| 2014 | **HTML5**    | Grande revolução: semântica, multimídia nativa, APIs JavaScript    |
| Hoje | HTML Living  | Padrão "vivo" mantido pelo WHATWG, em constante evolução           |

### O que o HTML5 trouxe de novo?

- **Tags semânticas** (`<header>`, `<nav>`, `<main>`, `<article>`, `<section>`, `<footer>`, etc.)
- **Multimídia nativa** sem plugins (`<video>`, `<audio>`)
- **Novos tipos de input** para formulários (`email`, `date`, `number`, `range`, `color`, etc.)
- **APIs JavaScript** poderosas (Canvas, Geolocation, Web Storage, Drag & Drop, etc.)
- **Melhor acessibilidade** e otimização para motores de busca (SEO)

---

## 2. Estrutura de um Documento HTML

Todo documento HTML5 segue uma estrutura básica e obrigatória:

```html
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título da Página</title>
</head>
<body>
    <!-- Conteúdo visível da página -->
    <h1>Olá, Mundo!</h1>
    <p>Este é o conteúdo da minha página.</p>
</body>
</html>
```

### Explicação de cada parte

#### `<!DOCTYPE html>`
- Declaração que informa ao navegador que o documento utiliza **HTML5**
- Deve ser **sempre a primeira linha** do arquivo
- Não é uma tag HTML, é uma **instrução** para o navegador
- Em versões anteriores era muito mais longa e complexa

#### `<html lang="pt-BR">`
- Elemento **raiz** que envolve todo o conteúdo da página
- O atributo `lang` define o idioma do documento
- `pt-BR` = Português do Brasil
- Importante para acessibilidade (leitores de tela) e SEO

#### `<head>` — Cabeçalho do Documento
O `<head>` contém **metadados** — informações sobre a página que **não são exibidas** diretamente no navegador:

| Elemento                        | Função                                                          |
|---------------------------------|-----------------------------------------------------------------|
| `<meta charset="UTF-8">`       | Define a codificação de caracteres (suporta acentos, ç, etc.)  |
| `<meta name="viewport" ...>`   | Torna a página responsiva em dispositivos móveis               |
| `<title>`                      | Define o título exibido na aba do navegador                     |
| `<link>`                       | Vincula arquivos externos (CSS, ícones)                        |
| `<style>`                      | Define estilos CSS internos                                    |
| `<script>`                     | Vincula ou define código JavaScript                            |
| `<meta name="description" ...>`| Descrição para motores de busca                                |

#### `<body>` — Corpo do Documento
- Contém **todo o conteúdo visível** da página
- Textos, imagens, vídeos, formulários, links — tudo fica aqui
- Só pode haver **um** `<body>` por documento

---

## 3. Tags Semânticas

As tags semânticas do HTML5 dão **significado** ao conteúdo, tornando a página mais compreensível para navegadores, leitores de tela e motores de busca.

### Por que usar tags semânticas?

Antes do HTML5, a estrutura era feita com `<div>` genéricas:

```html
<!-- ❌ Forma antiga (sem semântica) -->
<div id="cabecalho">...</div>
<div id="menu">...</div>
<div id="conteudo">...</div>
<div id="rodape">...</div>
```

Com HTML5, temos tags que **descrevem** o propósito do conteúdo:

```html
<!-- ✅ Forma moderna (semântica) -->
<header>...</header>
<nav>...</nav>
<main>...</main>
<footer>...</footer>
```

### Principais Tags Semânticas

#### `<header>` — Cabeçalho
- Define o **cabeçalho** de uma página ou seção
- Geralmente contém logotipo, título do site e navegação principal
- Pode haver mais de um `<header>` na página (um por seção)

```html
<header>
    <h1>Meu Blog de Tecnologia</h1>
    <nav>
        <a href="/">Início</a>
        <a href="/sobre">Sobre</a>
    </nav>
</header>
```

#### `<nav>` — Navegação
- Define um bloco de **links de navegação** principal
- Não deve ser usado para qualquer grupo de links, apenas navegação principal

```html
<nav>
    <ul>
        <li><a href="/">Início</a></li>
        <li><a href="/produtos">Produtos</a></li>
        <li><a href="/contato">Contato</a></li>
    </ul>
</nav>
```

#### `<main>` — Conteúdo Principal
- Define o **conteúdo principal** e único da página
- Deve haver **apenas um** `<main>` por página
- Não deve incluir barras laterais, cabeçalho ou rodapé

```html
<main>
    <h2>Artigos Recentes</h2>
    <article>...</article>
    <article>...</article>
</main>
```

#### `<section>` — Seção Temática
- Agrupa conteúdo relacionado tematicamente
- Geralmente possui um cabeçalho (`<h2>`, `<h3>`, etc.)
- Use quando o conteúdo faz sentido como uma "seção" num índice

```html
<section>
    <h2>Sobre Nós</h2>
    <p>Somos uma empresa de tecnologia fundada em 2020...</p>
</section>
```

#### `<article>` — Artigo/Conteúdo Independente
- Representa um conteúdo **independente e autocontido**
- Deve fazer sentido sozinho, fora do contexto da página
- Exemplos: post de blog, notícia, comentário, tweet

```html
<article>
    <h2>Como aprender HTML em 2024</h2>
    <p>Publicado em <time datetime="2024-01-15">15 de janeiro de 2024</time></p>
    <p>HTML é a base de toda a web moderna...</p>
</article>
```

#### `<aside>` — Conteúdo Lateral/Complementar
- Conteúdo **relacionado indiretamente** ao conteúdo principal
- Barras laterais, links relacionados, anúncios, biografias de autor

```html
<aside>
    <h3>Artigos Relacionados</h3>
    <ul>
        <li><a href="#">Introdução ao CSS</a></li>
        <li><a href="#">JavaScript para Iniciantes</a></li>
    </ul>
</aside>
```

#### `<footer>` — Rodapé
- Define o **rodapé** de uma página ou seção
- Geralmente contém informações de copyright, links e contato

```html
<footer>
    <p>&copy; 2024 Meu Site. Todos os direitos reservados.</p>
    <nav>
        <a href="/privacidade">Política de Privacidade</a>
        <a href="/termos">Termos de Uso</a>
    </nav>
</footer>
```

### Estrutura Semântica Completa (Exemplo Visual)

```
┌──────────────────────────────────────┐
│              <header>                │
│   Logo    <nav> Links </nav>         │
├──────────────────────────────────────┤
│ <main>                   │ <aside>   │
│  ┌─────────────────┐     │           │
│  │   <article>      │     │ Links     │
│  │   Notícia 1      │     │ Relaciona-│
│  └─────────────────┘     │ dos       │
│  ┌─────────────────┐     │           │
│  │   <section>      │     │           │
│  │   Comentários    │     │           │
│  └─────────────────┘     │           │
├──────────────────────────────────────┤
│              <footer>                │
│         © 2024 Meu Site              │
└──────────────────────────────────────┘
```

### Outras Tags Semânticas Úteis

| Tag            | Descrição                                           |
|----------------|-----------------------------------------------------|
| `<figure>`     | Agrupa imagem com legenda                           |
| `<figcaption>` | Legenda de uma `<figure>`                           |
| `<time>`       | Representa data/hora (legível por máquinas)         |
| `<mark>`       | Texto destacado/marcado                             |
| `<details>`    | Bloco expansível (acordeão)                         |
| `<summary>`    | Título do bloco `<details>`                         |
| `<address>`    | Informações de contato                              |
| `<blockquote>` | Citação em bloco                                    |

---

## 4. Tags de Texto

### Títulos (Headings): `<h1>` a `<h6>`

Os headings definem a **hierarquia** de títulos da página, de `<h1>` (mais importante) a `<h6>` (menos importante).

```html
<h1>Título Principal da Página</h1>      <!-- Apenas 1 por página (SEO) -->
<h2>Subtítulo / Seção</h2>               <!-- Seções principais -->
<h3>Sub-seção</h3>                        <!-- Detalhes da seção -->
<h4>Sub-sub-seção</h4>
<h5>Detalhe menor</h5>
<h6>Menor nível de título</h6>
```

> 💡 **Dica de SEO:** Use apenas **um `<h1>`** por página. Mantenha a hierarquia lógica — não pule de `<h1>` para `<h4>`.

### Parágrafo: `<p>`

Representa um **bloco de texto** (parágrafo). O navegador adiciona espaçamento automático entre parágrafos.

```html
<p>Este é o primeiro parágrafo do texto.</p>
<p>Este é o segundo parágrafo, separado automaticamente.</p>
```

### Formatação de Texto

| Tag          | Significado                | Resultado Visual     |
|--------------|----------------------------|----------------------|
| `<strong>`   | Importância forte          | **texto em negrito** |
| `<em>`       | Ênfase                     | *texto em itálico*   |
| `<b>`        | Negrito (sem ênfase semântica) | **negrito**      |
| `<i>`        | Itálico (sem ênfase semântica) | *itálico*        |
| `<u>`        | Sublinhado                 | <u>sublinhado</u>    |
| `<s>`        | Tachado (riscado)          | ~~tachado~~          |
| `<small>`    | Texto menor                | texto menor          |
| `<sub>`      | Subscrito                  | H₂O                 |
| `<sup>`      | Sobrescrito                | x²                  |
| `<code>`     | Código inline              | `código`             |
| `<pre>`      | Texto pré-formatado        | mantém espaços       |
| `<mark>`     | Texto destacado            | destacado            |
| `<abbr>`     | Abreviação com tooltip     | HTML (tooltip)       |

```html
<p>
    HTML é <strong>muito importante</strong> para o desenvolvimento web.
    Devemos <em>sempre</em> usar tags semânticas.
</p>

<p>A fórmula da água é H<sub>2</sub>O e a equação é E = mc<sup>2</sup>.</p>

<p>Use a tag <code>&lt;strong&gt;</code> para dar ênfase forte.</p>

<p><abbr title="HyperText Markup Language">HTML</abbr> é a base da web.</p>
```

> ⚠️ **`<strong>` vs `<b>`:** Prefira `<strong>` quando o texto é **semanticamente importante**. Use `<b>` apenas para negrito visual sem importância semântica.

### Quebra de Linha e Linha Horizontal

```html
<!-- <br> — Quebra de linha (NÃO cria novo parágrafo) -->
<p>
    Linha 1 do endereço<br>
    Linha 2 do endereço<br>
    CEP: 01001-000
</p>

<!-- <hr> — Linha horizontal (separador temático) -->
<p>Seção anterior</p>
<hr>
<p>Nova seção do conteúdo</p>
```

> 💡 **Dica:** Evite usar `<br>` para criar espaçamento. Para isso, use CSS (`margin`, `padding`).

---

## 5. Listas

### Lista Não Ordenada: `<ul>`

Utilizada quando a **ordem não importa**. Os itens são exibidos com marcadores (bullets).

```html
<ul>
    <li>HTML</li>
    <li>CSS</li>
    <li>JavaScript</li>
</ul>
```

**Resultado:**
- HTML
- CSS
- JavaScript

### Lista Ordenada: `<ol>`

Utilizada quando a **ordem importa**. Os itens são numerados automaticamente.

```html
<!-- Lista ordenada padrão (1, 2, 3...) -->
<ol>
    <li>Aprender HTML</li>
    <li>Aprender CSS</li>
    <li>Aprender JavaScript</li>
</ol>

<!-- Atributos opcionais -->
<ol type="A" start="3" reversed>
    <!-- type: "1" (padrão), "A", "a", "I", "i" -->
    <!-- start: número inicial -->
    <!-- reversed: ordem decrescente -->
    <li>Item C</li>
    <li>Item B</li>
    <li>Item A</li>
</ol>
```

### Listas Aninhadas

```html
<ul>
    <li>Front-end
        <ul>
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
        </ul>
    </li>
    <li>Back-end
        <ul>
            <li>Node.js</li>
            <li>Python</li>
            <li>PHP</li>
        </ul>
    </li>
</ul>
```

### Lista de Definição: `<dl>`, `<dt>`, `<dd>`

Utilizada para criar pares de **termo/definição**, como um glossário.

```html
<dl>
    <dt>HTML</dt>
    <dd>Linguagem de marcação para estruturar páginas web.</dd>

    <dt>CSS</dt>
    <dd>Linguagem de estilos para definir a aparência visual.</dd>

    <dt>JavaScript</dt>
    <dd>Linguagem de programação para adicionar interatividade.</dd>
</dl>
```

---

## 6. Links e Imagens

### Links: `<a>` (Âncora)

A tag `<a>` cria **hiperlinks** — a essência da web.

```html
<!-- Link externo (abre em nova aba) -->
<a href="https://www.google.com" target="_blank" rel="noopener noreferrer">
    Ir para o Google
</a>

<!-- Link interno (mesma aba) -->
<a href="/sobre.html">Sobre Nós</a>

<!-- Link para e-mail -->
<a href="mailto:contato@exemplo.com">Enviar E-mail</a>

<!-- Link para telefone -->
<a href="tel:+5511999999999">Ligar: (11) 99999-9999</a>

<!-- Link para download -->
<a href="/arquivo.pdf" download>Baixar PDF</a>

<!-- Âncora interna (ir para seção da mesma página) -->
<a href="#secao-contato">Ir para Contato</a>
<!-- ... mais abaixo na página ... -->
<section id="secao-contato">
    <h2>Contato</h2>
</section>
```

#### Atributos Importantes do `<a>`

| Atributo              | Descrição                                            |
|-----------------------|------------------------------------------------------|
| `href`                | URL de destino (obrigatório)                         |
| `target="_blank"`     | Abre em nova aba                                     |
| `rel="noopener"`      | Segurança ao abrir em nova aba                       |
| `rel="noreferrer"`    | Não envia informação de referência                   |
| `download`            | Faz download ao invés de navegar                     |
| `title`               | Tooltip ao passar o mouse                            |

### Imagens: `<img>`

A tag `<img>` insere imagens na página. É uma tag **void** (auto-fechante, sem tag de fechamento).

```html
<!-- Imagem básica -->
<img src="foto.jpg" alt="Descrição da foto" width="600" height="400">

<!-- Imagem com caminho relativo -->
<img src="./imagens/logo.png" alt="Logotipo da empresa">

<!-- Imagem de URL externa -->
<img src="https://via.placeholder.com/300x200" alt="Imagem de exemplo">
```

#### Atributos Importantes do `<img>`

| Atributo   | Descrição                                                  |
|------------|-------------------------------------------------------------|
| `src`      | Caminho/URL da imagem (obrigatório)                        |
| `alt`      | Texto alternativo — **obrigatório** para acessibilidade    |
| `width`    | Largura em pixels                                          |
| `height`   | Altura em pixels                                           |
| `loading`  | `"lazy"` para carregamento preguiçoso (performance)        |
| `title`    | Tooltip ao passar o mouse                                  |

> ⚠️ **Acessibilidade:** O atributo `alt` é **essencial**. Ele descreve a imagem para leitores de tela e é exibido se a imagem não carregar. Nunca o omita!

### `<figure>` e `<figcaption>` — Imagem com Legenda

```html
<figure>
    <img src="grafico-vendas.png" alt="Gráfico mostrando crescimento de vendas em 2024">
    <figcaption>Figura 1: Crescimento de vendas no primeiro trimestre de 2024.</figcaption>
</figure>
```

---

## 7. Tabelas

Tabelas em HTML são usadas para exibir **dados tabulares** (nunca para layout de página!).

### Estrutura Completa de uma Tabela

```html
<table>
    <!-- Legenda da tabela -->
    <caption>Notas dos Alunos — 1º Semestre 2024</caption>

    <!-- Cabeçalho da tabela -->
    <thead>
        <tr>
            <th>Nome</th>
            <th>Matemática</th>
            <th>Português</th>
            <th>Média</th>
        </tr>
    </thead>

    <!-- Corpo da tabela -->
    <tbody>
        <tr>
            <td>Ana Silva</td>
            <td>8.5</td>
            <td>9.0</td>
            <td>8.75</td>
        </tr>
        <tr>
            <td>João Santos</td>
            <td>7.0</td>
            <td>8.0</td>
            <td>7.50</td>
        </tr>
    </tbody>

    <!-- Rodapé da tabela -->
    <tfoot>
        <tr>
            <td>Média da Turma</td>
            <td>7.75</td>
            <td>8.50</td>
            <td>8.13</td>
        </tr>
    </tfoot>
</table>
```

### Tags de Tabela

| Tag          | Descrição                                    |
|--------------|----------------------------------------------|
| `<table>`    | Define a tabela                              |
| `<caption>`  | Título/legenda da tabela                     |
| `<thead>`    | Agrupa o cabeçalho                           |
| `<tbody>`    | Agrupa o corpo de dados                      |
| `<tfoot>`    | Agrupa o rodapé                              |
| `<tr>`       | Define uma linha (table row)                 |
| `<th>`       | Célula de cabeçalho (negrito e centralizada) |
| `<td>`       | Célula de dados                              |

### `colspan` e `rowspan`

Permitem que uma célula ocupe **várias colunas** ou **várias linhas**.

```html
<table border="1">
    <tr>
        <!-- Esta célula ocupa 3 colunas -->
        <th colspan="3">Informações do Aluno</th>
    </tr>
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>Turma</th>
    </tr>
    <tr>
        <!-- Esta célula ocupa 2 linhas -->
        <td rowspan="2">Maria</td>
        <td>15</td>
        <td>A</td>
    </tr>
    <tr>
        <!-- Não precisa de célula para "Nome" pois o rowspan acima ocupa esta posição -->
        <td>16</td>
        <td>B</td>
    </tr>
</table>
```

> 💡 **Dica:** O atributo `border="1"` é útil para visualizar a tabela durante o desenvolvimento, mas prefira estilizá-la com CSS.

---

## 8. Formulários

Formulários são a principal forma de **coletar dados** do usuário.

### Estrutura Básica

```html
<form action="/processar" method="POST">
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome" required>

    <button type="submit">Enviar</button>
</form>
```

### Atributos do `<form>`

| Atributo       | Descrição                                          |
|----------------|-----------------------------------------------------|
| `action`       | URL para onde os dados serão enviados               |
| `method`       | `GET` (na URL) ou `POST` (no corpo da requisição)  |
| `enctype`      | Tipo de codificação (importante para upload de arquivo) |
| `autocomplete` | `on` ou `off` para autocompletar                    |
| `novalidate`   | Desativa validação nativa do navegador              |

### Tipos de `<input>`

O `<input>` é o elemento mais versátil dos formulários. O atributo `type` define seu comportamento:

| Tipo       | Descrição                        | Exemplo Visual           |
|------------|----------------------------------|--------------------------|
| `text`     | Texto livre                      | Campo de texto simples   |
| `email`    | E-mail (validação automática)    | campo@email.com          |
| `password` | Senha (caracteres ocultos)       | ••••••••                 |
| `number`   | Número (com setas)               | 42                       |
| `tel`      | Telefone                         | (11) 99999-9999          |
| `url`      | URL (validação automática)       | https://exemplo.com      |
| `date`     | Seletor de data                  | Calendário               |
| `time`     | Seletor de horário               | Relógio                  |
| `datetime-local` | Data e hora               | Calendário + Relógio     |
| `color`    | Seletor de cor                   | Paleta de cores          |
| `range`    | Controle deslizante              | Slider                   |
| `file`     | Upload de arquivo                | Botão "Escolher arquivo" |
| `checkbox` | Caixa de seleção                 | ☑ / ☐                   |
| `radio`    | Botão de opção (seleção única)   | ◉ / ○                   |
| `hidden`   | Campo oculto                     | Invisível                |
| `search`   | Campo de busca                   | Com ícone de limpar      |
| `submit`   | Botão de envio                   | Botão                    |
| `reset`    | Botão de limpar formulário       | Botão                    |

### Atributos de Validação

```html
<!-- Campo obrigatório -->
<input type="text" required>

<!-- Placeholder (texto de exemplo) -->
<input type="email" placeholder="seu@email.com">

<!-- Comprimento mínimo e máximo -->
<input type="text" minlength="3" maxlength="50">

<!-- Valor mínimo e máximo (para numbers) -->
<input type="number" min="1" max="100" step="1">

<!-- Padrão com expressão regular (regex) -->
<input type="tel" pattern="\(\d{2}\)\s?\d{4,5}-\d{4}"
       title="Formato: (11) 99999-9999">

<!-- Somente leitura -->
<input type="text" readonly value="Não editável">

<!-- Desabilitado -->
<input type="text" disabled value="Desabilitado">

<!-- Foco automático ao carregar a página -->
<input type="text" autofocus>
```

### Outros Elementos de Formulário

#### `<textarea>` — Área de Texto Multilinha

```html
<label for="mensagem">Mensagem:</label>
<textarea id="mensagem" name="mensagem" rows="5" cols="40"
          placeholder="Digite sua mensagem aqui..."></textarea>
```

#### `<select>` — Lista Suspensa (Dropdown)

```html
<label for="estado">Estado:</label>
<select id="estado" name="estado" required>
    <option value="" disabled selected>Selecione...</option>
    <optgroup label="Sudeste">
        <option value="SP">São Paulo</option>
        <option value="RJ">Rio de Janeiro</option>
        <option value="MG">Minas Gerais</option>
    </optgroup>
    <optgroup label="Sul">
        <option value="PR">Paraná</option>
        <option value="SC">Santa Catarina</option>
        <option value="RS">Rio Grande do Sul</option>
    </optgroup>
</select>
```

#### `<fieldset>` e `<legend>` — Agrupamento

```html
<fieldset>
    <legend>Dados Pessoais</legend>
    <label for="nome">Nome:</label>
    <input type="text" id="nome" name="nome">

    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email">
</fieldset>
```

#### `<datalist>` — Sugestões de Preenchimento

```html
<label for="linguagem">Linguagem favorita:</label>
<input type="text" id="linguagem" list="linguagens">
<datalist id="linguagens">
    <option value="JavaScript">
    <option value="Python">
    <option value="Java">
    <option value="C#">
    <option value="PHP">
</datalist>
```

#### `<button>` — Botões

```html
<!-- Botão de envio (padrão dentro de form) -->
<button type="submit">Enviar Formulário</button>

<!-- Botão de reset -->
<button type="reset">Limpar Campos</button>

<!-- Botão genérico (para JavaScript) -->
<button type="button" onclick="alert('Clicou!')">Clique Aqui</button>
```

---

## 9. Multimídia

O HTML5 trouxe suporte **nativo** para áudio e vídeo, sem necessidade de plugins como Flash.

### `<video>` — Vídeos

```html
<video width="640" height="360" controls poster="thumbnail.jpg">
    <source src="video.mp4" type="video/mp4">
    <source src="video.webm" type="video/webm">
    Seu navegador não suporta o elemento de vídeo.
</video>
```

#### Atributos do `<video>`

| Atributo    | Descrição                                      |
|-------------|------------------------------------------------|
| `controls`  | Exibe os controles de reprodução               |
| `autoplay`  | Inicia a reprodução automaticamente            |
| `muted`     | Inicia sem som (necessário para autoplay)      |
| `loop`      | Repete o vídeo continuamente                   |
| `poster`    | Imagem de capa antes da reprodução             |
| `preload`   | `"auto"`, `"metadata"`, `"none"`               |
| `width`     | Largura em pixels                              |
| `height`    | Altura em pixels                               |

### `<audio>` — Áudios

```html
<audio controls>
    <source src="musica.mp3" type="audio/mpeg">
    <source src="musica.ogg" type="audio/ogg">
    Seu navegador não suporta o elemento de áudio.
</audio>
```

### `<iframe>` — Conteúdo Incorporado

O `<iframe>` incorpora outra página ou conteúdo externo dentro da sua página.

```html
<!-- Incorporar vídeo do YouTube -->
<iframe width="560" height="315"
        src="https://www.youtube.com/embed/VIDEO_ID"
        title="Título do vídeo"
        frameborder="0"
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen>
</iframe>

<!-- Incorporar mapa do Google Maps -->
<iframe src="https://www.google.com/maps/embed?pb=..."
        width="600" height="450"
        style="border:0;"
        allowfullscreen
        loading="lazy"
        title="Localização no mapa">
</iframe>
```

> ⚠️ **Segurança:** Tenha cuidado ao usar `<iframe>`. Carregue conteúdo apenas de fontes confiáveis. O atributo `sandbox` pode adicionar restrições de segurança.

---

## 10. Meta Tags e SEO

### Meta Tags Essenciais

```html
<head>
    <!-- Codificação de caracteres -->
    <meta charset="UTF-8">

    <!-- Responsividade em dispositivos móveis -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título da página (aparece na aba e nos resultados de busca) -->
    <title>Título da Página — Nome do Site</title>

    <!-- Descrição da página para motores de busca -->
    <meta name="description" content="Descrição clara e concisa da página com até 160 caracteres.">

    <!-- Palavras-chave (menos relevante hoje, mas ainda usado) -->
    <meta name="keywords" content="HTML, CSS, JavaScript, web, desenvolvimento">

    <!-- Autor da página -->
    <meta name="author" content="Nome do Autor">

    <!-- Controle de indexação por robôs de busca -->
    <meta name="robots" content="index, follow">

    <!-- Tema de cor para navegadores mobile -->
    <meta name="theme-color" content="#0066cc">
</head>
```

### Open Graph (Compartilhamento em Redes Sociais)

Quando alguém compartilha seu link no Facebook, WhatsApp, LinkedIn, etc., estas tags definem como o preview aparece:

```html
<meta property="og:title" content="Título para Redes Sociais">
<meta property="og:description" content="Descrição que aparece ao compartilhar">
<meta property="og:image" content="https://meusite.com/imagem-preview.jpg">
<meta property="og:url" content="https://meusite.com/pagina">
<meta property="og:type" content="website">
<meta property="og:locale" content="pt_BR">
```

### Twitter Cards

```html
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Título para o Twitter">
<meta name="twitter:description" content="Descrição para o Twitter">
<meta name="twitter:image" content="https://meusite.com/imagem-twitter.jpg">
```

### Favicon (Ícone da Aba)

```html
<link rel="icon" type="image/x-icon" href="/favicon.ico">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
```

### Boas Práticas de SEO com HTML

1. **Use apenas um `<h1>` por página** — deve descrever o conteúdo principal
2. **Mantenha a hierarquia de headings** — `<h1>` → `<h2>` → `<h3>` (sem pular níveis)
3. **Sempre inclua `alt` nas imagens** — descreva o conteúdo da imagem
4. **Use tags semânticas** — `<header>`, `<nav>`, `<main>`, `<article>`, `<footer>`
5. **Títulos descritivos** — `<title>` deve ser único e descritivo (50-60 caracteres)
6. **Meta description** — resumo atrativo da página (até 160 caracteres)
7. **URLs amigáveis** — `/blog/como-aprender-html` ao invés de `/pagina?id=123`
8. **Links com texto descritivo** — "Leia o artigo sobre HTML" ao invés de "Clique aqui"
9. **Atributo `lang`** — defina o idioma no `<html>`
10. **Performance** — use `loading="lazy"` em imagens abaixo da dobra

---

## 📚 Referências e Recursos

- [MDN Web Docs — HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML) — Documentação de referência
- [W3Schools — HTML](https://www.w3schools.com/html/) — Tutoriais e exemplos práticos
- [WHATWG — HTML Living Standard](https://html.spec.whatwg.org/) — Especificação oficial
- [Can I Use](https://caniuse.com/) — Compatibilidade de recursos entre navegadores
- [HTML5 Doctor](http://html5doctor.com/) — Guia de elementos HTML5
- [Web.dev — Learn HTML](https://web.dev/learn/html) — Curso gratuito do Google

---

> 📝 **Nota:** Este material foi criado para fins de estudo. Pratique criando suas próprias páginas e experimentando cada tag apresentada!
