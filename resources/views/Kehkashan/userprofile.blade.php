<!-- Edit User Profile Modal -->
<div class="modal fade" id="userProfileModal" tabindex="-1" aria-labelledby="userProfileModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content shadow rounded-4 p-3">

      <div class="modal-header border-0">
        <h4 class="modal-title w-100 text-center" id="userProfileModalLabel">Edit Profile</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        <form action="{{ route('userprofile.update') }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')

          <style>
            .update-button {
              background-color: #39b54a;
              color: white;
            }
            .update-button:hover {
              background-color: #28a745 !important;
              color: white !important;
            }
          </style>


    <!-- Profile Image Preview -->

    <div class="mb-3 text-center">
        <img id="previewImage"
         src="{{ Auth::check() && Auth::user()->profile ? asset('ecoimages/img/' . auth()->user()->profile) : asset('default.png') }}" alt="Profile Image" class="rounded-circle shadow" width="100" height="100" style="object-fit: cover;">
    </div>

    <!-- Image Upload Input -->
     <div class="mb-3">
        <label for="profile" class="form-label">Choose New Profile Image</label>
        <input type="file" name="profile" class="form-control" id="profile" accept="image/*">
    </div>

    <!-- JS for Live Image Preview -->
    <script>
    document.getElementById('profile').addEventListener('change', function (event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('previewImage');
            preview.src = URL.createObjectURL(file);
        }
    });
    </script>


    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ auth()->check() ? auth()->user()->name : ''  }}" required>
    </div>

    <!-- Email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ auth()->check() ? auth()->user()->email : '' }}" required>
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">New Password</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Leave blank to keep current password">
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm New Password</label>
        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
    </div>

    <!-- Submit Button -->
    <button type="submit" class="btn update-button w-100">Update Profile</button>
    </form>
    </div>

    </div>
  </div>
</div>
