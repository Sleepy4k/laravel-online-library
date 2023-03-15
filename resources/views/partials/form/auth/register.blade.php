<form action="{{ route('register.store') }}" method="post">
    @csrf

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" name="name" class="form-control form-control-xl" placeholder="Name" value="{{ old('name') }}" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="number" name="age" class="form-control form-control-xl" placeholder="Age" value="{{ old('age') }}" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-clock-history"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" value="{{ old('email') }}" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="number" name="phone" class="form-control form-control-xl" placeholder="Phone" value="{{ old('phone') }}" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-telephone"></i>
        </div>
    </div>

    <div class="form-group position-relative mb-4">
        <label for="gender">Gender</label>
        <select name="gender" id="gender" class="choices form-select form-control form-control-xl" required autofocus>
            @foreach ($genders as $gender)
                <option value="{{ $gender }}">{{ ucfirst($gender) }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <label for="grade_id">Grade</label>
        <select name="grade_id" id="grade_id" class="choices form-select form-control form-control-xl" required autofocus>
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}">{{ $grade->name() }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <textarea name="address" id="address" class="form-control" placeholder="Your Home Address" required autofocus>{{ old('address') }}</textarea>
        <div class="form-control-icon">
            <i class="bi bi-house"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" minlength="8" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" name="password_confirmation" class="form-control form-control-xl" placeholder="Confirm Password" minlength="8" required autofocus>
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>

    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
</form>
