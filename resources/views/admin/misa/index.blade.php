@extends('layouts.admin')

@section('content')

<section class="content-header"> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Listado de misas</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-info" href="{{ route('misa.create') }}">Agregar Misa</a>
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
                  <th scope="col">Codigo</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Fecha</th>
                  <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($misas as $item => $misa)
                  <tr class="text-center">
                    <th scope="row">{{ $item+1 }}</th>
                    <td class="text-left"> {{ $misa->MISAC_Descripcion }} </td>
                    <td class="text-center">{{ $misa->MISAC_Fecha->format('d/m/Y') }}</td>
                    <td>{!!link_to_route('misa.edit', $title = 'Editar', $parameters = $misa->MISAP_Codigo, $attributes = ['class'=>'btn btn-info'])!!}</td>
                    <td>
                      {!!Form::open(['route'=>['misa.destroy',$misa->MISAP_Codigo],'method'=>'DELETE'])!!}
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                          {!!Form::submit('Eliminar',
                                ['class'=>'btn btn-danger'])
                          !!}
                      {!!Form::close()!!}   
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

        </div>

      </div>
    </div>
  </div>
</section>
<!--/ Main content -->

@endsection

