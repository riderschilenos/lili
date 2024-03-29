<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nonbre">
        </div>

        @if ($users->count())
            
      
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>

                    </thead>
                    
                    <tbody>
                        @foreach ($users->reverse() as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td width="10px">
                                    <a class="font-bold py-2 px-4 rounded bg-blue-500 text-white" href="{{route('admin.users.edit',$user)}}">Editar</a>
                                </td>
                            </tr>
                            
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$users->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros que coincidan</strong>
            </div>
       

        @endif
    </div>
</div>
