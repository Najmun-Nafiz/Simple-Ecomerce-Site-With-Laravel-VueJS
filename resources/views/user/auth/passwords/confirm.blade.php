@include('user.layouts.partial.header')
<div><router-view /></div>
<div class="container-fluid reset-image authenticate">
    <div class="row">
        <div class="col-md-6 p-0">
            <div class="card bg-color">
                <div class="position-set">
                    <div class="card-header bg-transparent border-0 ">
                        <h1 class="card-title font-weight-bold text-white">{{ __('Confirm Password') }}</h1>
                    </div>

                    <div class="card-body">
                        <h3 class="text-white">
                            {{ __('Please confirm your password before continuing.') }}
                        </h3>

                        <form method="POST" action="{{ route('password.confirm') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                                <div class="col-md-8">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Confirm Password') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.layouts.partial.footer')
