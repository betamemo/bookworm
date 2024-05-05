<form action="/search" method="POST">
    @csrf

    <div class="w-full flex justify-center text-sm">
        <input type="text" id="search" value="" class="p-2 w-full rounded-full" name="search" placeholder="Title / Author / ISBN" />

        <button type="submit" class="ml-4 p-2 font-bold bg-green-500 text-white rounded-full hover:bg-green-600">Search</button>
    </div>
</form>