@extends('user.navbar')

@section('title', 'Ajukan Barang Pinjaman')

@section('content')
<div class="borrow-create">

    <a href="{{ route('user.dashboard') }}" class="btn btn-primary" style="float: left; margin-bottom: 10px;">Back</a><br>

    <h1>Ajukan Barang Pinjaman</h1>

    <form action="{{ route('user.borrowReqs.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Nama Barang</label>
            <select name="product_id" id="product_id" class="form-control" required>
                <option value="" disabled selected>Pilih Barang</option>
                @foreach ($products as $product)
                    <option value="{{ $product->id }}">{{ $product->nama }} (Stok: {{ $product->stok }})</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="borrow_date">Tanggal Pinjam</label>
            <input type="date" name="borrow_date" id="borrow_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="return_date">Tanggal Kembali</label>
            <input type="date" name="return_date" id="return_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="reason">Alasan Pinjam</label>
            <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Ajukan Pinjaman</button><br>
        
    </form>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const today = new Date();
        const formattedDate = today.toISOString().split('T')[0];

        const borrowDateInput = document.getElementById('borrow_date');
        const returnDateInput = document.getElementById('return_date');

        // Set minimum date for borrow_date
        borrowDateInput.setAttribute('min', formattedDate);

        // Set initial minimum date for return_date
        borrowDateInput.addEventListener('change', function () {
            const borrowDate = this.value;
            if (borrowDate) {
                // Set min for return_date to be one day after borrow_date
                const borrowDateObj = new Date(borrowDate);
                borrowDateObj.setDate(borrowDateObj.getDate() + 1); // Add 1 day
                const minReturnDate = borrowDateObj.toISOString().split('T')[0];
                returnDateInput.setAttribute('min', minReturnDate);
            } else {
                returnDateInput.removeAttribute('min'); // Reset min if no borrow_date
            }
        });

        // Ensure return_date is updated on page load if borrow_date is already set
        if (borrowDateInput.value) {
            const borrowDateObj = new Date(borrowDateInput.value);
            borrowDateObj.setDate(borrowDateObj.getDate() + 1);
            returnDateInput.setAttribute('min', borrowDateObj.toISOString().split('T')[0]);
        }
    });
</script>

<style>
    .borrow-create {
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 15px;
    }
    .form-control {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }
    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection