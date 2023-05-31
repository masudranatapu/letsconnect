 @extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true, 'title' => 'About us'])
 @section('meta_title'){{ $blog->title }}@stop

 @section('meta_description'){!! $blog->details !!}@stop
 
 
 @section('meta')
     <!-- Schema.org markup for Google+ -->
     <meta itemprop="name" content="{{ $blog->title }}">
     <meta itemprop="description" content="{!! $blog->details !!}">
     <meta itemprop="image" content="{{ asset($blog->image) }}">
      <!-- Open Graph data -->
      <meta name="facebook-domain-verification" content="bpfi5wcoghcnva16vx702asfae7f97" />
      <meta property="og:title" content="{{ $blog->title }}" />
      <meta property="og:type" content="blog" />
      <meta property="og:url" content="{{ route('blog.details', $blog->slug) }}" />
      <meta property="og:image" content="{{ asset($blog->image) }}" />
      <meta property="og:description" content="{!! $blog->details !!}" />
      <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
     <!-- Twitter Card data -->
     <meta name="twitter:card" content="blog">
     <meta name="twitter:site" content="@publisher_handle">
     <meta name="twitter:title" content="{{ $blog->title }}">
     <meta name="twitter:description" content="{!! $blog->details !!}">
     <meta name="twitter:creator" content="@author_handle">
     <meta name="twitter:image" content="{{ asset($blog->image) }}"> 
    
 @endsection
@section('blog_details') active @endsection
@section('content')
<style>
    .st-cmp-settings {
        display: none !important;
    }
    div#st-el-1 {
        display: none;
    }
    .st-disclaimer {display: none !important;}
    .st-logo {display: none !important;}
</style>



<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5db266da7743390012a953c7&product=inline-share-buttons' async='async'></script>
<div>
    <section class="text-gray-700">
        <div class="container page_wrapper px-5 py-24 mx-auto">
        	<div class="mb-5 blog_details text-center">
        		<h3>{{$blog->title}}</h3>
        	   <h5>	
        	   		@if($blog->author)
        	   			{{$blog->author}}
        	   		@else
        	   		  Admin
        	   		@endif	
        	   </h5>
        	    <span class="badge">{{date('m F Y', strtotime($blog->date))}}</span>
        	</div>
        	<div class="mb-5 text-center">
        		<img src="{{asset($blog->image)}}" alt="image" style="width:100%; max-height: 500px;">
        	</div>
        	<p class="details_content">{!! $blog->details !!}</p>

            <!-- share  -->
            <div class="mt-5 border rounded p-3">
                <div class="sharethis-inline-share-buttons"></div>
            </div>

        </div>

    </section>

           
</div>
@endsection