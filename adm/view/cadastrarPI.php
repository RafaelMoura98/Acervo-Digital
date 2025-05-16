<?php require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/cursosModel.php'; ?>

<section>
    <div class="registro-container">
        <form class="form" method="POST" action="#" enctype="multipart/form-data">
            <h1><b>Cadastro Projeto Integrador</b></h1>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="titulo" id="titulo" type="text" placeholder="Título">
            </div>
            <br>
            <div class="input-box">
                <textarea name="resumo" placeholder="Resumo"></textarea>
            </div>
            <br>
            <div class="input-box">
                <select name="curso" class="curso">
                    <?php foreach (Cursos::consultarNomeCursos() as $info_curso): ?>
                        <option value="<?= $info_curso["id"]?>"><?= $info_curso["curso"] ?></option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="ano" id="ano" type="text" placeholder="Ano de publicação">
            </div>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="arquivo" id="arquivo" type="file">
            </div>
            <br>
            <button type="submit" class="btnEnviar">Enviar</button>
        </form>
    </div>
</section>
