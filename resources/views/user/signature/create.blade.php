@extends('layouts.user', ['header' => true, 'nav' => true, 'demo' => true, 'settings' => $settings])

@section('css')

@endsection

@section('content')
<div class="page-wrapper">
	<div class="container-xl">
		<!-- Page title -->
		<div class="page-header d-print-none">
			<div class="row align-items-center">
				<div class="col">
					<div class="page-pretitle">
						{{ __('Signature Template') }}
					</div>
					<h2 class="page-title">
					{{ __('Edit Template') }} &nbsp;
                    <a href="{{ route('user.user.signature') }}" class="btn btn-sm btn-info">{{ __('Back') }}</a>
					</h2>
				</div>
			</div>
		</div>
	</div>
	<div class="page-body">
		<div class="container-xl">
			<div class="row" ng-app="emailApp" ng-controller="formCtrl">

				<div class="col-sm-5" id="templateDesign">
					<div class="card {!! "$template->style_classname" !!}">
                        <div class="card-header">
                            <h3>{!! "$template->title" !!}</h3>
                        </div>
                        {!! $template->editable_view !!}
                        <div class="col-12 m-3">
                            <button type="button" class="btn btn-primary copyBtn"
                                    data-clipboard-target=".signature" data-toggle="collapse" data-target="#collapse1"
                                    aria-expanded="false" aria-controls="collapse1">Copy</button>
                        </div>

                    </div>
                </div>
				<div class="col-sm-7">
					<div class="card" style="max-height: 632px; overflow-x: auto;">
						<div class="card-body">
							<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Content</button>
{{--									<button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Style</button>--}}
								</div>
							</nav>
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="pt-3">
										<form action="{{ route('user.signature.store', ['id' => request()->id]) }}" method="post" enctype="multipart/form-data">
											@csrf
{{--                                            <h1>{{ request()->id }}</h1>--}}
                                            <div class="row">
												<div class="col-12">
													<div class="mb-3">
														<label class="form-label">Profile Picture</label>
{{--														<input type="file" name="" id="" class="form-control">--}}
                                                        <input type="file" id="file" name="avatar" class="form-control"
                                                               placeholder="{{ __('image') }}..." onchange="imageHandler(this,'avatarImage')"
                                                               accept=".jpeg,.jpg,.png,.gif,.svg"/>

													</div>
												</div>
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Name</label>
														<input type="text" name="name" id="nameInput" class="form-control"  oninput="textHandle('name')">
													</div>
												</div>
												<div class="col-6">
													<div class="mb-2">
														<label class="form-label">Designation</label>
														<input type="text" name="designation" id="designationInput" class="form-control" oninput="textHandle('designation')">
													</div>
												</div>
												<h4>Social Media</h4>
												<hr>

                                                @if($template->id == 1 || $template->id == 2 || $template->id == 3)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Facebook</label>
														<input type="text" name="facebook_link" id="facebookInput" class="form-control so_input" oninput="linkHandle('facebook')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1 || $template->id == 2 || $template->id == 3)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Twitter</label>
														<input type="text" name="twitter_link" id="twitterInput" class="form-control so_input" oninput="linkHandle('twitter')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1 || $template->id == 2 )
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Linkedin</label>
														<input type="text" name="linkedin_link" id="linkedinInput" class="form-control so_input" oninput="linkHandle('linkedin')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1 || $template->id == 3)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Youtube</label>
														<input type="text" name="youtube_link" id="youtubeInput" class="form-control so_input" oninput="linkHandle('youtube')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1 )
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Whatsapp</label>
														<input type="text" name="whatsapp_link" id="whatsappInput" class="form-control so_input" oninput="linkHandle('whatsapp')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Reddit</label>
														<input type="text" name="reddit_link" id="redditInput" class="form-control so_input" oninput="linkHandle('reddit')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 3)
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Instagram</label>
                                                        <input type="text" name="instagram_link" id="instagramInput" class="form-control so_input" oninput="linkHandle('instagram')">
                                                    </div>
                                                </div>
                                                @endif

                                                @if($template->id == 3)
                                                <div class="col-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Tiktok</label>
                                                        <input type="text" name="titok_link" id="titokInput" class="form-control so_input" oninput="linkHandle('titok')">
                                                    </div>
                                                </div>
                                                @endif

												<h4>Personal Information</h4>
												<hr>
                                                @if($template->id == 1 || $template->id == 2 || $template->id == 3)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Phone Number</label>
														<input type="text" name="phone_no" id="phoneInput" class="form-control" oninput="textHandle('phone')">
													</div>
												</div>
                                                @endif


                                                @if($template->id == 1)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Mobile Number</label>
														<input type="text" name="mobile_no" id="mobileInput" class="form-control" oninput="textHandle('mobile')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1 || $template->id == 3)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Email</label>
														<input type="text" name="email" id="emailInput" class="form-control" oninput="textHandle('email')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Webmail</label>
														<input type="text" name="webmail" id="webmailInput" class="form-control" oninput="textHandle('webmail')">
													</div>
												</div>
                                                @endif

                                                @if($template->id == 1)
												<div class="col-6">
													<div class="mb-3">
														<label class="form-label">Website Link</label>
														<input type="text" name="website_link" id="websiteInput" class="form-control"  oninput="textHandle('website')">
													</div>
												</div>
                                                @endif


												<div class="col-12">
													<div class="mb-3">
														<label class="form-label">About Me/Us</label>
                                                        <textarea name="details"  class="summernote"></textarea>
													</div>
												</div>
												<div class="col-12">
													<button type="submit" class="btn btn-primary">Create</button>
												</div>
											</div>
										</form>
									</div>
								</div>
								<!-- style -->
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@include('user.includes.footer')
</div>
@endsection

@section('scripts')
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.10/clipboard.min.js"></script>
    <script>

        // var t = document.getElementById('templateDesign').innerHTML
        // console.log(t)
        $(document).ready(function() {
            $('.summernote').summernote({
                toolbar: [
                    // ['style', ['style']],
                    ["font", ["bold", "underline", "clear"]],
                    ["color", ["color"]],

                    ["table", ["table"]],
                    //["insert", ["link", "picture", "video"]],
                    ["view", ["fullscreen", "codeview", "help"]],
                    ['misc', ['undo', 'redo']],
                ],
                callbacks: {
                    onKeyup: function(e) {
                        $(`#footerText`).html($(this).val());
                        console.log('Key is released:', $(this).val());
                    }
                },
                height: 200,

            });
        });
        function textHandle(instance){
            text = $(`#${instance}Input`).val();
            $(`#${instance}Text`).html(text);
        }

        function linkHandle(instance){
            console.log(instance)
            text = $(`#${instance}Input`).val();
            $(`#${instance}Text`).attr("href", text)
            // $(`#${instance}Text`).html(text);
        }

        var app = angular.module('emailApp', []);

        app.controller('formCtrl', function ($scope) {

            $scope.reset = function () {
                $scope.user = angular.copy($scope.master);
            };
            $scope.reset();

        });

        // copying the completed email signature to user's clipboard
        var clipboard = new ClipboardJS('.btn');

        clipboard.on('success', function (e) {
            $('.copyBtn').html("Copied!");
            e.clearSelection();

            $('.collapse').addClass('show');

            setTimeout(function () {
                $('.copyBtn').html("Copy");
            }, 3000);
        });



        $(document).on('input', '.so_input', function(e){

            $('.so_input').each(function(){
                var name = $(this).attr('name');
                var value = $(this).val();
                if(value == ''){
                    $('.'+name).css("display", "none");
                }else{
                    $('.'+name).css("display", "");
                }

             });
        })


    </script>
@endsection
