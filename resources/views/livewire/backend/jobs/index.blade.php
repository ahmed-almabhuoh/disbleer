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
                <th scope="col"> {{ __('Job') }} </th>
                @if (auth('manager')->check())
                    <th scope="col"> {{ __('Supverisor') }} </th>
                @endif
                <th scope="col"> {{ __('Salary From') }} </th>
                <th scope="col"> {{ __('Salary To') }} </th>
                <th scope="col"> {{ __('From Date') }} </th>
                <th scope="col"> {{ __('To Date') }} </th>
                <th scope="col"> {{ __('Type') }} </th>
                <th scope="col"> {{ __('Status') }} </th>
                <th scope="col"> {{ __('Action') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($jobs))
                <tr>
                    <center>
                        <td colspan="9">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($jobs as $job)
                <tr>
                    <td scope="row">{{ $counter }}</td>

                    <td>{{ __($job->title) }}</td>

                    @if (auth('manager')->check())
                        <td>{{ $job->supervisor ? $job->supervisor->name : __('Manager') }}</td>
                    @endif

                    <td>{{ $job->started_salary . ' $' }}</td>

                    <td>{{ $job->end_salary . ' $' }}</td>

                    <td>{{ $job->from_date }}</td>

                    <td>{{ $job->to_date }}</td>

                    <td>{{ $job->type }}</td>

                    <td>
                        <span class="{{ $job->status_class }}"> {{ __(ucfirst($job->status)) }} </span>
                    </td>

                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($job->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        @if ($job->status == 'in-progress')
                            <a href="{{ route('jobs.edit', Crypt::encrypt($job->id)) }}" class="btn btn-info"><i
                                    class="bi bi-pencil"></i></a>
                        @endif

                        @if (count($job->proposals))
                            <a href="{{ route('jobs.proposals', Crypt::encrypt($job->id)) }}" class="btn btn-warning">
                                <i class="bi bi-file-text"></i>
                                {{ count($job->proposals) }}
                            </a>
                        @endif
                    </td>
                </tr>

                @php
                    ++$counter;
                @endphp
            @endforeach

            <tr wire:loading>
                <td colspan="9">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>

    <div class="my-4"> {{ $jobs->links() }} </div>
</div>
