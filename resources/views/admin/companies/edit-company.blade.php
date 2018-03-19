@extends('adminlte::page')

@section('title', 'Edit Company')

@section('content_header')
    <h1>Edit Company</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ $company->company_name }}</h3>
        </div>
        <!-- /.box-header -->
        @if(session('success'))
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Company Updated!</h4>
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
        {{ Form::open(['method' => 'PUT', 'route' => ['admin.companies.update-company', $company->id], 'files' => true]) }}
            
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="{{ $company->company_name }}" value="{{ $company->company_name }}">
                </div>
                <div class="form-group">
                    <label for="email">Company Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ $company->company_email }}" value="{{ $company->company_email }}">
                </div>
                <div class="form-group">
                    <label for="logo">Company Logo</label>
                    <img src="{{asset('storage/logos/'.$company->company_logo)}}" width="100" class="margin"/>
                    <input type="file" id="logo" name="logo">
                    <p class="help-block">Minimum (100 x 100px), .png, .jpg, .gif</p>
                </div>
                <div class="form-group">
                    <label for="site">Company Website</label>
                    <input type="text" class="form-control" id="site" name="site" placeholder="{{ $company->company_website }}" value="{{ $company->company_website }}">
                </div>

                

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::close() }}
    </div>
@stop
