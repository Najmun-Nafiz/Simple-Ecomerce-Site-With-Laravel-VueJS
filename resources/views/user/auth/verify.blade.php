@include('user.layouts.partial.header')
<div><router-view /></div>
<div class="container-fluid verify-image authenticate">
    <div class="row justify-content-center">
        <div class="col-md-8 pt-3">
            <div class="card bg-color">
                <div class="position-set">
                    <div class="card-header bg-transparent border-0">
                        <h1 class="card-title text-white">{{ __('Verify Your Email Address') }}</h1>
                    </div>

                    <div class="card-body pt-0">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('A fresh verification link has been sent to your email address.') }}
                            </div>
                        @endif
                        <h4 class="text-white">
                        {{ __('Before starting to use our application, please check your email address for a verification link.') }}
                        {{ __('If you did not receive the email') }},
                        </h4>

                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                <h3 class="text-warning">{{ __('click here to request another') }}</h3>
                            </button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('user.layouts.partial.footer')
