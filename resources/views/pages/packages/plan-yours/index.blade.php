@extends('pages.layout.app')

@section('title', 'Plan Your Tour Package')

@section('content')

    @if(session()->has('plan_success'))
        <div class="cart-items">
            <p class="noItems ta-center">
                <a class="message" style="color: #20895e"><i
                            class="fa fa-check-circle"></i>&nbsp;{{ session()->get('plan_success') }}</a>
            </p>
            <p>
                <a href="{{ route('home') }}" class="go-home"><i class="fa fa-arrow-left"></i>&nbsp;Go home</a>
            </p>
        </div>
    @else
        <div class="content">
            <div class="content-heading">
                <h2>Plan Your Tour Package</h2>
            </div>

            <div class="contact-form">
                <form action="{{ route('plan.send') }}" method="POST" class="form" enctype="multipart/form-data">
                    <div class="input-block form__group field">
                        <input type="text" id="name" name="name" class="form-inputs form__field"
                               value="{{ old('name') }}" placeholder="Name" required>
                        @if($errors->has('name'))
                            <div class="error">{{ $errors->first('name') }}</div>
                        @endif
                    </div>
                    <div class="input-block form__group field">
                        <input type="text" id="last_name" name="last_name" class="form-inputs form__field"
                               value="{{ old('last_name') }}" placeholder="Last Name" required>
                        @if($errors->has('last_name'))
                            <div class="error">{{ $errors->first('last_name') }}</div>
                        @endif
                    </div>
                    <div class="input-block form__group field">
                        <input type="email" id="email" name="email" class="form-inputs form__field"
                               value="{{ old('email') }}" placeholder="Email Address" required>
                        @if($errors->has('email'))
                            <div class="error">{{ $errors->first('email') }}</div>
                        @endif
                    </div>
                    <div class="input-block form__group field">
                        <input type="text" id="phone" name="phone" class="form-inputs form__field"
                               value="{{ old('phone') }}" placeholder="Phone Number" required>
                        @if($errors->has('phone'))
                            <div class="error">{{ $errors->first('phone') }}</div>
                        @endif
                    </div>
                    <div class="input-block form__group field">
                        <input type="text" onfocus="this.type = 'date'" id="date_start" name="date_start"
                               class="form-inputs form__field" value="{{ old('date_start') }}"
                               placeholder="Start Dating" required>
                        @if($errors->has('date_start'))
                            <div class="error">{{ $errors->first('date_start') }}</div>
                        @endif
                    </div>
                    <div class="input-block form__group field">
                        <input type="text" onfocus="this.type = 'date'" id="date_end" name="date_end"
                               class="form-inputs form__field" value="{{ old('date_end') }}" placeholder="End Dating"
                               required>
                        @if($errors->has('date_end'))
                            <div class="error">{{ $errors->first('date_end') }}</div>
                        @endif
                    </div>
                    <div class="input-block form__group field">
                        <input type="number" id="quantity" name="quantity" class="form-inputs form__field"
                               value="{{ old('quantity') }}" placeholder="Number of participants" required>
                        @if($errors->has('quantity'))
                            <div class="error">{{ $errors->first('quantity') }}</div>
                        @endif
                    </div>
                    <hr/>
                    <div class="input-block form__group field checkbox-input">
                        <h5>Accent of The Tour</h5>
                    </div>
                    @foreach($tours as $tour)
                        <div class="input-block form__group field checkbox-input">
                            <input type="checkbox" name="accent[]" id="box{{ $tour->id }}" value="{{ $tour->id }}" class="form-inputs">&nbsp;<label for="box{{ $tour->id }}">{{ ucwords($tour->getTranslation('en')->title) }}</label>
                        </div>
                    @endforeach
                    <hr/>
                    <div class="input-block form__group field">
                        <textarea name="message" id="message" cols="30" rows="5" class="form-inputs form__field"
                                  placeholder="Message" required>{{ old('message') }}</textarea>
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