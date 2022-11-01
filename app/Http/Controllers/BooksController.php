<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Genre;
use App\Http\Requests\CreateValidationRequest;

class BooksController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'DESC')->get();
       return view('books.index',[
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
        $genres = Genre::all();
        return view('books.create')->with('genres', $genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateValidationRequest $request)
    {
        $request->validationData();

        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $book = Book::create([
            'image_path' => $newImageName,
            'title' => $request->input('title'),
            'isbn' => $request->input('isbn'),
            'description' => $request->input('description'),
            'revision_number' => $request->input('revision_number'),
            'published_date' => $request->input('published_date'),
            'publisher' => $request->input('publisher'),
            'author' => $request->input('author'),
            'genre_id' => $request->input('genre'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/books');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $book = Book::find($id);
        return view('books.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::find($id)->first();
        $genres = Genre::all();
        //return view('books.edit')->with('book', $book);
        return view('books.edit', [
            'book' => $book,
            'genres' => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$request->validationData();
        $newImageName = time() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        $book = Book::where('id', $id)
        ->update([
            'image_path' => $newImageName,
            'title' => $request->input('title'),
            'isbn' => $request->input('isbn'),
            'description' => $request->input('description'),
            'revision_number' => $request->input('revision_number'),
            'published_date' => $request->input('published_date'),
            'publisher' => $request->input('publisher'),
            'author' => $request->input('author'),
            'genre_id' => $request->input('genre'),
            'user_id' => auth()->user()->id
        ]);

        return redirect('/books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //$book = $Book::find($id)->first();

        $book->delete();

        return redirect('/books');
    }
}
