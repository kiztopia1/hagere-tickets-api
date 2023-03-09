<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuids;

class Event extends Model
{
    use HasFactory;
    use Uuids;
    protected $fillable = [ 'name', 'price', 'date', 'user_id', 'location', 'description', 'overview', 'tags', 'slug', 'refund_policy', 'thumbnail' ];
}
