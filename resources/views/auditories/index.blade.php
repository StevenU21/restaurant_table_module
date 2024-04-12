@extends('layouts.panel')

@section('title', 'Auditories')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Historial</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-hashtag"></i> ID</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Empleado</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Acción</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Tabla</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Descripción</th>
                                <th scope="col"><i class="fas fa-calendar-alt"></i> Fecha de Registro</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($activities as $activity)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary">{{ $activity->id }}</span>
                                    </td>
                                    <td>{{ $activity->causer->name }}</td>
                                    <td>{{ $activity->description }}</td>
                                    <td>{{ $activity->subject_type }}</td>
                                    <td>
                                        @empty($activity->old)
                                        @else
                                            <strong>Old:</strong>
                                            <ul>
                                                <li>{{ $activity->old }}</li>
                                            </ul>
                                        @endempty

                                        @empty($activity->new)
                                        @else
                                            <strong>New:</strong>
                                            <ul>
                                                <li>{{ $activity->new }}</li>
                                            </ul>
                                        @endempty
                                    </td>
                                    <td>{{ $activity->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        {{ $activities->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
