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
  'user_id'   =>  1,				//integer (default = 0)
  'namespace' =>  'post_comment',	//required, string
  'parent_id' =>  1,				//integer (default = 0)
  'thread_id' =>  2,				//integer (default = 0)
  'content'   =>  'hello there'		//required, string
];

/*
*	@return integer comment_id (if success)
*			null (if failed)
*/
Comment::addComment($params);		//returns comment id if success or null if failed
```
