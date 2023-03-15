<form action="{{ route('login.store') }}" method="post">
    @csrf

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" value="{{ old('email') }}" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" minlength="8" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>

    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
</form>
