<?php
    // processa_cookie.php

    // Verifica se o método é POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: formulario.html');
        exit;
    }

    // Limpa e valida os dados
    $nome = trim($_POST['nome']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Validação simples
    if (empty($nome) || empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "
        <script>
            alert('Erro: Por favor, preencha todos os campos corretamente.');
            window.location.href = 'formulario.html';
        </script>";
        exit;
    }

    // Define os cookies (válidos por 7 dias)
    setcookie('usuario_nome', $nome, time() + 7 * 24 * 3600, '/', '', false, true); // httpOnly
    setcookie('usuario_email', $email, time() + 7 * 24 * 3600, '/', '', false, true);

    // Redireciona de volta para o formulário (agora com cookies definidos)
    header('Location: exibe_dados.php');
    exit;
?>