<x-site-layout title="Meet your next favorite books">

    <h1 class="font-bold text-2xl">Quotes</h1>
    <br />
    <p class="text-red-500 bg-white p-4 rounded-xl">
        "Don't walk in front of me… I may not follow<br />
        Don't walk behind me… I may not lead<br />
        Walk beside me… just be my friend"<br />
        ― <span class="font-bold">Albert Camus</span></p>
    <br />
    <br />
    <h1 class="font-bold text-2xl">New Book Releases</h1>
    <br />
    <div class="grid grid-cols-6 gap-6">
        @foreach($books as $book)
        <x-book-display-card :book="$book" />
        @endforeach
    </div>

</x-site-layout>