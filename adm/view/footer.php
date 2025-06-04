<footer class="footer mt-auto py-3">
    <div class="container text-center">
        <span class="text-white">&copy; Todos os direitos reservados.</span>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.min.js" integrity="sha384-RuyvpeZCxMJCqVUGFI0Do1mQrods/hhxYlcVfGPOfQtPJh0JCw12tUAZ/Mv10S7D" crossorigin="anonymous"></script>
<?php if($paginaUrl === "principal"): ?>
<script>
    const URL_CONTROLLER_PROJETOS = "<?php echo URL_ADM_CONTROLLER_PROJETOS; ?>";
</script>
<script src="../assets/javascript/carregarProjetos.js"></script>
<script src="../assets/javascript/limparFiltros.js"></script>
<?php elseif($paginaUrl === "cadastrarPI"): ?>
<script src="../assets/javascript/formCadastroPI.js"></script>
<?php endif; ?>
</body>
</html>