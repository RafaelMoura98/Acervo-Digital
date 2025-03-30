<div id="main">
    <div id="info_PI">
        <h3>Cursos</h3>
        <div class="card-container">
            <?php foreach (Cursos::consultarNomeCursos() as $curso): ?>
                <div class="card-radio">
                    <input type="radio" id="curso-<?= $curso['id'] ?>" name="curso" value="">
                    <label for="curso-<?= $curso['id'] ?>"><?= $curso['curso'] ?></label>
                </div>
            <?php endforeach ?>
        </div>
        <h3>Ano de publicação</h3>
        <div class="card-container">
            <?php foreach (Projetos::consultarAnosPubliProjetos() as $ano_publi): ?>
                <div class="card-radio">
                    <input type="radio" id="<?= $ano_publi['ano_publi'] ?>" name="ano">
                    <label for="<?= $ano_publi['ano_publi'] ?>"><?= $ano_publi['ano_publi'] ?></label>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div id="content">
        <div id="content_PI">
            <?php foreach (Projetos::consultarProjetos() as $projetos):?>
                    <div class="card-container">
                        <div class="card">
                            <h3><?= $projetos['titulo']?></h3>
                            <p><?= $projetos['resumo']?></p>
                            <div class="card-footer">
                                <button class="btn">BAIXAR</button>
                                <button class="btn">VER ONLINE</button>
                            </div>
                        </div>
                    </div>
            <?php endforeach ?>            
        </div>
    </div>
</div>
</body>
</html>