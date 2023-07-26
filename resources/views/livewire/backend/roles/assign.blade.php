<div>
    @if ($showNotification)
        <div class="alert alert-primary" role="alert">
            {{ $msg }}
        </div>
    @endif
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
                <th scope="col"> {{ __('Guard Name') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($permissions))
                <tr>
                    <center>
                        <td colspan="3">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @foreach ($permissions as $permission)
                <tr>
                    <td scope="row">
                        <input type="checkbox" wire:click="submitAssigning('{{ Crypt::encrypt($permission->id) }}')"
                            @if ($permission->assigned) checked @endif>
                    </td>

                    <td>{{ __($permission->name) }}</td>

                    <td>{{ __($permission->guard_name) }}</td>
                </tr>
            @endforeach

            <tr wire:loading>
                <td colspan="3">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>

    {{ $permissions->links() }}
</div>
