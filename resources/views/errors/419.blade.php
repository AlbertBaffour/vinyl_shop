@extends('layouts.template')

@section('main')
    <h3 class="text-center my-5">419 | <span class="text-black-50">{{ $exception->getMessage() ?: 'Page Expired' }}</span></h3>
   @include('shared.error_page_buttons')
@endsection

@section('script_after')
    <script>
        // Go back to the previous page
        $('#back').click(function () {
            window.history.back();
        });
    </script>
@endsection
{{--php artisan vendor:publish --tag laravel-errors--}}