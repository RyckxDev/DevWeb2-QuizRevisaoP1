# 📋 DevWeb2 — Quiz de Revisão P1

Sistema web interativo em PHP desenvolvido como atividade avaliativa da disciplina de **Desenvolvimento Web II**, com o objetivo de revisar os principais conceitos da matéria através de um quiz de 20 questões.

---

## 🚀 Funcionalidades

- **Login com sessão e cookie** — nome salvo em `$_SESSION`, e-mail salvo em `$_COOKIE`
- **Quiz interativo** — 20 questões usando `radio`, `checkbox` e `select`
- **Correção automática** — função PHP que compara respostas com o gabarito
- **Resultado detalhado** — exibe acertos, desempenho e gabarito questão por questão
- **Consumo de API externa** — frase motivacional via `file_get_contents` (ZenQuotes API)
- **Logout** — destrói a sessão e redireciona para o início
- **Barra de progresso dinâmica** — feedback visual em tempo real via JavaScript

---

## 📁 Estrutura do Projeto

```
DevWeb2-QuizRevisaoP1/
├── index.php       # Tela de login (formulário POST, sessão, cookie)
├── quiz.php        # Questionário com 20 questões (radio, checkbox, select)
├── resultado.php   # Processamento e exibição dos resultados
├── logout.php      # Encerramento de sessão
└── global.css      # Estilos globais
```

---

## 🛠️ Tecnologias Utilizadas

| Tecnologia | Uso |
|------------|-----|
| PHP 8+ | Back-end, lógica, sessões, cookies |
| HTML5 | Estrutura das páginas |
| CSS3 | Estilização e layout |
| JavaScript | Barra de progresso dinâmica |
| ZenQuotes API | Frases motivacionais via `file_get_contents` |

---

## ▶️ Como Executar

**Pré-requisitos:** PHP instalado localmente ou servidor como XAMPP / WAMP / Laragon.

```bash
# Clone o repositório
git clone https://github.com/RyckxDev/DevWeb2-QuizRevisaoP1.git

# Entre na pasta
cd DevWeb2-QuizRevisaoP1

# Inicie o servidor embutido do PHP
php -S localhost:8000

# Acesse no navegador
http://localhost:8000
```

> Também pode ser colocado na pasta `htdocs` do XAMPP e acessado via `http://localhost/DevWeb2-QuizRevisaoP1`.

---

## 📝 Fluxo do Sistema

```
index.php  →  quiz.php  →  resultado.php
   ↑                            ↓
   └────────── logout.php ──────┘
```

1. Usuário preenche nome e e-mail no formulário de login
2. Dados são salvos em sessão (nome) e cookie (e-mail)
3. Usuário responde as 20 questões e envia
4. Sistema corrige, exibe pontuação, gabarito e frase da API
5. Logout destrói a sessão e retorna ao início

---

## 📊 Critérios de Desempenho

| Acertos | Resultado |
|---------|-----------|
| 0 – 10  | 📚 Precisa revisar |
| 11 – 17 | 🔥 Quase lá! |
| 18 – 20 | 🏆 Excelente! |

---

## 🧠 Conteúdos abordados no Quiz

`echo` · `variáveis` · `GET e POST` · `formulários` · `inputs` · `select` · `condicionais` · `loops` · `arrays` · `funções` · `sessão` · `cookies` · `API`

---

## 👨‍💻 Autor

**RyckxDev**  
Projeto acadêmico — Desenvolvimento Web II
