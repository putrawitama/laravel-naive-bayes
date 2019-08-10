@php
    $max = array_keys($hasil, max($hasil));
    $wording = '';
    
    switch ($max[0]) {
        case 'normal':
            $wording = 'Normal';
            break;
        case 'type1':
            $wording = 'Type 1';
            break;
        case 'type2':
            $wording = 'Type 2';
            break;
        
        default:
            $wording = 'tidak tedeteksi';
            break;
    }
@endphp 
<h3 class="mt-4">Hasil Diagnosa Diabetes Militus</h3>
<hr>
<br>
<div class="card border-left-success shadow h-100 py-2 mb-4">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Probabilitas Normal</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($hasil['normal'], 4, ',', '')}} %</div>
            </div>
        </div>
    </div>
</div>
<div class="card border-left-danger shadow h-100 py-2 mb-4">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Probabilitas Type 1</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($hasil['type1'], 4, ',', '')}} %</div>
            </div>
        </div>
    </div>
</div>
<div class="card border-left-danger shadow h-100 py-2 mb-4">
    <div class="card-body">
        <div class="row no-gutters align-items-center">
            <div class="col">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Probabilitas Type 2</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800">{{number_format($hasil['type2'], 4, ',', '')}} %</div>
            </div>
        </div>
    </div>
</div>

<hr>



<h4>Diabetes anda {{ $wording }}</h4>