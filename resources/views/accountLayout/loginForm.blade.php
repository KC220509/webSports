<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Đăng nhập </title>

  <!-- CSS -->
  <link rel="stylesheet" href="{{ url('assets/css/authForm.css') }}">

  <!-- Boxicons CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

</head>

<body>
  <section class="container forms">
    <div class="form login">
      <div class="form-content">
        <header>Đăng Nhập</header>
        <form action="{{ route('account.loginAction') }}" method="POST">
          @csrf

          <div class="field input-field">
            <input id="email" name="email" type="email" placeholder="Email" class="input">
          </div>

          <div class="field input-field">
            <input id="password" name="password" type="password" placeholder="Password" class="password">
            <i class='bx bx-hide eye-icon'></i>
          </div>

          <div class="form-link">
            <a href="#" class="forgot-pass">Quên mật khẩu?</a>
          </div>

          <div class="field button-field">
            @if(session('errors'))
              <span>{{ session('errors') }}</span>
            @endif
            <button>Đăng nhập</button>
          </div>
        </form>

        <div class="form-link">
          <span>Chưa có tài khoản ? <a href="{{ route('account.registerForm') }}" class="link signup-link">Đăng ký</a></span>
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
</body>

</html>