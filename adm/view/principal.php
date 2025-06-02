<div id="main">
    <div id="info_PI">
        <button id="limparFiltros">Limpar Filtros</button>
        <h3>Cursos</h3>
        <div class="card-container">
            <?php foreach (Cursos::consultarNomeCursos() as $curso): ?>
                <div class="card-radio">
                    <input type="checkbox" id="curso-<?= $curso['id'] ?>" name="curso[]" value="<?= $curso['id'] ?>">
                    <label for="curso-<?= $curso['id'] ?>"><?= $curso['curso'] ?></label>
                </div>
            <?php endforeach ?>
        </div>

        <h3>Ano de publicação</h3>
        <div class="card-container">
            <?php foreach (Projetos::consultarAnosPubliProjetos() as $ano_publi): ?>
                <div class="card-radio">
                    <input type="checkbox" id="<?= $ano_publi['ano'] ?>" name="ano[]" value="<?= $ano_publi['ano'] ?>">
                    <label for="<?= $ano_publi['ano'] ?>"><?= $ano_publi['ano'] ?></label>
                </div>
            <?php endforeach ?>
        </div>
    </div>

    <div id="content">
        <div id="content_PI"></div>
    </div>
</div>


<script>
    const URL_CONTROLLER_PROJETOS = "<?php echo URL_ADM_CONTROLLER_PROJETOS; ?>";
</script>
<script src="../assets/javascript/carregarProjetos.js"></script>
<script src="../assets/javascript/limparFiltros.js"></script>
<?php if($paginaUrl === "cadastrarPI"): ?>
<script src="../assets/javascript/formCadastroPI.js"></script>
<?php endif; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
</body>
</html>
