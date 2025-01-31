<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Projects;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\Request;

class DocumentsController extends Controller
{
    public function store($file, $idproject)
    {

        $project = Projects::find($idproject);
        if (!$project) {
            return ['error' => 'Projeto não encontrado'];
        }

        $filename = $file->getClientOriginalName();
        $filename = time() . '_' . $filename; // pra evitar sobrescrever arquivos que possam ter o mesmo nome
         $file->storeAs('documents', $filename, 'public'); // precisa dar um chmod -R 775 storage
                                                           // chmod -R 775 bootstrap/cache

        $document = new Documents();
        $document->project_id = $project->id;
        $document->file_name = $filename;
        $document->save();

        return $document;
    }

    public function download($id)
    {
        $document = Documents::find($id);
        if (!$document) {
            return redirect()->back()->with('error', 'Documento não encontrado');
        }

        return response()->download(storage_path('app/public/documents/' . $document->file_name));
    }

    public function destroy($id)
    {
        $document = Documents::find($id);
        if (!$document) {
            return redirect()->back()->with('error', 'Documento não encontrado');
        }

        Storage::disk('public')->delete('documents/' . $document->file_name);
        $document->delete();

        return redirect()->back()->with('success', 'Documento excluído com sucesso');
    }
}
