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
<script src="../assets/javascript/carregarProjetos.js"></script>
<script src="../assets/javascript/limparFiltros.js"></script>
<script src="../assets/javascript/arquivo.js"></script>
</html>