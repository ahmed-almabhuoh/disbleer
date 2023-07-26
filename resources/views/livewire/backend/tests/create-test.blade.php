<form class="row g-3">
    <x-input label="Test Subject" name="subject" classes="col-4" />

    <x-input label="Test Degree" name="degree" type="number" classes="col-4" min="1" max='100' />

    <x-input label="Test Attempts" name="attempts" type="number" classes="col-4" min="1" max='10' />

    <x-textarea label="Test Description" name="description" />

    <x-select label="Pre-Tests" name="tests" :collection="collect($tests)" :is-multi="true" />

    <x-input label="Passing Score" name="passing_score" type="number" classes="col-6" min="40" max='99' />

    <x-input label="Time in Minutes" name="time_in_minutes" type="number" classes="col-6" min="5"
        max='300' />

    <x-select label="Status" name="status" :collection="collect($statuses)" />

    <x-checkbox label="Is Sequential?!" name="sequential" :is-check="true" />


    <x-action submit-action='create()' />
</form>
