@extends('layouts.appu')

@section('title')
    Validasi BUD
@endsection

@push('before-style')
  <!-- Plugins datatables start-->
  <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/datatables.css') }}">
  <!-- Plugins datatables Ends-->
  <!-- Plugins select2 start-->
  <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/select2.css') }}">
   <link href="{{ url('/assets/css/bootstrap-toggle.min.css') }}" rel="stylesheet">
  <!-- Plugins select2 Ends-->
@endpush

@section('conten')

<div class="col-sm-12">
  <div class="card">
    <div class="card-header">
      <h5>Validasi BUD</h5>
      <br>
      <div class="col-sm-3">
        <div class="mb-3">
            <select id="cari" name="cari" class="cari js-example-basic-single col-sm-2 ">
            </select>
        </div>
      </div>

    </div>

    <div class="card">
      <div class="card-body">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
          <li class="nav-item"><a class="nav-link active" id="bvalidasi-tab" data-bs-toggle="pill" href="#bvalidasi" role="tab" aria-controls="bvalidasi" aria-selected="true">Belum Divalidasi<div class="media"></div></a></li>
            <li class="nav-item"><a class="nav-link" id="svalidasi-tab" data-bs-toggle="pill" href="#svalidasi" role="tab" aria-controls="svalidasi" aria-selected="false">Sudah Divalidasi</a></li>
        </ul>
        <div class="tab-content" id="pills-tabContent">

          <div class="tab-pane fade show active" id="bvalidasi" role="tabpanel" aria-labelledby="bvalidasi-tab">
            <br>
            <table class="datatables" id="tableBValidasi">
              <thead>
                <tr>
                  <th>NoSP2D</th>
                  <th>Nama Kegiatan</th>
                  <th>Nama Rekening</th>
                  <th>Nilai</th>
                  <th>NoSP2Dx</th>
                </tr>
              </thead>
            </table>
          </div>

          <div class="tab-pane fade" id="svalidasi" role="tabpanel" aria-labelledby="svalidasi-tab">
            <br>
            <table class="datatables" id="tableSValidasi">
              <thead>
                <tr>
                  <th>NoSP2D</th>
                  <th>Nama Rekening</th>
                  <th>Nilai</th>
                  <th>NoSP2Dx</th>
                </tr>
              </thead>
            </table>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>

@endsection

@push('after-script')
    
    <script src="{{ url('/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    <!-- Plugins JS Select2 start-->
    <script src="{{ url('/assets/js/select2/select2.full.min.js') }}"></script>
    <!-- Plugins JS Select2 Ends-->
    <script src="{{ url('/assets/js/toggle/bootstrap-toggle.min.js') }}"></script>

    <script>

      function notif(name,msg,type){
        $.notify({
          title: name,
          message: msg,
        },{
          type: type,
          allow_dismiss:true,
          newest_on_top:true ,
          mouse_over:false,
          showProgressbar:false,
          spacing:25,
          timer:2000,
          placement:{
            from:'top',
            align:'right'
          },
          offset:{
            x:30,
            y:30
          },
          delay:1000 ,
          z_index:10000,
        });
      }

      $(function () {

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        $('.cari').select2({
           placeholder: 'Nama Validasi',
           minimumInputLength:3,
        });

        $('#tableBValidasi').DataTable({
          processing: true,
          // serverSide: true,
        });

        $('#tableSValidasi').DataTable({
          processing: true,
          // serverSide: true,
        });

      });
    </script>
@endpush