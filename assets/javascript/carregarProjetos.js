$(document).ready(function () {
    let timeout;
  
    $("#searchInput").on("input", function() {
      clearTimeout(timeout);
      timeout = setTimeout(carregarPI, 400);
    });
  
    function setupRadioToggleWithFetch(radioGroup) {
      let previouslyChecked = null;
  
      radioGroup.forEach(radio => {
        radio.addEventListener('click', function() {
          if (this === previouslyChecked) {
            radioGroup.forEach(r => {
              r.checked = false;
            });
            previouslyChecked = null;
          } else {
            previouslyChecked = this;
            radioGroup.forEach(r => {
              if (r !== this) {
                r.checked = false; // Desmarca outros botões do grupo
              }
            });
          }
          carregarPI(); // Chama carregarPI após a lógica de toggle
        });
      });
    }
  
    const radio_curso = document.querySelectorAll('input[type="radio"][name="curso"]');
    const radio_ano = document.querySelectorAll('input[type="radio"][name="ano"]');
  
    setupRadioToggleWithFetch(radio_curso);
    setupRadioToggleWithFetch(radio_ano);
  
    carregarPI();
  });
  

    function carregarPI() {
        
        // Pega os valores dos filtros
        const curso = $("input[name='curso']:checked").val() || "";
        const ano = $("input[name='ano']:checked").val() || "";
        const termoBusca = $("#searchInput").val().trim();
        
        // Faz a requisição AJAX
        $.ajax({
            url: URL_CONTROLLER_PROJETOS,
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
                                    <div class="card" data-post-id="${projeto.id}">
                                        <div class="card-header">
                                            <h3>${projeto.titulo}</h3>
                                            <div class="card-header-right">
                                                <h5>Curtidas:</h5>
                                                <span class="contador-likes" id="likes-projeto-${projeto.id}">${projeto.like_pi}</span>
                                            </div>
                                        </div>
                                        <p class= "resumo_justificado">${projeto.resumo}</p>
                                        <p>Curso: ${projeto.nome_curso}</p>
                                        <p>Ano de publicação: ${projeto.ano}</p>
                                        <div class="card-footer">
                                            <button class="botao-like">
                                                <i class="fa fa-heart"></i><span>CURTIR</span>
                                            </button>
                                            <button class="btn" onclick="baixarArquivoPorId(${projeto.id})">BAIXAR</button>
                                            <button class="btn" onclick="visualizarArquivoPorId(${projeto.id})">VER ONLINE</button>
                                            <button class="btn" onclick="editarProjetoPorId(${projeto.id})">EDITAR</button>
                                        </div>
                                    </div
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
                                    <div class="card" data-post-id="${projeto.id}">
                                        <div class="card-header">
                                            <h3>${projeto.titulo}</h3>
                                            <div class="card-header-right">
                                                <h5>Curtidas:</h5>
                                                <span class="contador-likes" id="likes-projeto-${projeto.id}">${projeto.like_pi}</span>
                                            </div>
                                        </div>
                                        <p class= "resumo_justificado">${projeto.resumo}</p>
                                        <p>Curso: ${projeto.nome_curso}</p>
                                        <p>Ano de publicação: ${projeto.ano}</p>
                                        <div class="card-footer">
                                            <button class="botao-like">
                                                <span>CURTIR</span>
                                            </button>
                                            <button class="btn" onclick="baixarArquivoPorId(${projeto.id})">BAIXAR</button>
                                            <button class="btn" onclick="visualizarArquivoPorId(${projeto.id})">VER ONLINE</button>
                                            <button class="btn" onclick="editarProjetoPorId(${projeto.id})">EDITAR</button>
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
                                    <div class="card" data-post-id="${projeto.id}">
                                        <div class="card-header">
                                            <h3>${projeto.titulo}</h3>
                                            <div class="card-header-right">
                                                <h5>Curtidas:</h5>
                                                <span class="contador-likes" id="likes-projeto-${projeto.id}">${projeto.like_pi}</span>
                                            </div>
                                        </div>
                                        <p class= "resumo_justificado">${projeto.resumo}</p>
                                        <p>Curso: ${projeto.nome_curso}</p>
                                        <p>Ano de publicação: ${projeto.ano}</p>
                                        <div class="card-footer">
                                            <button class="botao-like">
                                                <span>CURTIR</span>
                                            </button>
                                            <button class="btn" onclick="baixarArquivoPorId(${projeto.id})">BAIXAR</button>
                                            <button class="btn" onclick="visualizarArquivoPorId(${projeto.id})">VER ONLINE</button>
                                            <button class="btn" onclick="editarProjetoPorId(${projeto.id})">EDITAR</button>
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
                                    <div class="card" data-post-id="${projeto.id}">
                                        <div class="card-header">
                                            <h3>${projeto.titulo}</h3>
                                            <div class="card-header-right">
                                                <h5>Curtidas:</h5>
                                                <span class="contador-likes" id="likes-projeto-${projeto.id}">${projeto.like_pi}</span>
                                            </div>
                                        </div>
                                        <p class= "resumo_justificado">${projeto.resumo}</p>
                                        <p>Curso: ${projeto.nome_curso}</p>
                                        <p>Ano de publicação: ${projeto.ano}</p>
                                        <div class="card-footer">
                                            <button class="botao-like">
                                                <i class="fa fa-heart"></i><span>CURTIR</span>
                                            </button>
                                            <button class="btn" onclick="baixarArquivoPorId(${projeto.id})">BAIXAR</button>
                                            <button class="btn" onclick="visualizarArquivoPorId(${projeto.id})">VER ONLINE</button>
                                            <button class="btn" onclick="editarProjetoPorId(${projeto.id})">EDITAR</button>
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

                // Adiciona o evento de clique para os botões de curtir
                $('.botao-like').on('click', function() { 
                    const $botaoLike = $(this); 
                    const $itemPost = $botaoLike.closest('.card'); 
                    const postId = $itemPost.data('post-id');
                    const $contadorLikes = $itemPost.find('.contador-likes'); 
    
                    $.ajax({ 
                        url: URL_CONTROLLER_PROJETOS, // Agora esta requisição é para dar o like 
                        method: 'POST', 
                        data: { action: 'like', post_id: postId }, // Adicionamos uma 'action' para o controller saber o que fazer 
                        dataType: 'json', 
                        success: function(response) { 
                            if (response.success) { 
                                
                                $contadorLikes.text(response.new_like_count); 
                                $botaoLike.addClass('liked'); 
                                // $botaoLike.find('span').text('Curtido'); 
                            } else { 
                                alert('Erro ao dar like.'); 
                                console.error(response.error); 
                            } 
                        }, 
                        error: function(xhr, status, error) { 
                            console.error("Erro na requisição AJAX (like):", status, error); 
                            alert('Erro de comunicação com o servidor ao dar like.'); 
                        } 
                    }); 
                }); 
            },
            error: function (xhr, status, error) {
                console.error("Erro na requisição:", error);
                $("#content_PI").html('<p class="center">Erro ao carregar projetos.</p>');
            }
        });
    }