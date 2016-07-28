<?php

namespace Mahmud\Comment;

interface CommentContract{
    public function addComment($user_id, $namespace, $thread_id, $parent_id, $content, $is_approved);
}