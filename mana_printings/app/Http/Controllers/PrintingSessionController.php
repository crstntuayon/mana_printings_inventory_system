<?php

namespace App\Http\Controllers;
use App\Models\PrintingSession;


use Illuminate\Http\Request;

class PrintingSessionController extends Controller
{

public function index()
{
    $sessions = PrintingSession::all();
   
    return view('sessions.index', compact('sessions'));
}

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'job_description' => 'required',
            'quantity' => 'required|integer',
            'printer_used' => 'required',
            'printed_at' => 'required|date',
        ]);

        PrintingSession::create($request->all());
        return redirect()->route('sessions.index')->with('success', 'Session added successfully.');
    }

    public function edit(PrintingSession $session)
    {
        return view('sessions.edit', compact('session'));
    }

    public function update(Request $request, PrintingSession $session)
    {
        $request->validate([
            'customer_name' => 'required',
            'job_description' => 'required',
            'quantity' => 'required|integer',
            'printer_used' => 'required',
            'printed_at' => 'required|date',
        ]);

        $session->update($request->all());
        return redirect()->route('sessions.index')->with('success', 'Session updated successfully.');
    }

    public function destroy(PrintingSession $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('success', 'Session deleted successfully.');
    }
}
