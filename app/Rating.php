<?php

namespace Pundit;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';

    protected $fillable = [
        'fundraiser_name',
        'rating',
        'review',
        'reviewer_name',
        'reviewer_email',
        'review_date'
    ];

    protected $casts = [
        'rating' => 'integer'
    ];
}
