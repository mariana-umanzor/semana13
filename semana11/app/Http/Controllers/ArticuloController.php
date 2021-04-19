<?php

namespace App\Http\Controllers;

use App\Models\articulo;
use Illuminate\Http\Request;

class articuloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulo = articulo::latest()->paginate(5);
  
        return view('articulo.index',compact('articulo'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function authorize()
    {
        return true;
    }


    public function rules()
   {
       return [
           'name' => 'required|string|max:60',
           'detail' => 'required|string|max:150'
       ];
   }

    public function create()
    {
        return view('articulo.create');
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        articulo::create($request->all());
   
        return redirect()->route('articulo.index')
                        ->with('success','articulo created successfully.');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function show(articulo $articulo)
    {
        return view('articulo.show',compact('articulo'));
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function edit(articulo $articulo)
    {
        return view('articulo.edit',compact('articulo'));
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, articulo $articulo)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $articulo->update($request->all());
  
        return redirect()->route('articulo.index')
                        ->with('success','articulo updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\articulo  $articulo
     * @return \Illuminate\Http\Response
     */
    public function destroy(articulo $articulo)
    {
        $articulo->delete();
  
        return redirect()->route('articulo.index')
                        ->with('success','articulo deleted successfully');
    }
}
