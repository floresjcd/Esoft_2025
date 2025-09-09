<?php
// formulario.php - Lê cookies para preencher o formulário

$nome = $email = "";

if (isset($_COOKIE['usuario_nome'])) {
    $nome = htmlspecialchars($_COOKIE['usuario_nome']);
}
if (isset($_COOKIE['usuario_email'])) {
    $email = htmlspecialchars($_COOKIE['usuario_email']);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário com Cookies</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        label { display: block; margin: 10px 0 5px; }
        input[type="text"], input[type="email"] { padding: 8px; width: 300px; }
        input[type="submit"] { margin-top: 10px; padding: 10px 20px; background: #007cba; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #005a87; }
        .mensagem { color: green; font-style: italic; }
    </style>
</head>
<body>
    <h2>Formulário de Contato</h2>

    <?php if (isset($_COOKIE['usuario_nome'])): ?>
        <p class="mensagem">Olá <?= $nome ?>! Seus dados foram lembrados. 😊</p>
    <?php endif; ?>

    <form method="POST" action="processa_cookie.php">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" value="<?= $nome ?>" placeholder="Seu nome">

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" value="<?= $email ?>" placeholder="seu@email.com">

        <input type="submit" value="Salvar Dados">
    </form>
</body>
</html>