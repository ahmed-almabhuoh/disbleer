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
                <th scope="col"> {{ __('Period') }} </th>
                <th scope="col"> {{ __('Salary') }} </th>
                <th scope="col"> {{ __('Proposal') }} </th>
                <th scope="col"> {{ __('VAT') }} </th>
                <th scope="col"> {{ __('Added at') }} </th>
                <th scope="col"> {{ __('Action') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($proposals))
                <tr>
                    <center>
                        <td colspan="8">{{ __('No proposals yet ... !!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($proposals as $proposal)
                <tr>
                    <td scope="row">{{ $counter }}</td>

                    <td>{{ __($proposal->disable->name) }}</td>

                    <td>{{ $proposal->period . ' D' }}</td>

                    <td>{{ $proposal->salary . '$' }}</td>

                    {{-- <td style="width: 400px;">{{ $proposal->proposal }}</td> --}}
                    <td style="width: 400px;">
                        {!! nl2br(e($proposal->proposal)) !!}
                    </td>

                    <td>{{ $proposal->vat }}</td>

                    <td>{{ $proposal->created_at->diffForHumans() }}</td>

                    <td>
                        <a href="{{ route('chats.conversations.create', Crypt::encrypt($proposal->id)) }}"
                            class="btn btn-info"><i class="bi bi-chat"></i></a>
                    </td>
                </tr>

                @php
                    ++$counter;
                @endphp
            @endforeach

            <tr wire:loading>
                <td colspan="8">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
