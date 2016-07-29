<?php

namespace Mahmud\Comment;

use Mockery\CountValidator\Exception;
use Validator;

class Comment{

    private $commentRepository;

    function __construct(){
        $this->commentRepository = new CommentRepository(new CommentModel());
    }

    public function addComment($params){
        $validator = Validator::make($params, [
                            'user_id'       =>  'integer',
                            'namespace'     =>  'required|string',
                            'thread_id'     =>  'integer',
                            'parent_id'     =>  'integer',
                            'is_approved'   =>  'boolean',
                            'content'       =>  'required|string',
                        ]);
        if($validator->fails()){
            return $validator->errors();
        }else{
            if(!array_has($params, 'user_id'))      $params['user_id']      = 0;
            if(!array_has($params, 'thread_id'))    $params['thread_id']    = 0;
            if(!array_has($params, 'parent_id'))    $params['parent_id']    = 0;
            if(!array_has($params, 'is_approved'))  $params['is_approved']  = 1;
            
            return $this->commentRepository->addComment($params['user_id'], $params['namespace'], $params['thread_id'], $params['parent_id'], $params['content'], $params['is_approved']);
        }
    }
    
    public function editComment($params){
        $validator = Validator::make($params, [
            'comment_id'    =>  'required|integer',
            'content'       =>  'required|string'
        ]);
        
        if($validator->fails()){
            return ['status_code'=>'500', 'status_text'=>'validation error', 'message'=>$validator->errors()];
        }else{
            $comment_id = $params['comment_id'];
            $content    = $params['content'];
            try{
                if($this->commentRepository->editComment($comment_id, $content) == true){
                    return ['status_code'=>'200', 'status_text'=>'success','message'=>'comment is updated'];
                }
            }catch (Exception $e){
                return ['status_code'=>'501', 'status_text'=>'error', 'message'=>$e->getMessage()];
            }
        }
    }
    
}