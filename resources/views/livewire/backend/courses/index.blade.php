<div>
    <div class="mb-4 input-group">
        <div class="form-outline col-sm-6">
            <label class="form-label" for="form1"> {{ __('Search') }} </label>
            <input type="search" id="form1" wire:model="searchTerm" class="form-control" />
        </div>
    </div>

    <table class="table">

        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col"> {{ __('Name') }} </th>
                <th scope="col"> {{ __('Slug') }} </th>
                <th scope="col"> {{ __('Indicate') }} </th>
                <th scope="col"> {{ __('Category') }} </th>
                <th scope="col"> {{ __('Status') }} </th>
                <th scope="col"> {{ __('Score') }} </th>
                <th scope="col"> {{ __('Actions') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($courses))
                <tr>
                    <center>
                        <td colspan="8">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($courses as $course)
                <tr>
                    <th scope="row">{{ $counter }}</th>

                    <th>{{ __($course->name) }}</th>

                    <th>{{ __($course->slug) }}</th>

                    <th> {{ $course->indicate }} </th>

                    <th>
                        <a href="{{ route('categories.edit', Crypt::encrypt($course->category->id)) }}">
                            {{ $course->category->title }}</a>
                    </th>

                    <td>
                        <span class="{{ $course->status_class }}"> {{ __(ucfirst($course->status)) }} </span>
                    </td>

                    <th> {{ $course->score }} </th>

                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($course->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('courses.edit', Crypt::encrypt($course->id)) }}" class="btn btn-info"><i
                                class="bi bi-pencil"></i></a>
                    </td>
                </tr>

                @php
                    $counter++;
                @endphp
            @endforeach

            <tr wire:loading>
                <td colspan="7">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="my-4"> {{ $courses->links() }} </div>

</div>
