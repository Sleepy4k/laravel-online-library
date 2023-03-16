<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('landing') }}">Dashboard</a></li>

    @foreach (request()->segments() as $breadcrumb)
        @if ($breadcrumb != 'dashboard')
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($breadcrumb) }}</li>
        @endif
    @endforeach

    <li class="breadcrumb-item"></li>
</ol>
