<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(['data' => Movie::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request['title'];
        $repeat = Movie::where('title', '=', $title)->first();

        if (!empty($repeat)) {
            return response()->json(['data' => 'Filme já cadastrado no banco']);
        } else {
            $this->validate($request, [
                'title'           => 'required|max:225',
                'classification'  => 'required|integer',
                'actors'          => 'required|max:225',
                'director'        => 'required|max:225'
            ]);

            Movie::create($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::where('id', '=', $id)->first();

        if (!empty($movie)) {
            return response()->json(['data' => $movie]);
        } else {
            return response()->json(['data' => 'Filme não localizado']);
        }
    }

    public function showDetails($details)
    {
        $movie = Movie::where('title', 'like', '%' . $details . '%')
            ->orWhere('classification', 'like', '%' . $details . '%')
            ->orWhere('actors', 'like', '%' . $details . '%')
            ->orWhere('director', 'like', '%' . $details . '%')->get();

        return response()->json(['data' => $movie]);
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
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());

        return response()->json(['data' => $movie]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json(['data' => 'Filme deletado com sucesso']);
    }
}
