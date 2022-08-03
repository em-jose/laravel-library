<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Author information') }}
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-8 pt-6">
                    <a href="{{ route('authors.index') }}" class="font-medium text-blue-600 underline hover:underline">
                        {{ __('Back to authors list') }}
                    </a>
                </div>

                <div class="p-6">
                    <ul>
                        <li>
                            <span class="font-bold">{{ __('Name') }}</span>: {{ $author->name }}
                        </li>
                        <li>
                            <span class="font-bold">{{ __('Lastname') }}</span>: {{ $author->lastname }}
                        </li>
                        <li>
                            <span class="font-bold">{{ __('Date of birth') }}</span>: {{ $author->name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
