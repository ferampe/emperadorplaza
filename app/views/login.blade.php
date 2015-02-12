<!doctype html>
<html lang="en">
    <head>
            <meta charset="UTF-8">
            <title>Login</title>
            {{-- Imports twitter bootstrap and set some styling --}}
             <!-- Bootstrap Core CSS -->
            {{ HTML::style('backend/css/bootstrap.min.css') }}

    </head>
    <body>

      <div class="container">
          <div class="maincontent">
              <h1>Login</h1>
              <form method="POST" action="{{{ URL::to('/users/login') }}}" accept-charset="UTF-8">
                  <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
                  <fieldset>
                      <div class="form-group">
                          <label for="email">{{{ Lang::get('confide::confide.username_e_mail') }}}</label>
                          <input class="form-control" tabindex="1" placeholder="{{{ Lang::get('confide::confide.username_e_mail') }}}" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
                      </div>
                      <div class="form-group">
                      <label for="password">
                          {{{ Lang::get('confide::confide.password') }}}
                          <small>
                              <a href="{{{ URL::to('/users/forgot_password') }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
                          </small>
                      </label>
                      <input class="form-control" tabindex="2" placeholder="{{{ Lang::get('confide::confide.password') }}}" type="password" name="password" id="password">
                      </div>

                      <div class="form-group">
                          <label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}
                              <input type="hidden" name="remember" value="0">
                              <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
                          </label>
                      </div>
                      @if (Session::get('error'))
                          <div class="alert alert-error">{{{ Session::get('error') }}}</div>
                      @endif

                      @if (Session::get('notice'))
                          <div class="alert">{{{ Session::get('notice') }}}</div>
                      @endif
                      <div class="form-group">
                          <button tabindex="3" type="submit" class="btn btn-default">{{{ Lang::get('confide::confide.login.submit') }}}</button>
                      </div>
                  </fieldset>
              </form>

          </div>
      </div>
    </body>
</html>