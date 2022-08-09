<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::paginate(10);

        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthorRequest $request)
    {
        Author::create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
            'birth_date' => $request->input('birth_date')
        ]);

        return redirect()->route('authors.index')->with('message', __('author.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('author.show', [
            'author' => $author
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('author.edit', [
            'author' => $author
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthorRequest  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthorRequest $request, Author $author)
    {
        $author->name = $request->input('name');
        $author->lastname = $request->input('lastname');
        $author->birth_date = $request->input('birth_date');

        $author->save();

        return redirect()->route('authors.index')->with('message', __('author.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if(!empty($author->books)) {
            foreach ($author->books as $book) {
                $authors_have_this_book_count = DB::table('author_book')
                    ->where('book_id', $book->id)
                    ->count();

                if($authors_have_this_book_count > 1) {
                    $author->books()->detach($book->id);
                } else {
                    $author->books()->detach($book->id);
                    $book->categories()->detach();
                    $book->delete();
                }
            }
        }

        $author->delete();

        return redirect()->route('authors.index')->with('message', __('author.deleted'));
    }
}
