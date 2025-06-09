<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between" x-data="{ open: false }">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $article->title }}
            </h2>
            @can('delete', $article)
                <button @click="open = true"
                    class="inline-block px-4 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700">
                    Delete Article
                </button>

                <div x-show="open" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
                    x-cloak>
                    <div class="bg-white p-6 rounded shadow-md max-w-md w-full">
                        <h2 class="text-lg font-semibold mb-4 text-gray-900">Delete Article</h2>
                        <p class="mb-6 text-gray-700">Are you sure you want to delete this article?</p>

                        <div class="flex justify-end space-x-4">
                            <button @click="open = false"
                                class="px-4 py-2 bg-gray-300 text-gray-800 rounded hover:bg-gray-400">
                                Cancel
                            </button>

                            <form action="{{ route('articles.destroy', $article) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                    Confirm Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $article->title }}</h1>

                    <p class="text-gray-700 mb-6">
                        {{ $article->body }}
                    </p>

                    <p class="text-sm text-gray-500">
                        Written by: {{ $article->user->name ?? 'Unknown' }} on
                        {{ $article->created_at->format('F j, Y') }}
                    </p>

                    <a href="{{ route('articles.index') }}" class="mt-4 inline-block text-blue-600 hover:underline">
                        ← Back to Articles
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
