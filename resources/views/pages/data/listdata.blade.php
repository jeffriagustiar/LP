@extends('layouts.appu')

@section('title')
    List Data
@endsection

@section('conten')
    <!-- Ajax data source array start-->
              <div class="col-sm-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Ajax data source (Objects)</h5><span>The example below shows DataTables loading data for a table from arrays as the data source, where the structure of the row's data source in this example is:</span>
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
                            <th>Start date</th>
                            <th>Salary</th>
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
@endsection

@push('after-script')
    <script src="{{ url('/assets/js/datatable/datatables/jquery.dataTables.min.js') }}"></script>
    {{-- <script src="{{ url('/assets/js/datatable/datatables/datatable.custom.js') }}"></script> --}}

    <script>
        $('#ajax-data-object').DataTable({
            "ajax": "../assets/ajax/object.txt",
            "columns": [{
                "data": "name"
            }, {
                "data": "position"
            }, {
                "data": "office"
            }, {
                "data": "extn"
            }, {
                "data": "start_date"
            }, {
                "data": "salary"
            }]
        });
    </script>
@endpush