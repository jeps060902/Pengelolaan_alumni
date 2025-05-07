<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <article class="py-2 max-w-full ">
        <div class="bg-white text-gray-900 p-6 sm:p-10 max-w-3xl mx-auto">
            <a href="/Posts" class="font-medium text-blue-500 hover:underline">&laquo; Back To Post</a>
            <div class="flex items-center space-x-4 mb-4">
                <img alt="Portrait of a man with short hair and glasses wearing a dark shirt"
                    class="w-12 h-12 rounded-full object-cover" height="48"
                    src="https://storage.googleapis.com/a1aa/image/8d431e9c-4586-46fd-492e-059573873b3e.jpg"
                    width="48" />
                <div>
                    <a href="/author/{{ $post->author->id }}">{{ $post->author->name }}</a>
                    <p class="text-gray-500 text-sm leading-tight">
                        {{ $post->kategoris->name }}
                    </p>
                    <p class="text-gray-500 text-sm leading-tight">
                        {{ $post->created_at->format('d F Y') }}
                    </p>
                </div>
            </div>
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">
                {{ $post['title'] }}
            </h2>
            <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-4">
                {{ $post['body'] }}
            </p>
        </div>


    </article>
</x-layout>
