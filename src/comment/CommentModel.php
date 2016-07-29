<?php

namespace Mahmud\Comment;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model{
    
    protected $table = 'mahmud_comments';

    protected $fillable = ['content', 'is_approved'];
    
}