<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sua Biblioteca Virtual</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #465a6e;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            background-image: url('https://th.bing.com/th?id=OIP.LV2DIkv-H_kgU14ZZKFndgHaDa&w=350&h=161&c=8&rs=1&qlt=90&o=6&pid=3.1&rm=2');
            background-size: cover;
            background-position: center;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
            height: 100vh;
        }

        .content {
            text-align: center;
        }

        .box {
            background: rgba(255, 255, 255, 0.8); /* Fundo branco transparente */
            padding: 2rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }

        .button {
            display: block;
            width: 200px; /* Largura dos botões */
            padding: 15px 0; /* Espaçamento interno dos botões */
            margin: 10px auto; /* Centraliza os botões horizontalmente */
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background-color: #9db1e9; /* Cor de fundo azul claro */
            border-radius: 5px;
            transition: background-color 0.3s ease; /* Transição suave de cor */
        }

        .button:hover {
            background-color: #9db1e9; /* Cor mais escura ao passar o mouse */
        }

        .welcome-text {
            font-weight: bold;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="flex-center">
        <div class="content">
            <div class="box">
                <div class="welcome-text">Bem Vindo à Biblioteca Virtual</div>
                <a href="{{ route('login') }}" class="button">Login</a>
                <a href="{{ route('register') }}" class="button">Registro</a>
            </div>
        </div>
    </div>
</body>
</html>
