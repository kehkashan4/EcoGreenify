<style>
    .header-color {
        background-color: #023d54;
        color: white;
    }
    .register-button {
        background-color: #39b54a;
        color: white;
    }
    .register-button:hover {
        background-color: #28a745 !important;
        color: white !important;
    }
</style>

<!-- Register Modal -->
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <div class="modal-header header-color">
        <h5 class="modal-title w-100 text-center" id="registerModalLabel">{{ __('Registration Form') }}</h5>
        <button type="button" class="btn-close p-2" style=" filter: invert(1); border: none; background-color: transparent; outline: none;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">

      <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
      @csrf

    <!-- Name Field -->
    <div class="row mb-2">
        <div class="col-md-8 mx-auto">
        <label for="name" class="col-form-label">{{ __('Enter Name') }}</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

        <!-- Blade error -->
        @error('name')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <!-- JS Error -->
        <small id="name-error" class="text-danger d-none"></small>
        </div>
    </div>

    <!-- Email -->
    <div class="row mb-2">
        <div class="col-md-8 mx-auto">
        <label for="email" class="col-form-label">{{ __('Email Address') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

        @error('email')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <small id="email-error" class="text-danger d-none"></small>
        </div>
    </div>

    <!-- Password -->
    <div class="row mb-2">
        <div class="col-md-8 mx-auto">
        <label for="password" class="col-form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

        @error('password')
            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror

        <small id="password-error" class="text-danger d-none"></small>
        </div>
    </div>

    <!-- Confirm Password -->
    <div class="row mb-2">
        <div class="col-md-8 mx-auto">
        <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

        <small id="confirm-password-error" class="text-danger d-none"></small>

        </div>
    </div>

    <!-- Profile Image -->
    <div class="row mb-2">
        <div class="col-md-8 mx-auto">
        <label for="profile" class="col-form-label">Select Profile Image</label>
            <input id="profile" type="file" class="form-control @error('profile') is-invalid @enderror" name="profile" accept="image/*">

            <img id="profile-preview" src="#" alt="Preview" class="mt-3" style="display: none; max-width: 100px; max-height: 100px;"/>

            @error('profile')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
            @enderror

             <button type="submit" class="btn mt-3 register-button">{{ __('Register') }}</button>
        </div>
    </div>
</form>

<!-- JavaScript for Name Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const nameInput = document.getElementById('name');
        const errorDisplay = document.getElementById('name-error');

        nameInput.addEventListener('blur', function () {
            const name = this.value.trim();
            errorDisplay.classList.add('d-none');
            errorDisplay.textContent = '';

              if (name === '') {
                errorDisplay.textContent = 'Please enter your name (at least 3 characters)';
                errorDisplay.classList.remove('d-none');
                return;
            }

              if (/[^a-zA-Z ]/.test(name)) {
                errorDisplay.textContent = 'Numbers or Special Characters are not allowed';
                errorDisplay.classList.remove('d-none');
                return;
            }

            if (/\s{2,}/.test(name)) {
                errorDisplay.textContent = 'Only one space is allowed between words';
                errorDisplay.classList.remove('d-none');
                return;
            }

             const words = name.split(' ');
               for (let word of words) {
                if (word.length < 3) {
                    errorDisplay.textContent = 'Name must have at least 3 characters';
                    errorDisplay.classList.remove('d-none');
                    return;
                }
            }


        });
    });
</script>

<!-- JavaScript for Email Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const emailInput = document.getElementById('email');

        emailInput.addEventListener('blur', function () {
            const email = this.value.trim();
            let errorDisplay = this.nextElementSibling;

            errorDisplay.classList.add('d-none');
            errorDisplay.textContent = '';

            if (email === '') {
                errorDisplay.textContent = 'Please enter your Email Address';
                errorDisplay.classList.remove('d-none');
                return;
            }

            const emailPattern = /^[a-zA-Z0-9]+@gmail\.com$/.test(email);
            if (!emailPattern) {
                errorDisplay.textContent = 'Email Address must be valid (e.g: example@gmail.com)';
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
                errorDisplay.textContent = 'Password field cannot be empty';
                errorDisplay.classList.remove('d-none');
                return;
            }

            const isStrong = /^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8}$/.test(password);
            if (!isStrong) {
                errorDisplay.textContent = 'Please enter an 8-character password with at least one letter, one number and one symbol';
                errorDisplay.classList.remove('d-none');
                return;
            }
        });
    });
</script>

<!-- JavaScript for Confirm Password Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password-confirm');
        const errorDisplay = document.getElementById('confirm-password-error');

        confirmPasswordInput.addEventListener('blur', function () {
            const password = passwordInput.value.trim();
            const confirmPassword = this.value.trim();

            errorDisplay.classList.add('d-none');
            errorDisplay.textContent = '';

            if (confirmPassword === '') {
                errorDisplay.textContent = 'Please Confirm your password. This field cannot be empty';
                errorDisplay.classList.remove('d-none');
                return;
            }

            if (confirmPassword !== password) {
                errorDisplay.textContent = 'Passwords do not match';
                errorDisplay.classList.remove('d-none');
                return;
            }
        });
    });
</script>

<!-- JavaScript for Profile Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const profileInput = document.getElementById('profile');
        const preview = document.getElementById('profile-preview');

        profileInput.addEventListener('change', function () {
            const file = this.files[0];
            const errorDisplay = document.createElement('small');
            errorDisplay.className = 'text-danger mt-1';
            errorDisplay.id = 'profile-error';

            const oldError = document.getElementById('profile-error');
            if (oldError) oldError.remove();

            preview.style.display = 'none';
            preview.src = '';

            if (!file) return;

            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg','image/gif'];
            if (!allowedTypes.includes(file.type)) {
                errorDisplay.textContent = 'JPG, PNG, JPEG, and GIF images are allowed';
                profileInput.parentNode.appendChild(errorDisplay);
                this.value = '';
                return;
            }

            const maxSize = 2 * 1024 * 1024;
            if (file.size > maxSize) {
                errorDisplay.textContent = 'Image size must be less than 2MB';
                profileInput.parentNode.appendChild(errorDisplay);
                this.value = '';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(file);
        });
    });
</script>
 </div>

    </div>
  </div>
</div>
