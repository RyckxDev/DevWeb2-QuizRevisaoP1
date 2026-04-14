<?php
session_start();

// Se já estiver logado, redireciona para o quiz
if (isset($_SESSION['nome'])) {
    header("Location: quiz.php");
    exit();
}

// Processar o formulário de login
$nome = '';
$email = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nome'])) {
        $nome = ($_POST['nome']);
    } else {
        $nome = '';
    }

    if (isset($_POST['email'])) {
        $email = ($_POST['email']);
    } else {
        $email = '';
    }

    if (!empty($nome) && !empty($email)) {
        
        $_SESSION['nome'] = $nome;

        setcookie('email', $email, time() + (7 * 24 * 60 * 60), '/');

        header("Location: quiz.php");
        exit();
    } else {
        $erro = "Preencha todos os campos!";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz — Login</title>
    <link rel="stylesheet" href="global.css">
</head>
<body class="pagina-inicio">
    <div class="conteudo">
        <div class="selo">Desenvolvimento Web II</div>
        <h1>PHP <span>Quiz</span></h1>
        <p class="subtitulo">// Entre para começar o questionário</p>

        <div class="cartao">
            <?php if (!empty($erro)): ?>
                <div class="mensagem-erro">⚠ <?= htmlspecialchars($erro) ?></div>
            <?php endif; ?>

            <form method="POST" action="index.php">
                <div class="campo">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" name="nome" placeholder="Seu nome completo"
                           value="<?= htmlspecialchars($nome) ?>" required>
                </div>
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="seu@email.com"
                           value="<?= htmlspecialchars($email) ?>" required>
                </div>
                <button type="submit" class="botao">Iniciar Quiz →</button>
            </form>
        </div>

        <p class="rodape-nota">REVISAO P1 TEMA PIXELADO 😉</p>
    </div>
</body>
</html>

