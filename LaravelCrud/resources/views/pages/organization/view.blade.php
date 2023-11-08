@foreach($organizations as $organization)

    <div class="modal" id="view_form_{{ $organization->id }}">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">View-{{$organization->id}}</p>
                <button class="delete" id="close_top" aria-label="close" onclick="closeEditForm({{ $organization->id }})"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">

                    <div class="field">
                        <label class="label">id</label>
                        <div class="control">
                            {{ $organization->id }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label"> Name</label>
                        <div class="control">
                            {{ $organization->name }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Notes</label>
                        <div class="control">
                            {{ optional($organization->note)->text }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Status</label>
                        <div class="control">
                            {{$organization->is_active}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">slug</label>
                        <div class="control">
                            {{$organization->slug}}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Created Time</label>
                        <div class="control">
                            {{ $organization->created_at }}
                        </div>
                    </div>

                    <div class="field">
                        <label class="label">Last Update</label>
                        <div class="control">
                            {{ $organization->updated_at }}
                        </div>
                    </div>

                </div>
            </section>
        </div>
    </div>
@endforeach
