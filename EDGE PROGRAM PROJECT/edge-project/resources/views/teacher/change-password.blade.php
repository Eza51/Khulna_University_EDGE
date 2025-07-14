@extends('teacher.layouts.master')
@section('content')
<!-- Author: Nowshin Eza - Admin Login page for the Academic Management System -->
<div class="content-wrapper">

  <!-- Page Header -->
  {{-- // Note: This is a partial version of the original project.
// Some parts of the source code have been removed for privacy/security reasons.
 --}}
              <!-- Submit Button -->
              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Change Password</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
</div>
@endsection

@section('customJs')
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script>
  $(function () {
    bsCustomFileInput.init();
  });
</script>
@endsection
