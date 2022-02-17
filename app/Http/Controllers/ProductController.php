<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('products.home', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('products.create', compact('tags'));
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
            $product = new Product();
            $product->name = $request->name;
            $product->save();
            foreach ($request->tags as $tag) {
                $product->tags()->attach($tag);
            }
            $message = [
                'color' => 'primary',
                'message' => 'Produto cadastrado com sucesso'
            ];
        }catch (\Exception $e) {
            $message = [
                "color" => " warning",
                "message" => "Erro ao cadastrar produto"
            ];
        }
        return redirect()->route('products.edit', ['id' => $product->id])->with($message);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $tags = Tag::all();
        $tagsProduct = $product->tags->pluck('id')->toArray();

        return view('products.edit', compact('product', 'tags', 'tagsProduct'));

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
            $product = Product::findOrFail($id);
            $product->tags()->detach();
            $product->name = $request->name;
            foreach ($request->tags as $tag) {
                $product->tags()->attach($tag);
            }
            $product->save();
            $message = [
                'color' => 'primary',
                'message' => 'Produto atualizado com sucesso'
            ];
        } catch (\Exception $e) {
            $message = [
                "color" => " warning",
                "message" => "Erro ao atualizar produto"
            ];
        }
        return redirect()->route('products.edit', ['id' => $id])->with($message);
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
            $product = Product::find($id);
            $product->tags()->detach();
            $product->delete();
            $message = [
                'color' => 'primary',
                'message' => 'Produto deletado com sucesso'
            ];
        } catch (\Exception $e) {
            $message = [
                'color' => 'danger',
                'message' => 'Erro ao deletar um produto'
            ];
        }
        return redirect()->route('products.index')->with($message);
    }
}
