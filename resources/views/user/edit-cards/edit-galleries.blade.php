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
                        {{ __('Update Image Gallery') }}
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">
                <div class="col-sm-12 col-lg-12">
                    <form action="{{ route('user.update.galleries', Request::segment(3)) }}" method="post"
                        enctype="multipart/form-data" class="card">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-10">

                                    <div class="row">

                                        <h2 class="page-title my-3">
                                            {{ __('Gallery') }}
                                        </h2>

                                        @for ($i = 0; $i < count($galleries); $i++) <div class='row' id="{{ $i }}">
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Gallery Image') }} <span class='text-danger'>({{ __('Recommended : 200 x 200 pixels') }})</span></label>
                                                    <div class="input-group mb-2">
                                                        <input type="text"
                                                            class="image{{ $galleries[$i]->id }} media-model form-control"
                                                            name="gallery_image[]"
                                                            placeholder="{{ __('Gallery Image') }}"
                                                            value="{{ $galleries[$i]->gallery_image }}" required>
                                                        <button class="btn btn-primary btn-md" type="button"
                                                            onclick="openMedia({{ $galleries[$i]->id }})">{{ __('Choose image') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <div class="mb-3">
                                                    <label class="form-label required">{{ __('Image Caption') }}</label>
                                                    <input type="text" class="form-control" name="caption[]"
                                                        placeholder="{{ __('Image Caption') }}..."
                                                        value="{{ $galleries[$i]->caption }}" required>
                                                    <button class='btn btn-danger btn-sm mt-2'
                                                        onclick='removeGallery({{ $i }})'>
                                                        {{ __('Remove') }}
                                                    </button>
                                                </div>
                                            </div>
                                    </div>
                                    @endfor

                                    <br>
                                    <div id="more-gallery" class="row"></div>
                                    <div class="col-lg-12">
                                        <button type="button" onclick="addGallery()" class="btn btn-primary">
                                            {{ __('Add New') }}
                                        </button>
                                    </div>


                                    <div class="col-md-4 col-xl-4 my-3">
                                        <div class="mb-3">

                                            <a href="{{ route('user.edit.business.hours', Request::segment(3)) }}"
                                                class="btn btn-primary">
                                                {{ __('Skip & Continue') }}
                                            </a>

                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Submit & Next') }}
                                            </button>

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
    <script>
    var count = {{ count($galleries) }};
    var currentSelection = 0;
    function addGallery() {
        "use strict";
        if (count>={{ $plan_details->no_of_galleries}}) {
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
        var gallery =
            "<div class='row' id="+ id +"><div class='col-md-6 col-xl-6'><div class='mb-3'><label class='form-label required'>{{ __('Gallery Image') }} <span class='text-danger'>({{ __('Recommended : 200 x 200 pixels') }})</span></label><div class='input-group mb-2'><input type='text' class='image"+ id +" media-model form-control' name='gallery_image[]' placeholder='{{ __('Gallery Image') }}' required><button class='btn btn-primary btn-md' type='button' onclick='openMedia("+ id +")'>{{ __('Choose image') }}</button></div></div></div><div class='col-md-6 col-xl-6'> <div class='mb-3'> <label class='form-label required'>Image Caption</label> <input type='text' class='form-control' name='caption[]' placeholder='Image Caption...' required> <a href='#' class='btn mt-3 btn-danger btn-sm' onclick='removeGallery("+id+")'>Remove</a> </div><br></div>";
            $("#more-gallery").append(gallery).html();
        }
    }

    function removeGallery(id) {
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
