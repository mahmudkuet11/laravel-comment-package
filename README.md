# laravel-comment-package
This is package for simple comment system

# Usage:
### Add Comment

```php
use Comment;
.....
.....

$params = [
  'user_id'   =>  1,				//integer (default = 0)
  'namespace' =>  'group_comment',	//required, string
  'parent_id' =>  1,				//integer (default = 0)
  'thread_id' =>  2,				//integer (default = 0)
  'content'   =>  'asd'				//required, string
];
return Comment::addComment($params);
```
