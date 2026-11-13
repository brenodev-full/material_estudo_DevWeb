const form = document.getElementById('form-candidato');
const grid = document.getElementById('grid-candidatos');
let candidatos = [];

form.addEventListener('submit', (e) => {
    e.preventDefault();
    const nome = document.getElementById('nome').value.trim();
    const partido = document.getElementById('partido').value.trim();
    const numero = document.getElementById('numero').value.trim();

    if (!nome || !partido || !numero) return;

    const candidato = { id: Date.now(), nome, partido, numero };
    candidatos.push(candidato);
    renderizar();
    form.reset();
});

function remover(id) {
    candidatos = candidatos.filter(c => c.id !== id);
    renderizar();
}

function renderizar() {
    grid.innerHTML = '';
    candidatos.forEach(c => {
        const div = document.createElement('div');
        div.className = 'card';
        div.innerHTML = `
            <h3>${c.nome}</h3>
            <p><strong>Partido:</strong> ${c.partido}</p>
            <p><strong>Número:</strong> ${c.numero}</p>
            <button class="btn-remover" onclick="remover(${c.id})">Remover</button>
        `;
        grid.appendChild(div);
    });
}

