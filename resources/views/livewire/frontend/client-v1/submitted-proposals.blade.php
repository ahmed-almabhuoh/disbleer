<div class="container mt-4">
    <h2> {{ __('Proposals') }} </h2>

    <!-- Search input field -->
    <div class="form-group">
        <input type="text" class="form-control mb-2" id="searchInput" placeholder="Search proposals...">
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ __('Job') }}</th>
                <th>{{ __('Proposal') }}</th>
                <th> {{ __('Salary') }} </th>
                <th> {{ __('Period') }} </th>
                <th> {{ __('VAT') }} </th>
                <th> {{ __('Submitted at') }} </th>
                <th> {{ __('Chatting') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($proposals))
                <tr>
                    <td colspan="8">
                        {{ __('No data found yet !!') }}
                    </td>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($proposals as $proposal)
                <tr>
                    <td>{{ $counter }}</td>
                    <td>{{ $proposal->job->title }}</td>
                    {{-- <td style="width: 600px;">{{ $proposal->proposal }}</td> --}}
                    <td style="width: 600px;">
                        {!! nl2br(e($proposal->proposal)) !!}
                    </td>
                    <td>{{ $proposal->salary . '$' }}</td>
                    <td>{{ $proposal->period . 'D' }}</td>
                    <td>{{ $proposal->vat . '$' }}</td>
                    <td>{{ $proposal->created_at->diffForHumans() }}</td>

                    <td>
                        @php
                            $creatorId = $proposal->job->supervisor;
                        @endphp
                        @if (is_null($proposal->job->supervisor))
                            @php
                                $creatorId = App\Models\Manager::where('id', $proposal->job->supervisor_id)->first();
                                dd($creatorId);
                            @endphp
                        @endif
                        @if (App\Models\Conversation::where([
                                ['disable_id', '=', auth()->user()->id],
                                ['supervisor_id', '=', $creatorId],
                                ['job_id', '=', $proposal->job->id],
                            ])->exists())
                            <a href="{{ route('chats.conversations.create', Crypt::encrypt($proposal->id)) }}"
                                class="btn btn-info"><i class="bi bi-chat"></i></a>
                        @endif
                    </td>
                </tr>

                @php
                    $counter++;
                @endphp
            @endforeach

        </tbody>
    </table>

    <div class="my-4">{{ $proposals->links() }}</div>
</div>
