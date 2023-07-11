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
                <th scope="col"> {{ __('Title') }} </th>
                <th scope="col"> {{ __('Reporter') }} </th>
                <th scope="col"> {{ __('Reportee') }} </th>
                <th scope="col"> {{ __('Report') }} </th>
                <th scope="col"> {{ __('Media') }} </th>
                <th scope="col"> {{ __('Reported From') }} </th>
                <th scope="col"> {{ __('Action') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($reports))
                <tr>
                    <center>
                        <td colspan="8">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($reports as $report)
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    <td>
                        {{ ucfirst($report->title) }}
                    </td>

                    <td>
                        {{ $report->reporterFromName }}
                    </td>

                    <td>
                        {{ $report->reportedFromName }}
                    </td>

                    <td>
                        <div id="report"
                            style="width: 250px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                            {{ $report->report }}
                        </div>
                        <button onclick="expandText()">Expand</button>
                    </td>

                    <td>
                        Media Here
                    </td>

                    <td>
                        {{ __(ucfirst($report->report_from)) }}
                    </td>


                    <td>
                        {{-- <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($report->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('reports.edit', Crypt::encrypt($report->id)) }}" class="btn btn-info"><i
                                class="bi bi-pencil"></i></a> --}}

                        Actions HERE
                    </td>
                </tr>
            @endforeach

            <tr wire:loading>
                <td colspan="7">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

@push('scripts')
<script>
    function expandText() {
      var reportDiv = document.getElementById("report");
      reportDiv.style.whiteSpace = "normal";
      reportDiv.style.overflow = "auto";
      reportDiv.style.textOverflow = "unset";
    }
  </script>
@endpush
