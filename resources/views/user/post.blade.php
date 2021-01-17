@extends('user/app')

@section('bg-img',Storage::disk('local')->url($post->image))
@section('head')
  <link rel="stylesheet" href="{{ asset('user/css/prism.css') }}">
@endsection
@section('title',$post->title)
@section('sub-heading',$post->subtitle)
@section('main-content')
<!-- Post Content -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" 
src="https://connect.facebook.net/sr_RS/sdk.js#xfbml=1&version=v9.0" 
nonce="UKXdhvFb">
</script>

<article>
    <div class="container">
      <div class="row">
        <small style="font-family: Arial, Helvetica, sans-serif; font-size: 18px; color: red;">
          Created at: {{ $post->created_at->diffForHumans() }}</small><br>

          
        <div {{-- class="col-lg-8 col-md-10 mx-auto" --}} style="width: 1600px; margin: 0;">
          @foreach ($post->categories as $category)
          <small style="margin-right: 20px">  
              <a href="{{ route('category',$category->slug) }}">{{ $category->name }}</a>
          </small>
          @endforeach
                    
          {!! htmlspecialchars_decode($post->body) !!}<br>

          {{-- Tag clouds --}}
          <h3>Tag Clouds</h3>
          @foreach ($post->tags as $tag)
          <a href="{{ route('category',$category->slug) }}">
            <small style="margin-right: 20px; border-radius: 5px;border: 1px solid gray;padding: 5px;">  
              {{ $tag->name }}</small></a>          
          @endforeach
          
        </div>
      
      </div>

      <div class="fb-comments" data-href="{{ Request::url() }}" 
        data-numposts="5" data-width=""></div>

    </div>
  </article>

  <hr>
@endsection

@section('footer')
    <script src="{{ asset('user/js/prism.js') }}"></script>
@endsection