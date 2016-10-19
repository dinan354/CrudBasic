<?php

namespace App\Http\Controllers;

use App\Film;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Session;

use App\Http\Requests;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::orderBy('created_at', 'DESC')->get();

        return view('film', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('film_edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->except('_token');

        $film = new Film();
        $film->fill($input);
        $film->save();

        $request->session()->flash('notif_success', 'Berhasil');

        return redirect('film');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $film = Film::find($id);

        return view('film_detail', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['film'] = Film::find($id);

        return view('film_edit', $data);
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $input = $request->except(['_token', 'PUT']);
        $film = Film::find($id);
        $film->fill($input);
        $film->save();

        $request->session()->flash('notif_success', 'Berhasil');

        return redirect('film');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $film = Film::find($id);
        $film->delete();
        $request->session()->flash('notif_success', 'Berhasil di hapus');

        return redirect('film');
    }
}
