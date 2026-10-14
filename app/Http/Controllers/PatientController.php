<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    
public function index(Request $request)
{
    $search = $request->input('search');

    $patients = Patient::query()
        ->when($search, function ($query, $search) {
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        })
        ->latest()
        ->paginate(10)
        ->withQueryString();

    return view('patients.index', compact('patients', 'search'));
}

    public function create()
    {
        return view('patients.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'date_of_birth' => 'nullable|date',
            'gender' => 'nullable|in:Male,Female,Other',
            'phone' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:1000',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient added successfully!');
    }

    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
    'first_name' => 'required|string|max:100',
    'last_name' => 'required|string|max:100',
    'date_of_birth' => 'required|date|before_or_equal:today',
    'gender' => 'required|in:Male,Female,Other',
    'phone' => 'nullable|string|max:20',
    'address' => 'nullable|string|max:1000',
]);
        $patient->update($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient updated successfully!');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient deleted successfully!');
    }
    public function dashboard()
{
    $totalPatients = Patient::count();
    $malePatients = Patient::where('gender', 'Male')->count();
    $femalePatients = Patient::where('gender', 'Female')->count();
    $recentPatients = Patient::latest()->take(5)->get();

    return view('patients.dashboard', compact(
        'totalPatients',
        'malePatients',
        'femalePatients',
        'recentPatients'
    ));
}
}