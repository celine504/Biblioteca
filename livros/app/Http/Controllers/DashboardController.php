<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class DashboardController extends Controller
{
    public function index()
    {
     // Busca os livros do usuário autenticado
        $books = Book::where('user_id', auth()->id())->paginate(10);
        // Retorna a view 'dashboard' com os livros
        return view('dashboard', compact('books'));
    }
}
