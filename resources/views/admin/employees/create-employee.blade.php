@extends('adminlte::page')

@section('title', 'Create Employee')

@section('content_header')
    <h1>Create Employee</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <!--<h3 class="box-title">Quick Example</h3>-->
        </div>
        <!-- /.box-header -->
        @if(session('success'))
            {{ session('success') }}
        @endif
        @if(session('message'))
            {{ session('message') }}
        @endif
        
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{ Html::ul($errors->all()) }}    
        </div>
        @endif
        
        <!-- form start -->
        <form role="form" action="{{ route('admin.employees.store-employee') }}" method="post">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="first-name">First Name</label>
                    <input type="text" class="form-control" id="first-name" name="first-name" placeholder="Employee first name">
                </div>
                <div class="form-group">
                    <label for="last-name">Last Name</label>
                    <input type="text" class="form-control" id="last-name" name="last-name" placeholder="Employee last name">
                </div>
                <div class="form-group">
                  <label for="company">Company</label>
                  <select name="company" id="company" class="form-control">
                    <option selected>Choose...</option>
                    @foreach($companies as $company )
                        <option value="{{ $company->id }}">{{ $company->company_name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="employee@company.com">
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="(99) 9999-9999">
                </div>
     

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
