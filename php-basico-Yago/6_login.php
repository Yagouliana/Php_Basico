<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuário</title>
</head>
<body>
    <h1>Faça login</h1>
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" required><br>

        <button type="submit">Entrar</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = trim($_POST['nome']);
        $senha = trim($_POST['senha']);

        // Verifica se o arquivo existe
        if (file_exists('usuarios.txt')) {
            // Lê o arquivo e verifica as credenciais
            $usuarios = file('usuarios.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            $login_valido = false;

            foreach ($usuarios as $usuario) {
                list($nome_cadastrado, $senha_cadastrada) = explode(';', $usuario);

                if ($nome == $nome_cadastrado && $senha == $senha_cadastrada) {
                    $login_valido = true;
                    break;
                }
            }

            if ($login_valido) {
                echo "<p>Login feito com sucesso! Bem-vindo, $nome!</p>";
            } else {
                echo "<p>Nome ou senha inválidos. Tente novamente.</p>";
            }
        } else {
            echo "<p>Nenhum usuário cadastrado ainda.</p>";
        }
    }
    ?>
</body>
</html>
