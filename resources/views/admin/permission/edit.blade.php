@extends('admin.layouts.app')

@section('main-content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Permissions</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Edit Permission</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>    

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">

            <!-- general form elements -->
            <div class="card card-outline card-info">
                <div class="card-header">
                <h3 class="card-title">Edit Permission</h3>
                </div>

                @include('includes.messages')
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('permission.update', $permission->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-6">

                    <div class="form-group">
                    <label for="name">Permission Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Permission Name"
                          value="{{ $permission->name }}">
                    </div>
 
                    </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('permission.index') }}" class="btn btn-warning">Back</a>
                </div>
                </form>
            </div>
            <!-- /.card -->

          
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection