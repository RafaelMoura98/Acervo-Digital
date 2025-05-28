$(document).ready(function () {
  let timeout;
  $('#searchInput, input[name="curso[]"], input[name="ano[]"]')
    .on('input change', () => {
      clearTimeout(timeout);
      timeout = setTimeout(carregarPI, 500);
    });
  carregarPI();
});

function carregarPI() {
  const termo = $("#searchInput").val().trim();

  // Coleta múltiplos cursos
  const cursos = $("input[name='curso[]']:checked").map(function(){ return this.value; }).get();
  // Coleta múltiplos anos
  const anos   = $("input[name='ano[]']:checked").map(function(){ return this.value; }).get();

  $.ajax({
    url: URL_CONTROLLER_PROJETOS,
    method: "POST",
    data: { 
      cursos,    // array de ids de curso
      anos,      // array de anos
      termo,
      action: 'carregar_html_projetos'
    },
    dataType: "html",
    success(html) {
      $("#content_PI").html(html);
      bindLikes();
    },
    error() {
      $("#content_PI").html('<p class="center">Erro ao carregar projetos.</p>');
    }
  });
}

function bindLikes() {
  $('.botao-like').off('click').on('click', function() {
    const $card = $(this).closest('.card');
    const id = $card.data('post-id');
    const $cnt = $card.find('.contador-likes');

    $.post(URL_CONTROLLER_PROJETOS, { action: 'like', post_id: id }, res => {
      if (res.success) {
        $cnt.text(res.new_like_count);
        $(this).addClass('liked');
      } else {
        alert('Erro ao dar like');
      }
    }, 'json');
  });
}
