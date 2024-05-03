<x-site-layout title="Authors">

    <!-- <div class="flex justify-center mb-4">
        A | B | C | D | E | F | G | H | I | J | K | L | M | N | O | P | Q | R | S | T | U | V | W | X | Y | Z
    </div> -->

    <ul class="list-disc">
        @foreach($authors as $author)
        <li class="mb-4">
            <a class="text-green-500 text-xl hover:underline" href="/authors/{{$author->id}}">{{ $author->name }}</a>
        </li>
        @endforeach
    </ul>

</x-site-layout>