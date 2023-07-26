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
                <th scope="col"> {{ __('Guard') }} </th>
                <th scope="col"> {{ __('Permissions') }} </th>
                <th scope="col"> {{ __('Actions') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($roles))
                <tr>
                    <center>
                        <td colspan="4">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($roles as $role)
                <tr>
                    <td scope="row">{{ $counter }}</td>

                    <td>{{ __(ucfirst($role->name)) }}</td>

                    <td>{{ __(ucfirst($role->guard_name)) }}</td>

                    <td>
                        <a href="{{ route('permissions.assign', Crypt::encrypt($role->id)) }}"
                            class="btn btn-outline-info">
                            {{ __('Permissions') . ' (' . $role->permissions()->count() . ')' }} </a>
                    </td>

                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($role->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('roles.edit', Crypt::encrypt($role->id)) }}" class="btn btn-info"><i
                                class="bi bi-pencil"></i></a>
                    </td>
                </tr>

                @php
                    ++$counter;
                @endphp
            @endforeach

            <tr wire:loading>
                <td colspan="4">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
