/**
 * ============================================================
 * 📜 Script — Sistema de Boletim Escolar
 * ============================================================
 *
 * JavaScript do lado do cliente responsável por:
 *   1. Validação do formulário antes do envio
 *   2. Validação em tempo real das notas ao digitar
 *   3. Pré-visualização da média enquanto o usuário preenche
 *   4. Diálogo de confirmação antes de submeter o formulário
 */

// Aguarda o DOM estar completamente carregado antes de executar
document.addEventListener('DOMContentLoaded', function () {

    // ============================================================
    // Referências aos Elementos do DOM
    // ============================================================

    // Busca o formulário pelo ID (só existe na página index.php)
    const formulario = document.getElementById('form-boletim');

    // Se o formulário não existir na página (ex: resultado.php), encerra
    if (!formulario) return;

    // Busca todos os campos de nota pelo atributo name (nota1, nota2, etc.)
    const camposNota = [
        document.getElementById('nota1'),
        document.getElementById('nota2'),
        document.getElementById('nota3'),
        document.getElementById('nota4')
    ];

    // Área de pré-visualização da média
    const previewArea = document.getElementById('preview-media');
    const previewValor = document.getElementById('preview-valor');

    // ============================================================
    // 1. Validação em Tempo Real — Ao Digitar nos Campos de Nota
    // ============================================================

    /**
     * Valida se uma nota está no intervalo válido (0 a 10).
     * Adiciona feedback visual ao campo.
     *
     * @param {HTMLInputElement} campo - O campo de input a ser validado
     * @returns {boolean} true se a nota for válida
     */
    function validarCampoNota(campo) {
        // Converte o valor do campo para número decimal
        const valor = parseFloat(campo.value);

        // Verifica se é um número válido e está entre 0 e 10
        if (isNaN(valor) || valor < 0 || valor > 10) {
            // Nota inválida — aplica estilo de erro
            campo.style.borderColor = '#e74c3c';
            campo.style.backgroundColor = '#fef0ef';
            return false;
        } else {
            // Nota válida — aplica estilo de sucesso
            campo.style.borderColor = '#27ae60';
            campo.style.backgroundColor = '#f0faf4';
            return true;
        }
    }

    /**
     * Reseta o estilo visual de um campo para o padrão.
     * Chamada quando o campo está vazio.
     *
     * @param {HTMLInputElement} campo - O campo de input
     */
    function resetarEstiloCampo(campo) {
        campo.style.borderColor = '';
        campo.style.backgroundColor = '';
    }

    // Adiciona evento de validação em tempo real para cada campo de nota
    camposNota.forEach(function (campo) {
        if (!campo) return;

        // Evento 'input' — disparado a cada caractere digitado
        campo.addEventListener('input', function () {
            // Se o campo estiver vazio, reseta o estilo
            if (campo.value === '') {
                resetarEstiloCampo(campo);
            } else {
                validarCampoNota(campo);
            }

            // Atualiza a pré-visualização da média
            atualizarPreviewMedia();
        });
    });

    // ============================================================
    // 2. Pré-visualização da Média em Tempo Real
    // ============================================================

    /**
     * Calcula e exibe a média das notas preenchidas.
     * Atualiza a área de preview sempre que o usuário digita.
     */
    function atualizarPreviewMedia() {
        // Se os elementos de preview não existem, não faz nada
        if (!previewArea || !previewValor) return;

        const notas = [];
        let todasPreenchidas = true;

        // Coleta todas as notas válidas preenchidas
        camposNota.forEach(function (campo) {
            if (!campo) return;

            if (campo.value !== '') {
                const valor = parseFloat(campo.value);
                // Só inclui notas numéricas válidas no cálculo
                if (!isNaN(valor) && valor >= 0 && valor <= 10) {
                    notas.push(valor);
                }
            } else {
                todasPreenchidas = false;
            }
        });

        // Se há pelo menos uma nota válida, calcula e exibe a média
        if (notas.length > 0) {
            // Calcula a soma e divide pela quantidade
            const soma = notas.reduce(function (acumulador, nota) {
                return acumulador + nota;
            }, 0);
            const media = soma / notas.length;

            // Exibe a média formatada com 1 casa decimal
            previewValor.textContent = media.toFixed(1).replace('.', ',');

            // Adiciona classe visual de ativo
            previewArea.classList.add('active');

            // Muda a cor do preview baseado na média
            if (media >= 7) {
                previewValor.style.color = '#27ae60'; // Verde — Aprovado
            } else if (media >= 5) {
                previewValor.style.color = '#f39c12'; // Amarelo — Recuperação
            } else {
                previewValor.style.color = '#e74c3c'; // Vermelho — Reprovado
            }

            // Informa se ainda faltam notas
            if (!todasPreenchidas) {
                previewArea.querySelector('.preview-label').textContent =
                    'Prévia da média (' + notas.length + ' de 4 notas):';
            } else {
                previewArea.querySelector('.preview-label').textContent =
                    'Média calculada:';
            }

        } else {
            // Nenhuma nota válida — reseta o preview
            previewValor.textContent = '--';
            previewValor.style.color = '';
            previewArea.classList.remove('active');
            previewArea.querySelector('.preview-label').textContent =
                'Preencha as notas para ver a prévia da média';
        }
    }

    // ============================================================
    // 3. Validação Completa do Formulário ao Submeter
    // ============================================================

    formulario.addEventListener('submit', function (evento) {
        let formularioValido = true;
        const erros = [];

        // --- Validação do campo nome ---
        const campoNome = document.getElementById('nome');
        if (campoNome && campoNome.value.trim() === '') {
            erros.push('O nome do aluno é obrigatório.');
            campoNome.style.borderColor = '#e74c3c';
            formularioValido = false;
        }

        // --- Validação de cada campo de nota ---
        camposNota.forEach(function (campo, indice) {
            if (!campo) return;

            const valor = parseFloat(campo.value);
            const numeroNota = indice + 1;

            // Verifica se o campo está vazio
            if (campo.value.trim() === '') {
                erros.push('A Nota ' + numeroNota + ' é obrigatória.');
                campo.style.borderColor = '#e74c3c';
                formularioValido = false;
            }
            // Verifica se é um número válido
            else if (isNaN(valor)) {
                erros.push('A Nota ' + numeroNota + ' deve ser um número válido.');
                campo.style.borderColor = '#e74c3c';
                formularioValido = false;
            }
            // Verifica se está no intervalo 0-10
            else if (valor < 0 || valor > 10) {
                erros.push('A Nota ' + numeroNota + ' deve estar entre 0 e 10.');
                campo.style.borderColor = '#e74c3c';
                formularioValido = false;
            }
        });

        // Se houver erros, impede o envio e exibe mensagens
        if (!formularioValido) {
            evento.preventDefault(); // Impede o envio do formulário

            // Exibe os erros em um alerta
            alert('⚠️ Corrija os seguintes erros:\n\n' + erros.join('\n'));
            return;
        }

        // ============================================================
        // 4. Diálogo de Confirmação Antes do Envio
        // ============================================================

        // Monta a mensagem de confirmação com os dados preenchidos
        const nome = campoNome ? campoNome.value.trim() : 'Aluno';
        const notasTexto = camposNota.map(function (campo, i) {
            return 'Nota ' + (i + 1) + ': ' + parseFloat(campo.value).toFixed(1);
        }).join('\n');

        const mensagemConfirmacao =
            '📋 Confirmar envio do boletim?\n\n' +
            'Aluno: ' + nome + '\n' +
            notasTexto + '\n\n' +
            'Clique em OK para calcular o resultado.';

        // window.confirm() exibe um diálogo com OK e Cancelar
        if (!confirm(mensagemConfirmacao)) {
            // Usuário clicou em "Cancelar" — impede o envio
            evento.preventDefault();
        }
        // Se clicar em "OK", o formulário é enviado normalmente
    });
});
