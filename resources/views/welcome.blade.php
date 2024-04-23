<x-site-layout title="Welcome">

    <h2 class="text-2xl font-bold text-green-500">Hello, Bookworm</h2>
    <p class="mb-8">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam quaerat, repudiandae soluta asperiores nulla corporis, molestiae doloribus molestias corrupti aliquam quod consectetur velit impedit, fugiat voluptatibus quidem tenetur. Amet, nemo!
    </p>

    <div class="grid grid-cols-2 gap-8">
        @foreach($books as $book)
        <div class="p-5 bg-white rounded">
            <h3 class="font-bold">{{$book->title}}</h3>
            Author: <span class="font-bold">{{$book->author}}</span>
            <p>{{$book->description}}</p>
        </div>
        @endforeach
    </div>

</x-site-layout>