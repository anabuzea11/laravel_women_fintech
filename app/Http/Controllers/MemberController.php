<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Member;

class MemberController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'company' => 'nullable|string|max:255',
            'profession' => 'required',
            'linkedin_url' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);
        Member::create($request->all());
        return redirect()->route('members.index')->with('success', 'Member added successfully!');
    }  
    
    public function index(Request $request) {

         // Creează o interogare inițială pentru tabela members
        $query = Member::query();

        // Adaugă condiții pentru fiecare filtru
        if ($request->filled('profession')) {
            $query->where('profession', 'like', '%' . $request->profession . '%');
        }
        if ($request->filled('company')) {
            $query->where('company', 'like', '%' . $request->company . '%');
        }
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        // Căutare după nume sau email
        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        $members = $query->paginate(10); // Paginare cu 10 membri pe pagină
        $members = Member::all();
        return view('members.index', compact('members'));
    }
    
    public function update(Request $request, $id) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members,email,' . $id,
            'profession' => 'required',
            'company' => 'nullable|string|max:255',
            'linkedin_url' => 'nullable|url',
            'status' => 'required|in:active,inactive',
        ]);
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('members.index')->with('success', 'Member updated successfully!');
    }
    
    public function destroy($id) {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully!');
    }

    public function create()
    {
        return view('members.create'); // Returnează pagina Blade pentru creare
    }

    public function edit($id)
    {
    // Găsește membrul cu ID-ul specificat
    $member = Member::findOrFail($id);

    // Returnează view-ul pentru editare, trimițând membrul ca parametru
    return view('members.edit', compact('member'));
    }

    public function exportCSV()
    {
        // Obține lista membrilor
        $members = Member::all();

        // Creează conținutul CSV
        $csvHeader = ['ID', 'Nume', 'Email', 'Telefon', 'Data Creării'];
        $csvData = $members->map(function ($member) {
            return [
                $member->id,
                $member->name,
                $member->email,
                $member->phone,
                $member->created_at,
            ];
        });

        // Format CSV
        $csvContent = implode(',', $csvHeader) . "\n";
        foreach ($csvData as $row) {
            $csvContent .= implode(',', $row) . "\n";
        }

        // Răspunde cu fișierul CSV
        $filename = 'members_' . date('Y-m-d_H-i-s') . '.csv';

        return Response::make($csvContent, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ]);
    }

    public function show($id)
    {
        $member = Member::findOrFail($id); // Găsește membrul după ID
        return view('members.show', compact('member')); // Înlocuiește cu numele fișierului Blade
    }
}
