<section>
      <h1 class="titulo_esq">SOLICITAÇÃO DE ALTERAÇÃO DE SENHA</h1>
      <form class="formulario">
        <div class="caixa">
          <img src="<?= $caminhoBaseAssets.'imagens/img_recuperacao.png'?>" alt="Perfil" width="100">
          <h1 class="class">Redefinir Senha</h1>
        </div>   
  <form>
    <div class="input-group">
      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input id="email" type="email" class="form-control" name="email" placeholder="Digite seu e-mail" required>
    </div>
    <div>
      <div class="botao">
        <button class="button" type="submit">Redefinir</button> 
      </div>
      <div>
        <a class="link" href="<?= constant('URL_LOCAL_SITE_PAGINA').'adm'?>">Voltar ao login</a> </class>
      </div>
    </div>
  </form>
    <br>
</body>

</html>