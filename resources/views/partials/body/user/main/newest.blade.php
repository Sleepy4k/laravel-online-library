<div class="card">
    <div class="card-header">
        <h4>Buku Terbaru</h4>
    </div>
    <div class="card-content">
        @foreach ($books->take(4) as $book)
            <div class="recent-message d-flex px-4 py-3">
                <div class="name ms-4">
                    <h5 class="mb-1">{{ Str::limit($book->title, 20, '...') }}</h5>
                    <h6 class="text-muted mb-0"><b>Penulis</b> : {{ Str::limit($book->author->name, 18, '...') }}</h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
