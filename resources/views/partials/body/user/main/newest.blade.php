<div class="card">
    <div class="card-header">
        <h4>Buku Terbaru</h4>
    </div>
    <div class="card-content pb-4">
        @foreach ($books->take(3) as $book)
            <div class="recent-message d-flex px-4 py-3">
                <div class="name ms-4">
                    <h5 class="mb-1">{{ $book->title }}</h5>
                    <h6 class="text-muted mb-0"><b>Penulis</b> : {{ $book->author->name }}</h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
