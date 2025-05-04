<div class="container-search">
    <input  type="text" class="search-bar" id="searchInput" placeholder="Buscar por título ou resumo...">
</div>
<div id="main">
    <div id="info_PI">
        <button id="limparFiltros">Limpar Filtros</button>
        <h3>Cursos</h3>
        <div class="card-container">
            <?php foreach (Cursos::consultarNomeCursos() as $curso): ?>
                <div class="card-radio">
                    <input type="radio" id="curso-<?= $curso['id'] ?>" name="curso" value="<?= $curso['id'] ?>">
                    <label for="curso-<?= $curso['id'] ?>"><?= $curso['curso'] ?></label>
                </div>
            <?php endforeach ?>
        </div>
        <h3>Ano de publicação</h3>
        <div class="card-container">
            <?php foreach (Projetos::consultarAnosPubliProjetos() as $ano_publi): ?>
                <div class="card-radio">
                    <input type="radio" id="<?= $ano_publi['ano'] ?>" name="ano" value="<?= $ano_publi['ano'] ?>">
                    <label for="<?= $ano_publi['ano'] ?>"><?= $ano_publi['ano'] ?></label>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div id="content">
        <div id="content_PI">  
                   
        </div>
    </div>
</div>
</body>
<script>
    $(document).ready(function () {
    let timeout;
    
    $("#searchInput").on("input", function() {
        clearTimeout(timeout);
        timeout = setTimeout(carregarPI, 400);
    });

    $("input[name='curso'], input[name='ano']").change(carregarPI);

    carregarPI();
});

function carregarPI() {

    // Pega os valores dos filtros
    const curso = $("input[name='curso']:checked").val() || "";
    const ano = $("input[name='ano']:checked").val() || "";
    const termoBusca = $("#searchInput").val().trim();

    // Se NENHUM filtro estiver selecionado E a barra de pesquisa estiver vazia
    if (curso === "" && ano === "" && termoBusca === "") {
        console.log("Nenhum filtro ou termo de busca selecionado.");
        $("#content_PI").html('<p class="center">Selecione um filtro ou digite uma busca.</p>');
        return;
    }

    // Faz a requisição AJAX
    $.ajax({
        url: "./controller/projetosController.php",
        type: "POST",
        data: { 
            curso: curso,
            ano: ano,
            termo: termoBusca
        },
        dataType: "json",
        success: function (data) {
            const contentDiv = $("#content_PI");
            contentDiv.empty();

            if (data.length > 0) {
                data.forEach(projeto => {
                    contentDiv.append(`
                        <div class="card-container">
                            <div class="card">
                                <h3>${projeto.titulo}</h3>
                                <p>${projeto.resumo}</p>
                                <p>Curso: ${projeto.curso}</p>
                                <p>Ano de publicação: ${projeto.ano}</p>
                                <div class="card-footer">
                                    <button class="btn">BAIXAR</button>
                                    <button class="btn">VER ONLINE</button>
                                </div>
                            </div>
                        </div>
                    `);
                });
            } else {
                contentDiv.html('<p class="center">Nenhum projeto encontrado.</p>');
            }
        },
        error: function (xhr, status, error) {
            console.error("Erro na requisição:", error);
            $("#content_PI").html('<p class="center">Erro ao carregar projetos.</p>');
        }
    });
}
</script>
<script src="../assets/javascript/limparFiltros.js"></script>
</html>