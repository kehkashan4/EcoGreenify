<style>
    .header-color{
        background-color: #023d54;
        color: white;
    }
    .login-button{
        background-color: #39b54a;
        color: white;
        width: 35%;
    }
    .login-button:hover{
        background-color: #28a745 !important;
        color: white !important;
      }
    .register-button{
        background-color: #39b54a;
        color: white;
        width: 35%;
    }
    .register-button:hover{
        background-color: #28a745 !important;
        color: white !important;
      }
</style>

<!-- Login Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header header-color">
        <h5 class="modal-title w-100 text-center" id="loginModalLabel">{{ __('Login Form') }}</h5>
        <button type="button" class="btn-close p-2" style=" filter: invert(1); border: none; background-color: transparent; outline: none;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

<div class="modal-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="row mb-2">
           <div class="col-md-8 mx-auto">
               <label for="email" class="form-label">{{ __('Email Address') }}</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span id="email-error" class="text-danger d-none"></span>
           </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-8 mx-auto">
            <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <span id="password-error" class="text-danger d-none"></span>

                    <button type="submit" class="btn mt-3 login-button">
                        {{ __('Login') }}
                    </button>

            </div>
        </div>

        <div class="row mb-2">
            <div class="col-md-6 mx-auto">
                @if (Route::has('password.request'))
                    <a class="btn btn-link d-inline-block" style="white-space: nowrap;" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 mx-auto">
                <label for="register" class="me-3">Don't Have an Account?</label>
                    @if (Route::has('register'))
                        <a class="btn register-button" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">{{ __('Register') }}</a>
                    @endif
            </div>
        </div>
    </form>

<!-- JavaScript for Email Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const emailInput = document.getElementById('email');
        const errorDisplay = document.getElementById('email-error');

        emailInput.addEventListener('blur', function () {
            const email = this.value.trim();

            errorDisplay.classList.add('d-none');
            errorDisplay.textContent = '';

            if (email === '') {
                errorDisplay.textContent = 'Please enter your Email Address.';
                errorDisplay.classList.remove('d-none');
                return;
            }

            const emailPattern = /^[a-zA-Z0-9]+@gmail\.com$/;
            if (!emailPattern.test(email)) {
                errorDisplay.textContent = 'Email Address must be valid (e.g: example@gmail.com).';
                errorDisplay.classList.remove('d-none');
                return;
            }
        });
    });
</script>

<!-- JavaScript for Password Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById('password');
        const errorDisplay = document.getElementById('password-error');

        passwordInput.addEventListener('blur', function () {
            const password = this.value.trim();
            errorDisplay.classList.add('d-none');
            errorDisplay.textContent = '';

            if (password === '') {
                errorDisplay.textContent = 'Password field cannot be empty.';
                errorDisplay.classList.remove('d-none');
                return;
            }

            const isStrong = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8}$/.test(password);
            if (!isStrong) {
                errorDisplay.textContent = 'Please enter an 8-character password with at least one letter, one number and one symbol.';
                errorDisplay.classList.remove('d-none');
                return;
            }
        });
    });
</script>
</div>

    </div>
  </div>
</div>
