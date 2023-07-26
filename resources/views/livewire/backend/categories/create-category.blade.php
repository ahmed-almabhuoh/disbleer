<form class="row g-3">
    <x-input label="Title" name="title" classes="col-6" />

    <x-select label="Status" name="status" :collection="collect($statuses)" classes="col-6" />

    <x-textarea label="Description" name="description" />

    <x-file label="icon" name="icon" />

    <x-action submit-action='create()' />
</form>
