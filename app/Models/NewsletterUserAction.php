<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterUserAction extends Model
{
    use HasFactory;

	protected $fillable = ['newsletter_user_id', 'action_type'];
}
