<x-app-layout title="Edit book">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit book') }}
        </h2>
    </x-slot>

    <div class="py-14 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="px-8 pt-6">
                    <a href="{{ route('books.index') }}" class="font-medium text-blue-600 underline hover:underline">
                        {{ __('Back to books list') }}
                    </a>
                </div>

                <form class="rounded px-8 pt-6 pb-8 mb-4" action="{{ route('books.update', $book) }}" method="POST">
                    @csrf

                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="title">
                            {{ __('Title') }}
                        </label>
                        <input
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('title') border-red-500 @enderror"
                            id="title" name="title" type="text" maxlength="250" required
                            value="{{ old('title', $book->title) }}">
                        @error('title')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="isbn13">
                            {{ __('ISBN-13') }}
                        </label>
                        <input
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('isbn13') border-red-500 @enderror"
                            id="isbn13" name="isbn13" type="text" minlength="13" maxlength="13" required
                            value="{{ old('isbn13', $book->isbn13) }}">
                        @error('isbn13')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                            {{ __('Description') }}
                        </label>
                        <textarea id="description"
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('description') border-red-500 @enderror"
                            name="description" rows="4" cols="50" maxlength="1000">{{ old('description', $book->description) }}</textarea>
                        @error('description')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="publication_date">
                            {{ __('Publication date') }}
                        </label>
                        <input type="date" id="publication_date" name="publication_date"
                            value="{{ old('publication_date', $book->publication_date) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block @error('publication_date') border-red-500 @enderror" />
                        @error('publication_date')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="authors">
                            {{ __('Author/Authors') }}
                        </label>
                        <div class="overflow-y-auto h-64 w-96 p-2 bg-gray-50 border border-gray-300 rounded scrollbar">
                            @foreach ($authors as $author)
                                <div class="flex items-center mb-4">
                                    <input name="authors[]" type="checkbox" value="{{ $author->id }}" @if($book->authors->contains($author->id)) checked @endif
                                        class="w-4 h-4 text-blue-600 bg-gray-50 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="authors"
                                        class="ml-2 text-sm font-medium text-gray-900">{{ $author->name }} {{ $author->lastname }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('authors')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="categories">
                            {{ __('Categories') }}
                        </label>
                        <div class="overflow-y-auto h-64 w-96 p-2 bg-gray-50 border border-gray-300 rounded scrollbar">
                            @foreach ($categories as $category)
                                <div class="flex items-center mb-4">
                                    <input name="categories[]" type="checkbox" value="{{ $category->id }}" @if($book->categories->contains($category->id)) checked @endif
                                        class="w-4 h-4 text-blue-600 bg-gray-50 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="categories"
                                        class="ml-2 text-sm font-medium text-gray-900">{{ $category->name }} {{ $category->lastname }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('categories')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>


                    <div class="flex items-center">
                        <button
                            class="bg-gray-800 hover:bg-gray-700 active:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            {{ __('Save') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
