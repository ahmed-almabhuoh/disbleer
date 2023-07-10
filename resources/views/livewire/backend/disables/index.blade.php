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
                <th scope="col"> {{ __('Image') }} </th>
                <th scope="col"> {{ __('Name') }} </th>
                <th scope="col"> {{ __('Email') }} </th>
                <th scope="col"> {{ __('Status') }} </th>
                <th scope="col"> {{ __('Actions') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($disables))
                <tr>
                    <center>
                        <td colspan="6">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($disables as $disable)
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    @if ($disable->image)
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ Storage::url($disable->image) }}" alt="Profile Photo"
                                    class="rounded-circle me-2" style="width: 50px; height: 50px; border-radius: 50%;">
                                {{-- <span class="{{ $disable->status_class }}">{{ __(ucfirst($disable->status)) }}</span> --}}
                            </div>
                        </td>
                    @else
                        <td>{{ __('No image') }}</td>
                    @endif
                    <td> {{ ucfirst($disable->name) }} </td>
                    <td> {{ $disable->email }} </td>
                    <td>
                        <span class="{{ $disable->status_class }}"> {{ __(ucfirst($disable->status)) }} </span>
                    </td>
                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($disable->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('disables.edit', Crypt::encrypt($disable->id)) }}" class="btn btn-info"><i
                                class="bi bi-pencil"></i></a>
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
