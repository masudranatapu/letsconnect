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
                        {{ __('Add Plan') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('admin.save.plan') }}" method="post" class="card">
                        @csrf
                        <div class="card-header">
                            <h4 class="page-title">{{ __('Plan Details') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center">
                                <div class="col-xl-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Plan Name') }}</label>
                                                <input type="text" class="form-control" name="plan_name"
                                                    placeholder="{{ __('Plan Name') }}..." required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Description') }}</label>
                                                <textarea class="form-control" name="plan_description" rows="3"
                                                    placeholder="{{ __('Description') }}.." required></textarea>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <div class="form-label">{{ __('Recommended') }}</div>
                                                <label class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" name="recommended">
                                                </label>
                                            </div>
                                        </div>
                                        <h2 class="page-title my-3">
                                            {{ __('Plan Prices') }}
                                        </h2>
                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Price') }} <span
                                                        class="text-danger">({{ __('For free, enter 0') }})</span></label>
                                                <input type="number" class="form-control" name="plan_price" min="0" step="0.01"
                                                    placeholder="{{ __('Price') }}..." required>
                                            </div>
                                        </div>


                                        <div class="col-md-6 col-xl-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('Validity') }}
                                                </label>
                                                <!-- <input type="number" class="form-control" name="validity" min="1" max="9999"> -->
                                                <select name="validity" class="form-control" required>
                                                    <option value="" class="d-none">Select Package Validity</option>
                                                    <option value="31">Monthly</option>
                                                    <option value="366">Yearly</option>
                                                    <option value="9999">Forever</option>
                                                </select>
                                            </div>
                                        </div>

                                        <h2 class="page-title my-3">
                                            {{ __('Plan Features') }}
                                        </h2>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label class="form-label required">{{ __('No. Of vCards') }} <span
                                                        class="text-danger">({{ __('For unlimited, enter 999') }})</span></label>
                                                <input type="number" class="form-control" name="no_of_vcards" min="1" max="999"
                                                    placeholder="{{ __('No. Of vCards') }}..." value="1" required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-6 col-md-3">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Personalized Link') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="personalized_link">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Hide Branding') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="hide_branding">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Free Setup') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" name="free_setup">
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <div class="mb-3">
                                                        <div class="form-label">{{ __('Free Support') }}</div>
                                                        <label class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" name="free_support">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group mb-3">
                                                <label class="form-label">Feature</label>
                                                <input type="text" name="feature[]" class="form-control" value="" required placeholder="Enter feature" >
                                            </div>
                                            <div class="add_dynamic_field"></div>
                                            <div class="mt-3">
                                                <a href="javascript:void(0)" class="btn btn-primary addfield">Add More Feature</a>
                                             </div>
                                        </div>


                                        <div class="col-md-4 col-xl-4 my-3">
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-plus" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                                    </svg>
                                                    {{ __('Create Plan') }}
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

<script>
     $(document).on('click', '.addfield', function(e) {
            let html = '';
            html += '<div class="form-group customer_records"><label class="form-label">Feature</label><input type="text" name="feature[]" class="form-control mb-2" value="" required placeholder="Enter feature" ></div>';

              $(html).appendTo('.add_dynamic_field');
              $('.add_dynamic_field .customer_records').addClass('single remove');
              $('.single .addfield').remove();
              $('.single').append('<a href="#" class="remove-field btn btn-danger mr-3 mb-3">Remove</a>');
              $('.add_dynamic_field > .single').attr("class", "remove mb-3");
        });

        $(document).on('click', '.remove-field', function(e) {
              $(this).parent('.remove').remove();
              e.preventDefault();
        });
</script>

@endsection
