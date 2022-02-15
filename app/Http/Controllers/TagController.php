<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate(10);

        return view('tags.home', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $tag = Tag::create([
                'name' => $request->input('name')
            ]);
        } catch (Exception $e) {
            return redirect()->route('tags.create')->with(['color' => 'danger', 'message' => $e]);
        }
        return redirect()
            ->route('tags.edit', ['id' => $tag->id])
            ->with(['color' => 'primary', 'message' => 'Tag cadastrada com sucesso']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('tags.edit', ['tag' => $tag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $tag = Tag::find($id);
            $tag->name = $request->input('name');
            $tag->save();
        } catch (\Exception $e) {
            return redirect()->route('tags.create')->with(['color' => 'danger', 'message' => $e]);
        }

        return redirect()->route('tags.edit', ['id' => $id])
            ->with(['color' => 'primary', 'message' => 'Tag atualizado com sucesso']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            Tag::find($id)->delete();
        }catch (\Exception $e) {
            return redirect()->route('tags.index')
                ->with(['color' => 'danger', 'message' => 'Erro ao deletar uma tag']);
        }

        return redirect()->route('tags.index')
            ->with(['color' => 'primary', 'message' => 'Tag deletada com sucesso']);

    }
}
