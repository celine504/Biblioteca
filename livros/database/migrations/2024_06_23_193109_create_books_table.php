<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{ 
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('author');
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('edition')->nullable();
            $table->string('publisher')->nullable();
            $table->year('publication_year')->nullable();
            $table->string('cover_image')->nullable();
            $table->unsignedBigInteger('user_id'); // Adiciona a coluna user_id para associar o livro ao usuário
            $table->timestamps();

            // Chave estrangeira para associar o livro ao usuário
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
