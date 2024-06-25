<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attachment extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'uploaded_user_id', 'attachmentable_id', 'attachmentable_type',
        'url', 'state','label', 'file', 'content_type',
    ];
}
