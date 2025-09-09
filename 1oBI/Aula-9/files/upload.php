<?php
    // upload.php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'] == 0) {
            $nome = $_FILES['arquivo']['name'];
            $tmp = $_FILES['arquivo']['tmp_name'];
            $destino = "uploads/" . basename($nome);

            // Cria a pasta uploads se não existir
            if (!is_dir('uploads')) {
                mkdir('uploads', 0777, true);
            }


            if (move_uploaded_file($tmp, $destino)) {
                echo "Arquivo $nome enviado com sucesso!";
            } else {
                echo "Erro ao mover arquivo.";
            }
        } else {
            echo "Erro no upload: " . $_FILES['arquivo']['error'];
        }
    }
?>



