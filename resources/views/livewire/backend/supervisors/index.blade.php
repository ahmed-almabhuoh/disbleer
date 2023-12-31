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

            @if (!count($supervisors))
                <tr>
                    <center>
                        <td colspan="7">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($supervisors as $supervisor)
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    @if ($supervisor->image)
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ Storage::url($supervisor->image) }}" alt="Profile Photo"
                                    class="rounded-circle me-2" style="width: 50px; height: 50px; border-radius: 50%;">
                                {{-- <span class="{{ $supervisor->status_class }}">{{ __(ucfirst($supervisor->status)) }}</span> --}}
                            </div>
                        </td>
                    @else
                        <td>{{ __('No image') }}</td>
                    @endif
                    <td> {{ ucfirst($supervisor->name) }} </td>
                    <td> {{ $supervisor->email }} </td>
                    <td>
                        <span class="{{ $supervisor->status_class }}"> {{ __(ucfirst($supervisor->status)) }} </span>
                    </td>
                    <td>
                        <button type="button"
                            onclick="confirmationDelete('{{ Crypt::encrypt($supervisor->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('supervisors.edit', Crypt::encrypt($supervisor->id)) }}"
                            class="btn btn-info"><i class="bi bi-pencil"></i></a>
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

    <div class="my-4"> {{ $supervisors->links() }} </div>

</div>
