<div class="row">
    <div class="col-12 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h4>Kategori Buku ({{ $categories->total() }})</h4>
            </div>
            <div class="card-body">
                @foreach ($categories as $category)
                    <div class="row">
                        <div class="col-10">
                            <div class="d-flex align-items-center">
                                <svg class="bi text-primary" width="32" height="32" fill="blue"
                                    style="width:10px">
                                    <use xlink:href="images/bootstrap-icons.svg#circle-fill" />
                                </svg>
                                <h5 class="mb-0 ms-3">{{ Str::limit($category->name, 15, '...') }}</h5>
                            </div>
                        </div>
                        <div class="col-2">
                            <h5 class="mb-0">{{ count($category->books) }}</h5>
                        </div>
                    </div>
                @endforeach
                <br>
                {{ $categories->links() }}
            </div>
        </div>
    </div>

    @includeIf('partials.body.user.main.chart')
</div>
