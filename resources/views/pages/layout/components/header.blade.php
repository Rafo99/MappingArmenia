<header>
    <div id="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('img/logo.png') }}" class="header_logo" alt="Logo"></a>
    </div>
    <nav id="menu">
        <ul>
            <li><a href="{{ route('home') }}">@lang('navigation.home')</a></li>
            <li class="submenu-title">
                <a onclick="event.preventDefault()">
                    @lang('navigation.armenia_tours')
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="submenu-content">
                    <ul class="menu">
                        @foreach($tours as $tour)
                            <li class="has-submenu">
                                <a href="{{ route('tour.show', $tour->id) }}"
                                   class="menu-link">{{ $tour->getTranslation('en')->title }}
                                    @if(count($tour->children)) <i class="fa fa-caret-right"></i> @endif
                                </a>
                                @if(count($tour->children))
                                    <div class="submenu-content-second">
                                        <ul>
                                            @foreach($tour->children as $child)
                                                <li><a href="{{ route('tour.show', $child->id) }}"
                                                       class="menu-link">{{ $child->getTranslation('en')->title }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </li>
                        @endforeach

                    </ul>
                </div>
            </li>
            <li class="submenu-title">
                <a onclick="event.preventDefault()">
                    @lang('navigation.tour_packages')
                    <i class="fa fa-caret-down"></i>
                </a>
                <div class="submenu-content">
                    <ul class="menu">
                        <li><a href="{{ route('packages') }}" class="menu-link">Our Tour Packages</a></li>
                        <li><a href="{{ route('plan.package') }}" class="menu-link">Plan Your Tour Package</a></li>
                    </ul>
                </div>
            </li>
            <li><a href="{{ route('order') }}">@lang('navigation.order_tour')</a></li>
            <li><a href="{{ route('blog') }}">@lang('navigation.about_armenia')</a></li>
            {{--<li><a href="{{ route('about') }}">@lang('navigation.about')</a></li>--}}
            <li><a href="{{ route('contacts') }}">@lang('navigation.contact')</a></li>
        </ul>
    </nav>
    <div id="language">
        <div class="language-dropdown">
            <button class="dropdown">
                <img src="{{ asset('img/flags/'.LaravelLocalization::getCurrentLocale().'.png') }}" alt="">
                &nbsp;<i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <a rel="alternate" hreflang="{{ $localeCode }}"
                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                        <img src="{{ asset('img/flags/'.$properties['flag']) }}" alt="">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</header>