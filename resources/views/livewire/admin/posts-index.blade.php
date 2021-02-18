<div class="card">
    <div class="card-header">
        <input wire:model="search" placeholder="Ingrese el nombre de un post" class="form-control">
    </div>
    @if ($posts->count())
        
    
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->name}}</td>
                            <td with="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.posts.edit',$post)}}">Editar</a>
                            </td>
                            <td with="10px">
                                <form action="{{route('admin.posts.destroy',$post)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm " type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$posts->links()}}
        </div>
    @else
        <div class="card-body">
            <strong>No existe ningun registro con esa coincidencia</strong>
        </div>
        
    @endif
</div>
