@extends('adminlte::page')

@section('title', 'Create Company')

@section('content_header')
    <h1>Create Company</h1>
@stop

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Quick Example</h3>
        </div>
        <!-- /.box-header -->
        @if(session('success'))
            {{ session('success') }}
        @endif
        <!-- form start -->
        <form role="form" action="{{ route('admin.companies.create-company') }}" method="post">
            {!! csrf_field() !!}
            <div class="box-body">
                <div class="form-group">
                    <label for="name">Company Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Acme Corp.">
                </div>
                <div class="form-group">
                    <label for="email">Company Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com">
                </div>
                <div class="form-group">
                    <label for="logo">Company Logo</label>
                    <input type="file" id="logo" name="logo">
                    <p class="help-block">Minimum (100 x 100px), .png, .jpg, .gif</p>
                </div>
                <div class="form-group">
                    <label for="site">Company Website</label>
                    <input type="text" class="form-control" id="site" name="site" placeholder="www.companysite.com">
                </div>

                

            </div>
            <!-- /.box-body -->

            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@stop
