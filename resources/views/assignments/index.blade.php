@extends('layouts.panel')
@section('title', 'Table')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Asignaciones</h3>
                        <a href="{{ route('assignments.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nueva Asignación
                        </a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-hashtag"></i> ID</th>
                                <th scope="col"><i class="fas fa-signature"></i> Tipo Mesa</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> No. Mesa</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Tipo Asignación</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Cliente</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Empleado</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Fecha Registro</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Hora de Registro</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Fecha de Reservación</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Hora de Reservación</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Estado</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assignments as $assignment)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $assignment->id }}</span>
                                    </td>
                                    <td>
                                        {{ $assignment->table->type->name }}
                                    </td>

                                    <td>
                                        {{ $assignment->table->table_number }}
                                    </td>

                                    <td>
                                        {{ $assignment->assignment_type }}
                                    </td>

                                    <td>
                                        {{ $assignment->client->user->name }}
                                    </td>

                                    <td>
                                        {{ $assignment->user->name }}
                                    </td>

                                    <td>
                                        {{ $assignment->register_date }}
                                    </td>

                                    <td>
                                        {{ $assignment->register_time }}
                                    </td>

                                    <td>
                                        {{ $assignment->reservation_date }}
                                    </td>

                                    <td>
                                        {{ $assignment->reservation_time }}
                                    </td>

                                    <td>
                                        {{ $assignment->state }}
                                    </td>

                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('assignments.show', $assignment->id) }}"
                                            class="btn btn-primary btn-sm" style="margin-right: 5px;">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>
                                        <a href="{{ route('assignments.edit', $assignment->id) }}"
                                            class="btn btn-info btn-sm" style="margin-right: 5px;">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                        <form action="{{ route('assignments.destroy', $assignment->id) }}" method="POST"
                                            style="display: inline-block; margin: 0; display: flex; align-items: center;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
