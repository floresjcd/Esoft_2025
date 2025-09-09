<?php
    // Definindo um cookie chamado "usuario" com o valor "João Silva" que
    setcookie("usuario", "João Silva", time() + 3600); // 1 hora
    echo "Cookie definido!";

    //expira em 1 hora
    // O cookie estará disponível em todo o domínio ("/")
    // e pode ser acessado em outras páginas do mesmo domínio.
    // O cookie será enviado apenas em conexões seguras (true)
    // e não estará acessível via JavaScript (true).    
?> 