<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = $this->getSubjects(request('search'));
        
        return view('subjects.index')->with('subjects', $subjects);
    }

    private function getSubjects($search) {
        if (!isset($search)) {
            $subjects = Subject::all();
        } else {
            $subjects = Subject::where('name', 'like', '%' . $search . '%')
                ->orWhere('titel', 'like', '%' . $search . '%')
                ->get();
        }
        return $subjects;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('subjects.create', [
            'categories' => $categories
        ]);
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
            'titel' => 'required',
            'category_id' => 'required'
        ]);
        Subject::create([
            'name' => $request->name,
            'titel' => $request->titel,
            'stichpunkte' => $request->stichpunkte,
            'beschreibung' => $request->beschreibung,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('subjects.index')->with('message', "Subject created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        $categories = Category::all();
        return view('subjects.edit', [
            'subject' => $subject,
            'categories' => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required',
            'titel' => 'required',
            'category_id' => 'required'
        ]);
        $subject->update([
            'name' => $request->name,
            'titel' => $request->titel,
            'stichpunkte' => $request->stichpunkte,
            'beschreibung' => $request->beschreibung,
            'category_id' => $request->category_id
        ]);
        return redirect()->route('subjects.index')->with('message', "Subject updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('message', "Subject deleted successfully");
    }
}
