@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])
@section('content')
<style>
    .btn.btn-primary {
        background: #ed6b4d !important;
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
                    {{ __('Products') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 card col-lg-12">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5 col-xl-5">
                                <div class="mb-3 text-center">
                                  <div class="row g-2">
                                        @foreach ($themes as $theme)
                                        <div class="col-lg-6 col-sm-6 col-md-6 col-6">
                                            <label class="form-imagecheck mb-2">
                                                <input type="radio" name="theme_id" value="{{ $theme->theme_id }}"
                                                    class="form-imagecheck-input" required checked />
                                                <span class="form-imagecheck-figure text-center font-weight-bold">
                                                    <img src="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}"
                                                        class="w-100 h-100 object-cover"
                                                        alt="{{ $theme->theme_name }}"
                                                        class="form-imagecheck-image">
                                                    <span class="badge bg-dark">{{ $theme->theme_name }}</span>
                                                </span>
                                            </label>
                                            <div class="mt-2">
                                                <a href="{{ asset('backend/img/vCards/'.$theme->theme_thumbnail) }}" class="btn btn-primary popup_image">Preview Theme</a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-xl-7">
                                <div class="row">
                                    <div class="tabs_menu nav-tabs mb-4">
                                        <ul>
                                            <li>
                                                <a href="javascript:void(0)" class="nav-item nav-link">Create Whatsapp Store</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0)" class="nav-item nav-link active">Add Product</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div>
                                        <form action="{{ route('user.save.products', Request::segment(3)) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div id="product" class="row">
                                                            <h2 class="page-title my-3">
                                                            {{ __('Product ') }}
                                                            </h2>
                                                        </div>
                                                        <br>
                                                        <div id="more-products" class="row">
                                                            <div class="row" id="4226631103">
                                                                <div class="col-md-6 col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label required">Product Badge</label>
                                                                        <input type="text" class="form-control" name="badge[]" placeholder="Product Badge..." required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Product Image</label>
                                                                        <div class="input-group mb-2">
                                                                            <input type="text" class="image4226631103 media-model form-control" name="product_image[]" placeholder="Product Image" required="">
                                                                            <button class="btn btn-primary btn-md" type="button" onclick="openMedia(4226631103)">Choose image</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Product Name</label>
                                                                        <input type="text" class="form-control" name="product_name[]" placeholder="Product Name" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label required">Product Sub Title</label>
                                                                        <textarea class="form-control" name="product_subtitle[]" data-bs-toggle="autosize" placeholder="Product Sub Title..." required=""></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label required">Regular Price</label>
                                                                        <input type="number" class="form-control" name="regular_price[]" min="1" placeholder="Regular Price..." step=".01" required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label required">Sales Price</label>
                                                                        <input type="number" class="form-control" name="sales_price[]" min="1" step=".01" placeholder="Sales Price..." required="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 col-xl-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label required" for="product_status">Status</label>
                                                                        <select name="product_status[]" id="product_status" class="form-control" required="">
                                                                            <option value="instock">In Stock</option>
                                                                            <option value="outstock">Out of Stock</option>
                                                                        </select>
                                                                        <!-- <a href="#" class="btn mt-3 btn-danger btn-sm" onclick="removeProduct(4226631103)">Remove</a> -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                        </div>
                                                        <div id="more-products" class="row"></div>
                                                        <div class="col-lg-12">
                                                            <button type="button" onclick="addProduct()" class="btn btn-primary">
                                                            {{ __('Add One More Product') }}
                                                            </button>
                                                            <button type="submit" class="btn btn-dark ms-2">
                                                            {{ __('Submit & Next') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('user.includes.footer')
    <div class="modal modal-blur fade" id="openMediaModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('Media Library')}}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row row-cards" id="captions">
                        @if (!empty($media) && $media->count())
                        @foreach ($media as $gallery)
                        <div class="col-sm-6 col-lg-6">
                            <div class="card card-sm">
                                <div class="d-block">
                                    <div class="media_image card-img-top img-responsive img-responsive-16by9"
                                        id="{{ $gallery->media_url }}"
                                    style="background-image: url({{ asset($gallery->media_url) }})"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="empty">
                            <div class="empty-img"><img
                                src="{{ asset('backend/img/undraw_printing_invoices_5r4r.svg') }}" height="128"
                                alt="">
                            </div>
                            <p class="empty-title">{{ __('No media found') }}</p>
                            <p class="empty-subtitle text-muted">
                                {{ __('Try adjusting your add to find what you are looking for.') }}
                            </p>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    @push('custom-js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
<script>
    $('.popup_image').magnificPopup({
      type: 'image'
    });
</script>
    <script>
    var count = 1;
    var currentSelection = 0;
    function addProduct() {
        "use strict";
    if (count>={{ $plan_details->no_of_services}}) {
    swal({
    title: 'Oops!',
    icon: 'warning',
    text: 'You have reached your current plan limit.',
    timer: 2000,
    buttons: false,
    });
    }
    else {
    count++;
    var id = getRandomInt();
    var products = "<div class='row' id="+ id +"><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Product Badge') }}</label><input type='text' class='form-control' name='badge[]'placeholder='{{ __('Product Badge') }}...' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label'>{{ __('Product Image') }}</label><div class='input-group mb-2'><input type='text' class='image"+ id +" media-model form-control' name='product_image[]' placeholder='{{ __('Product Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia("+ id +")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label'>Product Name</label> <input type='text' class='form-control' name='product_name[]' placeholder='Product Name' required> </div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Product Sub Title') }}</label><textarea class='form-control' name='product_subtitle[]' data-bs-toggle='autosize' placeholder='{{ __('Product Sub Title') }}...' required></textarea></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Regular Price') }}</label><input type='number' class='form-control' name='regular_price[]' min='1' placeholder='{{ __('Regular Price') }}...' min='1' step='.01' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Sales Price') }}</label><input type='number' class='form-control' name='sales_price[]' min='1' step='.01' placeholder='{{ __('Sales Price') }}...' required></div></div><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required' for='product_status'>{{ __('Status') }}</label><select name='product_status[]' id='product_status' class='form-control' required><option value='instock'>{{ __('In Stock') }}</option><option value='outstock'>{{ __('Out of Stock') }}</option></select><a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeProduct("+id+")'>Remove</a></div></div></div> <br></div></div>";
    $("#more-products").append(products).html();
    }
    }
    function removeProduct(id) {
        "use strict";
    $("#"+id).remove();
    }
    function getRandomInt() {
    min = Math.ceil(0);
    max = Math.floor(9999999999);
    return Math.floor(Math.random() * (max - min) + min); //The maximum is exclusive and the minimum is inclusive
    }
    function openMedia(id){
    "use strict";
    currentSelection = id;
    $('#openMediaModel').modal('show');
    }
    $(".media_image").on( "click", function() {
    var imgUri = $(this).attr('id');
    $('#openMediaModel').modal('hide');
    $('.image'+currentSelection).val(imgUri);
    });
    </script>
    @endpush
</div>
@endsection