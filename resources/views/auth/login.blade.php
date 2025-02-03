@extends('layouts.web')

@section('content')
    
<div class="row" style="height:600px;">
    <div class="col-md-12 d-flex align-items-center">

        <div class="login-box mx-auto">

          <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg text-center"><strong>INICIO DE SESION</strong></p>

              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-group mb-3">

                </div>
                <div class="input-group mb-3">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="current-password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <div class="icheck-primary">
                      <input type="checkbox" name="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                      <label for="remember">
                        {{ __('Remember') }}
                      </label>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-6">
                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>

              <!-- /.social-auth-links -->

              <p class="mb-1">
                <a href="{{ route('password.request') }}">{{ __('Olvido su contraseña') }}</a>
              </p>

            </div>
            <!-- /.login-card-body -->
          </div>

        </div>

    </div>
</div>      
      
@endsection
