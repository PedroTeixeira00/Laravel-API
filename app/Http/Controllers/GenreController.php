<?php

namespace App\Http\Controllers;

use App\Genre;
use App\Movie;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json(Genre::with(['movies'])->get(), 200);
        }catch (\Exception $exception) {
            return response()->json(['error' =>$execption], 500);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $genre = Genre::create($request->all());

            return response()->json($genre, 200);
            
        }catch(\Exception $execption) {

            return response()->json(['error' =>$exception], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        try {
            $genre->load(['movies']);
            return response()->json($genre, 200);
        }catch (\Exception $exception) {
            return response()->json(['error' =>$execption], 500);
        }
    }

    // $books = App\Book::all();
 
    // if ($someCondition) {
    //     $books->load('author', 'publisher');
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Genre $genre)
    {
        try {
            $genre->update($request->all());

            return response()->json($genre, 200);

        }catch (\Exception $execption) {
            return response()->json(['error' =>$execption], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        try {
            $genre->delete();

           return response()->json(['message' => 'Deleted'], 205);

        } catch (Exception $exception) {

            return response()->json(['error' => $exception], 500);
            
        }
    }
}
