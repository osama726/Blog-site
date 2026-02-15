<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use HasUuids;
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;
    // protected $table = 'post'; // Specify custom table name if different from 'posts'
    protected $fillable = [ 'title', 'content', 'published' ]; // Allow mass assignment for these fields

    protected $guarded = ['id']; // Prevent mass assignment for the 'id' field

    public function comments() {
        return $this->hasMany(Comment::class);  // One-to-Many relationship with Comment model
    }
    public function tags() {
        return $this->belongsToMany(Tag::class);  // Many-to-Many relationship with Tag model
    }
}
