<x-site-layout title="Search and browse books">

    <form action="/search" method="POST">
        @csrf

        <x-form-text name="search" label="Title" />
        <button type="submit" class="p-1 text-sm bg-green-500 text-white rounded">Search</button>
    </form>

</x-site-layout>