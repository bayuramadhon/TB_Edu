@extends('layouts.mainlayout')

@section('title','Dashboard')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@csrf
<div class="mb-3">
    <label for="order" class="form-label">Order Buku</label>
    <select name="order[]" id="order" class="form-control select-multiple" multiple>
        @foreach($orderbooks as $item)
            <option value="{{ $item->id }}" data-title="{{ $item->title }}" data-price="{{ $item->price }}">
                {{ $item->title }}</option>
        @endforeach
    </select>
</div>
<div class="mt-3">
    <button class="btn btn-success" id="save-btn" type="button">Save</button>
</div>

<div class="my-5">
    <table class="table" id="order-table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Title Book</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="order-table-body">
            <!-- Data akan masuk di sini -->
        </tbody>
    </table>
</div>

<h4 class="text-end">Grand Total: <span id="grand-total">Rp 0</span></h4>

<div class="mt-3">
    <label for="payment" class="form-label">Pembayaran</label>
    <input type="number" id="payment" class="form-control" placeholder="Masukkan jumlah pembayaran">
</div>

<div class="mt-3 text-end">
    <h4>Kembalian: <span id="change">Rp 0</span></h4>
</div>

<div class="mt-4 text-end">
    <button class="btn btn-primary" id="pay-btn" type="button">Bayar</button>
</div>

<!-- Modal Konfirmasi -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Konfirmasi Pembayaran</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin untuk memproses pembayaran ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" id="confirm-pay">Ya, Proses</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
                $('.select-multiple').select2();

                let grandTotal = 0;

                function formatRupiah(amount) {
                    return 'Rp ' + amount.toLocaleString('id-ID');
                }

                $('#save-btn').click(function () {
                    let selectedBooks = $('#order').val();
                    let tableBody = $('#order-table-body');
                    tableBody.empty();
                    grandTotal = 0;

                    if (selectedBooks.length === 0) {
                        alert("Silakan pilih minimal satu buku!");
                        return;
                    }

                    selectedBooks.forEach((bookId, index) => {
                        let option = $('#order option[value="' + bookId + '"]');
                        let title = option.data('title');
                        let price = parseFloat(option.data('price'));
                        let quantity = 1;
                        let total = price * quantity;
                        grandTotal += total;

                        let newRow = `
                    <tr>
                        <td>${index + 1}</td>
                        <td>${title}</td>
                        <td class="price">${formatRupiah(price)}</td>
                        <td><input type="number" class="form-control qty" value="1" min="1" data-price="${price}"></td>
                        <td class="total-price">${formatRupiah(total)}</td>
                        <td><button class="btn btn-danger btn-sm delete-btn">Delete</button></td>
                    </tr>
                `;
                        tableBody.append(newRow);
                    });

                    $('#grand-total').text(formatRupiah(grandTotal));
                });

                $(document).on('input', '.qty', function () {
                    let quantity = parseInt($(this).val());
                    let price = parseFloat($(this).data('price'));
                    let total = quantity * price;

                    $(this).closest('tr').find('.total-price').text(formatRupiah(total));

                    grandTotal = 0;
                    $('.total-price').each(function () {
                        grandTotal += parseFloat($(this).text().replace(/[^0-9,-]+/g, ''));
                    });

                    $('#grand-total').text(formatRupiah(grandTotal));
                });

                $(document).on('click', '.delete-btn', function () {
                    $(this).closest('tr').remove();

                    grandTotal = 0;
                    $('.total-price').each(function () {
                        grandTotal += parseFloat($(this).text().replace(/[^0-9,-]+/g, ''));
                    });

                    $('#grand-total').text(formatRupiah(grandTotal));
                });

                $('#payment').on('input', function () {
                    let payment = parseFloat($(this).val()) || 0;
                    let change = payment - grandTotal;
                    $('#change').text(formatRupiah(change >= 0 ? change : 0));
                });

                $('#pay-btn').click(function () {
                    $('#confirmModal').modal('show');
                });

                $('#confirm-pay').click(function () {
                    let orders = [];
                    $('#order-table-body tr').each(function () {
                        let title = $(this).find('td:eq(1)').text();
                        let price = $(this).find('.price').text();
                        let quantity = $(this).find('.qty').val();
                        let total = $(this).find('.total-price').text();

                        orders.push({
                            title: title,
                            price: price,
                            quantity: quantity,
                            total: total
                        });
                    });

                    let payment = $('#payment').val();
                    let change = $('#change').text();
                    let grandTotal = $('#grand-total').text();

                    let transactionData = {
                        orders: orders,
                        payment: payment,
                        change: change,
                        grandTotal: grandTotal
                    };

                    // Simpan ke sessionStorage
                    sessionStorage.setItem('transactionData', JSON.stringify(transactionData));

                    // Redirect ke halaman receipt
                    window.location.href = '/receipt';
                });
                });

</script>
@endsection
