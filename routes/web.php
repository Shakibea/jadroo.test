<?php

use App\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});
//
//
//Route::get('/about', function(){
//    return "Hi How are you?";
//});
//
//Route::get('/post/{id}', function($id){
//    return "This is a post number ". $id;
//});
//
//Route::get('/name/{name}', function($name){
//    return "{$name} How are you bro!";
//});
//
//Route::get('admin/posts/news', array("as" => "admin.home", function(){
//    return "This is our link ".route("admin.home");
//}));
//
//Route::get('admin/posts/update', function(){
//        return route('admin.home');
//})->name('admin.home');

//Route::resource('/', 'PostsController');
//
//Route::resource('posts', "PostsController", ["parameter" => [
//    'posts' => 'admin'
//]]);
//
//Route::get('/contact', 'PostsController@contact');
//
//Route::get('posts/{id}/{name}/{password}', 'PostsController@showMyPost');



/*
|--------------------------------------------------------------------------
| Database RAW SQL
|--------------------------------------------------------------------------
*/


//Route::get('/insert', function(){
//
//    DB::insert('insert into posts(title, content) values(?, ?)', ['Laravel with Edwin Diaz', 'He is an awesome guy']);
//
//});


//Route::get('/read', function(){

//    $result =DB::select('select * from posts where id=?',[1]);

//    foreach ($result as $postTitle){
//        return $postTitle->title;
//    }

//});


//Route::get('/update', function(){
//
//    DB::update('update posts set title="Learning Laravel" where id=?',[1]);
//
//});



//Route::get('/delete', function(){
//
//    DB::delete('delete from posts where id=?', [1]);
//
//});


/*
|--------------------------------------------------------------------------
| ELOQUENT ORM
|--------------------------------------------------------------------------
*/

//
//Route::get('/read', function(){
//
//    $result = Post::all();
//
//    foreach ($result as $postTitle){
//        return $postTitle->title;
//    }
//
//});
//
//Route::get('/find', function(){
//
//    $result = Post::find(2);
//    return $result->content;
//
//});
//
//Route::get('/findWhere', function(){
//
//    $result = Post::where('id', 2)->orderBy('id', 'desc')->take(1)->get();
//
//    return $result->title;
//
//});
//
//Route::get('/find_first', function(){
//
//    $result = Post::where('users_count', '>', 50)->firstOrFail();
//
//    return $result;
//
//});
//
//Route::get('/basicInsert', function(){
//
//    $post = new Post();
//
//    $post->title = 'Eloquent with Edwin';
//    $post->content = 'Eloquent is an awesome database controlling system';
//
//    $post->save();
//
//});
//Route::get('/basicUpdate/{id}', function($id){
//
//    $post = Post::find($id);
//
//    $post->title = 'Eloquent with Edwin Diaz';
//    $post->content = 'Edwin really cool guy';
//
//    $post->save();
//
//});
//
//Route::get('/create', function(){
//
//    Post::create(['title'=>'Hey! this eloquent create', 'content'=>'eloquent create has strong side, let\'s see']);
//
//});
//
//Route::get('/update', function(){
//
//
//    Post::where('id',4)->where('is_admin',0)->update(['title'=>'He is Edwin Diaz']);
//
//});
//
//Route::get('/delete', function(){
//
//    $post = Post::find(3);
//    $post->delete();
//
////    Post::destroy(1); //destroy([1,2,3])
//
////    $post = Post::where('is_admin', 0)->delete();
//
//});


/*
|--------------------------------------------------------------------------
| ELOQUENT Relationships
|--------------------------------------------------------------------------
*/

//use App\User;
//use App\Post;
//
////ONE TO ONE RELATIONSHIP
//Route::get('/user/{id}/post', function($id){
//
//    return User::find($id)->post->title;
//
//});
////Inverse one to one Relationship
//Route::get('/post/{id}/user', function($id){
//
//    return Post::find($id)->user->name;
//
//});
//
////ONE TO MANY RELATIONSHIPS
//Route::get('/user/{id}/posts', function($id){
//
//    $posts = User::find($id)->posts;
//
//    foreach ($posts as $post){
//        echo $post->content."<br>";
//    }
//
//});
//
////MANY TO MANY RELATIONSHIPS
//Route::get('/user/{id}/post', function($id){
//
//    $user = User::find($id);
//
//    foreach ($user->roles as $role){
//        return $role->name;
//    }
//
//});
////Intermediate Table Columns
//Route::get('/user/pivot',function(){
//
//    $user = User::find(1);
//
//    foreach ($user->roles as $role){
//        echo $role->pivot->created_at;
//        echo "<br>";
//        echo $role->pivot->updated_at;
//    }
//
//});



/*
|--------------------------------------------------------------------------
| ELOQUENT POLYMORPHIC
|--------------------------------------------------------------------------
*/

//use App\Country;

////Has Many Through
//Route::get('/post/{id}/country', function($id){
//
//    $country = Country::find($id);
//
//    foreach ($country->posts as $post){
//        echo $post->title. "<br>";
//    }
//
//});
//
//
////one to one polymorphic
//Route::get('/morphic/post', function(){
//
////    $post = Post::find(1);
//
////    $user = User::find(2);
//
//    $image = App\Image::find(1);
//    $image = $image->imageable;
//
////    $image = $user->image;
//
//    return $image;
//
//});
//
////one to many polymorphic
//Route::get('/morphic/posts', function (){
//
//    $post = Post::find(1);
////    $video = App\Video::find(2);
//
////    return App\Comment::find(1)->commentable;
//
//    foreach ($post->comments as $comment){
//        echo $comment->body. "<br>";
//    }
//
//});

//
//Route::get('/tag/post', function(){
//
////    $post = Post::find(2);
//
//    $tag = Tag::find(2);
//
//    foreach ($tag->videos as $post){
//        echo $post->title;
//    }
//
//});


/*
|--------------------------------------------------------------------------
| VAlIDATION
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=>'web'], function (){

    Route::resource('/posts', 'PostsController');

    Route::get('/dates', function(){

        $date = new DateTime('+1 week');

        echo $date->format('m-d-Y');

        echo '<br>';

        echo Carbon::now()->addDay(10)->diffForHumans();

        echo '<br>';

        echo Carbon::now()->subMonth(5)->diffForHumans();

        echo '<br>';

        echo Carbon::now()->yesterday()->diffForHumans();
    });

    Route::get('/getname', function(){

        $user = User::findOrFail(1);

        echo $user->name;

    });

});

















