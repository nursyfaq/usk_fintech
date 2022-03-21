@extends("layouts.app")

@section('content')
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Total</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $transaksi)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $transaksi->user->name }}</td>
                        <td>{{ $transaksi->jumlah}}</td>
                        <td>
                            <div style="float: left;"></div>
                            <input class="btn btn-danger" type="submit" value="Decline">
                            <input class="btn btn-primary" type="submit" value="Accept">
                            <div style="clear:both"></div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
