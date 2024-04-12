@extends('layouts.panel')
@section('title', 'Assignment/Show')

@section('content')
    <div class="col-xl-12 order-xl-1">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h3 class="mb-0"><i class="fas fa-eye"></i> Ver Asignación</h3>
                    </div>
                    <div class="col-4 text-right">
                        <a href="{{ route('assignments.index') }}" class="btn btn-sm btn-primary"><i
                                class="fas fa-arrow-left"></i>
                            Volver</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h6 class="heading-small text-muted mb-4">Información de la Asignación</h6>
                <div class="pl-lg-4">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="table_number"><i class="fas fa-signature"></i>
                                    Nombre del Cliente</label>
                                <p>{{ $assignment->client->user->name }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="table_number"><i class="fas fa-signature"></i>
                                    Tipo de Mesa</label>
                                <p>{{ $assignment->table->type->name }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="table_number"><i class="fas fa-signature"></i>
                                    Numero de Mesa</label>
                                <p>{{ $assignment->table->table_number }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="table_number"><i class="fas fa-signature"></i>
                                    Nombre del Empleado</label>
                                <p>{{ $assignment->user->name }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="register_date"><i class="fas fa-calendar-alt"></i>
                                    Capacidad</label>
                                <p>{{ $assignment->table->type->capacity }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="register_date"><i class="fas fa-calendar-alt"></i>
                                    Precio</label>
                                <p>{{ $assignment->table->type->unit_price }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="register_date"><i class="fas fa-calendar-alt"></i>
                                    Fecha de Registro</label>
                                <p>{{ $assignment->register_date }}</p>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label" for="register_date"><i class="fas fa-calendar-alt"></i>
                                    Hora de Registro</label>
                                <p>{{ $assignment->register_time }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
