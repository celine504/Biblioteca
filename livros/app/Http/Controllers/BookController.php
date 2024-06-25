<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;

class BookController extends Controller
{
    // Exibe a lista de livros
    public function index()
    {
        $books = Book::where('user_id', auth()->id())->paginate(10);
        return view('books.index', compact('books'));
    }

    // Exibe o formulário de criação de livro
    public function create()
    {
        return view('books.create');
    }

    // Armazena um novo livro no banco de dados
    public function store(Request $request)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:50',
            'publisher' => 'nullable|string|max:255',
            'publication_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $book = new Book();
        $book->author = $request->author;
        $book->title = $request->title;
        $book->subtitle = $request->subtitle;
        $book->edition = $request->edition;
        $book->publisher = $request->publisher;
        $book->publication_year = $request->publication_year;
        $book->user_id = auth()->id();

        if ($request->hasFile('cover_image')) {
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
            $book->cover_image = $coverImagePath;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro adicionado com sucesso!');
    }

    // Exibe o formulário de edição de livro
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    // Atualiza um livro existente no banco de dados
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'author' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'edition' => 'nullable|string|max:50',
            'publisher' => 'nullable|string|max:255',
            'publication_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'cover_image' => 'nullable|image|max:2048',
        ]);

        $book->author = $request->author;
        $book->title = $request->title;
        $book->subtitle = $request->subtitle;
        $book->edition = $request->edition;
        $book->publisher = $request->publisher;
        $book->publication_year = $request->publication_year;

        if ($request->hasFile('cover_image')) {
            if ($book->cover_image) {
                Storage::disk('public')->delete($book->cover_image);
            }
            $coverImagePath = $request->file('cover_image')->store('covers', 'public');
            $book->cover_image = $coverImagePath;
        }

        $book->save();

        return redirect()->route('books.index')->with('success', 'Livro atualizado com sucesso!');
    }

    // Remove um livro do banco de dados
    public function destroy(Book $book)
    {
        if ($book->cover_image) {
            Storage::disk('public')->delete($book->cover_image);
        }

        $book->delete();

        return redirect()->route('books.index')->with('success', 'Livro excluído com sucesso!');
    }

    // Exibe a página de leitura do livro
    public function read(Book $book)
    {
        // Implemente aqui a lógica para visualizar o conteúdo do livro
        return view('books.read', compact('book'));
    }

    // Exibe os detalhes de um livro específico
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }
}
