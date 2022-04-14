@extends('layouts.appu')

@section('title')
    List Data
@endsection

@push('before-style')
  <!-- Plugins css start-->
  <link rel="stylesheet" type="text/css" href="{{ url('/assets/css/datatables.css') }}">
  <!-- Plugins css Ends-->
@endpush

@section('conten')
    <!-- Ajax data source array start-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>SP2D - LS</h5>
                    {{-- <span>The example below shows DataTables loading data for a table from arrays as the data source, where the structure of the row's data source in this example is:</span> --}}
                    
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewPost"> Add New </a>

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
                            <th width="300px">Action</th>
                          </tr>
                        </thead>
                        {{-- <tfoot>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                          </tr>
                        </tfoot> --}}
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Ajax data source array end-->


<div class="modal fade" id="addData" tabindex="-1" aria-labelledby="addData" aria-hidden="true">
  <div class="modal-dialog modal-xl">
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
                <input id="ttd" name="ttd" class="form-control btn-square" placeholder="TTD" type="text" required>
                <input id="idttd" name="idttd" class="form-control btn-square" placeholder="TTD" type="hidden">
                <span class="input-group-text btn btn-primary btn-right" data-bs-toggle="modal" data-bs-target=".ttd" id="ttdList">append</span>
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 control-label">No.SP2D</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input type="text" class="form-control" id="nosp2d" name="nosp2d" placeholder="Enter NoSP2D" value=""  required>
              </div>
            </div>
          </div>

          <div class="mb-3 row">
            <label class="col-sm-2 control-label">Tanggal SP2D</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="tglsp2d" name="tglsp2d" placeholder="Enter Date SP2D" value=""  required>
              </div>
            </div>
            <label class="col-sm-2 control-label">Tanggal SPM</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="tglspm" name="tglspm" placeholder="Enter Date SP2D" value=""  required>
              </div>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label class="col-lg-12 form-label ">No.SPM</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input id="nospm" name="nospm" class="form-control btn-square" placeholder="placeholder" type="text" required>
                <span class="input-group-text btn btn-primary btn-right" data-bs-toggle="modal" data-bs-target=".data-list" id="dataList">append</span>
                {{-- <button href="javascript:void(0)" class="input-group-text btn btn-primary btn-right" data-bs-toggle="modal" data-bs-target=".data-list" id="dataList">append</button> --}}
              </div>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label class="col-sm-2 control-label">No.SPD</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input type="text" class="form-control" id="nospd" name="nospd" placeholder="Enter NoSPD" value=""  required>
              </div>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label class="col-sm-2 control-label">No.Kontrak</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="nokon" name="nokon" placeholder="Enter No Kontrak" value="" required>
              </div>
            </div>
            <label class="col-sm-2 control-label">Rekanan</label>
            <div class="col-lg-4">
              <div class="input-group">
                <input type="text" class="form-control" id="rekan" name="rekan" placeholder="Enter Rekan" value="" >
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Keperluan</label>
            <div class="col-sm-12">
              <textarea id="keperluan" name="keperluan"  placeholder="Enter Description" class="form-control"></textarea>
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
  <div class="modal-dialog modal-lg">
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lookData">Detail SP2D</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body3">

      <input type="text" name="id" id="id">

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
    </div>
  </div>
</div>

<div class="modal fade" id="lookDataPotongan" tabindex="-1" aria-labelledby="lookDataPotongan" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lookDataPotongan">Detail Potongan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body4">

      <input type="text" name="id" id="id">

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
    </div>
  </div>
</div>

<div class="modal fade" id="lookDataPajak" tabindex="-1" aria-labelledby="lookDataPajak" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="lookDataPajak">Detail Pajak</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body5">

      <input type="text" name="id" id="id">

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



@endsection

@push('after-script')
    
    <script src="{{ url('/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ url('/assets/js/datatable/datatables/datatable.custom.js') }}"></script> --}}

    <script>
      $(function () {

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });

        var table = $('#ajax-data-object').DataTable({
          processing: true,
          serverSide: true,
          order: [[4,'asc']],
          ajax: '/dashaboard/getdata',
          columns: [
            { data: 'NOSP2D', name:'SP2D.NOSP2D'}, 
            { data: 'NMUNIT', name:'a.NMUNIT'}, 
            { data: 'NOSPM', name:'SP2D.NOSPM'}, 
            { data: 'KEPERLUAN', name:'SP2D.KEPERLUAN'}, 
            { data: 'TGLSP2D', name:'SP2D.TGLSP2D'},
            { data: 'switch'},
            { data: 'action'}
          ]
        });

        $('#createNewPost').click(function () {
          // $('#savedata').val("create-post");
          // $('#id').val('');
          // $('#postForm').trigger("reset");
          // $('#modelHeading').html("Create New Post");
          $('#addData').modal('show');
        });

        
        
        $('#savedata').click(function (e) {
          // console.log('tes')
          e.preventDefault();
          $(this).html('Save');
      
          $.ajax({
            data: $('#postForm').serialize(),
            url: '/dashaboard/adddata',
            type: "POST",
            dataType: 'json',
            success: function (data) {
      
                $('#postForm').trigger("reset");
                $('#addData').modal('hide');

                $.notify({
                    title: data.title,
                    message: data.success
                },
                {
                    type:'primary',
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
                
                table.draw();
          
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
          // paging:   false,
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
          // $('#addData').find('.modal-body #tes123').append(select_id);
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
          ajax: '/dashaboard/listSpm',
          columns: [
            { data: 'NOSPM', name:'ANTARBYR.NOSPM'}, 
            { data: 'NMUNIT', name:'b.NMUNIT'}, 
            { data: 'KEPERLUAN', name:'ANTARBYR.KEPERLUAN'}, 
            { data: 'TGLSPM', name:'ANTARBYR.TGLSPM'},
            { data: 'select'}
          ]
        });

        $('body').on('click', '.selectDataSpm', function () {
          var data = $(this).data("id");
          var data2 = $(this).data("d2");
          var data3 = $(this).data("d3");
          var data4 = $(this).data("d4");
          var data5 = $(this).data("d5");
          var data6 = $(this).data("d6");
          var data7 = $(this).data("d7");
          var data8 = $(this).data("d8");
          var data9 = $(this).data("d9");
          var data10 = $(this).data("d10");
          console.log(data)
          // $('#addData').find('.modal-body #tes123').append(data);
          $('#addData').find('.modal-body #nospm').val(data);
          $('#addData').find('.modal-body #nospd').val(data2);
          $('#addData').find('.modal-body #keperluan').val(data3);
          $('#addData').find('.modal-body #nokon').val(data4);
          $('#addData').find('.modal-body #rekan').val(data5);
          $('#addData').find('.modal-body #tglspm').val(data6);
          $('#addData').find('.modal-body #tglsp2d').val(data6); // option
          $('#addData').find('.modal-body #unitkey').val(data7);
          $('#addData').find('.modal-body #keybend').val(data8);
          $('#addData').find('.modal-body #idxsko').val(data9);
          $('#addData').find('.modal-body #idxkode').val(data10);
          $('#listData').modal('hide');
        });
        
        
        $('body').on('click', '.DataLook', function () {
          let id = $(this).data("id");
          // var select_id2 = $(this).data("p2");
          $('#lookData').find('.modal-body3 #id').val(id);
          // console.log(id)
          $('#lookData').modal('show');

          // console.log(id);

          var table3 = $('#tableLookData').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: '/dashaboard/lookdata/'+id,
            columns: [
              { data: 'NOSP2D', name:'SP2DDETR.NOSP2D'}, 
              { data: 'NMKEGUNIT', name:'b.NMKEGUNIT'}, 
              { data: 'NMPER', name:'c.NMPER'}, 
              { data: 'NILAI', name:'SP2DDETR.NILAI'},
              { data: 'nosp2dx', name:'a.nosp2dx'}
            ]
          });

        });

        $('body').on('click', '.DataLookPotongan', function () {
          let id = $(this).data("id");
          $('#lookDataPotongan').find('.modal-body4 #id').val(id);
          $('#lookDataPotongan').modal('show');

          var table4 = $('#tableLookDataPotongan').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: '/dashaboard/lookdatapotongan/'+id,
            columns: [
              { data: 'NOSP2D', name:'SP2DDETB.NOSP2D'}, 
              { data: 'NMPER', name:'b.NMPER'}, 
              { data: 'NILAI', name:'SP2DDETB.NILAI'}, 
              { data: 'nosp2dx', name:'a.nosp2dx'} 
            ]
          });

        });

        $('body').on('click', '.DataLookPajak', function () {
          let id = $(this).data("id");
          $('#lookDataPajak').find('.modal-body4 #id').val(id);
          $('#lookDataPajak').modal('show');

          var table5 = $('#tableLookDataPajak').DataTable({
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: '/dashaboard/lookdatapajak/'+id,
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
          var d1 = $(this).data("d1");
          // console.log(d1)
          // confirm("Are You sure want to delete !");
          if (d1 != ''){
            $.notify({
              title: 'Info',
              message: 'Data tidak bisa dihapus karena validasi masih ada'
            },{
              type:'warning',
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
          }else{
          // console.log(id)
            $.ajax({
                type: "DELETE",
                url: '/dashaboard/deletedata/'+id,
                success: function (data) {
                    $.notify({
                        title: data.title,
                        message: data.success
                    },
                    {
                        type:'primary',
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
                    table.draw();
                    table2.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
          }
        });
      });
    </script>
@endpush