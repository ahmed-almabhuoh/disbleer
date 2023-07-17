<form class="row g-3">
    <x-input label="Course Name" name="name" classes="col-6" />

    <x-input label="Course Indicator" name="indicatorName" classes="col-6" />

    <x-select label="Status" name="status" :collection="collect($statuses)" />

    <x-select label="Type" name="type" :collection="collect($types)" />

    <x-select label="Category" name="selectedCategory" :collection="collect($catArray)" />

    @if ($type == 'external')
        <x-input label="Course Link" name="courseLink" classes="col-12" type="link" />
    @endif

    <x-select label="Prevoius Courses" name="pre_courses" :collection="collect($courses)" :is-multi="true" />

    <x-file label="Images" name="images" :is-multi="true" />

    {{-- <textarea name="asd" id="asd" wire:model="asd" cols="30" rows="10"></textarea> --}}

    <x-textarea label="Course Description" name="courseDescription" />

    <x-textarea label="Course Blog" name="courseBlog" />

    <x-action submit-action='create()' />
</form>
