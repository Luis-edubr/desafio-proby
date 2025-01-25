<?php

namespace App\Http\Controllers;
use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Projects::paginate(10);
        return view('dashboard.index', compact('projects'));
    }

    public function create(){
        return view('dashboard.create');
    } 
    
    public function store(Request $request){
        // $request->validate([
        //     // 'title' => 'required',
        //     // 'description' => 'required',
        //     // 'url' => 'required',
        // ]);

        // Projects::create($request->all());
        return redirect()->route('dashboard.index');
    }
}
