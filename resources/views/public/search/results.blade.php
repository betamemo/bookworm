<x-site-layout title="Search results for '{{$search_term}}'">

    <div>Your search for '{{$search_term}}' resulted in {{$books->count()}} results:</div>

    @foreach($books as $book)
    <a href="{{route('books.show', ['id' => $book->id])}}" class="mt-2 hover:bg-green-50">
        <h2 class="font-semibold">{{$book->title}}</h2>
        <p>{{ Str::limit($book->content,100) }}</p>
    </a>
    @endforeach

</x-site-layout>