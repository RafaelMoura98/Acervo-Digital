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
            let outputHTML = '';

            if (data.busca) {
                if (data.busca && data.busca.length > 0) {
                    const quantidadeBusca = data.busca.length;
                    outputHTML += `<h1>Resultados da Busca (${quantidadeBusca} resultados)</h1>`;
                    data.busca.forEach(projeto => {
                        outputHTML += `
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
                        `;
                    });
                } else {
                    outputHTML = '<p class="center">Nenhum projeto encontrado para sua busca.</p>';
                }
            } else if (data.filtrados) {
                if (data.filtrados && data.filtrados.length > 0) {
                    const quantidadeFiltrados = data.filtrados.length;
                    outputHTML += `<h1>Projetos Filtrados (${quantidadeFiltrados} resultados)</h1>`;
                    data.filtrados.forEach(projeto => {
                        outputHTML += `
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
                        `;
                    });
                } else {
                    outputHTML = '<p class="center">Nenhum projeto encontrado com os filtros selecionados.</p>';
                }
            } else if (data.ultimos) {
                if (data.ultimos.length > 0) {
                    outputHTML += '<h1>Últimos Projetos</h1>';
                    data.ultimos.forEach(projeto => {
                        outputHTML += `
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
                        `;
                    });
                } else {
                    outputHTML += '<p>Nenhum projeto recente encontrado.</p>';
                }

                if (data.curtidos.length > 0) {
                    outputHTML += '<h1>Projetos Mais Curtidos</h1>';
                    data.curtidos.forEach(projeto => {
                        outputHTML += `
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
                        `;
                    });
                } else {
                    outputHTML += '<p>Nenhum projeto curtido encontrado.</p>';
                }
            } 

            contentDiv.html(outputHTML);
        },
        error: function (xhr, status, error) {
            console.error("Erro na requisição:", error);
            $("#content_PI").html('<p class="center">Erro ao carregar projetos.</p>');
        }
    });
}