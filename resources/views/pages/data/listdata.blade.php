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
                    
                    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".data-add">Large modal</button>
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
                            <th>tes</th>
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

              {{-- <div class="modal fade data-add" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Data</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            
                            <form class="form-horizontal" name="data-add"> --}}
                              {{-- <fieldset> --}}


                              <!-- Text input-->
                              {{-- <div class="mb-3 row">
                                <label class="col-lg-12 form-label " for="textinput">Text Input</label>  
                                <div class="col-lg-12">
                                <input id="nilai" name="nilai" type="text" placeholder="Nilai" class="form-control btn-square input-md">
                                </div>
                              </div> --}}

                              <!-- Appended Input-->
                              {{-- <div class="mb-3 row">
                                <label class="col-lg-12 form-label " for="appendedtext">Appended Text</label>
                                <div class="col-lg-12">
                                  <div class="input-group">
                                    <input id="appendedtext" name="appendedtext" class="form-control btn-square" placeholder="placeholder" type="text"> --}}
                                    {{-- <span class="input-group-text btn btn-primary btn-right">append</span> --}}
                                    {{-- <button class="input-group-text btn btn-primary btn-right" type="button" data-bs-toggle="modal" data-bs-target=".data-list">append</button>
                                  </div>
                                </div>
                              </div> --}}

                              <!-- Button (Double) -->
                              {{-- <div class="mb-3 row mb-0"> --}}
                                {{-- <label class="col-lg-12 form-label " for="button1id">Double Button</label> --}}
                                {{-- <div class="col-md-9">
                                  <button type="submit" id="btn-save" name="btn-save" class="btn btn-success">Save</button>
                                  <button id="button2id" name="button2id" class="btn btn-warning" type="reset">Reset Button</button>
                                </div>
                              </div> --}}

                              {{-- </fieldset> --}}
                            {{-- </form>


                          </div>
                        </div>
                      </div>
                </div> --}}


                <div class="modal data-add" id="ajaxModel" aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="modelHeading"></h4>
                          </div>
                          <div class="modal-body">
                              <form id="CustomerForm" name="CustomerForm" class="form-horizontal">
                                 <input type="hidden" name="Customer_id" id="Customer_id">
                                  <div class="form-group">
                                      <label for="name" class="col-sm-2 control-label">Name</label>
                                      <div class="col-sm-12">
                                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="" maxlength="50" >
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-2 control-label">Details</label>
                                      <div class="col-sm-12">
                                          <textarea id="detail" name="detail"  placeholder="Enter Details" class="form-control"></textarea>
                                      </div>
                                  </div>
                                  <div class="col-sm-offset-2 col-sm-10">
                                   <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                                   </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>


              <div class="modal fade data-list" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Add Data</h4>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            
                            //


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
            { data: 'action'},
            { data: 'tes'}
          ]
        });

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

        $('#btn-save').click(function (e) {
          console.log('tes')
          // e.preventDefault();
          // $(this).html('Sending..');
          // $.ajax({
          //   data: $('#data-add').serialize(),
          //   url: '/dashaboard/adddata',
          //   type: 'POST',
          //   dataType: 'json',
          //   success: function (data) {
          //       // $('#data-add').trigger("reset");
          //       // $('#ajaxModel').modal('hide');
          //       console.log(data);
          //       // table.draw();
          //   },
          //   error: function (data) {
          //       console.log('Error:', data);
          //       // $('#btn-save').html('Save Changes');
          //   }
          // });
        });

    });
      });
    </script>
@endpush