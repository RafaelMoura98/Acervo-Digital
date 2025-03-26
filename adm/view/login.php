<?php

include_once("./adm/view/header.php");
include_once("./config/configuracao.php");

?>



  <section>
    <div class="box-content">
        <h1 class="titulo">ACERVO DIGITAL</h1>
        <form class="formulario" action="#" method="POST">
          <div class="caixa"> 
            <br>
            <br>
            <br>
            <div class="descricao">PROJETOS INTEGRADORES</div>
            <br>
            <br>
            <img class="img" src="./assets/imagens/img_login.png" alt="Perfil" width="100">
            <br>
            <div>
            <h3 class="p">Faça Login</p>
            </div>
            <div class="">
              <div class="email">
                <label for="email"></label>
                <input type="text" placeholder="Login" id="login" name="login" required>
                <p id="email-ajuda" class="msg-ajuda" style="display:none;"></p>
              </div>
              <div class="senha">
                <label for="senha"></label>
                <input type="password" placeholder="Senha" id="senha" name="senha" required>
                <p id="tel-ajuda" class="msg-ajuda" style="display:none;">
              </div>
            </div>
            <div>
              <a class="link" href="<?= constant('URL_LOCAL_SITE_PAGINA').'recuperacao'?>">Esqueci a senha</a> </class>
            </div>
              <br>
              <br>
            
              <div class="botao">
            <button class="button" type="submit">Entrar</button>
              </div>
            <br>
          </div>
        </form>
     
    </div>
</section>
</body>
</html>