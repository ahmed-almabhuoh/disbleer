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

            @if (!count($managers))
                <tr>
                    <center>
                        <td colspan="6">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($managers as $manager)
                <tr>
                    <th scope="row">{{ $counter }}</th>
                    @if ($manager->image)
                        <td> {{ $manager->image }} </td>
                    @else
                        <td>{{ __('No image') }}</td>
                    @endif
                    <td> {{ ucfirst($manager->name) }} </td>
                    <td> {{ $manager->email }} </td>
                    <td>
                        <span class="{{ $manager->status_class }}"> {{ __(ucfirst($manager->status)) }} </span>
                    </td>
                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($manager->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('managers.edit', Crypt::encrypt($manager->id)) }}" class="btn btn-info"><i
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
