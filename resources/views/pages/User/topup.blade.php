@extends("layouts.app")

<?php
$page = 'Top Up';
?>

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('transaksi.store') }}">
            @csrf
            <div class="mb-3">
                <label for="topup" class="form-label">Top Up</label>
                <input type="number" class="form-control" id="topup" name="balance">
                <input type="hidden" name="type" value="1">
                <div id="topup" class="form-text">Top up, here</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
