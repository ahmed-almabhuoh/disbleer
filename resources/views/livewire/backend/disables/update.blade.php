<form class="row g-3">
    <x-input label="First Name" name="fname" classes="col-6" />

    <x-input label="Last Name" name="lname" classes="col-6" />

    <x-input label="Email" name="email" classes="col-6" />

    <x-input label="Password" name="password" classes="col-6"
        description="If you do not need to change the disable password, keep it empty." />

    <x-select label="Status" name="status" :collection="collect($statuses)" />

    <x-file label="Image" name="image" />

    <x-action submit-action='update()' cancel-action="cancel" submit-text="update" />
</form>
