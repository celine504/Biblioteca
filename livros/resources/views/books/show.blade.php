</x-app-layout>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes do Livro') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <h3 class="text-lg font-semibold">{{ $book->title }}</h3>
                            <p class="text-sm text-gray-600">{{ $book->subtitle }}</p>
                            <p class="text-sm text-gray-600">Autor: {{ $book->author }}</p>
                            <p class="text-sm text-gray-600">Edição: {{ $book->edition }}</p>
                            <p class="text-sm text-gray-600">Editora: {{ $book->publisher }}</p>
                            <p class="text-sm text-gray-600">Ano de Publicação: {{ $book->publication_year }}</p>
                        </div>
                        <div class="text-center">
                            @if ($book->cover_image)
                                <img src="{{ asset('storage/' . $book->cover_image) }}" class="max-w-xs mx-auto">
                            @else
                                <p>Sem imagem de capa disponível.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
