<form action="{{ route('naive') }}" method="post">
    <div class="form-group">
        <label>Nama Lengkap</label>
        <input type="text" name="name" class="form-control" value="{{ $data ? $data['name'] : '' }}" required>
    </div>
    <div class="form-group">
        <label>Age</label>
        <input type="text" name="age" class="form-control" value="{{ $data ? $data['age'] : '' }}" required>
    </div>
    <div class="form-group">
        <label>BS Fast</label>
        <input type="text" name="bsfast" class="form-control" value="{{ $data ? $data['bsfast'] : '' }}" required>
    </div>
    <div class="form-group">
        <label>BS pp</label>
        <input type="text" name="bspp" class="form-control" value="{{ $data ? $data['bspp'] : '' }}" required>
    </div>
    <div class="form-group">
        <label>Plasma R</label>
        <input type="text" name="plasma_r" class="form-control" value="{{ $data ? $data['plasma_r'] : '' }}" required>
    </div>
    <div class="form-group">
        <label>Plasma F</label>
        <input type="text" name="plasma_f" class="form-control" value="{{ $data ? $data['plasma_f'] : '' }}" required>
    </div>
    <div class="form-group">
        <label>HbA1c</label>
        <input type="text" name="hba1c" class="form-control" value="{{ $data ? $data['hba1c'] : '' }}" required>
    </div>
    <!-- <div class="form-group">
        <label>Type</label>
        <input type="text" class="form-control">
    </div> -->
    @csrf
    <button type="submit" class="btn btn-primary">Cek Diabetes</button>
</form>