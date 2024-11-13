<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Đăng ký tài khoản </title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ url('assets/css/authForm.css') }} ">

  <!-- Boxicons CSS -->
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>
  <section class="container forms">
    <!-- Signup Form -->

    <div class="form signup">
      <div class="form-content">
        <header>Đăng Ký</header>
        <form action="{{ route('account.registerAction') }}" method="POST">
          @csrf
          <div class="field input-field">
            <input id="name" name="name" type="text" placeholder="Nhập tên của bạn" class="input" required>
          </div>
          @error('name')
            <small id="usernameError" class="auth-error" style="color:red;margin-left:5px">{{ $message }}</small>
          @enderror
          
          <div class="field input-field">
            <input id="email" name="email" type="email" placeholder="Nhập Email của bạn" class="input" required>
          </div>
          @error('email')
            <small id="emailError" class="auth-error" style="color:red;margin-left:5px">{{ $message }}</small>
          @enderror
          
          <div class="field input-field">
            <input id="password" name="password" type="password" placeholder="Nhập mật khẩu" class="password pass1" required>
            <i class='bx bx-hide eye-icon'></i>
          </div>
          @error('password')
            <small id="passwordError" class="auth-error" style="color:red;margin-left:5px">{{ $message }}</small>
          @enderror
          
          <div class="field input-field">
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="Nhập lại mật khẩu" class="password pass2" required>
            <i class='bx bx-hide eye-icon'></i>
          </div>
          @error('confirm_password')
            <small id="repasswordError" class="auth-error" style="color:red;margin-left:5px">{{ $message }}</small>
          @enderror

          <div class="field button-field">
            @if (session('success'))
                <span style="color:green">{{ $success }}</span>
            @endif
            @if (session('errors'))
                
                <span style="color:red">{{ $errors }}</span>
            @endif
            <button>Đăng Ký</button>
          </div>
        </form>

        <div class="form-link">
          <span>Đã có tài khoản ? <a href="{{ route('account.loginForm') }}" class="link login-link">Đăng nhập</a></span>
        </div>
      </div>

      <div class="line"></div>

      <div class="media-options">
        <a href="#" class="field google">
        <i class='bx bxl-google google-img'></i>
          <span>Đăng nhập bằng Google</span>
        </a>
      </div>

    </div>
  </section>

  <!-- JavaScript -->
   
  <script src="{{ url('assets/js/authForm.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#usernameError').delay(3000).fadeOut();
            $('#emailError').delay(3000).fadeOut();
            $('#passwordError').delay(3000).fadeOut();
            $('#repasswordError').delay(3000).fadeOut();
        });
    </script>
</body>

</html>