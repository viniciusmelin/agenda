@extends('layouts._login')

@section('content')
<div class="login-box">
        <div class="login-box-body">
          <p class="login-box-msg">Entrar no Sistema</p>
      
          <form method="POST" action="{{ route('login') }}">
              @csrf
            <div class="form-group has-feedback">
              <label for="email">Email</label>
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="informe o email" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <label for="password">Senha</label>
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="informe a senha" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
              <div class="col-xs-8">
                <div class="checkbox icheck">
                  <label>
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Relembar 
                  </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Entrar</button>
              </div>
            </div>
          </form>

      
        </div>
      </div>
@endsection
