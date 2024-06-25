<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Biblioteca Virtual</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #f8fafc;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .max-w-7xl {
            max-width: 100%;
            margin: 0 auto;
            padding: 0 20px;
        }

        .py-12 {
            padding-top: 3rem;
            padding-bottom: 3rem;
        }

        .bg-white {
            background-color: #fff;
        }

        .overflow-hidden {
            overflow: hidden;
        }

        .shadow-sm {
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.1);
        }

        .sm\:rounded-lg {
            border-radius: 0.5rem;
        }

        .p-6 {
            padding: 1.5rem;
        }

        .border-b {
            border-bottom-width: 1px;
            border-color: #edf2f7;
        }

        .block {
            display: block;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .w-full {
            width: 100%;
        }

        .text-xl {
            font-size: 1.25rem;
        }

        .font-semibold {
            font-weight: 600;
        }

        .text-gray-800 {
            color: #2d3748;
        }

        .leading-tight {
            line-height: 1.5;
        }

        .border-gray-200 {
            border-color: #edf2f7;
        }

        .text-center {
            text-align: center;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            color: white;
            background-color: #4a90e2;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        .button:hover {
            background-color: #357bd8;
        }

        input[type='text'], input[type='number'], input[type='file'] {
            border: 1px solid #cbd5e0;
            border-radius: 0.25rem;
            padding: 0.5rem;
            font-size: 1rem;
            width: 100%;
        }

        input[type='text']:focus, input[type='number']:focus, input[type='file']:focus {
            outline: none;
            border-color: #4a90e2;
        }
    </style>
</head>
<body>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                    @csrf

                    <!-- Autor -->
                    <div class="mt-4">
                        <input id="author" class="block mt-1 w-full" type="text" name="author" placeholder="Autor" value="{{ old('author') }}" required autofocus />
                    </div>

                    <!-- Título -->
                    <div class="mt-4">
                        <input id="title" class="block mt-1 w-full" type="text" name="title" placeholder="Título" value="{{ old('title') }}" required />
                    </div>

                    <!-- Subtítulo -->
                    <div class="mt-4">
                        <input id="subtitle" class="block mt-1 w-full" type="text" name="subtitle" placeholder="Subtítulo" value="{{ old('subtitle') }}" />
                    </div>

                    <!-- Edição -->
                    <div class="mt-4">
                        <input id="edition" class="block mt-1 w-full" type="text" name="edition" placeholder="Edição" value="{{ old('edition') }}" />
                    </div>

                    <!-- Editora -->
                    <div class="mt-4">
                        <input id="publisher" class="block mt-1 w-full" type="text" name="publisher" placeholder="Editora" value="{{ old('publisher') }}" />
                    </div>

                    <!-- Ano de Publicação -->
                    <div class="mt-4">
                        <input id="publication_year" class="block mt-1 w-full" type="number" name="publication_year" placeholder="Ano de Publicação" value="{{ old('publication_year') }}" min="1900" max="{{ date('Y') }}" />
                    </div>

                    <!-- Capa do Livro -->
                    <div class="mt-4">
                        <input id="cover_image" class="block mt-1 w-full" type="file" name="cover_image" />
                    </div>

                    <!-- Botão de Cadastro -->
                    <div class="mt-4">
                        <button type="submit" class="button">
                            Cadastrar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
