<form class="row g-3">
    <x-input label="Title" name="title" classes="col-12" />

    <x-textarea label="Job Description" name="description" classes="col-12" />

    <x-file label="Media" name="files" :is-multi="true" classes="col-12" />

    <x-select label="Type" name="type" :collection="collect($types)" classes="col-12" />

    <x-checkbox label="Limited ?!" name="is_limited" :is-check="true" />

    @if ($is_limited)
        <x-date label="From Date" name="from_date" classes="col-6" />

        <x-date label="To Date" name="to_date" classes="col-6" />
    @endif

    <x-input label="Started Salary" name="started_salary" type="number" classes="col-6" />

    <x-input label="End Salary" name="end_salary" type="number" classes="col-6" />

    <x-select label="Tags" name="tags" :collection="collect($allTags)" classes="col-12" :is-multi="true" />


    <x-action submit-action='create()' />
</form>
