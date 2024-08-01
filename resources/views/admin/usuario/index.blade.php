@extends('layouts.admin')

@section('content')

<!-- Content Header -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Listado de Usuarios</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-info" href="{{ route('usuario.create') }}">Agregar Usuario</a>
      </div>        
    </div>
  </div>
</section>
<!-- /Content Header -->
    
<!-- Main Content-->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr class="text-center">
              <th scope="col">Codigo</th>
              <th scope="col">Nombre</th>
              <th scope="col">Email</th>
              <th scope="col">Rol</th>
              <th scope="col" colspan="2" class="text-center">Acciones</th>
           </tr>
            </thead>
            <tbody>
              @forelse($usuarios as $item=>$user)
                <tr class="text-center">
                  <th scope="row">{{ $item+1 }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->ROLP_Codigo == App\User::ROL_USER ? 'Usuario' : 'Administrador' }}</td>
                  <td><a class="btn btn-info" href="{{ route('usuario.edit', $user->id) }}">Editar</a></td>
                  <td>
                    {!!Form::open(['route'=>['usuario.destroy',$user->id],'method'=>'DELETE'])!!}
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        {!!Form::submit('Eliminar',
                              ['class'=>'btn btn-danger'])
                        !!}
                    {!!Form::close()!!}                    
                  </td>
                </tr>
              @empty
                <p><i>No se han encontrado elementos en la base de datos ...</i></p>
              @endforelse
            </tbody>          
          </table>
        </div>

      </div>
    </div>
  </div>
</section>
<!-- /Main Content-->

@endsection

@section('scripts')

@endsection