<x-app-layout>
    <div class="container py-8">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>

        <div class="text-lg text-gray-500 mb-2">
            {!!$post->extract!!}
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- CONTENIDO PRINCIPAL -->
            <div class="lg:col-span-2">
                <figure>
                   @if ($post->image)
                       <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                   @else
                       <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/03/17/13/04/desert-4940300_1280.jpg" alt="">
                   @endif 
                </figure>
                <div class="text-base text-gray-500 mt-4">
                    {!!$post->body!!}
                </div>
            </div>
            <!-- CONTENIDO RELACIONADO -->
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$post->category->name}}</h1>
                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('post.show',$similar)}}">
                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/03/17/13/04/desert-4940300_1280.jpg" alt="">
                                @endif
                                <span class="ml-2 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>
        </div>
    </div>
</x-app-layout>