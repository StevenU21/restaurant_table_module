@extends('layouts.panel')
@section('title', 'Type')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Tipos</h3>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createTypeModal">
                            <i class="fas fa-plus"></i> Nuevo Tipo
                        </button>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="createTypeModal" tabindex="-1" role="dialog"
                    aria-labelledby="createTypeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="createTypeModalLabel">Nuevo Tipo</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('types.store') }}" method="POST">
                                    @csrf
                                    @include('types.form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <div class="d-flex align-items-center flex-wrap mb-3">
                        <label for="perPageSelect" class="ml-4 mr-3">Mostrar:</label>
                        <div class="form-group mb-0 mr-3">
                            <select id="perPageSelect" class="form-control form-control-sm">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </div>
                        <form action="{{ route('types.search') }}" method="GET" class="d-flex align-items-center">
                            <div class="form-group mb-0 mr-3">
                                <input type="text" class="form-control form-control-sm" id="searchInput"
                                    name="searchInput" placeholder="Buscar">
                                <div id="searchResult" class="position-absolute bg-white border shadow-sm"
                                    style="max-width: 200px; display: none;"></div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Buscar</button>
                        </form>
                    </div>

                    <table class="table align-items-center table-flush" id="table">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-hashtag"></i> ID</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Nombre</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Precio</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Capacidad</th>
                                <th scope="col"><i class="fas fa-calendar-alt"></i> Fecha de Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $type)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $type->id }}</span>
                                    </td>
                                    <td>
                                        {{ $type->name }}
                                    </td>

                                    <td>
                                        {{ $type->unit_price }}
                                    </td>

                                    <td>
                                        {{ $type->capacity }} Personas
                                    </td>

                                    <td>
                                        {{ $type->created_at }}
                                    </td>

                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="#" class="btn btn-primary btn-sm show-button"
                                            style="margin-right: 5px;" data-type="{{ $type }}" data-toggle="modal"
                                            data-target="#showTypeModal{{ $type->id }}">
                                            <i class="fas fa-eye"></i> Mostrar
                                        </a>

                                        <!-- Show Modal -->
                                        @include('components/types/modals/showmodal')

                                        <a href="#" class="btn btn-info btn-sm edit-button" style="margin-right: 5px;"
                                            data-type="{{ $type }}" data-toggle="modal"
                                            data-target="#editTypeModal{{ $type->id }}">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>

                                        <!-- Edit Modal -->
                                        @include('components/types/modals/editmodal')

                                        <form action="{{ route('types.destroy', $type->id) }}" method="POST"
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
                <div class="card-footer py-4">
                    <nav aria-label="..." class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        {{ $types->links() }}
                    </nav>
                </div>
            </div>
        </div>
        @include('components.types.js.per-page-j-s')
        @include('components.types.js.autocomplete-j-s')
        @include('components.types.js.type-modal-j-s')
    @endsection
