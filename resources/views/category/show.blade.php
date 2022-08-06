<x-app-layout title="Category information">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category information') }}
        </h2>
    </x-slot>

    <div class="py-14">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-8 pt-6">
                    <a href="{{ route('categories.index') }}" class="font-medium text-blue-600 underline hover:underline">
                        {{ __('Back to categories list') }}
                    </a>
                </div>

                <div class="p-6">
                    <ul>
                        <li>
                            <span class="font-bold">{{ __('Category name') }}</span>: {{ $category->name }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
