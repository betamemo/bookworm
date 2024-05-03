<x-site-layout title="Authors">

    <div class="flex justify-center mb-4">
        A | B | C | D | E | F | G | H | I | J | K | L | M | N | O | P | Q | R | S | T | U | V | W | X | Y | Z
    </div>

    <ul class="list-disc ml-5">
        @foreach($authors as $author)
        <li>
            <a class="underline hover:bg-purple-200" href="/authors/{{$author->id}}">{{$author->name}}</a>
        </li>
        @endforeach
    </ul>

</x-site-layout>