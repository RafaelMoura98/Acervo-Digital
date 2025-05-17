document.addEventListener('DOMContentLoaded', () => {
  const form = document.getElementById('formCadastroPI');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();

    const formData = new FormData(form);

    try {
      const response = await fetch('./controller/projetosController.php', {
        method: 'POST',
        body: formData
      });

      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }

      const resultado = await response.json();

      if (resultado.success) {
        alert(resultado.message);
        form.reset();
      } else {
        alert('Erro: ' + (resultado.message || 'Ocorreu um problema no cadastro.'));
      }
    } catch (error) {
      alert('Erro ao enviar o formulário: ' + error.message);
    }
  });
});
