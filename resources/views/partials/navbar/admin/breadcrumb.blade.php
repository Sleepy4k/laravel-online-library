<ol class="breadcrumb">
    @foreach(request()->segments() as $breadcrumb)
        @if ($loop->first)
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">
                    {{ ucfirst($breadcrumb) }}
                </a>
            </li>

            @continue
        @endif

        <li class="breadcrumb-item">{{ ucfirst($breadcrumb) }}</li>

        @if ($loop->last)
            <li class="breadcrumb-item"></li>
        @endif
    @endforeach
</ol>
