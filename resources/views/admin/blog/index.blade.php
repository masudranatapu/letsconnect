@extends('layouts.admin', ['header' => true, 'nav' => true, 'demo' => true])
@section('content')
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
                    {{ __('Blogs') }}
                    </h2>
                </div>
                <div class="col">
                    <div class="float-end">
                        <a href="{{route('admin.blog.create')}}" class="btn btn-primary">Add Post</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="table-responsive px-2 py-2">
                            <table class="table table-vcenter card-table" id="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('S.No') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Image') }}</th>
                                        <th>{{ __('Category') }}</th>
                                        <th>{{ __('Author') }}</th>
                                        <th>{{ __('Date') }}</th>
                                        <th>{{ __('Details') }}</th>
                                        <th class="w-1">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($blog as $key=>$row)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>{{ Str::limit($row->title, 25) }}</td>
                                        <td><img src="{{asset($row->image)}}" width="80" alt="image"></td>
                                        <td>{{ $row->category_name }}</td>
                                        <td>
                                            @if($row->author)
                                                {{ $row->author }}
                                            @else
                                                Admin
                                            @endif
                                        </td>
                                        <td>{{ date('d F Y', strtotime($row->date)) }}</td>
                                        <td>{{ Str::limit($row->details, 40) }}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a class="btn btn-primary btn-sm" href="{{route('admin.blog.edit', $row->id)}}">Edit</a>

                                                <a href="#" class="btn btn-danger btn-sm" onclick="deleteBlogPost('{{ $row->id }}'); return false;">Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.includes.footer')
</div>
<div class="modal modal-blur fade" id="DeletePost" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title text-danger text-capitalize">{{ __('WARNING!')}}</div>
                <div>{{ __('This action will remove Blog Post data. It is not revertable action.')}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">{{ __('Cancel')}}</button>
                <a href="" class="btn btn-danger" id="delete_post_id">{{ __('Yes, proceed')}}</a>
            </div>
        </div>
    </div>
</div>
@endsection