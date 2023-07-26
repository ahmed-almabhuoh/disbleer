<form class="row g-3">
    <x-input label="Name" name="name" classes="col-12" />

    <x-select label="Status" name="status" :collection="collect($statuses)" classes="col-12" />

    <x-action submit-action='create()' />
</form>
