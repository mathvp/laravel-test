@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>Companies</h1>
@stop
<style>
  .actions form{
    display:inline;
  }
</style>
@section('content')
    <!-- /.box-header -->
    <div class="box-body">

      @if(session('success'))
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> {{ session('success') }}</h4>
          </div>
      @endif

      @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Error!</h4>
            {{ Html::ul($errors->all()) }}    
        </div>
      @endif

      <table id="example2" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>#</th>
            <th>Company Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Site</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($companies as $company)
          <tr>
            <td>{{$company->id}}</td>
            <td>{{$company->company_name}}</td>
            <td>{{$company->company_email}}</td>
            <td><a href="#" data-toggle='tooltip' title='<img src="{{asset('storage/logos/'.$company->company_logo)}}" width="50" class="margin"/>'>{{$company->company_name}}</a></td>
            <td>{{$company->company_website}}</td>
            <td class="actions">
              <a href="{{ route('admin.companies.edit-company', $company->id) }}" class="text-green" alt="Edit" title="Edit">
                <i class="fa fa-fw fa-edit"></i>
              </a> | 
              {{ Form::open(['method' => 'DELETE', 'route' => ['admin.companies.remove-company', $company->id],'onsubmit' => 'return confirm("Are you sure?")', 'id'=>$company->id]) }}
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
              <th>Company Name</th>
              <th>Email</th>
              <th>Logo</th>
              <th>Site</th>
              <th>Actions</th>
          </tr>
        </tfoot>
      </table>
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