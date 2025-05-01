<?php
include_once("view/header.php");
?>

<section>
    <div class="registro-container">
        <form class="form" method="POST" action="#">
            <h1><b>Cadastro Projeto Integrador</b></h1>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="titulo" id="itext" type="text" placeholder="Título">
            </div>
            <br>
            <div class="input-box">
                <textarea name="resumo" placeholder="Resumo"></textarea>
            </div>
            <br>
            <div class="input-box">
                <select name="curso" class="curso">
                    <option value="Administração">Administração</option>
                    <option value="Logistíca">Logistíca</option>
                    <option value="Desenvolvimento de sistemas">Desenvolvimento de sistemas</option>
                </select>
            </div>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="ano" id="itext" type="text" placeholder="Ano de publicação">
            </div>
            <div class="input-box">
                <label for="itext"></label><br>
                <input name="arquivo" id="fileToUpload" type="file">
            </div>
            <br>
            <button type="submit" class="btnEnviar">Enviar</button>
        </form>
    </div>
</section>
