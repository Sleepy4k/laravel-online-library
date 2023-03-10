<form action="{{ route('register.store') }}" method="post">
    @csrf

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="text" name="name" class="form-control form-control-xl" placeholder="Name" value="{{ old('name') }}">
        <div class="form-control-icon">
            <i class="bi bi-person"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="number" name="age" class="form-control form-control-xl" placeholder="Age" value="{{ old('age') }}">
        <div class="form-control-icon">
            <i class="bi bi-clock-history"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" value="{{ old('email') }}">
        <div class="form-control-icon">
            <i class="bi bi-envelope"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="number" name="phone" class="form-control form-control-xl" placeholder="Phone" value="{{ old('phone') }}">
        <div class="form-control-icon">
            <i class="bi bi-telephone"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <select name="gender" id="gender" class="form-control form-control-xl">
            @foreach ($genders as $gender)
                <option value="{{ $gender }}">{{ ucfirst($gender) }}</option>
            @endforeach
        </select>
        <div class="form-control-icon">
            <i class="bi bi-gender-ambiguous"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <select name="grade_id" id="grade_id" class="form-control form-control-xl">
            @foreach ($grades as $grade)
                <option value="{{ $grade->id }}">{{ $grade->name() }}</option>
            @endforeach
        </select>
        <div class="form-control-icon">
            <i class="bi bi-trophy"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <label for="address">Address</label>
        <textarea name="address" id="address" cols="57" rows="5" placeholder="Your Home Address">{{ old('address') }}</textarea>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" minlength="8">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>

    <div class="form-group position-relative has-icon-left mb-4">
        <input type="password" name="password_confirmation" class="form-control form-control-xl" placeholder="Confirm Password" minlength="8">
        <div class="form-control-icon">
            <i class="bi bi-shield-lock"></i>
        </div>
    </div>

    <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Sign Up</button>
</form>
