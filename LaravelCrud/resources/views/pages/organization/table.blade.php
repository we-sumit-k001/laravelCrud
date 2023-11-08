<section class="section">
    <div class="columns is-centered">
        <div class="column is-narrow">
            <table class="table is-bordered is-hoverable">
                <thead>
                <tr>
                    <th>Organization Name</th>
                    <th>Status</th>
                    <th>Created At </th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($organizations as $organization)
                    <tr>
                        <td>{{ $organization->name }}</td>
                        <td>{{ $organization->is_active }}</td>
                        <td>{{ $organization->created_at }}</td>
                        <td>
                            <div class="buttons are-small">
                                <button class="button is-primary editOrganizationBtn" data-id="{{ $organization->id }}">Edit</button>
                                <button class="button is-info viewOrganizationBtn" data-id="{{ $organization->id }}">View</button>
                                <form action="{{ route('organizations.destroy', $organization->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="button is-danger" type="submit">Delete</button>
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
