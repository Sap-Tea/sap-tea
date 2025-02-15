<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script>
        function compararValor() {
            // Pegando os valores dos inputs
            var nome = document.getElementById("usuario").value;
            var senha = document.getElementById("senha").value;
        
            // Verificando se ambos os campos foram preenchidos
            if (nome === "" || senha === "") {
                notificar("Por favor, preencha todos os campos.", "erro");
                return; // Não faz mais nada se os campos estiverem vazios
            }
        
            // Comparando o valor do usuário
            if (nome === "foccus" && senha === "123") {
                notificar("Login bem-sucedido!", "sucesso");
            } else {
                notificar("Usuário ou senha incorretos.", "erro");
            }
        }

        function notificar(mensagem, tipo){
            var notificacao = document.getElementById("notificacao")
            notificacao.className = `notificacao ${tipo}`
            notificacao.textContent = mensagem
            const timer = setTimeout(()=>{
                notificacao.className = "notificacao"
                if (tipo === "sucesso"){
                    window.location.href = "/index";
                }
            }, 1500)

            return () => {
                clearTimeout(timer);
            };
        }

    </script>
</head>
<body>
    <!-- Barra de navegação -->
    <div class="navbar">
        <a href="https://wa.me/5511992312745" target="_blank" style="text-decoration: none; color: inherit;">
            <strong>Não consegue acessar sua conta?</strong> Entre em contato com o suporte 
            <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" style="width: 20px; height: 20px; margin-left: 5px; vertical-align: middle;">
            <span style="font-weight: bold;">+55 11 99231-2745</span>
        </a>
        
        </a>
        </a>
        
    </div>

    <!-- Conteúdo principal -->
    <div class="page">
        <!-- Imagem à esquerda -->
        <img src="public/img/sap_logo2.png" alt="Imagem representativa" id="minhaImagem">
        
        <!-- Card de Login -->
        <div class="formLogin">
            <img src="public/img/logo_sap.png" alt="Imagem de Login" class="logoSap">


            <label for="usuario">Usuário</label>
            <input type="text" name="usuario" id="usuario" placeholder="Digite seu usuário" autofocus>
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            <a href="/">Esqueci minha senha</a>
            <button class="btn" onclick="compararValor()">Acessar</button>
        </div>

        <div class="notificacao" id="notificacao"></div>
    </div>
</body>
</html>
