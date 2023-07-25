<div>
    <!-- Search input field -->
    <div class="form-group">
        <input type="text" class="form-control" id="searchInput" placeholder="{{ __('Search conversations...') }}"
            wire:model="searchTerm">
    </div>

    <div class="list-group">
        <!-- Conversation Item 1 -->
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">John Doe</h5>
                <small>2 hours ago</small>
            </div>
            <p class="mb-1">Hey, how are you doing?</p>
        </a>

        <!-- Conversation Item 2 -->
        <a href="#" class="list-group-item list-group-item-action">
            <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">Jane Smith</h5>
                <small>1 day ago</small>
            </div>
            <p class="mb-1">Can you please send me the document?</p>
        </a>

        <!-- Add more conversation items here if needed -->
    </div>
</div>
