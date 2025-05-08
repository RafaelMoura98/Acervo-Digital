function visualizarArquivoPorId(id) {
    window.open('controller/arquivoController.php?modo=visualizar&id=' + id, '_blank');
}
function baixarArquivoPorId(id){
    window.location.href = 'controller/arquivoController.php?modo=download&id=' + id;
}

