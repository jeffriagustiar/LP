@extends('layouts.appu')

@section('title')
    SP2D - GU
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
    <!-- Ajax data source array start-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>SP2D - GU</h5>
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewPost"> Add New </a>
                    <br><br>
                    <div class="col-sm-2">
                      <div class="mb-3">
                          <select id="cari" name="cari" class="cari js-example-basic-single col-sm-2 ">
                          </select>
                      </div>
                    </div>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display datatables" id="ajax-data-object">
                        <thead>
                          <tr>
                            <th>NoSP2D</th>
                            <th>Nama SKPD</th>
                            <th>NoSPM</th>
                            <th>Keperluan</th>
                            <th>Tanggal Buat</th>
                            <th>Setujui</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Ajax data source array end-->


<div class="modal fade" id="addData" tabindex="-1" aria-labelledby="addData" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addData">Add SP2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="postForm" name="postForm" class="form-horizontal" >

          <div class="mb-3 row">
            <label class="col-lg-12 form-label ">Penanda Tangan</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input id="ttd" name="ttd" class="form-control btn-square" placeholder="TTD" type="text" readonly>
                <input id="idttd" name="idttd" class="form-control btn-square" placeholder="TTD" type="hidden">
                <span class="input-group-text btn btn-primary btn-right" data-bs-toggle="modal" data-bs-target=".ttd" id="ttdList">append</span>
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 control-label">No.SP2D</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input type="text" class="form-control" id="nosp2d" name="nosp2d" placeholder="Enter NoSP2D" value="" >
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 control-label">Tanggal SP2D</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="tglsp2d" name="tglsp2d" placeholder="Enter Date SP2D" value=""   readonly>
              </div>
            </div>
            <label class="col-sm-2 control-label">Tanggal SPM</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="tglspm" name="tglspm" placeholder="Enter Date SP2D" value=""   readonly>
              </div>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label class="col-lg-12 form-label ">No.SPM</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input id="nospm" name="nospm" class="form-control btn-square" placeholder="placeholder" type="text"  readonly>
                <span class="input-group-text btn btn-primary btn-right" data-bs-toggle="modal" data-bs-target=".data-list" id="dataList">append</span>
              </div>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label class="col-sm-2 control-label">No.SPD</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input type="text" class="form-control" id="nospd" name="nospd" placeholder="Enter NoSPD" value=""   readonly>
              </div>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label class="col-sm-2 control-label">No.Kontrak</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="nokon" name="nokon" placeholder="Enter No Kontrak" value=""  readonly>
              </div>
            </div>
            <label class="col-sm-2 control-label">Rekanan</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="rekan" name="rekan" placeholder="Enter Rekan" value="" readonly>
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Keperluan</label>
            <div class="col-sm-12">
              <textarea id="keperluan" name="keperluan"  placeholder="Enter Description" class="form-control"  readonly></textarea>
              <input type="hidden" class="form-control" id="unitkey" name="unitkey" value="" >
              <input type="hidden" class="form-control" id="keybend" name="keybend" value="" >
              <input type="hidden" class="form-control" id="idxsko" name="idxsko" value="" >
              <input type="hidden" class="form-control" id="idxkode" name="idxkode" value="" >
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="savedata" value="create">Save Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="listData" tabindex="-1" aria-labelledby="listData" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listData">List SPM</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body2">

        <table class="datatables" id="tableListData">
          <thead>
            <tr>
              <th>NoSPM</th>
              <th>Nama SKPD</th>
              <th>Keperluan</th>
              <th>Tanggal SPM</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="listTtd" tabindex="-1" aria-labelledby="listTtd" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="listTtd">List TTD SP2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body2">

        <table class="datatables" id="tableListTtd">
          <thead>
            <tr>
              <th>NIP</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>

      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="lookData" tabindex="-1" aria-labelledby="lookData" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lookData">Detail SP2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body3">

      <input type="hidden" name="id" id="id">

      <div class="card">
        <div class="card-body">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="rinci-tab" data-bs-toggle="pill" href="#rinci" role="tab" aria-controls="rinci" aria-selected="true">Rincian<div class="media"></div></a></li>
              <li class="nav-item"><a class="nav-link" id="potongan-tab" data-bs-toggle="pill" href="#potongan" role="tab" aria-controls="potongan" aria-selected="false">Potongan</a></li>
              <li class="nav-item"><a class="nav-link" id="pajak-tab" data-bs-toggle="pill" href="#pajak" role="tab" aria-controls="pajak" aria-selected="false">Pajak</a></li>
          </ul>
          <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="rinci" role="tabpanel" aria-labelledby="rinci-tab">
              <br>
              <table class="datatables" id="tableLookData">
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

            <div class="tab-pane fade" id="potongan" role="tabpanel" aria-labelledby="potongan-tab">
              <br>
              <table class="datatables" id="tableLookDataPotongan">
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

            <div class="tab-pane fade" id="pajak" role="tabpanel" aria-labelledby="pajak-tab">
              <br>
              <table class="datatables" id="tableLookDataPajak">
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
           placeholder: 'Nama SKPD',
           minimumInputLength:3,
           ajax: {
            url: '/dashaboard/listUnit',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            text: item.NMUNIT,
                            id: item.UNITKEY
                        }
                    })
                };
            },
            cache: true
          }
        });

        var table = $('#ajax-data-object').DataTable({
          processing: true,
          serverSide: true,
          order: [[4,'asc']],
          ajax: '/dataGU/getdata',
          columns: [
            { data: 'NOSP2D', name:'SP2D.NOSP2D'}, 
            { data: 'NMUNIT', name:'a.NMUNIT'}, 
            { data: 'NOSPM', name:'SP2D.NOSPM'}, 
            { data: 'KEPERLUAN', name:'SP2D.KEPERLUAN'}, 
            { data: 'TGLSP2D', name:'SP2D.TGLSP2D'},
            { data: 'switch'},
            { data: 'action'}
          ],
          columnDefs: [
            {width:"200px", targets:[0]},
            {width:"300px", targets:[3]},
            {width:"150px", targets:[6]}
          ]
        });

        $('#cari').change(function () {
          var x = document.getElementById("cari").value;
          console.log(x);

          var aa = $('#ajax-data-object').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            order: [[4,'asc']],
            ajax: {
              url:'/dashaboard/getdata/',
              type:'GET',
              data: {'UNITKEY':x}
            },
            columns: [
              { data: 'NOSP2D', name:'SP2D.NOSP2D'}, 
              { data: 'NMUNIT', name:'a.NMUNIT'}, 
              { data: 'NOSPM', name:'SP2D.NOSPM'}, 
              { data: 'KEPERLUAN', name:'SP2D.KEPERLUAN'}, 
              { data: 'TGLSP2D', name:'SP2D.TGLSP2D'},
              { data: 'switch'},
              { data: 'action'}
            ],
            columnDefs: [
              {width:"200px", targets:[0]},
              {width:"300px", targets:[3]},
              {width:"150px", targets:[6]}
            ]
          });

        });
        
        $('#ajax-data-object tbody').on('click', '#switch', function () {
            var a = $(this).prop('checked') == true ? $(this).data('tgl') : '';
            var id = $(this).data('id');  
            
            $.ajax({
              type: "GET",
              dataType: 'json',
              url: '/dashaboard/updateValid',
              data: {'a':a, 'id':id},
              success: function(data){
                notif(data.title,data.success,data.type)
                
              }
            });
        }); 

        $('#createNewPost').click(function () {
          $('#addData').modal('show');
        });

        
        
        $('#savedata').click(function (e) {
          e.preventDefault();
          $(this).html('Processing...');
      
          $.ajax({
            data: $('#postForm').serialize(),
            url: '/dataGU/adddata',
            type: "POST",
            dataType: 'json',
            success: function (data) {
      
                $('#postForm').trigger("reset");
                $('#addData').modal('hide');

                notif(data.title,data.success,data.type)
                
                table.draw();
                table2.draw();
                aa.draw();
          
            },
            error: function (data) {
                console.log('Error:', data);
                $('#savedata').html('Save Changes');
            }
          });
        });

        $('#ttdList').click(function () {
          $('#listTtd').modal('show');
        });

        $('#tableListTtd').DataTable({
          ordering: false,
          info:     false,
          processing: true,
          serverSide: true,
          searching: false,
          ajax: '/dashaboard/ttd',
          columns: [
            { data: 'NIP', name:'JABTTD.NIP'}, 
            { data: 'NAMA', name:'b.NAMA'}, 
            { data: 'JABATAN', name:'JABTTD.JABATAN'}, 
            { data: 'select'}
          ]
        });

        $('body').on('click', '.selectDataTtd', function () {
          var select_id = $(this).data("id");
          var select_id2 = $(this).data("p2");
          console.log(select_id)
          $('#addData').find('.modal-body #idttd').val(select_id);
          $('#addData').find('.modal-body #ttd').val(select_id2);
          $('#listTtd').modal('hide');
        });


        $('#dataList').click(function () {
          $('#listData').modal('show');
        });

        var table2 = $('#tableListData').DataTable({
          processing: true,
          serverSide: true,
          ajax: '/dataGU/listSpm',
          columns: [
            { data: 'NOSPM', name:'ANTARBYR.NOSPM'}, 
            { data: 'NMUNIT', name:'b.NMUNIT'}, 
            { data: 'KEPERLUAN', name:'ANTARBYR.KEPERLUAN'}, 
            { data: 'TGLSPM', name:'ANTARBYR.TGLSPM'},
            { data: 'select'}
          ]
        });

        $('body').on('click', '.selectDataSpm', function () {
          $('#addData').find('.modal-body #nospm').val($(this).data("id"));
          $('#addData').find('.modal-body #nospd').val($(this).data("d2"));
          $('#addData').find('.modal-body #keperluan').val($(this).data("d3"));
          $('#addData').find('.modal-body #nokon').val($(this).data("d4"));
          $('#addData').find('.modal-body #rekan').val($(this).data("d5"));
          $('#addData').find('.modal-body #tglspm').val($(this).data("d6"));
          $('#addData').find('.modal-body #tglsp2d').val($(this).data("d6")); // option
          $('#addData').find('.modal-body #unitkey').val($(this).data("d7"));
          $('#addData').find('.modal-body #keybend').val($(this).data("d8"));
          $('#addData').find('.modal-body #idxsko').val($(this).data("d9"));
          $('#addData').find('.modal-body #idxkode').val($(this).data("d10"));
          $('#listData').modal('hide');
        });
        
        
        $('#ajax-data-object tbody').on('click', '.DataLook', function () {
          let id = $('.DataLook').data("id");
          $('#id').val(id);
          $('#lookData').modal('show');

          $('#tableLookData').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            pageLength: 5,
            lengthMenu: [5, 10],
            ajax: {
              url:'/dataGU/lookdata',
              type:'GET',
              data: {'id':id}
            },
            columns: [
              { data: 'NOSP2D', name:'SP2DDETR.NOSP2D'}, 
              { data: 'NMKEGUNIT', name:'b.NMKEGUNIT'}, 
              { data: 'NMPER', name:'c.NMPER'}, 
              { data: 'NILAI', name:'SP2DDETR.NILAI'},
              { data: 'nosp2dx', name:'a.nosp2dx'}
            ]
          });

          $('#tableLookDataPotongan').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            pageLength: 5,
            lengthMenu: [5, 10],
            ajax: {
              url : '/dataGU/lookdatapotongan',
              type : 'GET',
              data : {'id':id}
            },
            columns: [
              { data: 'NOSP2D', name:'SP2DDETB.NOSP2D'}, 
              { data: 'NMPER', name:'b.NMPER'}, 
              { data: 'NILAI', name:'SP2DDETB.NILAI'}, 
              { data: 'nosp2dx', name:'a.nosp2dx'} 
            ]
          });

          $('#tableLookDataPajak').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            pageLength: 5,
            lengthMenu: [5, 10],
            // ajax: '/dashaboard/lookdatapajak/'+id,
            ajax: {
              url : '/dataGU/lookdatapajak',
              type : 'GET',
              data : {'id':id}
            },
            columns: [
              { data: 'NOSP2D', name:'SP2DPJK.NOSP2D'},
              { data: 'NMPAJAK', name:'b.NMPAJAK'},
              { data: 'NILAI', name:'SP2DPJK.NILAI'},
              { data: 'nosp2dx', name:'a.nosp2dx'}
            ]
          });

        });


        $('body').on('click', '.deleteData', function () {
          var id = $(this).data("id");
          // console.log(id)
            $.ajax({
                type: "DELETE",
                url: '/dataGU/deletedata',
                data: {'id':id},
                success: function (data) {
                  notif(data.title,data.success,data.type)
                  table.draw();
                  table2.draw();
                  aa.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
      });
    </script>
@endpush