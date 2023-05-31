@extends('vendor.installer.layouts.master')

@section('template_title')
    {{ trans('installer_messages.environment.menu.templateTitle') }}
@endsection

@section('title')
    <i class="fa fa-cog fa-fw" aria-hidden="true"></i>
    {!! trans('installer_messages.environment.menu.title') !!}
@endsection

@section('container')

    <p class="text-center">
        {!! trans('installer_messages.environment.menu.desc') !!}
    </p>
    <div>
        <a href="{{ route('LaravelInstaller::environmentClassic') }}" class="btn btn-primary">
            {{ trans('installer_messages.environment.menu.classic-button') }}
        </a>
    </div>

@endsection
