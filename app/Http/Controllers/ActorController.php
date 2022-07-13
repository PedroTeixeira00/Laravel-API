<?php

namespace App\Http\Controllers;

use App\Actor;
use Illuminate\Http\Request;

class ActorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return response()->json(Actor::with(['movies'])->get(), 200);
        }catch (\Exception $execption) {
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
            $actor = Actor::create($request->all());

            return response()->json($actor, 200);
            
        }catch(\Exception $execption) {

            return response()->json(['error' =>$execption], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function show(Actor $actor)
    {
        try {

            $actor->load(['movies']);
            
            return response()->json($actor, 200);
        }catch (\Exception $execption) {
            return response()->json(['error' =>$execption], 500);
        }
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Actor $actor)
    {
        try {
            $actor->update($request->all());

            return response()->json($actor, 200);

        }catch (\Exception $execption) {
            return response()->json(['error' =>$execption], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Actor  $actor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Actor $actor)
    {
        try {
            $actor->delete();

           return response()->json(['message' => 'Deleted'], 205);

        } catch (Exception $exception) {

            return response()->json(['error' => $exception], 500);
            
        }
    }
}
