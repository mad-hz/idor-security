<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            <a href="{{ route('articles.create') }}"
                class="inline-block px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                New Article
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    @if (!$articles->count())
                        <div class="bg-white p-4">
                            There are not articles yet.
                        </div>
                    @else
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        ID
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Title
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        User
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr class="odd:bg-white even:bg-gray-50 border-gray-200">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                            {{ $article->id }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $article->title }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $article->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @can('update', $article)
                                                <a href="{{ route('articles.edit', $article) }}"
                                                    class="font-medium text-white hover:bg-blue-400 bg-blue-600 p-2 rounded">Edit</a>
                                            @endcan
                                            <a href="{{ route('articles.show', $article) }}"
                                                class="font-medium text-white hover:bg-blue-400 bg-blue-600 p-2 rounded">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
