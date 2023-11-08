<form action="{{ route('organizations.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal" id="event_modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Create An Organization</p>
                <button class="delete" id="close_top" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <div class="content">

                    <div class="field">
                        <label class="label">Organization Name</label>
                        <div class="control">
                            <input class="input is-success" type="text" id="name" name="name"  placeholder="Enter Organization Name">
                        </div>
                        <span class="has-text-danger">
                                    @error('name')
                            {{$message}}
                            @enderror
                                </span>
                    </div>

                    <div class="field">
                        <label class="label">Notes</label>
                        <div class="control">
                            <input class="input is-success" type="text" id="notes" name="notes"  placeholder="Enter Notes">
                        </div>
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

                </div>
            </section>

            <footer class="modal-card-foot">
                <button class="button is-link" type="submit" name="submit_btn" id="submit_btn">Submit</button>
                <button class="button is-danger" type="reset" value="Reset input" name="reset" id="reset_btn">Reset</button>
            </footer>
        </div>
    </div>
</form>
