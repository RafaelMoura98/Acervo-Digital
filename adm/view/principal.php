<div class="container-fluid mt-5">
    <div class="row">
        <aside class="col-12 col-md-4 col-lg-2 mb-4 mb-md-0" style="margin-top: 4em;">
            <div class="card shadow rounded-4">
                <div class="card-body">
                    <input id="searchInput" class="form-control mb-3" type="search" placeholder="Buscar por título ou resumo" aria-label="Buscar"/>
                    <div class="mb-4 d-flex flex-column">
                        <h6 class="text-uppercase fw-bold mb-3">Cursos</h6>
                            <?php foreach (Cursos::consultarNomeCursos() as $curso): ?>
                                <div class="card p-2 mb-2 shadow-sm rounded d-flex flex-row align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" id="curso-<?= $curso['id'] ?>" name="curso[]" value="<?= $curso['id'] ?>">
                                    <label class="form-check-label m-0" for="curso-<?= $curso['id'] ?>"><?= $curso['curso'] ?></label>
                                </div>
                            <?php endforeach ?>
                    </div>
                    <div class="mb-4 d-flex flex-column">
                        <h6 class="text-uppercase fw-bold mb-3">Ano de publicação</h6>
                        <?php foreach (Projetos::consultarAnosPubliProjetos() as $ano_publi): ?>
                            <div class="card p-2 mb-2 shadow-sm rounded d-flex flex-row align-items-center">
                                <input class="form-check-input me-2" type="checkbox" id="<?= $ano_publi['ano'] ?>" name="ano[]" value="<?= $ano_publi['ano'] ?>">
                                <label class="form-check-label m-0" for="<?= $ano_publi['ano'] ?>"><?= $ano_publi['ano'] ?></label>
                            </div>
                        <?php endforeach ?>
                    </div>
                    <button class="btn btn-secondary w-100 mb-3" id="limparFiltros">Limpar Filtros</button>
                </div>
            </div>
        </aside>
        <main class= "col-12 col-md-8 col-lg-10" id="mainPI">
            <!-- ONDE VAI SER ADICIONADO O CARREGAMENTO DE ACORDO COM O FILTRO VINDO DO AJAX -->
        </main>
    </div>
</div>



