<section class="section mt-6">
    <div class="columns is-centered">
        <div class="column is-narrow">
            <table class="table is-bordered is-hoverable">
                <thead>
                <tr>
                    <th>
                        <div class="control">
                            <label class="checkbox">
                                <input type="checkbox" id="parentCheckbox">
                            </label>
                        </div>
                    </th>
                    <th>
                        S.No
                    </th>
                    <th>Title</th>
                    <th>Organization Name</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $key => $event)
                    <tr id="tr_{{$event->id}}" class="{{$event->deleted_at ? 'has-background-danger':''}}">
                        <td>
                            <div class="control">
                                <label class="checkbox">
                                    <input type="checkbox" class="checkbox" data-id="{{$event->id}}" id="childCheckbox_{{$event->id}}">
                                </label>
                            </div>
                        </td>
                        <td>{{ ++$key }}</td>
                        <td>{{ $event->name }}</td>
                        <td>
                            @foreach($organizations as $organization)
                                @if($event->organization_id == $organization->id)
                                    {{ $organization->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{$event->created_at}}</td>
                        <td>{{$event->is_active}}</td>
                        <td>
                            <div class="buttons are-small">
                                <button class="button is-primary editEventBtn" data-id="{{ $event->id }}">Edit</button>
                                <button class="button is-info viewEventBtn" data-id="{{ $event->id }}">View</button>
                                <form action="{{ route('events.destroy', ['id' => $event->id, 'filter' => request('filter')]) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger" type="submit" onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                                </form>

                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
