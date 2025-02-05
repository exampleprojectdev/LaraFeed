<?php

namespace ExampleProject\LaraFeed\Models;

use Illuminate\Database\Eloquent\Model;

class Feedbacks extends Model
{
    protected $fillable = [
        'screenshot', 'page_url', 'feedback',
    ];
}
