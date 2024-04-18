@extends('layouts.panel')
@section('title', 'Client/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-eye"></i> Ver Cliente</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información del Cliente</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="name"><i class="fas fa-signature"></i>
                                    Nombre</label>
                                <p>{{ $client->user->name }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="email"><i class="fas fa-signature"></i>
                                    Correo</label>
                                <p>{{ $client->user->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="phone"><i class="fas fa-calendar-alt"></i>
                                    Teléfono</label>
                                <p>{{ $client->phone }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="created_at"><i class="fas fa-calendar-alt"></i>
                                    Fecha de Registro</label>
                                <p>{{ $client->created_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
