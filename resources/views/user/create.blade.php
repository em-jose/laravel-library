<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add user') }}
        </h2>
    </x-slot>

    <div class="py-14 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="px-8 pt-6">
                    <a href="{{ route('users.index') }}" class="font-medium text-blue-600 underline hover:underline">
                        {{ __('Back to users list') }}
                    </a>
                </div>

                <form class="rounded px-8 pt-6 pb-8 mb-4" action="{{ route('users.store') }}" method="POST">
                    @csrf

                    @method('POST')

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            {{ __('Name') }}
                        </label>
                        <input
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('name') border-red-500 @enderror"
                            id="name" name="name" type="text" maxlength="80" value="{{ old('name') }}"
                            required>
                        @error('name')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="lastname">
                            {{ __('Lastname') }}
                        </label>
                        <input
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('lastname') border-red-500 @enderror"
                            id="lastname" name="lastname" type="text" maxlength="80" value="{{ old('lastname') }}"
                            required>
                        @error('lastname')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                            {{ __('E-mail') }}
                        </label>
                        <input
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('email') border-red-500 @enderror"
                            id="email" name="email" type="email" maxlength="255" value="{{ old('email') }}"
                            required>
                        @error('email')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                            {{ __('Password') }}
                        </label>
                        <input
                            class="w-64 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 @error('password') border-red-500 @enderror"
                            id="password" name="password" type="password" maxlength="255"
                            value="{{ old('password') }}" required>
                        @error('password')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="mb-4">
                        <div>
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="roles">
                                {{ __('Roles') }}
                            </label>
                            @foreach ($roles as $role)
                                <div class="flex items-center mb-4">
                                    <input name="roles[]" type="checkbox" value="{{ $role }}"
                                        class="w-4 h-4 text-blue-600 bg-gray-50 rounded border-gray-300 focus:ring-blue-500 focus:ring-2">
                                    <label for="roles"
                                        class="ml-2 text-sm font-medium text-gray-900">{{ $role }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('roles')
                            <x-error-message type="error" :message="$message" />
                        @enderror
                    </div>

                    <div class="flex items-center justify-between">
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
