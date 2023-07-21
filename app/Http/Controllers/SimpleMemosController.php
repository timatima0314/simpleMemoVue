<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimpleMemo;
use App\Http\Requests\simpleMemoRequest;

class SimpleMemosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SimpleMemo::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(simpleMemoRequest $request)
    {
        $simpleMemo = SimpleMemo::create($request->all());
        return $simpleMemo
            ? response()->json($simpleMemo, 201)
            : response()->json([], 500);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(simpleMemoRequest $request, string $id)
    {
        $simpleMemo = SimpleMemo::findorFail($id);
        $simpleMemo->fill($request->all())->save();
        return $simpleMemo
            ? response()->json($simpleMemo, 201)
            : response()->json([], 500);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $simpleMemo = SimpleMemo::findorFail($id);
        $simpleMemo->delete();
        return $simpleMemo
            ? response()->json($simpleMemo, 201)
            : response()->json([], 500);
    }
}
