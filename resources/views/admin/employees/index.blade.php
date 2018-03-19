@extends('adminlte::page')

@section('title', 'Employees')

@section('content_header')
    <h1>Employees</h1>
@stop

@section('content')
    @if(session('message'))
        <div class="callout callout-success">
            <h4>{{ session('message') }}</h4>
        </div>
    @endif
    <!-- /.box-header -->
    <div class="box-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Employee First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
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
            <td><a href="#" class="text-green" alt="Edit" title="Edit"><i class="fa fa-fw fa-edit"></i></a> | <a href="#" class="text-red" alt="Delete" title="Delete"><i class="fa fa-fw fa-trash"></i></a></td>
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
          </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
@stop