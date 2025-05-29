<?php require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/cursosModel.php'; ?>
<section>
    <div class="registro-container">
        <form class="form" method="POST" action="./controller/processamentoPI.php" enctype="multipart/form-data">
            <h1><b>Edite o Projeto</b></h1>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="nome_titulo" id="nome_titulo" type="text" placeholder="Título" value="<?= ($projeto['titulo'] ?? '')?>" required>
            </div>
            <br>
            <div class="input-box">
                <textarea name="resumo" placeholder="Resumo" required><?= ($projeto['resumo'] ?? '')?></textarea>
            </div>
            <br>
            <div class="input-box">
                <select name="id_curso" class="curso">
                    <?php foreach (Cursos::consultarNomeCursos() as $info_curso): ?>
                        <option value="<?= $info_curso["id"] ?>"
                            <?= (isset($projeto['curso']) && $projeto['curso'] == $info_curso["id"]) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($info_curso["curso"]) ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="ano_publicacao" id="ano_publicacao" type="text" placeholder="Ano de publicação" value="<?= ($projeto['ano']  ?? '') ?>" required>
            </div>
            <div class="input-box">
                <input name="fileToUpload" id="fileToUpload" type="file" accept=".pdf" required>
            </div>
            <br>
            <input type="hidden" name="paginaUrl" value="<?= base64_encode($paginaUrl ?? '' )?>">
            <input type="hidden" name="id_projeto" value="<?= base64_encode($id ?? '' )?>">
            <input type="hidden" name="arquivoAntigo" value="<?= $projeto['nome_pdf'] ?? '' ?>">
            <button type="submit" class="btnEnviar">Enviar</button>
        </form>
    </div>
</section>