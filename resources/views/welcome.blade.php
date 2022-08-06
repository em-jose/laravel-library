<x-app-layout title="Welcome">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    @if (Auth::user())
        <div class="py-14 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div>
                        <h1>Welcome!</h1>
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-app-layout>
