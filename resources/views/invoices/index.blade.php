@extends('layouts.panel')
@section('title', 'Table')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0">Facturas</h3>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col"><i class="fas fa-hashtag"></i> ID</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Cliente</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> No. Mesa</th>
                                <th scope="col"><i class="fas fa-signature"></i> Tipo Mesa</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Tipo Asignación</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Detalles</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Total</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Empleado</th>
                                <th scope="col"><i class="fas fa-toggle-on"></i> Fecha Registro</th>
                                <th scope="col"><i class="fas fa-cogs"></i> Acciones</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($invoices as $invoice)
                                <tr>
                                    <td>
                                        <span class="badge badge-pill badge-primary"> {{ $invoice->id }}</span>
                                    </td>
                                    <td>
                                        {{ $invoice->client->user->name }}
                                    </td>

                                    <td>
                                        {{ $invoice->assignment->table->table_number }}
                                    </td>

                                    <td>
                                        {{ $invoice->assignment->table->type->name }}
                                    </td>

                                    <td>
                                        {{ $invoice->assignment->assignment_type }}
                                    </td>

                                    <td>
                                        {{ $invoice->details }}
                                    </td>

                                    <td>
                                        {{ $invoice->total_ammount }}
                                    </td>

                                    <td>
                                        {{ $invoice->user->name }}
                                    </td>

                                    <td>
                                        {{ $invoice->created_at }}
                                    </td>

                                    <td style="white-space: nowrap; display: flex; align-items: center;">
                                        <a href="{{ route('invoices.download', $invoice->id) }}"
                                            class="btn btn-primary btn-sm" style="margin-right: 5px;">
                                            <i class="fas fa-print"></i> Imprimir
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="..." class="d-flex flex-wrap justify-content-center justify-content-lg-start">
                        {{ $invoices->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
