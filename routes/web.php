<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    dd(
        Category::query()
            ->whereNull('parent_id')
            ->with('descendantPosts')
            ->withCount([
                'children',
                'descendantPosts',
            ])
            ->get()
    );
});
