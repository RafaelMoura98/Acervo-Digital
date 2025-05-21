function visualizarArquivoPorId(id) {
    window.open( URL_CONTROLLER_ARQUIVOS + '?modo=visualizar&id=' + id, '_blank');
}
function baixarArquivoPorId(id){
    window.location.href = URL_CONTROLLER_ARQUIVOS + '?modo=download&id=' + id;
}

function editarProjetoPorId(id){
    window.location.href = URL_CONTROLLER_EDITAR + '&id=' + id; 
}