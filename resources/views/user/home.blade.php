@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('content')
<div class="page-wrapper">
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
            <div class="row align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        {{ __('Overview') }}
                    </div>
                    <h2 class="page-title">
                        {{ __('Dashboard') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck dashboard_card  row-cards">
                <div class="col-sm-3 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subheader">{{ __('Current Plan') }}</div>
                            </div>
                            @if ($active_plan->plan_price == 0)
                            <div class="h1">{{ $active_plan->plan_name }}</div>
                            <p>{{ __('FREE PLAN') }}</p>
                            @else
                            <p class="text-uppercase"><b>{{ $active_plan->plan_name }}</b></p>
                            @endif
                            <a class="btn btn-sm btn-white" href="{{ route('user.plans') }}">
                                {{ __('Show details') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subheader">{{ __('Business Cards') }}</div>
                            </div>
                            <div class="h1">{{ $business_card }}</div>
                            <a class="btn btn-sm btn-white" href="{{ route('user.vcards') }}">
                                {{ __('Show details') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="subheader">{{ __('Remaining Days') }}</div>
                            </div>

                            <p class="h1">{{ $remaining_days > 0 ?  $remaining_days : 'Plan Expired!' }}</p>

                            <a class="btn btn-sm btn-white" href="{{ route('user.plans') }}">
                                {{ __('Show details') }}
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @include('user.includes.footer')
</div>
@endsection
