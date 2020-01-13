@extends('pages.layout.app')

@section('title', ucwords($tour->getTranslation('en')->title))

@section('content')

    <div class="tour-content">
        <div class="tour-title">
            <h2>{{ ucwords($tour->getTranslation()->title) }}</h2>
        </div>
        <div id="array" style="display: none"
             data-array="{{ json_encode($tour->children->pluck('id')->toArray()) }}"></div>
        {{--        @if(count($tour->children))--}}
        <div class="tour-children">
{{--            <div class="tab">--}}
{{--                @foreach($tour->children as $tour)--}}
{{--                    <button class="tablinks" id="defaultOpen"--}}
{{--                            onclick="openTab(event, 'tab{{$tour->id}}')">{{ ucwords($tour->getTranslation('en')->title) }}</button>--}}
{{--                @endforeach--}}
{{--            </div>--}}
            <div id="tab{{ $tour->id }}" class="tabcontent">
            @if(count($tour->images))

                    <div id="jssor_{{ $tour->id }}"
                         style="position:relative;margin:0 auto;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;visibility:hidden;">
                        <!-- Loading Screen -->
                        <div data-u="loading" class="jssorl-009-spin"
                             style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
                            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;"
                                 src="{{ asset('img/slider/spin.svg') }}"/>
                        </div>
                        <div data-u="slides"
                             style="cursor:default;position:relative;top:0px;left:0px;width:1300px;height:500px;overflow:hidden;">
                                <div>
                                    <img data-u="image" src="{{ asset('img/tours/'.$tour->images[0]->name) }}"/>
                                </div>
                        </div>
                        <!-- Bullet Navigator -->
                        <div data-u="navigator" class="jssorb032" style="position:absolute;bottom:12px;right:12px;"
                             data-autocenter="1"
                             data-scale="0.5" data-scale-bottom="0.75">
                            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                                <svg viewbox="0 0 16000 16000"
                                     style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                                </svg>
                            </div>
                        </div>
                        <!-- Arrow Navigator -->
                        <div data-u="arrowleft" class="jssora051" style="width:65px;height:65px;top:0px;left:25px;"
                             data-autocenter="2"
                             data-scale="0.75" data-scale-left="0.75">
                            <svg viewbox="0 0 16000 16000"
                                 style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
                            </svg>
                        </div>
                        <div data-u="arrowright" class="jssora051" style="width:65px;height:65px;top:0px;right:25px;"
                             data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
                            <svg viewbox="0 0 16000 16000"
                                 style="position:absolute;top:0;left:0;width:100%;height:100%;">
                                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
                            </svg>
                        </div>
                    </div>
                @endif

            </div>

            <p>{!! $tour->getTranslation()->description !!}</p>
        </div>
        {{--        @endif--}}

    </div>

@endsection

@push('scripts')
    <script type="text/javascript">
        document.getElementById("defaultOpen").click();

        function openTab(evt, tab_id) {
            // Declare all variables
            let i, tabcontent, tablinks;

            // Get all elements with class="tabcontent" and hide them
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Get all elements with class="tablinks" and remove the class "active"
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Show the current tab, and add an "active" class to the button that opened the tab
            document.getElementById(tab_id).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>
    <script type="text/javascript">
        let quantity = $('#array').data('array');
        quantity.forEach(function (id) {
            (window.jssor_1_slider_init = function () {

                let jssor_1_SlideoTransitions = [
                    [{b: 900, d: 2000, x: -379, e: {x: 7}}],
                    [{b: 900, d: 2000, x: 0, e: {x: 7}}],
                    [{b: -1, d: 1, sX: 3, sY: 3}, {
                        b: 0,
                        d: 900,
                        x: 283,
                        y: 135,
                        o: 1,
                        sX: 1,
                        sY: 1,
                        e: {x: 3, y: 3, sX: 3, sY: 3}
                    }, {b: 900, d: 1600, x: 0, o: 0, e: {x: 16}}]
                ];

                let jssor_1_options = {
                    $AutoPlay: 1,
                    $SlideDuration: 800,
                    $SlideEasing: $Jease$.$OutQuint,
                    $CaptionSliderOptions: {
                        $Class: $JssorCaptionSlideo$,
                        $Transitions: jssor_1_SlideoTransitions
                    },
                    $ArrowNavigatorOptions: {
                        $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                        $Class: $JssorBulletNavigator$
                    }
                };
                let jssor_1_slider = new $JssorSlider$("jssor_" + id, jssor_1_options);

                /*#region responsive code begin*/

                let MAX_WIDTH = 3000;

                function ScaleSlider() {
                    let containerElement = jssor_1_slider.$Elmt.parentNode;
                    let containerWidth = containerElement.clientWidth;

                    if (containerWidth) {

                        let expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                        jssor_1_slider.$ScaleWidth(expectedWidth);
                    } else {
                        window.setTimeout(ScaleSlider, 30);
                    }
                }

                ScaleSlider();

                $Jssor$.$AddEvent(window, "load", ScaleSlider);
                $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                /*#endregion responsive code end*/
            }).call();
        })

    </script>
@endpush
