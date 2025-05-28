$(document).ready(function() {
    const botaoLimpar = $("#limparFiltros");
  
    botaoLimpar.on("click", function() {

      $("input[name='curso[]']").prop("checked", false);
      $("input[name='ano[]']").prop("checked", false);
      $("#searchInput").val("");

      carregarPI();
    });
  });