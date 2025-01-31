<?php

namespace App\Http\Controllers;

use App\Models\Documents;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::orderByRaw("FIELD(Status, 'Pendente', 'Em andamento', 'Concluído')")
            ->paginate(5);

        return view('dashboard.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Nome' => 'required|max:255|string|regex:/[a-zA-Z]/',
            'Descrição' => 'nullable',
            'Data' => 'required|date_format:Y-m-d',
            'Documento' => 'nullable|array',
            'Documento.*' => 'file|mimes:jpeg,jpg,png,pdf,doc,docx,xls,xlsx,odt,odp|max:2048',

        ]);

        $project = Projects::create([
            'name' => $request->input('Nome'),
            'description' => $request->input('Descrição'),
            'start_date' => $request->input('Data'),
            'status' => $request->input('Status'),
        ]);

        if ($request->hasFile('Documento')) {
            $documentsController = new DocumentsController();

            foreach ($request->file('Documento') as $file) {
                $document = $documentsController->store($file, $project->id);

                if (isset($document['error'])) {
                    return redirect()->route('dashboard')->with('error', $document['error']);
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'Projeto criado com sucesso!');
    }

    public function show($id)
    {
        $project = Projects::findOrFail($id);
        $documents = Documents::where('project_id', $id)->get();
      
        return view('dashboard.show', compact('project', 'documents'));
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        $documents = Documents::where('project_id', $id)->get();
        return view('dashboard.edit', compact('project', 'documents'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Nome' => 'required|max:255|string|regex:/[a-zA-Z]/',
            'Descrição' => 'nullable',
            'Data' => 'required|date_format:Y-m-d',
            'Status' => 'required|in:Pendente,Em andamento,Concluído',
            'Documento' => 'nullable|array',
            'Documento.*' => 'file|mimes:jpeg,jpg,png,pdf,doc,docx,xls,xlsx,odt,odp|max:2048',
        ]);

        $project = Projects::findOrFail($id);
        $project->update([
            'name' => $request->input('Nome'),
            'description' => $request->input('Descrição'),
            'start_date' => $request->input('Data'),
            'status' => $request->input('Status'),
        ]);

        if ($request->hasFile('Documento')) {
            $documentsController = new DocumentsController();

            foreach ($request->file('Documento') as $file) {
                $document = $documentsController->store($file, $project->id);

                if (isset($document['error'])) {
                    return redirect()->route('dashboard')->with('error', $document['error']);
                }
            }
        }

        return redirect()->route('dashboard')->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $project = Projects::findOrFail($id);
        $documents = Documents::where('project_id', $id)->get();
        $documentsController = new DocumentsController();
        foreach ($documents as $document) {
            $documentsController->destroy($document->id);
        }
        $project->delete();
        return redirect()->route('dashboard')->with('success', 'Projeto deletado com sucesso!');
    }
}
