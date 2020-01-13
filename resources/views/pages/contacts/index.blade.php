@extends('pages.layout.app')

@section('title', 'Contact Us')

@section('content')

    @if(session()->has('success'))
        <div class="cart-items">
            <p class="noItems ta-center">
                <a class="message" style="color: #20895e"><i class="fa fa-check-circle"></i>&nbsp;{{ session()->get('success') }}</a>
            </p>
            <p>
                <a href="{{ route('home') }}" class="go-home"><i class="fa fa-arrow-left"></i>&nbsp;Go home</a>
            </p>
        </div>
    @else
    <div class="contact-content">
        <div class="contact-heading">
            <h2>Contact Form</h2>
        </div>

        <div class="contact-form">
            <form action="{{ route('contacts.send') }}" method="POST" class="form" enctype="multipart/form-data">
                <div class="input-block form__group field">
                    {{--<label class="form__label" for="name">First Name</label>--}}
                    <input type="text" id="name" name="name" class="form-inputs form__field" value="{{ old('name') }}" placeholder="Name" required>
                    @if($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="input-block form__group field">
                    {{--<label class="form__label" for="last_name">Last Name</label>--}}
                    <input type="text" id="last_name" name="last_name" class="form-inputs form__field" value="{{ old('last_name') }}" placeholder="Last Name" required>
                    @if($errors->has('last_name'))
                        <div class="error">{{ $errors->first('last_name') }}</div>
                    @endif
                </div>
                <div class="input-block form__group field">
                    {{--<label class="form__label" for="email">Email Address</label>--}}
                    <input type="email" id="email" name="email" class="form-inputs form__field" value="{{ old('email') }}" placeholder="Email Address" required>
                    @if($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="input-block form__group field">
                    {{--<label class="form__label" for="phone">Phone Number</label>--}}
                    <input type="text" id="phone" name="phone" class="form-inputs form__field" value="{{ old('phone') }}" placeholder="Phone Number" required>
                    @if($errors->has('phone'))
                        <div class="error">{{ $errors->first('phone') }}</div>
                    @endif
                </div>
                <div class="input-block form__group field">
                    {{--<label class="form__label" for="message">Message</label>--}}
                    <textarea name="message" id="message" cols="30" rows="5" class="form-inputs form__field" placeholder="Message" required>{{ old('message') }}</textarea>
                    @if($errors->has('message'))
                        <div class="error">{{ $errors->first('message') }}</div>
                    @endif
                </div>
                <div class="input-block form__group field">
                    <button type="submit" class="form_button">Send</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
    @endif

@endsection