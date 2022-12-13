@extends('layouts.app-layout')
@section('content')
    <div class="font-sans antialiased">
        <div class="flex flex-col items-center min-h-screen pt-6 bg-gray-100 sm:justify-center sm:pt-0">

            <div class="w-full px-16 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-4xl">

                <div class="mb-4">
                    <h1 class="font-serif text-3xl font-bold">Update Song</h1>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                @endif

                <div class="w-full px-6 py-4 bg-white rounded shadow-md ring-1 ring-gray-900/10">
                    <form method="POST" action="{{ route('songs.update', $songs->id) }}">
                        @method('PUT')
                        @csrf
                        <div>
                            <label class="block text-sm font-medium text-gray-700" for="title">
                                Title
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="title" placeholder="100" value="{{ old('song', $songs->title) }}">
                            @error('song')
                                <span class="text-red-600 text-sm">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>

                        <!-- Description -->
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700" for="singer">
                                Singer
                            </label>

                            <input
                                class="block w-full mt-1 border-gray-300 rounded-md shadow-sm placeholder:text-gray-400 placeholder:text-right focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                type="text" name="singer" placeholder="100" value="{{ old('song', $songs->singer) }}">
                            @error('singer')
                                <span class="text-red-600 text-sm">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="flex items-center justify-start mt-4">
                            <button type="submit"
                                class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300">
                                Update
                            </button>
                            <button a href="{{ route('songs.index') }}"
                                class="inline-flex items-center px-6 py-2 text-sm font-semibold rounded-md text-sky-100 bg-sky-500 hover:bg-sky-700 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 ml-5">
                                Back
                            </button>
                        </div>
                    </form>

                    <div class="w-full px-0 py-20 mt-6 overflow-hidden bg-white rounded-lg lg:max-w-6xl">
                        <div class="grid grid-cols-2 ">
                            <div class="inline-flex flex-col px-6">
                                <h1 class="font-bold font-serif text-2xl inline-flex justify-center ">Albums</h1>
                                <div>
                                    <table class="min-w-full">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                    Album</th>

                                                <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                                                    colspan="2">
                                                    Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white">
                                            @foreach ($songs->albums as $album)
                                                <tr>
                                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                        <div class="flex items-center">
                                                            {{ $album->name }}
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                                        <form
                                                            action="{{ route('songs.detach', ['song' => $songs, 'album' => $album]) }}"
                                                            method="POST">
                                                            @csrf
                                                            <button type="submit" class="flex items-center px-8">
                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                    class="w-6 h-6 text-red-600 hover:text-red-800 cursor-pointer"
                                                                    fill="none" viewBox="0 0 24 24"
                                                                    stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                </svg>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="inline-flex flex-col px-6">
                                <h1 class="font-bold font-serif text-2xl inline-flex justify-center">Add new Album</h1>
                                <table class="min-w-full">
                                    <thead>
                                        <tr>
                                            <th
                                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                                Album</th>

                                            <th class="px-6 py-3 text-sm text-left text-gray-500 border-b border-gray-200 bg-gray-50"
                                                colspan="2">
                                                Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white">

                                        @foreach ($albums as $album)
                                            <tr>
                                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                                    <div class="flex items-center">
                                                        <option value="{{ $album->id }}">{{ $album->name }}</option>
                                                    </div>
                                                </td>
                                                <form
                                                    action="{{ route('songs.attach', ['song' => $songs, 'album' => $album]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <td
                                                        class="text-sm font-medium leading-5 whitespace-no-wrap border-b border-gray-200 ">
                                                        <button type="submit" class="flex items-center px-8">
                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                class="w-6 h-6 text-green-600 hover:text-green-800 cursor-pointer"
                                                                fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="2"
                                                                    d="M13.388,9.624h-3.011v-3.01c0-0.208-0.168-0.377-0.376-0.377S9.624,6.405,9.624,6.613v3.01H6.613c-0.208,0-0.376,0.168-0.376,0.376s0.168,0.376,0.376,0.376h3.011v3.01c0,0.208,0.168,0.378,0.376,0.378s0.376-0.17,0.376-0.378v-3.01h3.011c0.207,0,0.377-0.168,0.377-0.376S13.595,9.624,13.388,9.624z M10,1.344c-4.781,0-8.656,3.875-8.656,8.656c0,4.781,3.875,8.656,8.656,8.656c4.781,0,8.656-3.875,8.656-8.656C18.656,5.219,14.781,1.344,10,1.344z M10,17.903c-4.365,0-7.904-3.538-7.904-7.903S5.635,2.096,10,2.096S17.903,5.635,17.903,10S14.365,17.903,10,17.903z" />
                                                            </svg>
                                                        </button>
                                                    </td>
                                                </form>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
