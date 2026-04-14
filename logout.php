<?php
session_start();

// Destroi todos os dados da sessão
$_SESSION = [];
session_destroy();

// Redireciona para o login
header("Location: index.php");
exit();
