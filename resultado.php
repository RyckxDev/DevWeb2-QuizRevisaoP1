<?php
session_start();

// Verifica se está logado
if (!isset($_SESSION['nome'])) {
    header("Location: index.php");
    exit();
}

// Verifica se veio do formulário
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: quiz.php");
    exit();
}

// Gabarito base
$gabarito = [
    'q1' => 'b',
    'q2' => 'b',
    'q3' => 'b',
    'q4' => 'b',
    'q5' => ['b', 'c'],
    'q6' => 'c',
    'q7' => 'b',
    'q8' => 'b',
    'q9' => 'b',
    'q10' => 'c',
    'q11' => 'c',
    'q12' => 'b',
    'q13' => 'b',
    'q14' => 'b',
    'q15' => 'b',
    'q16' => 'b',
    'q17' => ['a', 'b'],
    'q18' => 'b',
    'q19' => 'b',
    'q20' => 'b'
];

//Função de correção
function corrigir(array $gabarito, array $respostas): array {
    $acertos = 0;

    // Questão 1: alternativa b
    if (isset($respostas['q1']) && $respostas['q1'] === $gabarito['q1']) {
        $acertos++;
    }

    // Questão 2: alternativa b
    if (isset($respostas['q2']) && $respostas['q2'] === $gabarito['q2']) {
        $acertos++;
    }

    // Questão 3: alternativa b
    if (isset($respostas['q3']) && $respostas['q3'] === $gabarito['q3']) {
        $acertos++;
    }

    // Questão 4: alternativa b
    if (isset($respostas['q4']) && $respostas['q4'] === $gabarito['q4']) {
        $acertos++;
    }

    // Questão 5: alternativas b e c
    $q5 = [];
    if (isset($respostas['q5'])) {
        $q5 = (array)$respostas['q5'];
    }
    sort($q5);
    $gabaritoQ5 = $gabarito['q5'];
    sort($gabaritoQ5);
    if ($q5 === $gabaritoQ5) {
        $acertos++;
    }

    // Questão 6: alternativa c
    if (isset($respostas['q6']) && $respostas['q6'] === $gabarito['q6']) {
        $acertos++;
    }

    // Questão 7: alternativa b
    if (isset($respostas['q7']) && $respostas['q7'] === $gabarito['q7']) {
        $acertos++;
    }

    // Questão 8: alternativa b
    if (isset($respostas['q8']) && $respostas['q8'] === $gabarito['q8']) {
        $acertos++;
    }

    // Questão 9: alternativa b
    if (isset($respostas['q9']) && $respostas['q9'] === $gabarito['q9']) {
        $acertos++;
    }

    // Questão 10: alternativa c
    if (isset($respostas['q10']) && $respostas['q10'] === $gabarito['q10']) {
        $acertos++;
    }

    // Questão 11: alternativa c
    if (isset($respostas['q11']) && $respostas['q11'] === $gabarito['q11']) {
        $acertos++;
    }

    // Questão 12: alternativa b
    if (isset($respostas['q12']) && $respostas['q12'] === $gabarito['q12']) {
        $acertos++;
    }

    // Questão 13: alternativa b
    if (isset($respostas['q13']) && $respostas['q13'] === $gabarito['q13']) {
        $acertos++;
    }

    // Questão 14: alternativa b
    if (isset($respostas['q14']) && $respostas['q14'] === $gabarito['q14']) {
        $acertos++;
    }

    // Questão 15: alternativa b
    if (isset($respostas['q15']) && $respostas['q15'] === $gabarito['q15']) {
        $acertos++;
    }

    // Questão 16: alternativa b
    if (isset($respostas['q16']) && $respostas['q16'] === $gabarito['q16']) {
        $acertos++;
    }

    // Questão 17: alternativas a e b
    $q17 = [];
    if (isset($respostas['q17'])) {
        $q17 = (array)$respostas['q17'];
    }
    sort($q17);
    $gabaritoQ17 = $gabarito['q17'];
    sort($gabaritoQ17);
    if ($q17 === $gabaritoQ17) {
        $acertos++;
    }

    // Questão 18: alternativa b
    if (isset($respostas['q18']) && $respostas['q18'] === $gabarito['q18']) {
        $acertos++;
    }

    // Questão 19: alternativa b
    if (isset($respostas['q19']) && $respostas['q19'] === $gabarito['q19']) {
        $acertos++;
    }

    // Questão 20: alternativa b
    if (isset($respostas['q20']) && $respostas['q20'] === $gabarito['q20']) {
        $acertos++;
    }

    return ['acertos' => $acertos];
}

//Processar respostas
$resultado  = corrigir($gabarito, $_POST);
$acertos    = $resultado['acertos'];
$total      = count($gabarito);
$scoreOffset = 345 - (345 * $acertos / $total);

//Mensagem de desempenho
function mensagemDesempenho(int $acertos): array {
    if ($acertos <= 10) {
        return ['texto' => 'Precisa revisar', 'cor' => '#f43f5e', 'emoji' => '📚'];
    } elseif ($acertos <= 17) {
        return ['texto' => 'Quase lá!', 'cor' => '#f59e0b', 'emoji' => '🔥'];
    } else {
        return ['texto' => 'Excelente!', 'cor' => '#10b981', 'emoji' => '🏆'];
    }
}

$desempenho = mensagemDesempenho($acertos);

//Dados do usuário
$nome  = $_SESSION['nome'];
if (isset($_COOKIE['email'])) {
    $email = $_COOKIE['email'];
} else {
    $email = 'não disponível';
}

//Consumo de API (frase motivacional)
$frase = '';

// endpoint da API
$url = 'https://zenquotes.io/api/random';

// inicia a sessao com a URL
$ch = curl_init($url);

// retorna a resposta como string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Accept: application/json', 'User-Agent: PHP-Quiz/1.0']);

// executa a requisicao
$json = curl_exec($ch);

// encerra a sessao
curl_close($ch);

if ($json) {
    $dados = json_decode($json, true);
    if (isset($dados[0]['q'])) {
        $frase = $dados[0]['q'];
    }
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz — Resultado</title>
    <link rel="stylesheet" href="global.css">
</head>
<body class="pagina-resultado" style="--score-color: <?= htmlspecialchars($desempenho['cor']) ?>; --score-offset: <?= $scoreOffset ?>;">
<div class="conteudo">

    <!-- Pontuação -->
    <div class="painel-resultado">
        <div class="circulo-pontuacao">
            <svg viewBox="0 0 120 120" width="140" height="140">
                <circle class="trilha" cx="60" cy="60" r="55"/>
                <circle class="preenchimento-circulo"  cx="60" cy="60" r="55"/>
            </svg>
            <div class="rotulo-pontuacao">
                <span class="numero-pontuacao"><?= $acertos ?></span>
                <span class="total-pontuacao">de <?= $total ?></span>
            </div>
        </div>
        <div class="rotulo-desempenho"><?= $desempenho['emoji'] ?> <?= $desempenho['texto'] ?></div>
    </div>

    <!-- Info -->
    <div class="grade-info">
        <div class="cartao-info">
            <div class="etiqueta">👤 Nome (sessão)</div>
            <div class="valor"><?= htmlspecialchars($nome) ?></div>
        </div>
        <div class="cartao-info">
            <div class="etiqueta">📧 Email (cookie)</div>
            <div class="valor"><?= htmlspecialchars($email) ?></div>
        </div>
    </div>

    <!-- API -->
    <div class="cartao-api">
        <div class="rotulo-api">💡 Frase via API (cURL)</div>
        <p class="frase-api">"<?= htmlspecialchars($frase) ?>"</p>
    </div>

    <!-- Ações -->
    <div class="acoes">
        <a href="quiz.php" class="botao botao-secundario">← Refazer Quiz</a>
        <a href="logout.php" class="botao botao-primario">Sair →</a>
    </div>

</div>
</body>
</html>

