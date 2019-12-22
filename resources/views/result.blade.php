<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Naive Bayes - Diabetes</title>

    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/sb-admin-2.min.css') }}">
    
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @yield('head')
</head>
<body id="page-top">

  <div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <!-- Begin Page Content -->

        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                <h1 class="h3 mb-0 text-gray-800">Diagnosa Diabetes Militus</h1>
                <a href="{{ route('data') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"> Admin Page</a>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            @component('component.formTest', ['data' => $data])@endcomponent
                        </div>
                    </div>
                </div>

                @if($hasil)
                    <div class="col">
                        <div class="card shadow mb-4">
                            <div class="card-body">
                                @component('component.resultTest', ['hasil' => $hasil])@endcomponent
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @if($hasil)
            <div class="row">
                <div class="col">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                          <div class="form-group">
                            <label>P(Ci)</label>
                            <textarea class="form-control" rows="3">
P(Type = “Normal”)  = {{ $type['normal'] }}/{{ $totalType }} = {{ $probabilitasType['normal'] }}
P(Type = “Type1”)  = {{ $type['type1'] }}/{{ $totalType }} = {{ $probabilitasType['type1'] }}
P(Type = “Type3”) = {{ $type['type2'] }}/{{ $totalType }}= {{ $probabilitasType['type2'] }}
                            </textarea>
                          </div>

                          <div class="form-group">
                            <label>P(X|Ci)</label>
                            <textarea class="form-control" rows="3">
                            
@foreach($datas as $key => $value)
  @if($key == 'name')
    @continue
  @endif
  @foreach($type as $var => $val)
P({{$key}} = {{$value}} | Type = {{$var}}) = {{ $dataset[$key][$value][$var] }} / {{ $val + 3 }} = {{ $probabilitas[$key][$value][$var] }}
  @endforeach
   
@endforeach
                            </textarea>
                          </div>
                          
                          <div class="form-group">
                            <label>P(X|Type)</label>
                            <textarea class="form-control" rows="3">
                            
@foreach($type as $var => $val)
P(X|TYPE = {{ $var }}) = P(age = {{ $datas['age'] }},  bsfast =  {{ $datas['bsfast'] }}, bspp = {{ $datas['bspp'] }}, plasma_r = {{ $datas['plasma_r'] }}, plasma_f = {{ $datas['plasma_f'] }}, hba1c = {{ $datas['hba1c'] }} | TYPE = {{ $var }})
= {{ $probabilitas['age'][$datas['age']][$var] }} X {{ $probabilitas['bsfast'][$datas['bsfast']][$var] }} X {{ $probabilitas['bspp'][$datas['bspp']][$var] }} X {{ $probabilitas['plasma_r'][$datas['plasma_r']][$var] }} X {{ $probabilitas['plasma_f'][$datas['plasma_f']][$var] }} X {{ $probabilitas['hba1c'][$datas['hba1c']][$var] }}
= {{ $hasilBefore[$var] }}

@endforeach
                            </textarea>
                          </div>

                          <div class="form-group">
                            <label>P(X|Type) X P(TYPE)</label>
                            <textarea class="form-control" rows="3">
@foreach($type as $var => $val)
P(X|Type = {{ $var }}) X P(Type = {{ $var }}) = {{ $hasilBefore[$var] }} X {{ $probabilitasType[$var] }} = {{ $hasilMentah[$var] }}
@endforeach
                            </textarea>
                          </div>

                          <div class="form-group">
                            <label>Hasil</label>
                            <textarea class="form-control" rows="3">
P(X|Type = “Normal”)  = {{ $hasilMentah['normal'] }}
P(X|Type = “Type1”)  = {{ $hasilMentah['type1'] }}
P(X|Type = “Type2”)  = {{ $hasilMentah['type2'] }}
                            </textarea>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; 2019 | Firly Firdyansyah</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script type="text/javascript" src="{{ asset('js/sb-admin-2.min.js') }}"></script>

  <script src="{{ asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('js/datatables-main.js') }}"></script>

</body>

<body>

    
</body>

</html>