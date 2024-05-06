<x-site-layout title="Search books">

    <x-form-search />

    <div class="mb-4 mt-4">
        Results for
        <span class="font-bold">'{{ $search_term }}'</span>
        in <span class="font-bold">{{ $books->count() }}</span> book(s):
    </div>

    <div class="grid grid-cols-6 gap-8">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>