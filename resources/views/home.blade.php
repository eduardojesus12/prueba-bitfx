@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Proveedores</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('includes.message')
                    @include('includes.error')
                    <div class="row">
                        <form class="form-inline" method="POST" action="{{route('cargar.proveedores')}}" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group mx-sm-3 mb-2">
                            <input type="file" class="form-control" placeholder=".txt, .cvs" name="proveedores"   accept=".csv,.txt">
                          </div>
                          <button type="submit" class="btn btn-primary mb-2">Cargar proveedores</button>
                        </form>

                    </div>

                    
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">RFC</th>
                            <th scope="col">Email</th>
                            <th scope="col">Acciones</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach($proveedores as $proveedor)
                            <tr>
                              <th scope="row">{{ $proveedor->id}}</th>
                              <td>{{ $proveedor->nombre}}</td>
                              <td>{{ $proveedor->rfc}}</td>
                              <td>{{ $proveedor->email}}</td>
                              <td scope="col">
                                @if($proveedor->aceptado == 1)
                                  <p class="h5">
                                    <span class="badge badge-success p-2">Aceptado</span>
                                  </p>
                                @elseif($proveedor->rechazado == 1)
                                <p class="h5">
                                  <span class="badge badge-danger p-2">Rechazado</span>
                                </p>
                                @else
                                  <a class="bnt btn-success p-1" href="{{route('proveedor.aceptar', ['id' => $proveedor->id])}}">Aceptar</a>
                                  <a class="bnt btn-danger p-1" href="{{route('proveedor.rechazar', ['id' => $proveedor->id])}}">Rechazar</a>
                                @endif
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>

                  </div>
                  {{ $proveedores->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
