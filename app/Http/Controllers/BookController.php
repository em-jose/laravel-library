<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);

        return view('book.index', [
            'books' => $books
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $authors = Author::orderBy('name')->get();

        return view('book.create', [
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $book = Book::create([
            'title' => $request->input('title'),
            'isbn13' => $request->input('isbn13'),
            'description' => $request->input('description'),
            'publication_date' => $request->input('publication_date')
        ]);

        $book->authors()->attach($request->input('authors'));
        $book->categories()->attach($request->input('categories'));

        return redirect()->route('books.index')->with('message', __('book.created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', [
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories = Category::orderBy('name')->get();
        $authors = Author::orderBy('name')->get();

        return view('book.edit', [
            'book' => $book,
            'categories' => $categories,
            'authors' => $authors
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->title = $request->input('title');
        $book->isbn13 = $request->input('isbn13');
        $book->description = $request->input('description');
        $book->publication_date = $request->input('publication_date');

        $book->save();

        $book->authors()->sync($request->input('authors'));
        $book->categories()->sync($request->input('categories'));

        return redirect()->route('books.index')->with('message', __('book.updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('message', __('book.deleted'));
    }
}
