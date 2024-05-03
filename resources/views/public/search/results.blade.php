<x-site-layout title="Search results for '{{$search_term}}'">

<x-form-search />

    <div class="mb-4 mt-4">Your search for '{{ $search_term }}' resulted in {{ $books->count() }} results:</div>

    <div class="grid grid-cols-4 gap-8">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>