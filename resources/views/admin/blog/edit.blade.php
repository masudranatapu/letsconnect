@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])
@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css">
<style>
    .bootstrap-tagsinput {
        width: 100% !important;
        display: block;
        width: 100%;
        padding: 0.4375rem 0.75rem;
        font-size: .875rem;
        font-weight: 400;
        line-height: 1.4285714;
        color: #232e3c;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #dadcde;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: 4px;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
    }
    .bootstrap-tagsinput .tag {
        margin-right: 2px;
        color: white;
        background: #ed6b4d;
        padding: 2px 4px 4px 9px;
        border-radius: 4px;
    }
</style>
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        {{ __('Overview') }}
                    </div>
                    <h2 class="page-title">
                    {{ __('Edit Post') }}
                    </h2>
                </div>
                <div class="col">
                    <div class="float-end">
                        <a href="{{route('admin.blog')}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{route('admin.blog.update', $blog->id)}}" method="post" class="card" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4 class="page-title">Edit Post</h4>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-10">
                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Title</label>
                                                <input type="text" class="form-control" name="title" placeholder="Post Title" value="{{ $blog->title }}" required="">
                                                @error('title')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Select Category</label>
                                                <select name="category_slug" class="form-control" required="">
                                                    <option value="" class="d-none">Category</option>
                                                     @foreach($category as $row)
                                                        <option value="{{$row->category_slug}}" @if($row->category_slug == $blog->category_slug) selected @endif>
                                                            {{ $row->category_name }}
                                                        </option>
                                                     @endforeach
                                                </select>
                                                @error('category_slug')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Author Name</label>
                                                <input type="text" class="form-control" name="author" placeholder="Author name" value="{{ $blog->author ?? 'Admin' }}">
                                                @error('author')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label">Tags</label>
                                                <input type="text" data-role="tagsinput" class="form-control" name="tag" placeholder="" value="{{ $blog->tag }}">
                                                @error('tag')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Image</label>
                                                <input type="file" class="form-control" name="image">
                                                @error('image')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <img src="{{asset($blog->image)}}" width="120" class="rounded" alt="image">
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Description</label>
                                                <textarea name="details" id="summernote" class="form-control" cols="30" rows="5" required="">{{ $blog->details }}</textarea>
                                                @error('details')
                                                    <div class="text-danger">{{$message}}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3">
                                                        </path>
                                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3">
                                                        </path>
                                                        <line x1="16" y1="5" x2="19" y2="8"></line>
                                                    </svg>
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>
<script type="text/javascript">
    $('#summernote').summernote({
        tabsize: 2,
        height: 100,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
</script>

@endsection