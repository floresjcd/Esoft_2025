<?php
    // Recebe os dados
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $idade = (int)$_POST['idade'];

    echo "<h3>Dados recebidos:</h3>";
    echo "<p><strong>Nome:</strong> $nome</p>";
    echo "<p><strong>Email:</strong> $email</p>";
    echo "<p><strong>Idade:</strong> $idade</p>";
    echo "<br>";


    echo "<h4>Debug com var_dump:</h4>";
    var_dump($nome);
    echo "<br>";
    var_dump($email);   
    echo "<br>";
    var_dump($idade);
    echo "<br>";





?>
