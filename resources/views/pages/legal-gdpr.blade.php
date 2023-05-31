@extends('layouts.web', ['nav' => true, 'banner' => false, 'footer' => true, 'cookie' => true, 'setting' => true,
'title' => 'Terms and Conditions'])

@section('content')
<div>
    <section class="text-gray-700 ">
        <div class="container page_wrapper px-5 py-24 mx-auto">
            <div class="text-center page_title mb-20">
                <h1 class="sm:text-3xl text-1xl font-large text-center title-font text-gray-900 mb-4">
                    {{ $termsPage[0]->section_content }}
                </h1>
            </div>

            <div class="flex flex-wrap lg:w-full sm:mx-auto sm:mb-2">
                <div class="w-full lg:w-full">
                    <div class="px-3 lg:px-5 lg:-mt-4 mb-5 lg:mb-0">
                        <p
                            class="mb-5 primary-color-blackish-blue-opacity font-medium md:text-sm 2xl:text-3xl px-4 lg:px-0 2xl:px-4 lg:pr-3 mt-2 lg:-mt-1 2xl:mt-2 2xl:pb-64">
                            {{ $termsPage[1]->section_content }}</p>
                    </div>
                </div>
            </div>
        </div>
        <section>
</div>
@endsection
