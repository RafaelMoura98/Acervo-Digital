<?php
require_once __DIR__ . '/../../config/configuracao.php';
require_once BASE_PATH . '/adm/model/projetosModel.php';



if (!isset($_GET['id'])) {
    var_dump($_GET);die;
    // nenhum ID enviado
    header('Location: ' . constant("URL_LOCAL_SITE_PAGINA_ADM") . 'principal');
    exit;
}

$id = intval($_GET['id']);
$cadastrado = Projetos::excluirPI($id);

if ($cadastrado) {
    echo "<script>
            alert('Projeto excluído com sucesso!');
            window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM")."principal';
          </script>";
} else {
    echo "<script>
            alert('Erro ao excluir o projeto. Tente novamente.');
            window.location.href='".constant("URL_LOCAL_SITE_PAGINA_ADM")."principal';
          </script>";
}
exit;

