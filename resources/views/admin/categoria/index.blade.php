@extends('layouts.admin')

@section('content')

<section class="content-header"> 
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <h1>Listado de categorias</h1>
      </div>
      <div class="col-sm-6 text-right">
        <a class="btn btn-info" href="{{ route('categoria.create') }}">Agregar Categoria</a>
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
                  <th scope="col">Nombre</th>
                  <th scope="col">Orden</th>
                  <th scope="col" colspan="2" class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categorias as $item=>$categ)
                <tr>
                  <th scope="row">{{$item+1}}</th>
                  <td>{{$categ->CATEGC_Descripcion}}</td>
                  <td class="text-center">{{$categ->CATEGC_Orden}}</td>
                  <td class="text-center">{!!link_to_route('categoria.edit', $title = 'Editar', $parameters = $categ->CATEGP_Codigo, $attributes = ['class'=>'btn btn-success'])!!}</td>
                  <td class="text-center">
                    {!!Form::open(['route'=>['categoria.destroy',$categ->CATEGP_Codigo],'method'=>'DELETE'])!!}
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
