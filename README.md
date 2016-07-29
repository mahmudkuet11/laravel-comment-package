# laravel-comment-package
This is package for simple comment system

# installation

To install this package follow these steps:

1. Add dependency to **composer.json**
``` javascript
    "require": {
        "mahmud/comment" : "dev-master"
    },
    "repositories": [
       {
         "type": "vcs",
         "url" : "https://github.com/mahmudkuet11/laravel-comment-package.git"
       }
    ]
```
2. In **config/app.php** add the line in **provider** array
```
Mahmud\Comment\PackageServiceProvider::class
```
3. In **config/app.php** add the line in **aliases** array
```
'Comment' => Mahmud\Comment\Facade\Comment::class,
```
4. Run these three commands
```
composer dump-autoload
php artisan vendor:publish
php artisan migrate:refresh
```


# Usage:
### Add Comment

```php
use Comment;
.....
.....

$params = [
  'user_id'   		=>  1,				    //integer (default = 0)
  'namespace' 		=>  'post_comment',	    //required, string
  'parent_id' 		=>  1,				    //integer (default = 0)
  'thread_id' 		=>  2,				    //integer (default = 0)
  'content'   		=>  'hello there'	    //required, string
  'is_approved'   	=>  1				    //1 or 0 (default = 1)
];

/*
*	@return integer comment_id (if success)
*			null (if failed)
*/
Comment::addComment($params);		//returns comment id if success or null if failed
```

### Edit comment

``` php
$params = [
    'comment_id'    =>  1,                      //required, integer
    'content'       =>  'edited comment'        //required, string
];
return  Comment::editComment($params);
```
**Returns:**

* if comment not found: 
```
{
  "status_code": "501",
  "status_text": "error",
  "message": "Comment not found with id : 3"
}
```

* if parameters are not valid:
```
{
      "status_code": "500",
      "status_text": "validation error",
      "message": {
            "comment_id": [
                  "The comment id field is required."
                ],
            "content": [
                  "The content field is required."
                ]
      }
}
```

* if comment is updated successfully:
```
{
  "status_code": "200",
  "status_text": "success",
  "message": "comment is updated"
}
```

### Delete comment

``` php
$comment_id = 1;                        //required, integer
Comment::deleteComment($comment_id);
```
**Returns:**

* if comment not found:
```
{
  "status_code": "501",
  "status_text": "not found",
  "message": "comment not found with id : 10"
}
```

* if validation error:
```
{
      "status_code": "500",
      "status_text": "validation error",
      "message": {
            "comment_id": [
                "The comment id must be an integer."
            ]
      }
}
```

* if other errors:
```
{
  "status_code": "502",
  "status_text": "error",
  "message": "comment could not be deleted"
}
```

* if success:
```
{
  "status_code": "200",
  "status_text": "success",
  "message": "comment is deleted"
}
```

### Status Code:

| Status code | Status text      |
|:-----------:|:----------------:|
|500          | validation error |
|501          | not found        |
|502          | error            |
|200          | success          |