<footer>
    <div class="social">
        <ul>
            <li><a href=""><img src="{{ asset('img/social/fb.png') }}" alt=""></a></li>
            <li><a href=""><img src="{{ asset('img/social/instagram.png') }}" alt=""></a></li>
            <li><a href=""><img src="{{ asset('img/social/youtube.png') }}" alt=""></a></li>
        </ul>
    </div>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">@lang('navigation.home')</a></li>
            <li><a href="">@lang('navigation.about')</a></li>
            <li><a href="">Tours</a></li>
            <li><a href="">Our Services</a></li>
            <li><a href="">@lang('navigation.contact')</a></li>
            <li><a href="">Terms and Conditions</a></li>
            <li><a href="">Privacy Policy</a></li>
        </ul>
    </nav>
    <div class="copyright">
        <span>Copyright &copy; {{ date('Y') }} Mapping LLC. All rights reserved</span>
    </div>
</footer>