<footer>
    <div class="footer clearfix mb-0 text-muted">
        <div class="float-start">
            <p>@lang('footer.copyright', ['year' => date('Y'), 'name' => isset($meta->meta_author) ?: config('app.name')])</p>
        </div>
        <div class="float-end">
            <p>
                Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://github.com/Sleepy4k">Benjamin4k</a>
            </p>
        </div>
    </div>
</footer>
