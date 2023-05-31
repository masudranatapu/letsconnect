@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

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
                            {{ __('Signatures') }}
                        </h2>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="dropdown">
                            <a type="button" href="{{ route('user.user.template') }}">
                                <button type="button" class="btn btn btn-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus"
                                         width="24"
                                         height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                         fill="none"
                                         stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                    {{ __('Add One') }}
                                </button>
                            </a>
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
                                        <th>{{ __('Avatar') }}</th>
                                        <th>{{ __('Template Content') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th class="w-1">{{ __('Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($templates)
                                        @foreach ($templates as $template)
                                            <tr>
                                                <td>{{ $template->index + 1 }}</td>
                                                <td>{{ $template->template_contents->title }}</td>
                                                <td>
                                                    <img src="{{ $template->avatar }}" height="60">
                                                </td>
                                                <td>
                                                    <ul>
                                                        @if($template->name)
                                                            <li>{{ $template->name }}</li>
                                                        @endif
                                                        @if($template->designation)
                                                            <li>{{ $template->designation }}</li>
                                                        @endif
                                                        @if($template->phone_no)
                                                            <li>{{ $template->phone_no }}</li>
                                                        @endif
                                                        @if($template->email)
                                                            <li>{{ $template->email }}</li>
                                                        @endif
                                                        @if($template->details)
                                                            <li>{!! $template->details !!}</li>
                                                        @endif
                                                    </ul>
                                                </td>
                                                @if($template->status == 1)
                                                    <td>
                                                        <span class="badge bg-green">Active</span>
                                                    </td>
                                                @endif
                                                @if($template->status == 0)
                                                    <td>
                                                        <span class="badge bg-red">Deactive</span>
                                                    </td>
                                                @endif
                                                <td>
                                                    <div class="btn-list flex-nowrap">
                                                        <a href="{{ route('user.own.signature.edit',$template->id) }}" class="btn btn-primary">Edit</a>
                                                        <a href="{{ route('user.signature.remove', $template->id) }}" class="btn {{ $template->status == 0 ? 'btn-success' : 'btn-danger' }}">{{ $template->status == 0 ? 'Active' : 'Deactive' }}</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('user.includes.footer')
    </div>

    <div class="modal modal-blur fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-title">{{ __('Are you sure?')}}</div>
                    <div>{{ __('If you proceed, you will enabled/disabled this card.')}}</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link link-secondary me-auto"
                            data-bs-dismiss="modal">{{ __('Cancel')}}</button>
                    <a class="btn btn-danger" id="plan_id">{{ __('Yes, proceed')}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal modal-blur fade" id="openQR" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">{{ __('Scan Business Card / Store')}}</div>
                </div>
                <div class="modal-body text-center">
                    <img id="cardURL">
                </div>
            </div>
        </div>
    </div>
@endsection
