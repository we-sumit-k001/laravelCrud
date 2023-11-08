<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Organization;
use Illuminate\Support\Str;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizations = Organization::all();

        return view('pages.organization.main', compact('organizations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.organization');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',

        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $data['is_active'] = $request->input('status');

        $organization = Organization::create($data);

        $note_content = $request->input('notes');

        $note_slug = Str::slug($note_content);

        $organization->note()->create([
            'text' => $note_content,
            'slug' => $note_slug,
        ]);

        session()->flash('successMessage', 'Organization Data Inserted successfully!');

        return redirect()->route('organization.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required|string|max:255',
        ]);

        $organization = Organization::findOrFail($id);

        if (!$organization)
        {
            return false;
        }

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $data['is_active'] = $request->input('status');

        $organization->update($data);

        $note_content = $request->get('notes');

        $note_slug = Str::slug($request->notes);

        if (!$organization->note) {

            $organization->note()->create([
                'text' => $note_content,
                'slug' => $note_slug,
            ]);

        } else {
            $organization->note->text = $note_content;
            $organization->note->slug = $note_slug;
            $organization->note->update();
        }

        session()->flash('successMessage', 'Organization Data Updated successfully!');

        return redirect()->route('organization.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $organization = Organization::findOrFail($id);

        $organization->note()->forceDelete();

        $organization->forceDelete();

        session()->flash('successMessage', 'Organization Data Deleted successfully!');

        return redirect()->route('organization.index');
    }






}
