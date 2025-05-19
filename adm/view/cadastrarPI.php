<?php require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/cursosModel.php'; 


$dados_antigos = $_SESSION['form_data'] ?? [];
unset($_SESSION['form_data']); // limpar para não manter depois

?>



<section>
    <div class="registro-container">
        <form id="formCadastroPI" class="form" method="POST" action="./controller/processaCadastroPI.php" enctype="multipart/form-data">
            <h1><b>Cadastro Projeto Integrador</b></h1>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="nome_titulo" id="nome_titulo" type="text" placeholder="Título" value="<?= htmlspecialchars($dados_antigos['titulo'] ?? '') ?>" required>
            </div>
            <br>
            <div class="input-box">
                <textarea name="resumo" placeholder="Resumo" required><?= htmlspecialchars($dados_antigos['resumo'] ?? '') ?></textarea>
            </div>
            <br>
            <div class="input-box">
                <select name="id_curso" class="curso">
                    <?php foreach (Cursos::consultarNomeCursos() as $info_curso): ?>
                        <option value="<?= $info_curso["id"] ?>"
                            <?= (isset($dados_antigos['curso']) && $dados_antigos['curso'] == $info_curso["id"]) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($info_curso["curso"]) ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="ano_publicacao" id="ano_publicacao" type="text" placeholder="Ano de publicação" value="<?= htmlspecialchars($dados_antigos['ano'] ?? '') ?>" required>
            </div>
            <div class="input-box">
                <input name="fileToUpload" id="fileToUpload" type="file" accept=".pdf" required>
            </div>
            <br>
            <button type="submit" class="btnEnviar">Enviar</button>
        </form>
    </div>
</section>
