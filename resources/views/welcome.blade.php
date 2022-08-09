<x-app-layout title="Welcome">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="py-14 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1>{{ __('Welcome') }}.</h1>
                    <div class="mt-3">
                        <label for="categories" class="font-bold">{{ __('Here you have the main pages') }}</label>:
                        <div>
                            <ul class="list-disc">
                                <li class="ml-6">
                                    <a href="{{ route('books.index') }}"
                                        class="font-medium text-blue-600 hover:underline">
                                        {{ __('Books') }}
                                    </a>
                                </li>
                                <li class="ml-6">
                                    <a href="{{ route('authors.index') }}"
                                        class="font-medium text-blue-600 hover:underline">
                                        {{ __('Authors') }}
                                    </a>
                                </li>
                                <li class="ml-6">
                                    <a href="{{ route('categories.index') }}"
                                        class="font-medium text-blue-600 hover:underline">
                                        {{ __('Categories') }}
                                    </a>
                                </li>
                                @role('admin')
                                    <li class="ml-6">
                                        <a href="{{ route('users.index') }}"
                                            class="font-medium text-blue-600 hover:underline">
                                            {{ __('Users') }}
                                        </a>
                                    </li>
                                @endrole
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
