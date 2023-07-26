<div class="container mt-4">
    <h2> {{ __('Transactions') }} </h2>

    <div class="form-group">
        <input type="text" class="form-control" id="searchInput" wire:model="searchReference"
            placeholder="{{ __('Search transactions by reference ...') }}">
    </div>

    <table class="table table-bordered mt-2">
        <thead>
            <tr>
                <th>#</th>
                <th> {{ __('Date') }} </th>
                <th> {{ __('Transaction') }} </th>
                <th> {{ __('Amount') }} </th>
                <th> {{ __('Credits') }} </th>
            </tr>
        </thead>
        <tbody>
            @if (!count($transactions))
                <tr>
                    <td colspan="5">
                        {{ __('No transactions found !') }}
                    </td>
                </tr>
            @endif
            @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->reference_number }}</td>
                    <td> {{ $transaction->created_at->diffForHumans() }} </td>
                    <td> {{ $transaction->type }} </td>
                    <td> {{ $transaction->amount . '$' }} </td>
                    <td> {{ $transaction->credit->credits . ' DIST' }} </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
