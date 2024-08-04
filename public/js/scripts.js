
document.addEventListener('DOMContentLoaded', () => {
    console.log('Página carregada e scripts.js carregado.');
});

document.querySelector('form')?.addEventListener('submit', (event) => {
    const nome = document.querySelector('input[name="nome"]').value;
    const dataNascimento = document.querySelector('input[name="data_nascimento"]').value;
    const usuario = document.querySelector('input[name="usuario"]').value;

    if (!nome || !dataNascimento || !usuario) {
        event.preventDefault(); // Impede o envio do formulário se algum campo estiver vazio
        alert('Todos os campos são obrigatórios!');
    } else {
        alert('Aluno cadastrado com sucesso!');
    }
});

