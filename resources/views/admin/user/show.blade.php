@extends('admin.layouts.app')

@section('headSection')  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('main-content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>View Users</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}"><i class="fas fa-home"></i> Home</a></li>
            <li class="breadcrumb-item active">View Users</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">View Users</h3>        
        <a class="btn btn-success" style="margin-left: 300px;" href="{{ route('user.create') }}">Add New</a>        
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
        @include('includes.messages')
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">DataTable with Users</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>SN</th>
                <th>User Name</th>
                <th>User Surname</th>
                <th>User email</th>
                <th>Assigned Roles</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </thead>
              <tbody>

              @foreach ($users as $user)
              <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>
                  @foreach ($user->roles as $role)
                    {{ $role->name }},
                  @endforeach
                </td>
                <td>{{ $user->status? 'Active' : 'Not Active' }}</td>
                <td><a href="{{ route('user.edit',$user->id) }}"><span class="fas fa-edit" aria-hidden="true" title="Edit"></span></a></td>
                <td>
                  <form id="delete-form-{{ $user->id }}" method="POST" action="{{ route('user.destroy',$user->id) }}" style="display: none">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                  </form>
                  
                  <a href=""onclick="
                  if(confirm('Are you sure, You Want to delete this?'))
                      {
                        event.preventDefault();
                        document.getElementById('delete-form-{{ $user->id }}').submit();
                      }
                      else{
                        event.preventDefault();
                      }"><span class="fas fa-trash-alt" aria-hidden="true" title="Delete"></span></a>
                </td>
              </tr>
              @endforeach
                     
              </tbody>
              <tfoot>
              <tr>
                <th>SN</th>
                <th>User Name</th>
                <th>User Surname</th>
                <th>User email</th>
                <th>Assigned Roles</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
              </tfoot>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>
      <!-- /.card-body -->
      <div class="card-footer">
        Footer
      </div>
      <!-- /.card-footer-->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('footerSection')
    <!-- DataTables -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
      $(function () {
        $("#example1").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
        });
      });
    </script>
@endsection