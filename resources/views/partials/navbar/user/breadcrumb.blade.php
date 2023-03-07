<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('landing.index') }}">Dashboard</a></li>
    @foreach (request()->segments() as $breadcrumb)
        @if ($breadcrumb != 'dashboard')
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($breadcrumb) }}</li>
        @else
            <li class="breadcrumb-item active" aria-current="page"></li>
            @break
        @endif
    @endforeach
</ol>
