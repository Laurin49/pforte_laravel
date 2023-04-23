<?php

namespace App\Http\Controllers;

use App\Models\Command;
use Illuminate\Http\Request;

class CommandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sel_year = "2023";
        $sel_month = "Alle";
        if (!empty(request()->query('jahr'))) {
            if (!empty(request()->query('monat'))) {
                if (request()->query('monat') == "Alle") {
                    $sel_year = request()->query('jahr');
                    $commands = $this->getCommandsByJahr($sel_year);
                } else {
                    $sel_year = request()->query('jahr');
                    $sel_month = request()->query('monat');
                    $commands = $this->getCommandsByJahrUndMonat($sel_year, $sel_month);
                }
            } else {
                $sel_year = request()->query('jahr');
                $commands = $this->getCommandsByJahr($sel_year);
            }
        } else {
            $commands = $this->getCommands(request('search'));
        }
        return view('commands.index', [
            'commands' => $commands,
            'sel_year' => $sel_year,
            'sel_month' => $sel_month
        ]);
    }

    private function getCommands($search) {
        if (!isset($search)) {
            return Command::orderBy('jahr')
            ->orderBy('monat', 'asc')
            ->paginate(10)->withQueryString();
        } else {
            return Command::where('name', 'like', '%' . $search . '%')
                ->orWhere('beschreibung', 'like', '%' . $search . '%')
                ->paginate(10)->withQueryString();
        }
    }

    private function getCommandsByJahr($jahr) {
        return Command::where('jahr', 'like', '%' . $jahr . '%')
        ->paginate(10)->withQueryString();
    }

    private function getCommandsByJahrUndMonat($jahr, $monat) {
        return Command::where('jahr', 'like', '%' . $jahr . '%')
            ->where('monat', 'like', $monat)
            ->paginate(10)->withQueryString();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('commands.create');
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
            'jahr' => 'required|max:4',
            'monat' => 'required|max:12'
        ]);
        Command::create([
            'name' => $request->name,
            'beschreibung' => $request->beschreibung,
            'jahr' => $request->jahr,
            'monat' => $request->monat
        ]);
        return redirect()->route('commands.index')->with('message', 'Command successfully generated');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function show(Command $command)
    {
        return view('commands.show', [
            'command' => $command
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function edit(Command $command)
    {
        return view('commands.update', ['command' => $command]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Command $command)
    {
        $request->validate([
            'name' => 'required',
            'jahr' => 'required|max:4',
            'monat' => 'required|max:12'
        ]);
        $command->update([
            'name' => $request->name,
            'beschreibung' => $request->beschreibung,
            'jahr' => $request->jahr,
            'monat' => $request->monat
        ]);
        return redirect()->route('commands.index')->with('message', 'Command successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Command  $command
     * @return \Illuminate\Http\Response
     */
    public function destroy(Command $command)
    {
        $command->delete();
        return redirect()->route('commands.index')->with('message', 'Command successfully deleted');
    }

}
