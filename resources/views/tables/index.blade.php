@extends('layouts.panel')
@section('title', 'Table')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Mesas</h3>
                        <a href="{{ route('tables.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nueva Mesa
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-hashtag"></i> ID</th>
                                <th scope="col"><i class="fas fa-signature"></i> Numero</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Capacidad</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Tipo</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Precio</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Estado</th>
                                <th scope="col"><i class="fas fa-calendar-alt"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tables as $table)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $table->id }}</span>
                                    </td>
                                    <td>
                                        {{ $table->table_number }}
                                    </td>

                                    <td>
                                        {{ $table->type->capacity }} Personas
                                    </td>

                                    <td>
                                        {{ $table->type->name }}
                                    </td>

                                    <td>
                                        {{ $table->type->unit_price }}
                                    </td>

                                    <td class="d-none d-lg-table-cell">
                                        <span class="badge badge-dot mr-4">
                                            @if ($table->status == 'reservada')
                                                <span class="badge badge-danger">{{ $table->status }}</span>
                                            @elseif ($table->status == 'disponible')
                                                <span class="badge badge-success">{{ $table->status }}</span>
                                            @elseif ($table->status == 'inactiva')
                                                <span class="badge badge-warning">{{ $table->status }}</span>
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        {{ $table->created_at }}
                                    </td>
                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('tables.show', $table) }}" class="btn btn-primary btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('tables.edit', $table) }}" class="btn btn-info btn-sm"
                                            style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('tables.release', $table->id) }}" method="POST"
                                            style="display: inline-block; margin: 0; display: flex; align-items: center;">
                                            @csrf
                                           
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Liberar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="..." class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        {{ $tables->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
