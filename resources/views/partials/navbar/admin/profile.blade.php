<div class="dropdown">
    <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="user-menu d-flex">
            <div class="user-name text-end me-3">
                <h6 class="mb-0 text-gray-600">{{ auth()->user()->name }}</h6>
                <p class="mb-0 text-sm text-gray-600">{{ ucfirst(auth()->user()->getRoleNames()[0]) }}</p>
            </div>
            <div class="user-img d-flex align-items-center">
                <div class="avatar avatar-md">
                    <img src="{{ asset('images/faces/1.jpg') }}">
                </div>
            </div>
        </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="icon-mid bi bi-box-arrow-left me-2"></i>{{ __('Logout') }}
        </a>
    </ul>
</div>
