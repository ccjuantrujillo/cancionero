@extends('layouts.admin')

@section('content')

<section class="content-header"> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Listado de canciones</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-info" href="{{ route('cancion.create') }}">Agregar Cancion</a>
      </div>
    </div>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-body">

           <table class="table table-bordered table-hover">
              <thead>
                <tr class="text-center">
                  <th scope="col">Item</th>
                  <th scope="col">Tìtulo</th>
                  <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
              </thead>
              
              @foreach($canciones as $item => $cancion)
              <tbody>
                  <tr class="text-center">
                  <td scope="row">{{ $item + 1 }}</td>
                    
                    <td class="text-left">{{ $cancion->CANCC_Titulo }}</td>
                    <td>{!!link_to_route('cancion.edit', $title = 'Editar', $parameters = $cancion->CANCP_Codigo, $attributes = ['class'=>'btn btn-info'])!!}</td>
                    <td>
                      {!!Form::open(['route'=>['cancion.destroy',$cancion->CANCP_Codigo],'method'=>'DELETE'])!!}
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          {!!Form::submit('Eliminar',
                                ['class'=>'btn btn-danger'])
                          !!}
                      {!!Form::close()!!}   
                     </td>
                  </tr>
              </tbody>
              @endforeach
              
            </table>

        </div>

      </div>
    </div>
  </div>
</section>

<!--grid-->
<div class="grid-system">
    <!---->
    <div class="horz-grid">

        <!----> 
        <div class="grid-hor">
 
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>  

</script>
@endsection