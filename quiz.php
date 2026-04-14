<?php
session_start();

// Verifica se está logado
if (!isset($_SESSION['nome'])) {
    header("Location: index.php");
    exit();
}

$nome = $_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Quiz — Questionário</title>
    <link rel="stylesheet" href="global.css">
</head>
<body class="pagina-quiz">

<div class="barra-topo">
    <div class="barra-topo-esq">
        <h2>PHP Quiz</h2>
        <span>// Olá, <?= htmlspecialchars($nome) ?></span>
    </div>
    <a href="logout.php" class="botao-sair">Sair →</a>
</div>

<div class="conteudo">
    <form method="POST" action="resultado.php" id="quizForm">

        <!-- ===== BLOCO 1: BÁSICO ===== -->
        <div class="titulo-secao">Fundamentos PHP</div>

        <!-- Q1 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 01 · radio</div>
            <div class="texto-pergunta">O comando <code>echo</code> é utilizado para:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q1" value="a" required> Receber dados</label>
                <label class="opcao"><input type="radio" name="q1" value="b"> Exibir dados</label>
                <label class="opcao"><input type="radio" name="q1" value="c"> Criar funções</label>
                <label class="opcao"><input type="radio" name="q1" value="d"> Encerrar o código</label>
            </div>
        </div>

        <!-- Q2 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 02 · radio</div>
            <div class="texto-pergunta">Em PHP, uma variável começa com:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q2" value="a" required> #</label>
                <label class="opcao"><input type="radio" name="q2" value="b"> $</label>
                <label class="opcao"><input type="radio" name="q2" value="c"> @</label>
                <label class="opcao"><input type="radio" name="q2" value="d"> &</label>
            </div>
        </div>

        <!-- Q3 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 03 · radio</div>
            <div class="texto-pergunta">Qual é uma variável válida em PHP?</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q3" value="a" required> $1nome</label>
                <label class="opcao"><input type="radio" name="q3" value="b"> $nome_usuario</label>
                <label class="opcao"><input type="radio" name="q3" value="c"> nome$</label>
                <label class="opcao"><input type="radio" name="q3" value="d"> $nome-usuario</label>
            </div>
        </div>

        <!-- ===== BLOCO 2: FORMULÁRIOS ===== -->
        <div class="titulo-secao">Formulários e Métodos</div>

        <!-- Q4 - select -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 04 · select</div>
            <div class="texto-pergunta">Qual método envia dados pela URL?</div>
            <select name="q4" required>
                <option value="">— Selecione uma opção —</option>
                <option value="a">POST</option>
                <option value="b">GET</option>
            </select>
        </div>

        <!-- Q5 - checkbox -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 05 · checkbox — marque as corretas</div>
            <div class="texto-pergunta">Sobre o método POST:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="checkbox" name="q5[]" value="a"> Dados ficam visíveis na URL</label>
                <label class="opcao"><input type="checkbox" name="q5[]" value="b"> Mais seguro para envio de dados</label>
                <label class="opcao"><input type="checkbox" name="q5[]" value="c"> Permite envio de grande volume de dados</label>
                <label class="opcao"><input type="checkbox" name="q5[]" value="d"> Só funciona com textos</label>
            </div>
        </div>

        <!-- Q6 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 06 · radio</div>
            <div class="texto-pergunta">Qual input é mais adequado para senha?</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q6" value="a" required> text</label>
                <label class="opcao"><input type="radio" name="q6" value="b"> email</label>
                <label class="opcao"><input type="radio" name="q6" value="c"> password</label>
            </div>
        </div>

        <!-- Q7 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 07 · radio</div>
            <div class="texto-pergunta">Qual input permite escolher apenas UMA opção?</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q7" value="a" required> checkbox</label>
                <label class="opcao"><input type="radio" name="q7" value="b"> radio</label>
                <label class="opcao"><input type="radio" name="q7" value="c"> text</label>
                <label class="opcao"><input type="radio" name="q7" value="d"> textarea</label>
            </div>
        </div>

        <!-- Q8 - select -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 08 · select</div>
            <div class="texto-pergunta">Checkbox é usado quando:</div>
            <select name="q8" required>
                <option value="">— Selecione uma opção —</option>
                <option value="a">Apenas uma opção é permitida</option>
                <option value="b">Múltiplas opções são permitidas</option>
            </select>
        </div>

        <!-- Q9 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 09 · radio</div>
            <div class="texto-pergunta">A tag &lt;select&gt; serve para:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q9" value="a" required> Campo de texto</label>
                <label class="opcao"><input type="radio" name="q9" value="b"> Lista suspensa</label>
                <label class="opcao"><input type="radio" name="q9" value="c"> Botão</label>
                <label class="opcao"><input type="radio" name="q9" value="d"> Sessão</label>
            </div>
        </div>

        <!-- ===== BLOCO 3: LÓGICA ===== -->
        <div class="titulo-secao">Lógica e Estruturas</div>

        <!-- Q10 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 10 · radio</div>
            <div class="texto-pergunta">Qual estrutura usamos para decisão?</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q10" value="a" required> for</label>
                <label class="opcao"><input type="radio" name="q10" value="b"> echo</label>
                <label class="opcao"><input type="radio" name="q10" value="c"> if</label>
                <label class="opcao"><input type="radio" name="q10" value="d"> array</label>
            </div>
        </div>

        <!-- Q11 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 11 · radio</div>
            <div class="texto-pergunta">Qual estrutura usamos para repetição?</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q11" value="a" required> if</label>
                <label class="opcao"><input type="radio" name="q11" value="b"> echo</label>
                <label class="opcao"><input type="radio" name="q11" value="c"> for</label>
                <label class="opcao"><input type="radio" name="q11" value="d"> isset</label>
            </div>
        </div>

        <!-- Q12 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 12 · radio</div>
            <div class="texto-pergunta">Um array é:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q12" value="a" required> Uma função</label>
                <label class="opcao"><input type="radio" name="q12" value="b"> Uma variável com múltiplos valores</label>
                <label class="opcao"><input type="radio" name="q12" value="c"> Um formulário</label>
                <label class="opcao"><input type="radio" name="q12" value="d"> Um loop</label>
            </div>
        </div>

        <!-- Q13 - select -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 13 · select</div>
            <div class="texto-pergunta">Para criar uma função em PHP usamos:</div>
            <select name="q13" required>
                <option value="">— Selecione uma opção —</option>
                <option value="a">create</option>
                <option value="b">function</option>
                <option value="c">def</option>
                <option value="d">func</option>
            </select>
        </div>

        <!-- ===== BLOCO 4: SESSÃO / COOKIE / API ===== -->
        <div class="titulo-secao">Sessão, Cookie e API</div>

        <!-- Q14 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 14 · radio</div>
            <div class="texto-pergunta">Sessões servem para:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q14" value="a" required> Armazenar no navegador</label>
                <label class="opcao"><input type="radio" name="q14" value="b"> Armazenar no servidor</label>
                <label class="opcao"><input type="radio" name="q14" value="c"> Criar HTML</label>
                <label class="opcao"><input type="radio" name="q14" value="d"> Fazer requisições</label>
            </div>
        </div>

        <!-- Q15 - select -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 15 · select</div>
            <div class="texto-pergunta">Cookies são armazenados:</div>
            <select name="q15" required>
                <option value="">— Selecione uma opção —</option>
                <option value="a">No servidor</option>
                <option value="b">No navegador</option>
            </select>
        </div>

        <!-- Q16 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 16 · radio</div>
            <div class="texto-pergunta">Qual função pode ser usada para consumir uma API?</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q16" value="a" required> echo</label>
                <label class="opcao"><input type="radio" name="q16" value="b"> file_get_contents</label>
                <label class="opcao"><input type="radio" name="q16" value="c"> isset</label>
                <label class="opcao"><input type="radio" name="q16" value="d"> print_r</label>
            </div>
        </div>

        <!-- Q17 - checkbox -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 17 · checkbox — marque as corretas</div>
            <div class="texto-pergunta">Sobre cURL:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="checkbox" name="q17[]" value="a"> Faz requisições HTTP</label>
                <label class="opcao"><input type="checkbox" name="q17[]" value="b"> Consome APIs</label>
                <label class="opcao"><input type="checkbox" name="q17[]" value="c"> Apenas imprime dados</label>
                <label class="opcao"><input type="checkbox" name="q17[]" value="d"> Substitui sessão</label>
            </div>
        </div>

        <!-- Q18 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 18 · radio</div>
            <div class="texto-pergunta">Para acessar dados enviados via POST usamos:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q18" value="a" required> $_GET</label>
                <label class="opcao"><input type="radio" name="q18" value="b"> $_POST</label>
                <label class="opcao"><input type="radio" name="q18" value="c"> $_SESSION</label>
                <label class="opcao"><input type="radio" name="q18" value="d"> $_COOKIE</label>
            </div>
        </div>

        <!-- Q19 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 19 · radio</div>
            <div class="texto-pergunta">Para verificar se uma variável existe usamos:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q19" value="a" required> check()</label>
                <label class="opcao"><input type="radio" name="q19" value="b"> isset()</label>
                <label class="opcao"><input type="radio" name="q19" value="c"> exist()</label>
                <label class="opcao"><input type="radio" name="q19" value="d"> verify()</label>
            </div>
        </div>

        <!-- Q20 - radio -->
        <div class="cartao-pergunta">
            <div class="numero-pergunta">Questão 20 · radio</div>
            <div class="texto-pergunta">Para iniciar uma sessão em PHP usamos:</div>
            <div class="lista-opcoes">
                <label class="opcao"><input type="radio" name="q20" value="a" required> start_session()</label>
                <label class="opcao"><input type="radio" name="q20" value="b"> session_start()</label>
                <label class="opcao"><input type="radio" name="q20" value="c"> init_session()</label>
                <label class="opcao"><input type="radio" name="q20" value="d"> begin_session()</label>
            </div>
        </div>

        <div class="area-envio">
            <button type="submit" class="botao-enviar">Enviar Respostas →</button>
            <p class="aviso-obrigatorio">* Todas as questões de radio são obrigatórias</p>
        </div>
    </form>
</div>

</body>
</html>

