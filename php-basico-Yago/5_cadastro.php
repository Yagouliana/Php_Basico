<!-- O programa armazena os usuários em um documento externo com a extensão .txt -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h2>Informe o nome e a senha que deseja cadastrar</h2>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Cadastrar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = trim($_POST['nome']);
        $senha = trim($_POST['senha']);

        // Verifica se os campos estão preenchidos
        if (!empty($nome) && !empty($senha)) {
            // Abre o arquivo 'usuarios.txt' no modo de adição
            $arquivo = fopen('usuarios.txt', 'a');

            if ($arquivo) {
                // Adiciona o nome e senha no formato 'nome;senha'
                $linha = $nome . ';' . $senha . "\n";
                fwrite($arquivo, $linha);
                fclose($arquivo);

                echo "<p>Usuário cadastrado com sucesso!</p>";
            } else {
                echo "<p>Erro ao abrir o arquivo para cadastro.</p>";
            }
        } else {
            echo "<p>Por favor, preencha todos os campos.</p>";
        }
    }
    ?>
</body>
</html>
