<?php
    echo nl2br("Você está acessando: " . $_SERVER['PHP_SELF'] . "\n");
    echo nl2br("Método: " . $_SERVER['REQUEST_METHOD'] . "\n");
    echo nl2br("IP: " . $_SERVER['REMOTE_ADDR'] . "\n");
    echo nl2br("Navegador: " . $_SERVER['HTTP_USER_AGENT'] . "\n");
    echo nl2br("Host: " . $_SERVER['HTTP_HOST'] . "\n");
    echo nl2br("Porta: " . $_SERVER['REMOTE_PORT'] . "\n");
    echo nl2br("Servidor: " . $_SERVER['SERVER_SOFTWARE'] . "\n");
    echo nl2br("Raiz do Documento: " . $_SERVER['DOCUMENT_ROOT'] . "\n");
    echo nl2br("Nome do Servidor: " . $_SERVER['SERVER_NAME'] . "\n");
    echo nl2br("Protocolo: " . $_SERVER['SERVER_PROTOCOL'] . "\n");
    echo nl2br("Versão do PHP: " . phpversion() . "\n");
    echo nl2br("Sistema Operacional: " . PHP_OS . "\n");
    echo nl2br("Diretório Atual: " . getcwd() . "\n");
    echo nl2br("Usuário do Servidor: " . get_current_user() . "\n");
    echo nl2br("Limite de Memória: " . ini_get('memory_limit') . "\n");
    echo nl2br("Tempo Máximo de Execução: " . ini_get('max_execution_time') . " segundos\n");
    echo nl2br("Upload Máximo de Arquivo: " . ini_get('upload_max_filesize') . "\n");
    echo nl2br("Post Máximo: " . ini_get('post_max_size') . "\n");
    echo nl2br("Timezone: " . date_default_timezone_get() . "\n");
    echo nl2br("Data e Hora Atual: " . date('Y-m-d H:i:s') . "\n");
    // echo nl2br("Variáveis de Ambiente: \n");
    // foreach ($_SERVER as $key => $value) {
    //     echo nl2br("$key: $value\n");
    // }   
    // echo nl2br("\nInformações do PHP:\n");
    // phpinfo();
?>
