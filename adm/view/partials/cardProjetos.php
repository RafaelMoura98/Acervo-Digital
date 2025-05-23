<div class="card-container">
    <div class="card" data-post-id=<?= $projeto['id'] ?>>
        <div class="card-header">
            <h3><?= $projeto['titulo']?></h3>
            <div class="card-header-right">
                <h5>Curtidas:</h5>
                <span class="contador-likes" id="likes-projeto-${projeto.id}"><?= $projeto['like_pi']?></span>
            </div>
        </div>
        <p class= "resumo_justificado"><?= $projeto['resumo']?></p>
        <p>Curso: <?= $projeto['nome_curso']?></p>
        <p>Ano de publicação: <?= $projeto['ano']?></p>
        <div class="card-footer">
            <button class="botao-like">
                <span>CURTIR</span>
            </button>
            <button class="btn">BAIXAR</button>
            <button class="btn">VER ONLINE</button>
            <button class="btn">EDITAR</button>
        </div>
    </div>
</div>