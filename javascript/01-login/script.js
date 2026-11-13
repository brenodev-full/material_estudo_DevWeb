// ============================================
// 🔐 Script de Autenticação Simples
// Arquivo: script.js
// Descrição: Valida credenciais de login usando
// valores fixos (hardcoded). Em um projeto real,
// a validação seria feita no servidor (backend).
// ============================================

// === Credenciais válidas (fixas para fins didáticos) ===
// ⚠️ ATENÇÃO: Em projetos reais, NUNCA armazene senhas no front-end!
// A autenticação deve ser feita no servidor com senhas criptografadas.
const CREDENCIAIS = {
    usuario: "admin",
    senha: "1234"
};

// === Aguarda o DOM ser carregado antes de manipular elementos ===
// DOMContentLoaded é disparado quando o HTML foi completamente parseado
document.addEventListener("DOMContentLoaded", function() {

    // --- Seleção de elementos do DOM ---
    // getElementById busca um elemento pelo seu atributo id
    const formulario = document.getElementById("formulario-login");
    const inputUsuario = document.getElementById("usuario");
    const inputSenha = document.getElementById("senha");
    const mensagemErro = document.getElementById("mensagem-erro");

    // --- Adiciona listener de evento ao formulário ---
    // O evento "submit" é disparado quando o formulário é enviado
    formulario.addEventListener("submit", function(evento) {

        // preventDefault() impede o comportamento padrão do formulário
        // (que seria recarregar a página ao enviar)
        evento.preventDefault();

        // --- Captura os valores digitados pelo usuário ---
        // .value obtém o conteúdo atual do input
        // .trim() remove espaços em branco no início e no final
        const usuarioDigitado = inputUsuario.value.trim();
        const senhaDigitada = inputSenha.value.trim();

        // --- Validação: campos vazios ---
        if (usuarioDigitado === "" || senhaDigitada === "") {
            // textContent altera o texto de um elemento de forma segura
            mensagemErro.textContent = "⚠️ Preencha todos os campos!";
            return; // Interrompe a execução da função
        }

        // --- Verificação das credenciais ---
        // Compara o que foi digitado com as credenciais armazenadas
        // Usamos === (igualdade estrita) para comparar valor E tipo
        if (usuarioDigitado === CREDENCIAIS.usuario && senhaDigitada === CREDENCIAIS.senha) {

            // ✅ Login bem-sucedido!
            // Limpa qualquer mensagem de erro anterior
            mensagemErro.textContent = "";

            // Salva o nome do usuário no sessionStorage
            // sessionStorage mantém dados enquanto a aba do navegador estiver aberta
            sessionStorage.setItem("usuarioLogado", usuarioDigitado);

            // Redireciona para a página de boas-vindas
            // window.location.href navega para a URL especificada
            window.location.href = "bemvindo.html";

        } else {

            // ❌ Credenciais incorretas!
            mensagemErro.textContent = "❌ Usuário ou senha incorretos!";

            // Limpa o campo de senha para que o usuário tente novamente
            inputSenha.value = "";

            // Coloca o foco no campo de senha
            inputSenha.focus();

            // Adiciona uma animação de "shake" (tremida) no formulário
            // para indicar visualmente o erro
            formulario.style.animation = "shake 0.5s ease";

            // Remove a animação após ela terminar para poder repetir
            setTimeout(() => {
                formulario.style.animation = "";
            }, 500);

            // Após 3 tentativas erradas consecutivas, redireciona para página de erro
            // Usamos uma variável no escopo exterior (closure) para contar tentativas
            tentativasErradas++;

            if (tentativasErradas >= 3) {
                // Redireciona para a página de erro após muitas tentativas
                window.location.href = "erro.html";
            }
        }
    });

    // --- Contador de tentativas erradas ---
    // Declarado com let dentro do escopo do DOMContentLoaded (closure)
    let tentativasErradas = 0;

    // --- Limpa mensagem de erro quando o usuário começa a digitar ---
    // O evento "input" é disparado a cada alteração no campo
    inputUsuario.addEventListener("input", function() {
        mensagemErro.textContent = "";
    });

    inputSenha.addEventListener("input", function() {
        mensagemErro.textContent = "";
    });

    // --- Foca automaticamente no campo de usuário ao carregar a página ---
    inputUsuario.focus();
});

// === Adicionando a animação de shake via JavaScript ===
// Cria um elemento <style> e adiciona ao <head> do documento
const estiloAnimacao = document.createElement("style");
estiloAnimacao.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        20% { transform: translateX(-10px); }
        40% { transform: translateX(10px); }
        60% { transform: translateX(-10px); }
        80% { transform: translateX(10px); }
    }
`;
document.head.appendChild(estiloAnimacao);
