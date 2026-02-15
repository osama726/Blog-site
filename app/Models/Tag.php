<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [ 'title' ]; // Allow mass assignment for these fields

    protected $guarded = ['id']; // Prevent mass assignment for the 'id' field

    public function posts() {
        return $this->belongsToMany(Post::class);
    }
}
