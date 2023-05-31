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
                    {{ __('Contacts') }}
                    </h2>
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
                                        <th>{{ __('First Name') }}</th>
                                        <th>{{ __('Last Name') }}</th>
                                        <th>{{ __('Company') }}</th>
                                        <th>{{ __('Title') }}</th>
                                        <th>{{ __('Favorite Color') }}</th>
                                        <th>{{ __('How did we meet') }}</th>
                                        <th class="w-1">{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($contact as $row)
                                    <tr>
                                        <td>{{$row->fname}}</td>
                                        <td>{{$row->lname}}</td>
                                        <td>{{$row->company}}</td>
                                        <td>{{$row->title}}</td>
                                        <td>{{$row->fcolor}}</td>
                                        <td>{{$row->how_meet}}</td>
                                        <td>
                                            <div class="btn-list flex-nowrap">
                                                <a href="#"   onclick="deleteContactMsg('{{ $row->id }}'); return false;" class="btn btn-primary btn-sm">Delete</a>
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



<div class="modal modal-blur fade" id="contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title text-danger text-capitalize">{{ __('WARNING!')}}</div>
                <div>{{ __('This action will remove contact message data. It is not revertable action.')}}</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">{{ __('Cancel')}}</button>
                <a href="" class="btn btn-danger" id="contact_user_id">{{ __('Yes, proceed')}}</a>
            </div>
        </div>
    </div>
</div>




@endsection