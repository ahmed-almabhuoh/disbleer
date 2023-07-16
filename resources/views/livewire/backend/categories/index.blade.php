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
                <th scope="col"> {{ __('Description') }} </th>
                <th scope="col"> {{ __('Status') }} </th>
                <th scope="col"> {{ __('Actions') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($categories))
                <tr>
                    <center>
                        <td colspan="5">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($categories as $category)
                <tr>
                    <th scope="row">{{ $counter }}</th>

                    <th>{{ __($category->title) }}</th>

                    <th>{{ __($category->description) }}</th>

                    <td>
                        <span class="{{ $category->status_class }}"> {{ __(ucfirst($category->status)) }} </span>
                    </td>

                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($category->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('categories.edit', Crypt::encrypt($category->id)) }}" class="btn btn-info"><i
                                class="bi bi-pencil"></i></a>
                    </td>
                </tr>
            @endforeach

            <tr wire:loading>
                <td colspan="5">
                    {{ __('Searching') }}
                </td>
            </tr>
        </tbody>
    </table>
</div>
