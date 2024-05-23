<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;

class Category extends Model
{
    use HasFactory;
    use HasRecursiveRelationships;

    public function activities(): BelongsToMany
    {
        return $this->belongsToMany(Post::class);
    }

    public function descendantPosts()
    {
        return $this->belongsToManyOfDescendants(Post::class);
    }
}
