<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="bg-gray-100">
        <div class="flex justify-center items-center h-screen w-full">
            <form action="{{ route('donations.store') }}" method="POST" class="w-full max-w-2xl">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                @if ($errors->any())
                    <div class="my-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-red-900">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="space-y-12">
                    <div class="border-b border-gray-900/10 pb-12">
                        <div class="flex justify-between items-center gap-x-6">
                            <div>
                                <h2 class="text-base/7 font-semibold text-gray-900">Kamu akan mengirimkan dukungan pada
                                    {{ $user->name }}</h2>
                                <p class="mt-1 text-sm/6 text-gray-600">Silahkan lengkapi data ini </p>
                            </div>
                            @guest
                                <a href="{{ route('login') }}"
                                    class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Log in
                                </a>
                            @endguest
                        </div>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-full">
                                <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama</label>
                                <div class="mt-2">
                                    <input type="text" name="name" id="name" required
                                        class="w-full rounded-md bg-white px-4 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        value="{{ auth()->check() ? auth()->user()->name : old('name') }}"
                                        @if (auth()->check()) readonly @endif>
                                </div>
                            </div>
                            <div class="sm:col-span-full">
                                <label for="email" class="block text-sm/6 font-medium text-gray-900">Email</label>
                                <div class="mt-2">
                                    <input type="email" name="email" id="email" required
                                        class="w-full rounded-md bg-white px-4 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        value="{{ auth()->check() ? auth()->user()->email : old('email') }}"
                                        @if (auth()->check()) readonly @endif>
                                </div>
                            </div>
                            <div class="sm:col-span-full">
                                <label for="amount" class="block text-sm/6 font-medium text-gray-900">Nominal</label>
                                <div class="mt-2">
                                    <input type="number" name="amount" id="amount" required
                                        class="w-full rounded-md bg-white px-4 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        placeholder="Nominal donasi">
                                </div>
                            </div>
                            <div class="sm:col-span-full">
                                <label for="message" class="block text-sm/6 font-medium text-gray-900">Pesan</label>
                                <div class="mt-2">
                                    <textarea name="message" id="message" required
                                        class="w-full rounded-md bg-white px-4 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                                        placeholder="Pesan dukungan"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 flex items-center gap-x-6">
                    <button type="submit"
                        class="w-full rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
