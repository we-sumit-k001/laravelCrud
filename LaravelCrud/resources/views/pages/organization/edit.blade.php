@foreach($organizations as $organization)
    <form action="{{ route('organizations.update', $organization->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal" id="edit_form_{{ $organization->id }}">
            <div class="modal-background"></div>
            <div class="modal-card">
                <header class="modal-card-head">
                    <p class="modal-card-title">Edit-{{$organization->id}}</p>
                    <button class="delete" id="close_top" aria-label="close" onclick="closeEditForm({{ $organization->id }})"></button>
                </header>
                <section class="modal-card-body">
                    <div class="content">
                        <div class="field">
                            <label class="label">Name</label>
                            <div class="control">
                                <input class="input is-success" type="text" id="name" name="name" value="{{ $organization->name }}" placeholder="Enter Organization Name">
                                <span class="has-text-danger">
                                        @error('name')
                                    {{$message}}
                                    @enderror
                                    </span>
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Notes</label>

                            <div class="control">
                                <input class="input is-success" type="text" id="notes" name="notes" value="{{ optional($organization->note)->text }}" placeholder="Enter Notes">
                            </div>


                        </div>
                        <div class="field">
                            <label class="label">Status</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="status" id="status">
                                        <option value="Inactive" {{ $organization->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                                        <option value="Active" {{ $organization->status == 'Active' ? 'selected' : '' }}>Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
