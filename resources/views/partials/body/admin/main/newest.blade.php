<div class="card">
    <div class="card-header">
        <h4>Buku Terbaru</h4>
    </div>
    @foreach ($books->take(5) as $book)
        <div class="card-content pb-4">
            <div class="recent-message d-flex px-4 py-3">
                <div class="name ms-4">
                    <h5 class="mb-1">{{ Str::limit($book->title, 20, '...') }}</h5>
                    <h6 class="text-muted mb-0"><b>Penulis</b> : {{ Str::limit($book->author->name, 18, '...') }}</h6>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="card">
    <div class="card-header">
        <h4>Peminjaman Terbaru</h4>
    </div>
    @foreach ($loans->take(5) as $loan)
        <div class="card-content pb-4">
            <div class="recent-message d-flex px-4 py-3">
                <div class="name ms-4">
                    <h5 class="mb-1">{{ Str::limit($loan->book->title, 20, '...') }}</h5>
                    <h6 class="text-muted mb-0"><b>Peminjam</b> : {{ Str::limit($loan->user->name, 18, '...') }}</h6>
                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="card">
    <div class="card-header">
        <h4>Kategori Terbaru</h4>
    </div>
    <div class="card-body">
        @foreach ($categories->take(5) as $category)
            <div class="card-content pb-4">
                <div class="recent-message d-flex px-4 py-3">
                    <div class="name ms-4">
                        <h5 class="mb-1">{{ Str::limit($category->name, 20, '...') }}</h5>
                        <h6 class="text-muted mb-0"><b>Jumlah buku </b> : {{ count($category->books) }} buku</h6>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
