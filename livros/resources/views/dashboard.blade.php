@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="my-4">Dashboard</h1>

        <p>{{ auth()->user()->name }}, aqui estão seus livros:</p>

        <!-- Botão para adicionar novos livros -->
        <div class="mb-4">
            <a href="{{ route('books.create') }}" class="btn btn-success">Adicionar Novo Livro</a>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Edição</th>
                    <th>Editora</th>
                    <th>Ano de Publicação</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr>
                        <td>{{ $book->id }}</td>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->edition }}</td>
                        <td>{{ $book->publisher }}</td>
                        <td>{{ $book->publication_year }}</td>
                        <td>
                            <!-- Botões para editar, excluir e ler -->
                            <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <!--sem funçao de ler -->
                                 <!--sem funçao de saida -->
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                           
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $books->links() }}  {{-- Links de paginação --}}
       
    </div>
@endsection
