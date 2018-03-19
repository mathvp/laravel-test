@extends('adminlte::page')

@section('title', 'Employees')
<style>
  .actions form{
    display:inline;
  }
</style>
@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    
    <!-- /.box-header -->
    <div class="box-body">

      @if(session('message'))
        <div class="callout callout-success">
            <h4>{{ session('message') }}</h4>
        </div>
      @endif

      @if(count($employees) > 0)
        <table id="example2" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Employee First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Company</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
          @foreach($employees as $employee)
            <tr>
              <td>{{$employee->id}}</td>
              <td>{{$employee->employees_first_name}}</td>
              <td>{{$employee->employees_last_name}}</td>
              <td>{{$employee->employees_email}}</td>
              <td>{{$employee->employees_phone}}</td>
              <td>{{$employee->getCompany()}}</td>
              <td class="actions">
                <a href="{{ route('admin.employees.edit-employee', $employee->id) }}" class="text-green" alt="Edit" title="Edit">
                  <i class="fa fa-fw fa-edit"></i>
                </a> | 
                {{ Form::open(['method' => 'DELETE', 'route' => ['admin.employees.remove-employee', $employee->id],'onsubmit' => 'return confirm("Are you sure?")', 'id'=>$employee->id]) }}
                  <a href="#" class="text-red" alt="Delete" title="Delete" onclick="$(this).closest('form').submit();">
                    <i class="fa fa-fw fa-trash"></i>
                  </a>
                {{ Form::close() }}
              </td>
            </tr>
          @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>#</th>
              <th>Employee First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>Phone</th>
              <th>Company</th>
              <th>Actions</th>
            </tr>
          </tfoot>
        </table>
        @else
          <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-info"></i> Nothing Found!</h4>
              Click <a href="{{ route('admin.employees.create-employee') }}">here</a> to add a new Employee
          </div>
        @endif
    </div>
    <!-- /.box-body -->
@stop

@section('page-script')
    <script>
        (function( $ ) {

          $(function() {

            $('[data-toggle="tooltip"]').tooltip({
                animated: 'fade',
                placement: 'auto',
                html: true
            }); 

            $('#example2').DataTable( {
                "order": [[ 2, "desc" ]],
                language: {
                  url: '//cdn.datatables.net/plug-ins/1.10.16/i18n/Portuguese-Brasil.json'
                }
            })

          });

        })(jQuery);
    </script>
@stop