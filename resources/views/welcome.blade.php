@extends('layouts.master')

@section('banner')
    @include('partials.banner')

@stop
@section('content')
    <div class="section section-basic padding-top-0">
        @include('partials.slider')

    </div>
    <div class="section section-basic">
        <div class="container">
            @include('partials.pricing.pricing')
        </div>

    </div>
@stop

@section('scripts')

    <script src='{{url('js/smooth-div-scroll/js/jquery-ui-1.10.3.custom.min.js')}}' type="text/javascript"></script>
    <script src='{{url('js/smooth-div-scroll/js/jquery.mousewheel.min.js')}}' type="text/javascript"></script>
    <script src='{{url('js/smooth-div-scroll/js/jquery.kinetic.min.js')}}' type="text/javascript"></script>
    <script src='{{url('js/smooth-div-scroll/js/jquery.smoothdivscroll-1.3-min.js')}}' type="text/javascript"></script>

    <script type="text/javascript">

        $().ready(function () {
            // the body of this function is in assets/material-kit.js
            window_width = $(window).width();

            if (window_width >= 992) {
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }


            $(document).ready(function () {
                // None of the options are set
                $("#mixedContent").smoothDivScroll({
                    mousewheelScrolling: "allDirections",
                    autoScrollingMode: "always",
                    autoScrollingDirection: "backAndForth",
                    autoScrollingStep: 2,
                    autoScrollingInterval: 25,
                    touchScrolling: true,

                }).bind("mouseover", function () {
                    $(this).smoothDivScroll("stopAutoScrolling");
                }).bind("mouseout", function () {
                    $(this).smoothDivScroll("startAutoScrolling");
                });
            });


        });
    </script>
@endsection