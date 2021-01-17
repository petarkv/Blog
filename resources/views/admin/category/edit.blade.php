@extends('admin.layouts.app')

@section('main-content')
   
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Edit Categories</li>
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
                <h3 class="card-title">Edit Category</h3>
                </div>

                @include('includes.messages')
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('category.update',$category->id) }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-6">

                    <div class="form-group">
                    <label for="name">Category Title</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Title"
                    value="{{ $category->name }}">
                    </div>
 
                    <div class="form-group">
                    <label for="slug">Category Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Category Slug"
                    value="{{ $category->slug }}">
                    </div>

                    </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('category.index') }}" class="btn btn-warning">Back</a>
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