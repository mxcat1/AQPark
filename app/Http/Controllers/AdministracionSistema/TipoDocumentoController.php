<?php

namespace App\Http\Controllers\AdministracionSistema;

use App\Http\Controllers\Controller;
use App\Models\TipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listatipodocumento = TipoDocumento::paginate();
        return view('AQParkingAdmin.TipoDocumento.index', compact('listatipodocumento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('AQParkingAdmin.TipoDocumento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'descripcion'=>'required|min:1|max:255',
            'abreviacion'=>'required|min:1|max:255|unique:tipo_documentos',
        ]);
        $nuevotipodocumento=$request->all();
        TipoDocumento::create($nuevotipodocumento);
        return redirect()->route('TipoDocumento.index')->with('success','Nuevo Tipo de  Documento Agregado');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipodocu=TipoDocumento::find($id);
        return view('AQParkingAdmin.TipoDocumento.show',compact('tipodocu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipodocu=TipoDocumento::find($id);
        return view('AQParkingAdmin.TipoDocumento.edit',compact('tipodocu'));
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
        $request->validate([
            'descripcion'=>'required|min:1|max:255',
            'abreviacion'=>'required|min:1|max:255'
        ]);
        if ($tipodocumento=TipoDocumento::find($id)) {
            $tipodocumento->update($request->all());
            return redirect()->route('TipoDocumento.index')->with('success','Se actualizo correctamente los datos del Tipo de  Documento');
        }else{
            return redirect()->route('TipoDocumento.index')->with('success','Dato Eliminado anteriormente no se efectuo la actualizacion');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipodocu = TipoDocumento::find($id);
        $tipodocu->delete();
        return redirect()->route('TipoDocumento.index')->with('success delete','Se Elimino correctamente el Tipo de  Documento');
    }
}
