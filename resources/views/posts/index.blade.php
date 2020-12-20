<x-app-layout>

    <div class="container py-8 border">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($posts as $post)
                <article class="@if($loop->first) md:col-span-2 @endif w-full h-80 bg-cover bg-center" style="background-image: url({{Storage::url($post->image->url)}})">
                    <div class="w-full h-full px-8 flex flex-col justify-center">

                        <div>
                        @foreach($post->tags as $tag)
                            <a class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full" href="">{{$tag->name}}</a>
                        @endforeach
                        </div>

                        <h1 class="text-4xl text-white leading-8 font-bold">
                            <a href="{{route('post.show',$post)}}">{{$post->name}}</a>
                        </h1>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>

</x-app-layout>