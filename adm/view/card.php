<?php
 require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/config/configuracao.php';
 if (empty($projetos)): ?>
    <p class="center">Nenhum projeto encontrado.</p>
<?php else: ?>
    <h1 class="center"><?= htmlspecialchars($titulo) ?></h1>
    <?php foreach ($projetos as $projeto): ?>
        <div class="card-container">
            <div class="card" data-post-id="<?= htmlspecialchars($projeto['id']) ?>">
                <div class="card-header">
                    <h3><?= htmlspecialchars($projeto['titulo']) ?></h3>
                    <div class="card-header-right">
                        <h5>Curtidas:</h5>
                        <span class="contador-likes" id="likes-projeto-<?= htmlspecialchars($projeto['id']) ?>">
                            <?= htmlspecialchars($projeto['like_pi']) ?>
                        </span>
                    </div>
                </div>
                <p class="resumo_justificado"> <strong>Resumo:</strong> <?= htmlspecialchars($projeto['resumo']) ?></p>
                <p> <strong>Curso:</strong> <?= htmlspecialchars($projeto['nome_curso']) ?></p>
                <p> <strong>Ano de publicação:</strong> <?= htmlspecialchars($projeto['ano']) ?></p>
                <div class="card-footer">
                    <button class="botao-like"><span>CURTIR</span></button>
                    <a href="<?= constant('URL_ADM_CONTROLLER_ARQUIVOS').'?modo=download&id='.htmlspecialchars($projeto['id'])?>" download="<?= $projeto['titulo'].'.pdf' ?>" class="btn">BAIXAR</a>
                    <a href="<?= constant('URL_ADM_CONTROLLER_ARQUIVOS').'?modo=visualizar&id='.htmlspecialchars($projeto['id'])?>" target="_blank" class="btn">VER ONLINE</a>
                    <a href="<?= constant('URL_LOCAL_SITE_PAGINA_ADM').'editarPI&id='.htmlspecialchars(base64_encode($projeto['id']))?>" class="btn">EDITAR</a>
                    <a href="<?= constant('URL_CONTROLLER_ADM').'/excluirPIController.php?id='.htmlspecialchars($projeto['id'])?>" onclick="return confirm('Tem certeza que deseja excluir esse projeto?');" class="btn">EXCLUIR</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>