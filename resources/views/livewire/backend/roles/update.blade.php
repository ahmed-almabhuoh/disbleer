<form class="row g-3">
    <x-input label="Name" name="name" />

    {{-- <x-select label="Status" name="status" :collection="[
        'active' => __('Active'),
        'inactive' => __('Inactive'),
    ]" classes="col-12" /> --}}

    <x-action submit-action='create()' />
</form>
