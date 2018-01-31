<?php

namespace Pundit;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    /** @var string table name */
    protected $table = 'rating';

    /** @var array fillable attributes */
    protected $fillable = [
        'fundraiser_name',
        'rating',
        'review',
        'reviewer_name',
        'reviewer_email',
        'review_date'
    ];

    /** @var array attribute casting (needed if sqlite is used) */
    protected $casts = [
        'rating' => 'integer'
    ];
}
