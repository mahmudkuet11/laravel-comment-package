<?php

namespace Mahmud\Comment;

interface CommentContract{
    public function addComment($user_id, $namespace, $thread_id, $parent_id, $content, $is_approved);
    public function editComment($comment_id, $content);
    public function deleteComment($comment_id);
    public function approveComment($comment_id);
    public function getComments($offset, $count, $approve_check);
}