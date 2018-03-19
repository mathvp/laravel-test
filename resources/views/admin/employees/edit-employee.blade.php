@extends('adminlte::page')

@section('title', 'Edit Employee')

@section('content_header')
    <h1>Edit Employee</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $employee->employees_first_name }}</h3>
        </div>
        <!-- /.box-header -->
        @if(session('success'))
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Employ Updated!</h4>
          </div>
      @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                {{ session('error') }}    
            </div>
        @endif
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{ Html::ul($errors->all()) }}    
        </div>
        @endif
        <!-- form start -->
        {{ Form::open(['method' => 'PUT', 'route' => ['admin.employees.edit-employee', $employee->id]]) }}
            
            <div class="box-body">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" value="{{ $employee->employees_first_name }}" class="form-control" id="first-name" name="first-name" placeholder="{{ $employee->employees_first_name }}">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" value="{{ $employee->employees_last_name }}" class="form-control" id="last-name" name="last-name" placeholder="{{ $employee->employees_last_name }}">
                </div>
                <div class="form-group">
                  <label for="company">Company</label>
                  <select name="company" id="company" class="form-control">
                    @foreach($companies as $company )
                        <option @if($company->id === $employee->company_id) ? 'selected' @endif value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" value="{{ $employee->employees_email }}" class="form-control" id="email" name="email" placeholder="employee@company.com">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" value="{{ $employee->employees_phone }}" class="form-control" id="phone" name="phone" placeholder="(99) 9999-9999">
                </div>
     
            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::close() }}
    </div>
@stop
