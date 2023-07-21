<form class="row g-3">
    <x-input label="Name" name="name" />

    <x-select label="Guard" name="guard_name" :collection="[
        'manager' => __('Manager'),
        'supervisor' => __('Supervisor'),
    ]" classes="col-12" />

    <x-action submit-action='create()' />
</form>
