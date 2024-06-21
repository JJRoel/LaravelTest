<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Member;
use App\Models\Item;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index(Request $request)
    {
        $thisMonth = $request->input('thismonth', Carbon::now()->month);
        $thisYear = $request->input('thisyear', Carbon::now()->year);
        
        $monthName = Carbon::createFromDate($thisYear, $thisMonth)->format('F');
        
        $agendaItems = Agenda::whereYear('date', $thisYear)
            ->whereMonth('date', $thisMonth)
            ->get();
        
        return view('agenda.index', compact('thisMonth', 'thisYear', 'monthName', 'agendaItems'));
    }

    public function show(Request $request)
    {
        $jour = $request->input('jour');
        $mois = $request->input('mois');
        $annee = $request->input('annee');

        $date = Carbon::create($annee, $mois, $jour);

        $dayName = $date->format('l');
        $monthName = $date->format('F');

        $agendaItems = Agenda::whereDate('date', $date)->get();
        $birthdays = Member::whereDay('annif', $jour)->whereMonth('annif', $mois)->get();
        $items = Item::all();

        return view('agenda.day', compact('date', 'dayName', 'monthName', 'agendaItems', 'birthdays', 'items'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titre' => 'required|max:40',
            'details' => 'nullable|string',
            'date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:date',
            'item_id' => 'required|exists:items,id',
        ]);

        Agenda::create([
            'titre' => $request->input('titre'),
            'details' => nl2br($request->input('details')),
            'date' => $request->input('date'),
            'end_date' => $request->input('end_date'),
            'item_id' => $request->input('item_id'),
        ]);

        return redirect()->back()->with('status', 'Activiteit toegevoegd');
    }
}







