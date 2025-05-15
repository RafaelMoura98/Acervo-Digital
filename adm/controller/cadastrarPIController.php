<?php
// Inclui o arquivo do model
require_once $_SERVER['DOCUMENT_ROOT'].'/Acervo-Digital/adm/model/cadastrarPIModel.php';

class ProjetoIntegradorController {
    public function cadastrarPI() {
        // 1. Receber os dados do formulário
        $titulo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['titulo'])) ? $_POST['titulo'] : null;
        $resumo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['resumo'])) ? $_POST['resumo'] : null;
        $curso = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['curso'])) ? $_POST['curso'] : null;
        $ano = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['ano'])) ? $_POST['ano'] : null;
        $arquivo = ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['arquivo'])) ? $_POST['arquivo'] : null; // Informações sobre o arquivo enviado

        // 2. Validação dos campos
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se os campos estão vazios
            $titulo = trim($titulo);
            $resumo = trim($resumo);
            $curso = trim($curso);
            $ano = trim($ano);
            $arquivo = trim($arquivo);
        }

        // 3. Array para armazenar os erros
        $erros = [];

        if (empty($titulo)) {
            $erros[] = "Título é obrigatório.";
        }
        if (empty($resumo)) {
            $erros[] = "Resumo é obrigatório.";
        }
        if (empty($curso)) {
            $erros[] = "Curso é obrigatório.";
        }
        if (empty($ano)) {
            $erros[] = "Ano é obrigatório.";
        }
        if (empty($arquivo)) {
            $erros[] = "Arquivo é obrigatório.";
        }

        // 4. Verifica se houve erros
        if (!empty($erros)) {
            // Implementar redirecionamento e exibição de erros (exemplo básico)
            echo "Erro: " . implode("<br>", $erros);
            return; // Importante: interrompe a execução para não prosseguir com o cadastro
        }

        // 5. Criar uma instância do model
        $projetoModel = new cadastrarPI();

        // 6. Chamar o método do model para inserir os dados no banco de dados
        $resultado = $projetoModel->cadastrarPI($titulo, $resumo, $curso, $ano, $arquivo);
        
        // 7. Verifica se o cadastro foi bem-sucedido
        if ($resultado) {
            echo "Cadastrado realizado com sucesso!";
             exit;
        } 
    }
}

// Cria uma instância do controller e chama o método para cadastrar
$controller = new ProjetoIntegradorController();
$controller->cadastrarPI();
?>
