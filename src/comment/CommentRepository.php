<?php

namespace Mahmud\Comment;

class CommentRepository implements CommentContract{
    
    private $commentModel;
    
    function __construct($commentModel){
        $this->commentModel = $commentModel;
    }

    public function addComment($user_id, $thread_id, $parent_id, $content, $is_approved){
        if($user_id == null)        $user_id        = 0;
        if($thread_id == null)      $thread_id      = 0;
        if($parent_id == null)      $parent_id      = 0;
        if($is_approved == null)    $is_approved    = 1;
        if($content == null)        $user_id        = '';


        $this->commentModel->user_id        = $user_id;
        $this->commentModel->thread_id      = $thread_id;
        $this->commentModel->parent_id      = $parent_id;
        $this->commentModel->content        = $content;
        $this->commentModel->is_approved    = $is_approved;
        
        if($this->commentModel->save()){
            return $this->commentModel->id;
        } 
        else{
            return null;
        }

    }
    
}