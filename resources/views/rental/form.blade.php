@php $isEdit = isset($rental); @endphp
<!DOCTYPE html>
<html>
<head>
    <title>{{ $isEdit ? 'Edit' : 'Input' }} Data Armada</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="form-container">
        <h2>{{ $isEdit ? 'Edit Data Armada' : 'Silahkan Pilih Armada Yang Ingin Anda Sewa' }}</h2>

        @if ($errors->any())
            <div class="alert-error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ $isEdit ? route('rental.update', $rental) : route('rental.store') }}">
            @csrf
            @if ($isEdit) @method('PUT') @endif

            <div class="form-group">
                <label>Plat Nomor:</label>
                <input type="text" name="plat_nomor"
                       value="{{ old('plat_nomor', $rental->plat_nomor ?? '') }}"
                       @if ($isEdit) readonly style="background-color:#e9ecef;" @else required @endif>
            </div>

            <div class="form-group">
                <label>Merk:</label>
                <input type="text" name="merk" value="{{ old('merk', $rental->merk ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Tahun:</label>
                <input type="number" name="tahun" value="{{ old('tahun', $rental->tahun ?? '') }}" required>
            </div>

            <div class="form-group">
                <label>Transmisi:</label>
                <select name="transmisi">
                    @foreach (['Manual', 'Matic'] as $t)
                        <option value="{{ $t }}" {{ old('transmisi', $rental->transmisi ?? '') == $t ? 'selected' : '' }}>{{ $t }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">{{ $isEdit ? 'Simpan Perubahan' : 'Simpan' }}</button>
        </form>

        <a href="{{ route('rental.index') }}" class="btn btn-secondary">{{ $isEdit ? 'Batal' : 'Lihat Data Armada' }}</a>
    </div>
</body>
</html>