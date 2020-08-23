@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="card">
                <div class="card-header">ItemOrcamento {{ $itemorcamento->id }}</div>
                <div class="card-body">

                    <a href="{{ url('/admin/item-orcamentos') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                    <a href="{{ url('/admin/item-orcamentos/' . $itemorcamento->id . '/edit') }}" title="Edit ItemOrcamento"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                    <form method="POST" action="{{ url('admin/itemorcamentos' . '/' . $itemorcamento->id) }}" accept-charset="UTF-8" style="display:inline">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger btn-sm" title="Delete ItemOrcamento" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                    </form>
                    <br />
                    <br />

                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>ID</th>
                                    <td>{{ $itemorcamento->id }}</td>
                                </tr>
                                <tr>
                                    <th> Nome </th>
                                    <td> {{ $itemorcamento->nome }} </td>
                                </tr>
                                <tr>
                                    <th> Conta </th>
                                    <td> {{ $itemorcamento->conta->conta }} </td>
                                </tr>
                                <tr>
                                    <th> Vencimento </th>
                                    <td> {{ \Carbon\Carbon::parse($itemorcamento->data_vencimento)->format('d/m/Y') }} </td>
                                </tr>
                                <tr>
                                    <th> Valor </th>
                                    <td> {{  'R$ '.number_format($itemorcamento->valor, 2, ',', '.') }} </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection