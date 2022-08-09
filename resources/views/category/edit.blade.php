<x-app-layout title="Edit category">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit category') }}
        </h2>
    </x-slot>

    <div class="py-14 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="px-8 pt-6">
                    <a href="{{ route('categories.index') }}" class="font-medium text-blue-600 underline hover:underline">
                        {{ __('Back to categories list') }}
                    </a>
                </div>

                <form class="rounded px-8 pt-6 pb-8 mb-4" action="{{ route('categories.update', $category) }}" method="POST">
                    @csrf

                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            {{ __('Name') }}
                        </label>
                        <input
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('name') border-red-500 @enderror"
                            id="name" name="name" type="text" maxlength="80" required
                            value="{{ old('name', $category->name) }}">
                        @error('name')
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
