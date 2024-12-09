<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Donasi</title>
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Form Donasi</h2>
        <form action="{{ route('donasi.submit') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="jumlahDonasi" class="form-label">Jumlah Donasi</label>
                <input type="number" class="form-control" id="jumlahDonasi" name="jumlahDonasi" required>
            </div>
            <div class="mb-3">
                <label for="bank" class="form-label">Pilih Bank</label>
                <select class="form-select" id="bank" name="bank" required>
                    <option value="BCA">BCA</option>
                    <option value="Mandiri">Mandiri</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kirim Donasi</button>
        </form>
    </div>
</body>
</html>
