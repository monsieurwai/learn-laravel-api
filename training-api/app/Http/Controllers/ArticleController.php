<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /*
        GET
        /articles
        get all articles
    */
    public function getAllArticles()
    {
        $students = Article::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    }

    /*
        POST
        /articles
        create article
    */
    public function createArticle(Request $request)
    {
        $article = new Article;
        $article->title = $request->title;
        $article->body = $request->body;
        $article->save();

        return response()->json([
            "message" => "An article has been created."
        ], 201);
    }

     /*
        GET
        /articles/{id}
        get article by id
    */
    public function getArticle($id)
    {
        if (Article::where('id', $id)->exists()) {
            $Article = Article::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($Article, 200);
        } else {
            return response()->json([
                "message" => "Article not found"
            ], 404);
        }
    }

     /*
        PUT
        /article/{id}
        Update an article
    */
    public function updateArticle(Request $request, $id)
    {
        if (Article::where('id', $id)->exists()) {
            $Article = Article::find($id);
            $Article->title = is_null($request->title) ? $Article->title : $request->title;
            $Article->body = is_null($request->body) ? $Article->body : $request->body;
            $Article->save();

            return response()->json([
                "message" => "records updated successfully",
                "article" => $Article
            ], 200);
        } else {
            return response()->json([
                "message" => "Article not found"
            ], 404);
        }
    }

     /*
        DELETE
        /article/{id}
        delete article by id
    */
    public function deleteArticle($id)
    {
        if (Article::where('id', $id)->exists()) {
            $Article = Article::find($id);
            $Article->delete();

            return response()->json([
                "message" => "Article deleted"
            ], 202);
        } else {
            return response()->json([
                "message" => "Article not found"
            ], 404);
        }
    }
}
