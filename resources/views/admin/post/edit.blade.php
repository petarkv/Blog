@extends('admin.layouts.app')

@section('headSection')
<link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('main-content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Posts</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/admin/home') }}"><i class="fas fa-home"></i> Home</a></li>
              <li class="breadcrumb-item active">Edit Posts</li>
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
                <h3 class="card-title">Edit Post</h3>
                </div>
                
                @include('includes.messages')
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                <div class="card-body">
                    <div class="row">

                    <div class="col-lg-6">

                    <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title"
                    value="{{ $post->title }}">
                    </div>

                    <div class="form-group">
                    <label for="subtitle">Post Sub Title</label>
                    <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="Enter Post Sub Title"
                    value="{{ $post->subtitle }}">
                    </div>

                    <div class="form-group">
                    <label for="slug">Post Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Enter Post Slug"
                    value="{{ $post->slug }}">
                    </div>

                    </div>

                    <div class="col-lg-6">

                      <div class="form-group">
                          <label for="image">File input</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" name="image" class="custom-file-input" id="image" value="{{ $post->image }}">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                            <div class="input-group-append">
                              <span class="input-group-text" id="">Upload</span>
                            </div>
                          </div>
                      </div>
                                          
                      <div class="form-check">                 
                      <input type="checkbox" class="form-check-input" id="exampleCheck1" name="status" value="1" 
                      @if ($post->status == 1) {{'checked'}} @endif>
                      <label class="form-check-label" for="exampleCheck1">Publish</label>
                      </div>
                     
  
                      <div class="form-group" style="margin-top:18px;">
                        <label>Select Tags</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a Tag(s)" style="width: 100%;" name="tags[]">
                          @foreach ($tags as $tag)
                          <option value="{{ $tag->id }}"
                            @foreach ($post->tags as $postTag)
                              @if ($postTag->id == $tag->id)
                                selected
                              @endif
                            @endforeach
                          >{{ $tag->name }}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="form-group" style="margin-top:18px;">
                        <label>Select Category</label>
                        <select class="select2" multiple="multiple" data-placeholder="Select a Category(s)" style="width: 100%;" name="categories[]">
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}"
                          @foreach ($post->categories as $postCategory)
                            @if ($postCategory->id == $category->id)
                              selected
                            @endif
                          @endforeach
                          >{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>
  
                      
                      </div>
                      </div>
                    
                </div>
                <!-- /.card-body -->

                  <div class="card card-outline card-info">
                    <div class="card-header">
                      <h3 class="card-title">
                        Write Post Body Here
                        <small>// Simple and fast</small>
                      </h3>
                      <!-- tools box -->
                      <div class="card-tools">
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                          <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool btn-sm" data-card-widget="remove" data-toggle="tooltip"
                                title="Remove">
                          <i class="fas fa-times"></i></button>
                      </div>
                      <!-- /. tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body pad">
                      <div class="mb-3">
                        <textarea id="editor1" name="body" {{-- class="textarea" --}} placeholder="Place some text here"
                                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  {{ $post->body }}</textarea>
                      </div>
                      <p class="text-sm mb-0">
                        Editor <a href="https://github.com/summernote/summernote">Documentation and license
                        information.</a>
                      </p>
                    </div>
                  </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <a href="{{ route('post.index') }}" class="btn btn-warning">Back</a>
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


@section('footerSection')

<!-- Select 2 Multiple -->
<script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
<script>
  $(function() {
    $('.select2').select2()
  });
</script>

<!-- CK Editor Full -->
{{-- <script src="//cdn.ckeditor.com/4.15.1/full/ckeditor.js"></script> --}}
<script src="{{ asset('admin/ckeditor/ckeditor.js') }}"></script>
<script>
$(function () {
  // Replace the <textarea id="editor1"> with a CKEditor
  // instance, using default configuration.
  CKEDITOR.replace('editor1');
});
</script>

@endsection