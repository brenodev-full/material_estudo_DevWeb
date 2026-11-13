# Projeto de Desenvolvimento Web

Repositório prático com anotações e exercícios dos fundamentos do desenvolvimento web: **HTML5**, **CSS3**, **JavaScript** e **PHP**.

---

## 🛠️ Tecnologias Abordadas

* **HTML5:** Estrutura de páginas, tags semânticas, formulários, tabelas e validação nativa.
* **CSS3:** Estilização, Box Model (margem/borda/padding), seletores, responsividade e introdução ao Bootstrap.
* **JavaScript:** Manipulação do DOM, eventos, variáveis, funções, arrays, regex e conceitos de frameworks.
* **PHP:** Processamento no servidor, superglobais (`$_POST`, `$_GET`), sanitização com `htmlspecialchars()` e projeto prático de boletim escolar.

---

## 📂 Estrutura do Repositório

```text
material de estudos web/
├── html/               # Estrutura e marcação de páginas
├── css/                # Estilização de formulários, notícias, tabelas e frameworks
├── javascript/         # Scripts, validações, DOM, jogos e exercícios de lógica
└── php/                # Backend, exemplos básicos e projeto do boletim escolar
```

---

## 📖 Guias Teóricos

* [Guia de HTML](html/explicacao_html.md)
* [Guia de CSS](css/explicacao_css.md) | [Frameworks CSS](css/frameworks_css/frameworks_css.md)
* [Guia de JavaScript](javascript/hello%20world/explicacao_js.md) | [Frameworks JS](javascript/frameworksjs/frameworks_js.md)
* [Guia de PHP](php/explicacao_php.md)

---

## 🚀 Como Executar

### Páginas HTML / CSS / JS
Basta abrir qualquer arquivo `.html` diretamente com o seu navegador (ex: dois cliques ou arrastando até o navegador).

### Projeto PHP (Boletim)
Para executar o backend em PHP utilizando o servidor embutido:

1. Abra o terminal na pasta do projeto:
   ```bash
   cd php/projeto-boletim/projeto-boletim
   ```
2. Inicie o servidor local:
   ```bash
   php -S localhost:8000
   ```
3. Acesse no navegador: `http://localhost:8000`

Para rodar os testes automatizados do boletim:
```bash
php tests/run.php
```
