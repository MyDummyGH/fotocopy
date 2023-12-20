@extends('template');

@section('pageTitle')
List Order
@endsection

@section('mainContent')
<div class="col-xl">
    <!-- Column Search -->
    <div class="card">
        <h5 class="card-header">List Order</h5>
        <div class="card-datatable table-responsive pt-0">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal Masuk</th>
                        <th>Nama Order</th>
                        <th>No TLP</th>
                        <th>Product</th>
                        <th>QTY</th>
                        <th>Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datas as $d)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ \Carbon\Carbon::parse($d->created_at)->locale('id_ID')->isoFormat('D MMMM Y') }}</td>
                        <td>{{ $d->name }}</td>
                        <td>{{ $d->no_tlp }}</td>
                        <td>{{ $d->product }}</td>
                        <td>{{ $d->total }}</td>
                        <td>{{ $d->harga }}</td>
                        <td>
                            <a href="{{ url('editOrder').'/'.$d->id }}"><button type="button" class="btn btn-outline-warning btn-sm"><i class="ti ti-edit-circle"></i></button></a>
                            <a href="{{ url('deleteOrder').'/'.$d->id }}"><button type="button" class="btn btn-outline-danger btn-sm"><i class="ti ti-bucket"></i></button></a>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Column Search -->
</div>


@endsection
