<title>
    {{ basename(request()->path()) ? ucfirst(basename(request()->path())) . ' |' : '' }} {{ (isset($meta->app_name) ? $meta->app_name : config('app.name')) }}
</title>
