@foreach($events as $event)
    <form action="{{ route('events.update', $event->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal" id="edit_form_{{ $event->id }}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Edit Event {{$event->id}} </p>
                    <button class="delete" id="close_top" aria-label="close"></button>
                </header>
                <section class="modal-card-body">

                    <div class="content">

                        <div class="field">
                            <label class="label">Event Name</label>
                            <div class="control">
                                <input class="input is-success" type="text" id="name" name="name" value="{{$event->name}}">
                                <span class="has-text-danger">
                                    @error('name')
                                    {{$message}}
                                    @enderror

                                </span>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Organization Name</label>
                            <div class="control">
                                <div class="field has-addons is-justify-content-flex-end">
                                    <div class="control is-expanded">
                                                <span class="select is-fullwidth">
                                                   <select name="organization_id" id="organization_id">
                                                     <option value="">Select Organization</option>
                                                       @foreach($organizations as $organization)
                                                           <option value="{{ $organization->id }}" @if($event->organization_id == $organization->id) selected @endif>{{ $organization->name }}</option>
                                                       @endforeach
                                                   </select>
                                                </span>
                                    </div>
                                    <div class="control">
                                        <a href="{{ '/organization/create' }}" class="button is-primary" >Manage Organization</a>
                                        <span class="has-text-danger">
                                    @error('organization_id')
                                            {{ $message }}
                                            @enderror
                                </span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="field">
                            <label class="label">Description</label>
                            <div class="control">
                                <input class="input is-success" type="text" id="description" name="description" value="{{$event->description}}">
                            </div>
                            <span class="has-text-danger">
                               @error('description')
                                {{$message}}
                                @enderror
                                </span>
                        </div>


                        <div class="field">
                            <label class="label">Event Type</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="event_type" id="event_type">
                                        <option value="In-person">In-Person</option>
                                        <option value="Virtual">Virtual</option>
                                    </select>
                                </div>
                            </div>
                            <span class="has-text-danger">
                                    @error('event_type')
                                {{$message}}
                                @enderror
                                </span>
                        </div>

                        <div class="field">
                            <label class="label">Topics</label>
                            <div class="control">
                                <input class="input is-success" type="text" id="topics" name="topics" value="{{$event->topics}}">
                            </div>

                            <span class="has-text-danger">
                                    @error('topics')
                                {{$message}}
                                @enderror
                                </span>
                        </div>

                        <div class="field">
                            <label class="label">Notes</label>

                            <div class="control">
                                <input class="input is-success" type="text" id="notes"
                                       name="notes" value="{{ optional($event->note)->text }}"
                                       placeholder="Enter Notes">
                            </div>

                            <span class="has-text-danger">
                                @error('notes')
                                {{$message}}
                                @enderror
                                </span>
                        </div>

                        <div class="field">
                            <label class="label">Proposed Date</label>
                            <div class="control">
                                <label class="radio">
                                    <input type="radio" name="proposed_date" class="date-radio" data-id="{{ $event->id }}" value="event-date" {{ old('proposed_date', $event->has_proposed_date) === 'event-date' ? 'checked' : '' }}>
                                    Event Date(s)
                                </label>
                                <label class="radio">
                                    <input type="radio" name="proposed_date" class="date-radio" data-id="{{$event->id}}" value="unknown" {{ old('proposed_date', $event->has_proposed_date) === 'unknown' ? 'checked' : '' }}>
                                    Unknown
                                </label>
                            </div>
                            <span class="has-text-danger">
                                     @error('proposed_date')
                                {{ $message }}
                                @enderror
                                </span>
                        </div>



                        <div class="field">
                            <label class="label">From</label>
                            <div class="control">
                                <input class="input is-success" type="date" id="from_{{ $event->id }}" name="from" value="{{ $event->from_date }}">
                            </div>
                            <span class="has-text-danger">
                                @error('from_date')
                                {{$message}}
                                @enderror
                            </span>
                        </div>

                        <div class="field">
                            <label class="label">To</label>
                            <div class="control">
                                <input class="input is-success" type="date" id="to_{{ $event->id }}" name="to" value="{{ $event->from_date }}">
                            </div>
                            <span class="has-text-danger">
                                @error('to_date')
                                {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="field">
                            <label class="label">Status</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="status" id="status">
                                        <option value="Inactive">Inactive</option>
                                        <option value="Active">Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="control mt-4">
                            <label class="checkbox">
                                <input type="checkbox" id="accept_speaker" name="accept_speaker">
                                Accept Speaker Applications?
                            </label>
                        </div>
                        <input type="hidden" name="accept_speaker_value" id="accept-speaker-value">
                    </div>
                </section>
                <footer class="modal-card-foot">
                    <button class="button is-link" type="submit" name="submit_btn" id="submit_btn">Submit</button>
                    <button class="button is-danger" type="reset" value="Reset input" name="reset" id="reset_btn">Reset</button>
                </footer>
            </div>
        </div>
    </form>

@endforeach
