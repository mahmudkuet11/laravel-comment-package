<?php

namespace Mahmud\Comment;

use Mockery\CountValidator\Exception;

class CommentRepository implements CommentContract{
    
    private $commentModel;
    
    function __construct($commentModel){
        $this->commentModel = $commentModel;
    }

    public function addComment($user_id, $namespace, $thread_id, $parent_id, $content, $is_approved){
        if($user_id == null)        $user_id        = 0;
        if($thread_id == null)      $thread_id      = 0;
        if($parent_id == null)      $parent_id      = 0;
        if($is_approved == null)    $is_approved    = 1;
        if($content == null)        $user_id        = '';


        $this->commentModel->user_id        = $user_id;
        $this->commentModel->namespace      = $namespace;
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

    public function editComment($comment_id, $content){
        $comment = $this->commentModel->find($comment_id);
        if($comment == null){
            throw new Exception("Comment not found with id : {$comment_id}");
        }
        else{
            return $comment->update(['content' => $content]);

        }
    }

    public function deleteComment($comment_id){
        $comment = $this->commentModel->find($comment_id);
        if($comment == null){
            throw new Exception("comment not found with id : {$comment_id}");
        }else{
            return $comment->delete();
        }
    }

    public function approveComment($comment_id){
        $comment = $this->commentModel->find($comment_id);
        if($comment == null){
            throw new Exception("Comment not found with id : {$comment_id}");
        }
        else{
            return $comment->update(['is_approved' => 1]);

        }
    }
    
}