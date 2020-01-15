@extends('layouts.app') @section('content')
    <div class="connect">

        <div class="log">
            <div class="contain">
            <!-- <div class="card-header">{{ __('Register') }}</div> -->
                <div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <h1>Créez un compte</h1>

                        <div c>
                            <label for="name">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus> @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="email">{{ __('E-Mail Address') }}</label>

                            <div>
                                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email"> @error('email')
                                <span class="invalid-feedback" role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password">{{ __('Password') }}</label>

                            <div>
                                <input id="password" type="password" name="password" required autocomplete="new-password"> @error('password')
                                <span role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span> @enderror
                            </div>
                        </div>

                        <div>
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div>
                            <div>
                                <button class="bouton" type="submit">
                                    {{ __('Register') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>


            <!--
    <div class="card-header">{{ __('Login') }}</div> -->
                <form class="formconnect" method="POST" action="{{ route('login') }}">
                    @csrf

                    <h1>Sign in</h1>

                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <div>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> @error('email')
                        <span role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span> @enderror
                    </div>

                    <div>
                        <label for="password">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" name="password" required autocomplete="current-password"> @error('password')
                            <span role="alert">
                                                          <strong>{{ $message }}</strong>
                                                      </span> @enderror
                        </div>
                    </div>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a> @endif

                    <div>
                        <div>
                            <div>
                                <input type="checkbox" name="remember" id="remember" {{ old( 'remember') ? 'checked' : '' }}>

                                <label cfor="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div>

                    <div>
                        <div>
                            <button class="bouton" type="submit">
                                {{ __('Login') }}

                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>


@endsection