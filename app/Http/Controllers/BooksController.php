<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Books;
        $book->name = $request -> name;
        $book->author = $request -> author;
        $book->publish_date = $request -> publish_date;
        $book-> save();

        return response()->json([
            "message"=>"Book Added."
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @var  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Books::find($id);
        if(!empty($book))
            return response()-> json($book);
        else
            return response()-> json(["message"=>"book not found!"], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @var  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // update book if book exists
        if(Books::where('id', $id)->exists()){
            $book = Books::find($id);
            $book->name = is_null($request->name) ? $book->name : $request->name;
            $book->author = is_null($request->author) ? $book->author : $request->author;
            $book->publish_date = is_null($request->publish_date) ? $book->publish_date : $request->publish_date;                        
            $book->save();
            return response()->json(["Book '".$book->name."' updated."],200);
        }
        // else throw error
        return response()->json(["Book '".$id."' was not updated."],404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @var  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete book if it exists
        if(Books::where('id', $id)->exists()){
            $book = Books::find($id);
            $book->delete();
            return response()->json(["Deleted Book #".$book->id." - '".$book->name."'."],200);
        }
        // else throw error
        return response()->json(["Book '".$id."' was not deleted."],404);        
    }
}
