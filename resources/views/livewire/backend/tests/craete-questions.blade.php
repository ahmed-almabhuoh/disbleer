<div>
    <form class="row g-3">
        <x-textarea label="Question" name="question" />

        <x-textarea label="Answer" name="answer" />

        <x-checkbox label="Is Active?!" name="is_active" :is-check="true" />

        <x-file label="Files" name="files" :is-multi="true" />

        <x-action submit-action='create()' />
    </form>

    <hr>
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
                    <th scope="col"> {{ __('Question') }} </th>
                    <th scope="col"> {{ __('Answer') }} </th>
                    <th scope="col"> {{ __('Included?') }} </th>
                    <th scope="col"> {{ __('Files') }} </th>
                    <th scope="col"> {{ __('Actions') }} </th>
                </tr>
            </thead>
            <tbody>

                @if (!count($questions))
                    <tr>
                        <center>
                            <td colspan="6">{{ __('No results found ...!') }}</td>
                        </center>
                    </tr>
                @endif

                @php
                    $counter = 1;
                @endphp

                @foreach ($questions as $question)
                    <tr>
                        <td scope="row">{{ $counter }}</td>

                        <td>{{ __($question->question) }}</td>

                        <td>{{ __($question->answer) }}</td>

                        <td>{{ __($question->is_active ? __('YES') : __('NOT')) }}</td>

                        <td>{{ $question->files ?? __('No Files') }}</td>

                        <td>
                            <button type="button" wire:click="deleteQuestion('{{ Crypt::encrypt($question->id) }}')"
                                class="btn btn-danger"><i class="bi bi-trash"></i></button>

                            <button type="button" wire:click="updateQuestion('{{ Crypt::encrypt($question->id) }}')"
                                class="btn btn-info"><i class="bi bi-pencil"></i></button>
                        </td>
                    </tr>
                    @php
                        $counter++;
                    @endphp
                @endforeach

                <tr wire:loading>
                    <td colspan="6">
                        {{ __('Searching') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>



</div>
