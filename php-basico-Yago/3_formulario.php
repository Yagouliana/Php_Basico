<!-- USANDO O MÉTODO POST -->
<!-- POST: método HTML padrão, a requisição é enviada DIRETAMENTE no corpo do HTML  -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de formulário de Cadastro</title>
</head>

<body>
    <!-- Método pode ser POST ou GET -->
    <form method="post" action="">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>

        <label for="email"></label>
        <input type="email" name="email" required>

        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" required><br>

        <button type="submit">Enviar</button>
    </form>

    <?php
    //Verifica se o formulario foi enviado
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //Recebe os valores enviados´pelo formulario
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];

        //Exibe os valores recebidos
        echo "<h2>Dados Recebidos:</h2>";
        echo "Nome: $nome <br>";
        echo "Email: $email <br>";
        echo "Telefone: $telefone <br>";
    }
    ?>
</body>

</html>