@extends('admin.main')
@section('content')
    <h1 class="h3 mb-4 text-gray-800">Uji Coba</h1>

    <div class="row">
        <div class="col-6">
            <div class="card shadow mb-4">
                <div class="card-body">
                @component('component.formTest')@endcomponent
                </div>
              </div>
        </div>
    </div>
@endsection