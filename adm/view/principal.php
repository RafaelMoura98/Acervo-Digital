<div id="main">
    <div id="info_PI">
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
                    <input type="radio" id="<?= $ano_publi['ano_publi'] ?>" name="ano" value="<?= $ano_publi['ano_publi'] ?>">
                    <label for="<?= $ano_publi['ano_publi'] ?>"><?= $ano_publi['ano_publi'] ?></label>
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
        // Chamando a função de carregamento ao mudar curso ou ano
        $("input[name='curso'], input[name='ano']").change(function () {
            carregarPI();
        });
    });

    function carregarPI() {
        let curso = $("input[name='curso']:checked").val() || ""; // Se não selecionado, será uma string vazia
        let ano = $("input[name='ano']:checked").val() || "";

        console.log(curso);
        console.log(ano);

        // Só faz a requisição se pelo menos um dos filtros tiver valor
        if (curso === "" && ano === "") {
            console.warn("Nenhum filtro selecionado.");
            return;
        }

        $.ajax({
            url: "./controller/projetosController.php",
            type: "POST",
            data: { 
                curso: curso,
                ano: ano
            },
            dataType: "json",
            success: function (data) {
                let contentDiv = $("#content_PI");
                contentDiv.empty();

                if (data.length > 0) {
                    data.forEach(projeto => {
                        contentDiv.append(`
                            <div class="card-container">
                                <div class="card">
                                    <h3>${projeto.titulo}</h3>
                                    <p>${projeto.resumo}</p>
                                    <div class="card-footer">
                                        <button class="btn">BAIXAR</button>
                                        <button class="btn">VER ONLINE</button>
                                    </div>
                                </div>
                            </div>
                        `);
                    });
                } else {
                    contentDiv.html("<p>Nenhum projeto encontrado.</p>");
                }
            },
            error: function (xhr, status, error) {
                console.error("Erro na requisição:", xhr.responseText);
            }
        });
    }
</script>
</html>