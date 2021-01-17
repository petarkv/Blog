@extends('admin.layouts.app')

@section('main-content')
    
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admins</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Add Admin</li>
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
                <h3 class="card-title">Add Admin</h3>
                </div>

                @include('includes.messages')
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('user.store') }}" method="POST">
                  {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-6">

                    <div class="form-group">
                      <label for="name">Admin Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Admin Name" value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                      <label for="surname">Admin Surname</label>
                      <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter Admin Surname" value="{{ old('surname') }}">
                    </div>
 
                    <div class="form-group">
                      <label for="email">Admin Email</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Enter Admin Email" value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                      <label for="phone">Admin Phone</label>
                      <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Admin Phone" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" value="{{ old('password') }}">
                    </div>

                    <div class="form-group">
                      <label for="password_confirmation">Confirm Passwords</label>
                      <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                      placeholder="Confirm Password">
                    </div>

                    <div class="form-group">
                      <label for="confirm_password">User Status</label>                      
                        <div class="checkbox" style="inline">
                          <label><input type="checkbox" name="status" @if (old('status') == 1)
                              checked
                          @endif value="1"> Status</label>
                        </div>                      
                    </div>


                    <div class="form-group">
                      <label for="role">Assign Role</label>
                      <div class="row">
                      @foreach ($roles as $role)
                      <div class="col-lg-3">
                        <div class="checkbox" style="inline">
                          <label><input type="checkbox" name="role[]" value="{{ $role->id }}"> {{ $role->name }}</label>
                        </div>
                      </div>
                      @endforeach 
                      </div>                     
                    </div>

                    
                    </div>
                    </div>
                    
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('user.index') }}" class="btn btn-warning">Back</a>
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