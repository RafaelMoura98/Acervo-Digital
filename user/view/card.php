<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/config/configuracao.php';
 if (empty($projetos)): ?>
    <p class="center">Nenhum projeto encontrado.</p>
<?php else: ?>
    <h2 class="d-flex justify-content-center mb-4"><?= htmlspecialchars($titulo) ?></h2>
    <?php foreach ($projetos as $projeto): ?>
        <div class="card mb-4 rounded-4 shadow">
            <div class="card-body" data-post-id="<?= htmlspecialchars($projeto['id']) ?>">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title mb-0"><?= htmlspecialchars($projeto['titulo']) ?></h5>
                    <span class="d-flex align-items-baseline gap-1">
                        <span class="fw-semibold">Curtidas:</span>
                        <span class="contador-likes" style="font-size: 14px;" id="likes-projeto-<?= htmlspecialchars($projeto['id']) ?>">
                            <?= htmlspecialchars($projeto['like_pi']) ?>
                        </span>
                    </span>
                </div>
                <p class="card-text mt-2 text-justify text-muted"><small><strong>Resumo:</strong></small> <?= htmlspecialchars($projeto['resumo']) ?></p>
                <p class="mb-0 text-muted">
                    <small><strong>Curso:</strong> <?= htmlspecialchars($projeto['nome_curso']) ?> · <strong>Publicado em</strong> <?= htmlspecialchars($projeto['ano']) ?></small>
                </p>
                <div class="d-flex flex-wrap justify-content-center justify-content-md-end gap-2 mt-3">
                    <button class="btn btn-custom btn-sm botao-like"><span>CURTIR</span></button>
                    <a href="<?= constant('URL_ADM_CONTROLLER_ARQUIVOS').'?modo=download&id='.htmlspecialchars($projeto['id'])?>" download="<?= $projeto['titulo'].'.pdf' ?>" class="btn btn-custom btn-sm">BAIXAR</a>
                    <a href="<?= constant('URL_ADM_CONTROLLER_ARQUIVOS').'?modo=visualizar&id='.htmlspecialchars($projeto['id'])?>" target="_blank" class="btn btn-custom btn-sm">VER ONLINE</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>