<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\GoodResource;
use App\Models\Good;
use Illuminate\Http\Request;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return GoodResource::collection(Good::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( int $id )
    {
        $data = Good::find($id)->firstOrFail();
        return new GoodResource($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $game = Good::findOrFail($id);
        $game->fill($request->except(['id']));
        $game->save();
        return response()->json($game);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Good::findOrFail($id);
        $result = $task->delete();
        if($result){
            abort(204);
        }
    }
}
