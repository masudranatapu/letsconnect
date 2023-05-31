@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => 'About us'])
@section('blog') active @endsection
@section('content')
<div>
    <section class="text-gray-700">
        <div class="container page_wrapper px-5 py-24 mx-auto">
            <div class="text-center page_title mb-20">
                <h1 class="sm:text-3xl mb-5 text-1xl font-large text-center title-font text-gray-900 mb-4">
                     Blog 
                </h1>
                 
                 <form action="{{ route('search.post') }}" class="sidebar_search" method="get" style="max-width:700px; margin:0 auto;">
                    <div class="flex items-center border border-teal-500">
                        <input type="text" name="search" class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none" placeholder="What are your looking for?" required="">
                        <button type="submit">Search</button>
                    </div>
                 </form>
            </div>

             <div class="grid grid-cols-3 gap-4">
                  <div class="col-span-6 lg:col-span-1">
                      <div class="blog_sidebar_wrapper" style="position: sticky; top:2rem;">
                           <div class="sidebar_heading mb-4">
                               <h4>Category</h4>
                           </div>
                           <div class="sidebar_category mb-4">
                              <ul>
                                  @foreach($category as $row)
                                    <li><a href="{{ route('category.post', $row->category_slug) }}">{{ $row->category_name }}</a></li>
                                  @endforeach
                              </ul>
                           </div>
                      </div>
                  </div>
                  <div class="col-span-6 lg:col-span-2">
                     <div class="blog_left_sidebar">
                         <div class="container flex flex-wrap">
                           @if($posts->count())
                               @foreach($posts as $row)
                                 <div class="mb-8 lg:mb-0 w-full md:w-1/2">
                                    <div class="blog_post_item m-2">
                                         <div class="post_date mb-1">
                                             <span>{{date('m F Y', strtotime($row->date))}}</span>
                                         </div>
                                         <div class="post_img">
                                            <a href="{{ route('blog.details', $row->slug) }}"> <img src="{{asset($row->image)}}" class="border rounded" alt=""></a>
                                         </div>
                                         <div class="post_content">
                                             <h2><a href="{{ route('blog.details', $row->slug) }}">{{$row->title}}</a></h2>
                                             <h5><a href="#">
                                                @if($row->author)
                                                    {{$row->author}}
                                                @else
                                                  Admin
                                                @endif
                                              </a></h5>
                                             <p>{!! Str::limit($row->details, 120) !!}</p>
                                         </div>
                                     </div>
                                 </div>
                               @endforeach
                             @else
                               <p>Not Found!</p>
                             @endif
                         </div>

                     </div>
                  </div>
            </div>
        </div>
        <section>
           
</div>
@endsection