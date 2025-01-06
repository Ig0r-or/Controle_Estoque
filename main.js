document.addEventListener('DOMContentLoaded', function () {
    const formulario = document.getElementsByClassName('form-group');
    const mensagem = document.getElementById('mensagem');

    formulario.addEventListener('submit', function (event) {
      event.preventDefault();

      const username = formulario.querySelector('#nome').value;
      const email = formulario.querySelector('#email').value;

      if (username.length < 4) {
        mensagem.textContent = 'O nome de usuário deve ter pelo menos 4 caracteres.';
        mensagem.style.color = 'red';
        return;
      }
      if (!email.includes('@ifsuldeminas')) {
        mensagem.textContent = 'Por favor, insira um email válido.';
        mensagem.style.color = 'red';
        return;
      }
      mensagem.textContent = 'Formulário válido, documento enviado!';
      mensagem.style.color = 'green';
    });
  });