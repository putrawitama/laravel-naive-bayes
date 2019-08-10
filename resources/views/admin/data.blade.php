@extends('admin.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Data List</h1>


    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Data Latih</h6>
                </a>
                <div class="collapse show" id="collapseCardExample">
                    <div class="card-body">
                        @error('csv')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                        <form action="{{ route('postData') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Pilih File CSV</label>
                                <input type="file" name="csv" class="form-control-file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                            </div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Age</th>
                                    <th>BS Fast</th>
                                    <th>BS pp</th>
                                    <th>Plasma R</th>
                                    <th>Plasma F</th>
                                    <th>HbA1c</th>
                                    <th>Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($diabetes as $diabete)
                                    <tr>
                                        <td>{{ $diabete->age }}</td>
                                        <td>{{ $diabete->bsfast }}</td>
                                        <td>{{ $diabete->bspp }}</td>
                                        <td>{{ $diabete->plasma_r }}</td>
                                        <td>{{ $diabete->plasma_f }}</td>
                                        <td>{{ $diabete->hba1c }}</td>
                                        <td>{{ $diabete->type }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
        </div>
    </div>
@endsection