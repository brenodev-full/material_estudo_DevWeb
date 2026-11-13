# 📋 Sistema de Boletim Escolar

Sistema web desenvolvido em **PHP** que recebe os dados de um aluno (nome e notas), calcula a média aritmética e determina automaticamente a situação acadêmica: **Aprovado**, **Recuperação** ou **Reprovado**.

---

## 📝 Descrição do Projeto

Este projeto é um **sistema de boletim escolar** simples e funcional, criado como material de estudo para aprender os fundamentos do PHP integrado com HTML, CSS e JavaScript.

### O que o sistema faz:

1. **Recebe os dados** do aluno através de um formulário web (nome e 4 notas)
2. **Valida** os dados no lado do cliente (JavaScript) e do servidor (PHP)
3. **Calcula a média** aritmética das 4 notas
4. **Determina a situação** do aluno com base na média:
   - 🟢 **Aprovado**: média ≥ 7,0
   - 🟡 **Recuperação**: média ≥ 5,0 e < 7,0
   - 🔴 **Reprovado**: média < 5,0
5. **Exibe o resultado** com visual colorido e informativo

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Uso no Projeto |
|------------|---------------|
| **PHP 7.4+** | Processamento server-side, cálculos, validação |
| **HTML5** | Estrutura das páginas e formulário |
| **CSS3** | Estilização, layout responsivo, classes de cores |
| **JavaScript** | Validação em tempo real, pré-visualização da média |

---

## 🚀 Como Executar

### Pré-requisitos

- **PHP 7.4** ou superior instalado no computador
- Verifique com: `php -v`

### Passo a passo

1. **Abra o terminal** na pasta do projeto:

```bash
cd caminho/para/projeto-boletim
```

2. **Inicie o servidor embutido do PHP**:

```bash
php -S localhost:8000
```

3. **Acesse no navegador**:

```
http://localhost:8000
```

4. **Preencha o formulário** com o nome do aluno e as 4 notas

5. **Clique em "Calcular"** para ver o resultado

> 💡 Para parar o servidor, pressione `Ctrl + C` no terminal.

---

## 🧪 Como Executar os Testes

O projeto inclui testes automatizados simples que validam as funções principais.

```bash
# Na pasta do projeto, execute:
php tests/run.php
```

O script de testes irá:
- ✅ Testar o cálculo de média com diferentes valores
- ✅ Testar a determinação de situação (limites: 5.0, 7.0)
- ✅ Testar a validação de notas (válidas e inválidas)
- 📊 Exibir um relatório com total de testes, aprovados e falhos

---

## 📁 Estrutura do Projeto

```
projeto-boletim/
│
├── index.php                  # Página principal com o formulário
├── resultado.php              # Página que exibe os resultados
├── README.md                  # Documentação do projeto (este arquivo)
│
├── includes/                  # Arquivos PHP reutilizáveis
│   ├── funcoes.php            # Funções de cálculo e validação
│   ├── topo.php               # Cabeçalho padrão das páginas (header)
│   └── rodape.php             # Rodapé padrão das páginas (footer)
│
├── assets/                    # Recursos estáticos
│   ├── css/
│   │   └── style.css          # Estilos do projeto
│   └── js/
│       └── script.js          # Validação e interatividade no cliente
│
└── tests/                     # Testes automatizados
    └── run.php                # Script de execução dos testes
```

---

## ✨ Funcionalidades

### Formulário (index.php)
- Campo para nome do aluno (obrigatório)
- 4 campos para notas (0 a 10, com casas decimais)
- Validação em tempo real com JavaScript
- Pré-visualização da média enquanto o aluno digita
- Diálogo de confirmação antes de enviar

### Resultado (resultado.php)
- Exibe o nome do aluno com dados sanitizados (proteção contra XSS)
- Mostra cada nota individual formatada
- Calcula e exibe a média aritmética
- Determina e exibe a situação com cor correspondente:
  - 🟢 Verde para Aprovado
  - 🟡 Amarelo para Recuperação
  - 🔴 Vermelho para Reprovado
- Link para voltar e calcular novamente

### Funções PHP (funcoes.php)
- `calcularMedia()` — cálculo da média aritmética
- `determinarSituacao()` — classificação por faixa de nota
- `validarNota()` — validação de limites (0 a 10)
- `formatarNota()` — formatação com 1 casa decimal
- `obterCorSituacao()` — classe CSS baseada na situação

---

## 📚 Conceitos de PHP Praticados

- Tags PHP `<?php ?>` e shorthand `<?= ?>`
- Variáveis, tipos e operadores
- Estruturas de controle (`if/elseif/else`)
- Funções com parâmetros tipados e PHPDoc
- Superglobais: `$_POST`, `$_SERVER`
- Sanitização com `htmlspecialchars()`
- Inclusão de arquivos com `include` e `require_once`
- Funções de array: `array_sum()`, `count()`
- Formatação de números com `number_format()`
- Servidor embutido do PHP (`php -S`)

---

## 📄 Licença

Este projeto é **material de estudo** de uso livre para fins educacionais.
