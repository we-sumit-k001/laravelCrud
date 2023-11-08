<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Organization;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class EventController extends Controller
{
    public function index(Request $request)
    {

        $events = Event::query();

        if($request->has('filter') && $request->filter)
        {
            $filter_method = $request->filter;

            $events->$filter_method();

        }


        $events = $events->get();

        $organizations = Organization::all();

        return view('pages.event.main', compact('events','organizations'));


    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'organization_id' => 'required',
            'description' => 'required',
            'topics' => 'required',
            'event_type' => 'required',
        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $data['has_proposed_date'] = $request->input('proposed_date');

        $data['is_accepted_speaker_application'] = $request->has('accept_speaker') ? 'yes' : 'no';

        $data['event_type'] = $request->input('event_type');

        $data['is_active'] = $request->input('status');

        $event = Event::create($data);

        $note_content = $request->input('notes');

        $note_slug = Str::slug($note_content);

        $event->note()->create([
            'text' => $note_content,
            'slug' => $note_slug,
        ]);


        session()->flash('successMessage', 'Event Data Inserted successfully!');

        return redirect()->route('event.create');
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'organization_id' => 'required',
            'description' => 'required',
            'topics' => 'required',
            'event_type' => 'required',
        ]);

        $event = Event::withTrashed()->findOrFail($id);

        $data = $request->all();

        $data['slug'] = Str::slug($request->name);

        $data['has_proposed_date'] = $request->input('proposed_date');

        $data['is_accepted_speaker_application'] = $request->has('accept_speaker') ? 'Yes' : 'No';

        $data['is_active'] = $request->get('status');

        $event->update($data);

        $note_content = $request->get('notes');

        $note_slug = Str::slug($request->notes);

        if (!$event->note) {
            $event->note()->create([
                'text' => $note_content,
                'slug' => $note_slug,
            ]);
        } else {
            $event->note->text = $note_content;
            $event->note->slug = $note_slug;
            $event->note->update();
        }

        session()->flash('successMessage', 'Event Data Updated successfully!');

        return redirect()->route('event.create',/* ['filter' => 'withTrashed']*/);
    }







    public function changeStatus(Request $request)
    {

        $ids = $request->ids;

        $events = Event::withTrashed()->whereIn('id', explode(",", $ids))->get();

        $status = $events[0]->is_active;


        $new_status= $status === 'active' ? 'inactive' : 'active';

        Event::whereIn('id', explode(",", $ids))->update(['is_active' => $new_status]);

        return response()
        ->json(['status' => true, 'message' => "Status of selected events updated successfully."]);
    }

    public function restore(Request $request)
    {
        $ids = $request->ids;

        Event::whereIn('id', explode(",", $ids))->restore();

        $restoredEvents = Event::withTrashed()->whereIn('id', explode(",", $ids))->get();

        foreach ($restoredEvents as $restoredEvent) {
            $note = $restoredEvent->note;
            if ($note) {
                $note->restore();
            }
        }

    return response()
   ->json(['status' => true, 'message' => "Trashed events and their associated notes restored successfully."]);
    }




    /*Here We Implement the Soft Delete*/

    public function trash(Request $request)
    {

        $ids = $request->ids;

        Event::whereIn('id', explode(",", $ids))->get()->each(function ($event) {

            $event->note()->delete();
        });

        Event::whereIn('id', explode(",", $ids))->delete();

        return response()->json(['status'=>true,'message'=>" Checked Events successfully removed."]);


    }


    /*Here single record delete */

    public function delete(Request $request, $id)
    {
        $event = Event::withTrashed()->with('note')->find($id);

        if (!$event) {
            return redirect()->route('event.create', ['filter' => $request->query('filter')]);
        }
        if (!$event->note) {

            session()->flash('successMessage', 'The note attach with event not found!');
        }

        $event->note()->forceDelete();

        $event->forceDelete();

        session()->flash('successMessage', 'Event Data Deleted permanently!');

        return redirect()->route('event.create', ['filter' => $request->query('filter')]);
    }









    /*Here Multiple Record Delete*/

    public function multipleDelete(Request $request)
    {
        $ids = $request->ids;

        Event::withTrashed()->whereIn('id', explode(",", $ids))->get()->each(function ($event) {
            $event->note()->forceDelete();
        });

        Event::withTrashed()->whereIn('id', explode(",", $ids))->forceDelete();

        return response()->json(['status' => true,
            'message' => "Checked Events successfully removed."]);
    }


}
