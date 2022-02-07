<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nonbre">
        </div>

        @if ($socios->count())
            
      
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th></th>

                    </thead>
                    
                    <tbody>
                        @foreach ($socios->reverse() as $socio)
                            <tr>
                                <td>{{$socio->id}}</td>
                                <td>{{$socio->name}}</td>
                                <td>{{$socio->user->email}}</td>
                                <td width="10px">
                                    <a class="btn btn-primary" href="{{route('socio.show', $socio)}}">Ver Perfil</a>
                                </td>
                            </tr>
                            
                        @endforeach

                    </tbody>
                </table>
            </div>

            <div class="card-footer">
                {{$socios->links()}}
            </div>
            
        @else
            <div class="card-body">
                <strong>No hay registros que coincidan</strong>
            </div>
       

        @endif
    </div>
</div>
