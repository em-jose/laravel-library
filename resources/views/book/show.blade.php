<x-app-layout title="Book information">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Book information') }}
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-8 pt-6">
                    <a href="{{ route('books.index') }}" class="font-medium text-blue-600 underline hover:underline">
                        {{ __('Back to books list') }}
                    </a>
                </div>

                <div class="p-6">
                    <ul>
                        <li>
                            <span class="font-bold">{{ __('Title') }}</span>: {{ $book->title }}
                        </li>
                        <li>
                            <span class="font-bold">{{ __('ISBN-13') }}</span>: {{ $book->isbn13 }}
                        </li>
                        <li>
                            <span class="font-bold">{{ __('Description') }}</span>: {{ $book->description }}
                        </li>
                        <li>
                            <span class="font-bold">{{ __('Publication date') }}</span>: {{ $book->publication_date }}
                        </li>
                        <div>
                            <label for="categories" class="font-bold">{{ __('Authors') }}</label>:
                            <div id="authors">
                                <ul class="list-disc">
                                    @foreach ($book->authors as $author)
                                        <li class="ml-6">{{ $author->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div>
                            <label for="categories" class="font-bold">{{ __('Categories') }}</label>:
                            <div id="categories">
                                <ul class="list-disc">
                                    @foreach ($book->categories as $category)
                                        <li class="ml-6">{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
