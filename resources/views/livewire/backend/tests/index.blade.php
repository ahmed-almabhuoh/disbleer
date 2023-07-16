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
                <th scope="col"> {{ __('Subject') }} </th>
                <th scope="col"> {{ __('Description') }} </th>
                <th scope="col"> {{ __('Degree') }} </th>
                <th scope="col"> {{ __('Attempts') }} </th>
                <th scope="col"> {{ __('Pre-Tests') }} </th>
                <th scope="col"> {{ __('Passing Score') }} </th>
                <th scope="col"> {{ __('Time') }} </th>
                <th scope="col"> {{ __('Sequential') }} </th>
                <th scope="col"> {{ __('Status') }} </th>
                <th scope="col"> {{ __('Submitted No.') }} </th>
                <th scope="col"> {{ __('Actions') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($tests))
                <tr>
                    <center>
                        <td colspan="12">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($tests as $test)
                <tr>
                    <th scope="row">{{ $counter }}</th>

                    <th>{{ __($test->subject) }}</th>

                    <th>{{ __($test->description) }}</th>

                    <th>{{ __($test->degree) }}</th>

                    <th>{{ __($test->attempts) }}</th>

                    <th>{{ __($test->pre_tests) }}</th>

                    <th> {{ $test->passing_score }} </th>

                    <th> {{ $test->time_in_minutes . ' ' . __('M') }} </th>

                    <th> {{ $test->sequential ? __('Seq') : __('Not Seq') }} </th>

                    <td>
                        <span class="{{ $test->status_class }}"> {{ __(ucfirst($test->status)) }} </span>
                    </td>

                    <th> Submitted No. </th>

                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($test->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('tests.edit', Crypt::encrypt($test->id)) }}" class="btn btn-info">
                            <i class="bi bi-pencil"></i></a>

                        <a href="{{ route('tests.create-questions', Crypt::encrypt($test->id)) }}" class="btn btn-warning">
                            <i class="bi bi-question-lg"></i>
                        </a>
                    </td>
                </tr>
            @endforeach

            <tr wire:loading>
                <td colspan="12">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
