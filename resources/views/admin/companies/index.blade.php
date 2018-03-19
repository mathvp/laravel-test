@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop

@section('content')
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Site</th>
          </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
          <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->company_name}}</td>
            <td>{{$company->company_email}}</td>
            <td>{{$company->company_logo}}</td>
            <td>{{$company->company_website}}</td>
            <td><a href="#" class="text-green" alt="Edit" title="Edit"><i class="fa fa-fw fa-edit"></i></a> | <a href="#" class="text-red" alt="Delete" title="Delete"><i class="fa fa-fw fa-trash"></i></a></td>
          </tr>
        @endforeach
        </tbody>
        <tfoot>
          <tr>
              <th>#</th>
              <th>Company Name</th>
              <th>Email</th>
              <th>Logo</th>
              <th>Site</th>
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
@stop
@section('loadtables_js')
    <script>
        $(function () {
            //'vendor/adminlte/dist/js/loadtables.js'
            $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
            })
        });
    </script>
@stop