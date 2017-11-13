<?php

namespace homePage\Http\Controllers;

use homePage\Article;
use homePage\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Session;
use DB;
use Input;
use Intervention\Image\ImageServiceProvider;
use Image;
use Validator;
use View;
// use homePage\Http\Controllers\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

class ArticleController extends Controller
{
    //show page - create article 
    public function modify (){
        return view ('articles.createArticle');
    } 
    
    //write an article
    public function createArticle (Request $request)
    {
        $rules = array(
            'title'       => 'required',
            'body'      => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('articles.createArticle')
                ->withErrors($validator);
        } else {
            // store
            $article = new Article;
            $article->title       = Input::get('title');
            $article->body      = Input::get('body');
            $article->user_id= Auth::id();
            $article->author= Auth::user()->username;
              //upload photo
       if($request->hasFile('image')){
        $image = $request->file('image');
        //take file and rename
        $filename = time() . '.' . $image->getClientOriginalExtension(); 
        //create location 
        $location = public_path('images/' . $filename);
        //resize file and save
        Image::make($image)->resize(800,400)->save($location);
        $article->save();
        //put in database
        $article->image = $filename;
         }
         $article->save();
           
     
         Session::flash('message', 'Successfully created new article!');
        return Redirect::to('articles/articlesAll');
    }
}
    //show all articles in list
    public function show(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(5);
        return view('articles.articlesAll', compact('articles'));
    }
    
    //show latest articles in homepage
    public function latestPost(){
        $articles = Article::orderBy('created_at', 'desc')->paginate(3);
        return view('home', compact('articles'));
    }
   
    //open one post
    public function open($id)
	{
        $article = Article::find($id);
        return view ('articles.openArticle', compact('article'));
    }	
    //delete article
    public function delete($id)
	{
        $article= Article::find($id);
        $article->delete();
        return Redirect::to('articles/articlesAll');
    }

//edit article
public function edit($id){
    $article = Article::find($id);
    return View::make('articles.edit', compact('article'))
    -> withPost('articles',$article);
    }
 //to update edited article
 public function update(Request $request, $id)
 {
     // vaidate the data
     $this->validate($request, array(
         'title' => 'required|max:255',
         'body' => 'required'
         //'user_id'=> Auth::id()
     ));

     // save the data to the db
     $article = Article::find($id);

     $article->title = $request->input('title');
     $article->body = $request->input('body');
     $article->image= $request->input('image');

     $article->save();

     // set flash data with success message
     Session::flash('success','Article was successfully saved.');
     return Redirect::to('articles/articlesAll');
    }   

}