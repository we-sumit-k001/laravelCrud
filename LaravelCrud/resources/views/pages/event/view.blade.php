@foreach($events as $event)

    <div class="modal" id="view_form_{{ $event->id }}">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">View-{{$event->id}}</p>
                <button class="delete" id="close_top" aria-label="close" onclick="closeEditForm({{ $event->id }})"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">

                    <div class="field">
                        <label class="label">id</label>
                        <div class="control">
                            {{ $event->id }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label"> Name</label>
                        <div class="control">
                            {{ $event->name }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Slug</label>
                        <div class="control">
                            {{ $event->slug }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Organization Name</label>
                        <div class="control">

                            {{ optional($event->organization)->name}}


                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            {{$event->description}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Event Type</label>
                        <div class="control">
                            {{$event->event_type}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Topics</label>
                        <div class="control">
                            {{$event->topics}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Speaker Accepted Application</label>
                        <div class="control">
                            {{$event->is_accepted_speaker_application}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Notes</label>
                        <div class="control">
                            {{ optional($event->note)->text }}
                            {{--{{ dd($event->note) }}--}}
                        </div>
                    </div>



                    <div class="field">
                        <label class="label">Proposed Date</label>
                        <div class="control">
                            {{$event->has_proposed_date}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">From Date</label>
                        <div class="control">
                            {{$event->from_date}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">To Data</label>
                        <div class="control">
                            {{$event->to_date}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Status</label>
                        <div class="control">
                            {{$event->is_active}}
                        </div>
                    </div>


                    <div class="field">
                        <label class="label">Created Time</label>
                        <div class="control">
                            {{ $event->created_at }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Last Update</label>
                        <div class="control">
                            {{ $event->updated_at }}
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endforeach
