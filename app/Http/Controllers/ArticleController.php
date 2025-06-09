<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::get();

        return view('dashboard', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('articles.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request)
    {
        $article = Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('articles.show', $article)->with('message', 'Article has been created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('articles.form', [
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id
        ]);

        return redirect()->route('articles.show', $article)->with('message', 'Article has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $this->authorize('delete', $article);

        $article->delete();

        return redirect()->route('articles.index')->with('message', 'Article has been deleted');
    }
}
