{{-- public function __construct(public $submitAction, public $submitText = 'Submit', public $cancelText= 'Cancel', public $cancelAction = 'cancel', public $classes = 'text-center') --}}

<div class="{{ $classes }}">
    <button type="button" wire:click="{{ $submitAction }}" class="btn btn-primary"> {{ __(ucfirst($submitText)) }}
    </button>
    <button type="button" wire:click="{{ $cancelAction }}" class="btn btn-secondary"> {{ __(ucfirst($cancelText)) }}
    </button>
</div>
