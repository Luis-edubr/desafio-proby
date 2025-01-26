<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Projects::paginate(10);
        return view('dashboard.index', compact('projects'));
    }

    public function create()
    {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'required|date_format:Y-m-d',
            'status' => 'required|in:Pendente,Em andamento,Concluído',
        ]);

        Projects::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Projeto criado com sucesso!');
    }

    public function show($id)
    {
        $project = Projects::findOrFail($id);
        return view('dashboard.show', compact('project'));
    }

    public function edit($id)
    {
        $project = Projects::findOrFail($id);
        return view('dashboard.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable',
            'start_date' => 'required|date_format:Y-m-d',
            'status' => 'required|in:Pendente,Em andamento,Concluído',
        ]);

        $project = Projects::findOrFail($id);
        $project->update($request->all());

        return redirect()->route('dashboard')->with('success', 'Projeto atualizado com sucesso!');
    }

    public function destroy($id){
        $project = Projects::findOrFail($id);
        $project->delete();
        return redirect()->route('dashboard')->with('success', 'Projeto deletado com sucesso!');
    }
}