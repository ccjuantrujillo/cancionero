<div class="row">

    <div class="form-group row col-xl-6">
        <div class="col-sm-2"> 
            {!!Form::label('descripcion','Descripcion:')!!}
        </div>
        <div class="col-sm-10">
            {!!Form::text('descripcion',$misa->MISAC_Descripcion,['class'=>'form-control','placeholder'=>'Ingrese la descripcion','id'=>'descripcion'])!!}
        </div>
    </div>

    <div class="form-group row col-xl-6">
        <div class="col-sm-2"> 
            {!!Form::label('tema','Tema:')!!}
        </div>
        <div class="col-sm-10">
            {!!Form::text('tema',$misa->MISAC_Tema,['class'=>'form-control','placeholder'=>'Ingrese el tema','id'=>'tema'])!!}
        </div>
    </div>

    <div class="form-group row col-xl-6">
        <div class="col-sm-2"> 
            {!!Form::label('fecha','Fecha:')!!}
        </div>
        <div class="col-sm-10"> 
            {!!Form::date('fecha',$misa->MISAC_Fecha,['class'=>'form-control','placeholder'=>'Ingrese la fecha','id'=>'fecha'])!!}
        </div>
    </div>

</div>

<div><hr></div>

<!--Detalle de cantos por misa-->
@foreach( $ritos as $valuecat )

    <!-- Muestro todas las canciones para la categoria seleccionada. -->
    @if(isset($arrmisacanciones[$valuecat->RITOP_Codigo]) )
    
      @php $categoria_ant = 0;@endphp

      @foreach($arrmisacanciones[$valuecat->RITOP_Codigo] as $cancion_id)  
        
        <div class="form-group row">
            
            <!-- Oculta Nombre de categoria -->
            @if($categoria_ant != $valuecat->RITOP_Codigo)
                <label class="col-sm-2">{{ strtoupper($valuecat->RITOC_DescripcionCorta) }}: </label>
            @else
                <label class="col-sm-2">&nbsp;</label>
            @endif
             
             <div class="col-sm-10 row">
                 <div class="col-11 canciones_{{ $valuecat->RITOP_Codigo }}">

                     <!-- Combo de canciones -->
                     <select class="form-control form-control-sm" name="categ_{{ strtoupper($valuecat->RITOP_Codigo) }}[]">
                         <option value="">::Seleccione::</option>
                         @php $catego_ini = 0;@endphp

                         @foreach( $canciones as $indice => $value )
                             @php $catego = $value->RITOP_Codigo;@endphp
                             @if($catego != $catego_ini)
                                 @if($indice == 0)
                                     <optgroup label="{{ $value->CATEGC_DescripcionCorta }}">
                                 @else
                                     </optgroup><optgroup label="{{ $value->CATEGC_DescripcionCorta }}">
                                 @endif
                             @endif

                             @php $catego_ini = $catego;@endphp
                             <option value="{{ $value->CANCP_Codigo }}" 
                                @if ($value->CANCP_Codigo == $cancion_id)
                                    {{ "selected='selected'" }} 
                                @endif                                  
                                 > {{ $value->CATEGCANCC_Orden .' - '. $value->CANCC_Titulo }}
                             </option>

                         @endforeach
                     </select>      

                 </div>
                 <div class="col-1">
                     <a href='#' id="{{ $valuecat->RITOP_Codigo }}" class="agregar_cancion"><b><font color="#FF0000">(+)</font></b></a>
                 </div>
             </div>
         </div>  
      
         <!-- Asigna valoa a la variable categoria_ant -->
         @php $categoria_ant = $valuecat->RITOP_Codigo;@endphp
      
      @endforeach
      
    @else
        <!-- No existen canciones para la categoria -->
        <div class="form-group row">
            <label class="col-sm-2">{{ strtoupper($valuecat->RITOC_DescripcionCorta) }}: </label>
            <div class="col-sm-10 row">
                <div class="col-11 canciones_{{ $valuecat->RITOP_Codigo }}">

                    <!-- Combo de canciones -->
                    <select class="form-control form-control-sm" name="categ_{{ strtoupper($valuecat->RITOP_Codigo) }}[]">
                        <option value="">::Seleccione::</option>
                        @foreach( $canciones as $indice => $value )
                            <option value="{{ $value->CANCP_Codigo }}">{{ $value->CATEGCANCC_Orden .' - '. $value->CANCC_Titulo }}</option>
                        @endforeach
                    </select>      

                </div>
                <div class="col-1">
                    <a href='#' id="{{ $valuecat->RITOP_Codigo }}" class="agregar_cancion"><b><font color="#FF0000">(+)</font></b></a>
                </div>
            </div>
        </div>    
    
    @endif

@endforeach
<!--/Detalle-->