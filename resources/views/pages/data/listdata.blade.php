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
                    <h5>Ajax data source (Objects)</h5><span>The example below shows DataTables loading data for a table from arrays as the data source, where the structure of the row's data source in this example is:</span>
                    
                    <a class="btn btn-primary" href="javascript:void(0)" id="createNewPost"> Add New Post</a>

                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="display datatables" id="ajax-data-object">
                        <thead>
                          <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Action</th>
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
        <h5 class="modal-title" id="addData">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="postForm" name="postForm" class="form-horizontal col-sm-4" >
          
          <input type="hidden" name="id" id="id">
          
          <div class="mb-3 row">
            <label for="title" class="col-sm-2 control-label">Title</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Enter Name" value="" >
              </div>
            </div>
          </div>
          
          <div class="mb-3 row">
            <label class="col-lg-12 form-label " for="appendedtext">Appended Text</label>
            <div class="col-lg-12">
              <div class="input-group">
                <input id="appendedtext" name="appendedtext" class="form-control btn-square" placeholder="placeholder" type="text">
                {{-- <span class="input-group-text btn btn-primary btn-right">append</span> --}}
                <a href="javascript:void(0)" class="input-group-text btn btn-primary btn-right" type="button" data-bs-toggle="modal" data-bs-target=".data-list" id="dataList">append</a>
              </div>
            </div>
          </div>
          
          {{-- <div class="form-group">
            <label class="col-sm-2 control-label">Description</label>
            <div class="col-sm-12">
              <textarea id="description" name="description"  placeholder="Enter Description" class="form-control"></textarea>
            </div>
          </div> --}}
          
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
        <h5 class="modal-title" id="listData">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <table class="datatables" id="tableListData">
          <thead>
            <tr>
              <th>Name</th>
              <th>Position</th>
              <th>Office</th>
              <th>Age</th>
              <th>Action</th>
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
          ajax: '/dashaboard/getdata',
          columns: [
            { data: 'id' }, 
            { data: 'nilai' }, 
            { data: 'created_at' }, 
            { data: 'updated_at' },
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
          $(this).html('Sending..');
      
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

        $('#dataList').click(function () {
          $('#listData').modal('show');
        });

        var table2 = $('#tableListData').DataTable({
          processing: true,
          serverSide: true,
          ajax: '/dashaboard/getdata',
          columns: [
            { data: 'id' }, 
            { data: 'nilai' }, 
            { data: 'created_at' }, 
            { data: 'updated_at' },
            { data: 'select'}
          ]
        });

        // $('body').on('click', '.selectData', function () {
        //   var select_id = $(this).data("id");
        //   console.log(select_id)
        //   var aa = document.getElementById("nilai1");
        //   // $('#tes').append(select_id);
        //   aa.value = select_id;
        //   $('#listData').modal('hide');
        // });

        $('body').on('click', '.deleteData', function () {
          var Customer_id = $(this).data("id");
          // confirm("Are You sure want to delete !");
          $.ajax({
              type: "DELETE",
              url: '/dashaboard/deletedata/'+Customer_id,
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
              },
              error: function (data) {
                  console.log('Error:', data);
              }
          });
        });
      });
    </script>
@endpush