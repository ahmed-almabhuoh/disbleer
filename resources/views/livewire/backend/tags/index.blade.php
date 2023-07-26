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
                <th scope="col"> {{ __('Tag') }} </th>
                <th scope="col"> {{ __('Status') }} </th>
                <th scope="col"> {{ __('Actions') }} </th>
            </tr>
        </thead>
        <tbody>

            @if (!count($tags))
                <tr>
                    <center>
                        <td colspan="4">{{ __('No results found ...!') }}</td>
                    </center>
                </tr>
            @endif

            @php
                $counter = 1;
            @endphp

            @foreach ($tags as $tag)
                <tr>
                    <th scope="row">{{ $counter }}</th>

                    <th>{{ __($tag->tag) }}</th>

                    <td>
                        <span class="{{ $tag->status_class }}"> {{ __(ucfirst($tag->status)) }} </span>
                    </td>

                    <td>
                        <button type="button" onclick="confirmationDelete('{{ Crypt::encrypt($tag->id) }}', this)"
                            class="btn btn-danger"><i class="bi bi-trash"></i></button>

                        <a href="{{ route('tags.edit', Crypt::encrypt($tag->id)) }}" class="btn btn-info"><i
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

    <div class="my-4"> {{ $tags->links() }} </div>

</div>
