<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <section class="py-4 max-w-screen-xl mx-auto px-4 sm:px-6 lg:px-0 lg:py-8">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start mb-3">
                            <span
                                class="inline-flex items-center px-2 py-0.5 rounded text-xs font-semibold bg-blue-100 text-blue-700">
                                <i class="fas fa-book-open mr-1 text-[10px]"></i>
                                <a href="/kategori/{{ $post->kategoris->slug }}"> {{ $post->kategoris->name }} </a>
                            </span>
                            <time class="text-xs text-gray-400">
                                {{ $post->created_at->diffForHumans() }}
                            </time>
                        </div>
                        <a href="/Posts/{{ $post['slug'] }}" class="hover:underline">
                            <h3 class="text-lg font-extrabold text-gray-900 mb-2 leading-tight">
                                {{ $post['title'] }}
                            </h3>
                        </a>
                        <p class="text-sm text-gray-600 mb-4 leading-relaxed ">
                            {{ Str::limit($post['body'], 150) }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between mt-4">
                        <div class="flex items-center space-x-3">
                            <img alt="Portrait of Jese Leos smiling with short hair and beard"
                                class="w-8 h-8 rounded-full object-cover" height="32" loading="lazy"
                                src="https://storage.googleapis.com/a1aa/image/f1c043bf-bd0c-4b79-94b5-75131dd6a609.jpg"
                                width="32" />
                            <span class="text-sm font-bold text-gray-900">
                                <a href="/author/{{ $post->author->username }}">{{ $post->author->name }}</a>
                            </span>
                        </div>
                        <a class="text-blue-600 text-sm font-semibold flex items-center space-x-1 hover:underline"
                            href="/Posts/{{ $post['slug'] }}">
                            <span>
                                <span class="font-medium text-blue-500 hover:underline">Read More &raquo;</span>
                            </span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</x-layout>
