<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="p-4 bg-white">
                        <form method="POST"
                            action="{{ isset($article) ? route('articles.update', $article) : route('articles.store') }}">
                            @csrf
                            @if (isset($article))
                                @method('PUT')
                            @endif

                            <div class="mb-4">
                                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $article->title ?? '') }}"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                                @error('title')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                                <textarea name="body" id="body" rows="6"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('body', $article->body ?? '') }}</textarea>
                                @error('body')
                                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex justify-end">
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                                    {{ isset($article) ? 'Update Article' : 'Create Article' }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
