<div class="field has-addons ml-6">
    <div class="control">
        <span class="select">
            <select id="bulkActionDropdown">
                <option value="">Select an action</option>
                <option value="changeStatus">Change Status</option>
                <option value="trash">Trash</option>
                <option value="restore">Restore</option>
                <option value="delete">Delete</option>
            </select>
        </span>
    </div>
    <div class="control" id="statusDropdownContainer" style="display: none;">
            <span class="select">
            <select id="statusDropdown">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
            </span>
    </div>
    <div class="control">
        <a class="button is-success" id="applyButton">Apply</a>
    </div>
</div>


<div class="field has-addons is-justify-content-flex-end mr-6">
    <div class="control">
        <span class="select">
            <select id="bulkActionRestore">
                <option value="">Select an action</option>
                <option value="WithTrash">WithTrash</option>
                <option value="onlyTrash">OnlyTrash</option>
            </select>
        </span>
    </div>
    <div class="control">
        <a class="button is-primary" id="applyButtonTrash">Apply</a>
    </div>
</div>
