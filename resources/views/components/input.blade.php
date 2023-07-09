{{-- public function __construct(public $label, public $name, public $id = null, public $placeholder = null, public $model = null, public $classes = 'col-md-12', public $description = null, public $type = 'text') --}}

<div class="{{ $classes }}">
    <label for="{{ $id ?? $name }}" class="form-label">{{ __(ucfirst($label)) }}</label>
    <input type="{{ $type }}" id="{{ $id ?? $name }}" name="{{ $name }}" wire:model="{{ $model ?? $name }}"
        placeholder="{{ __($placeholder) ?? __('Enter the ' . $name . ' here ...') }}"
        class="form-control @error($model ?? $name)
        is-invalid
        @enderror">

    @error($model ?? $name)
        <div class="invalid-feedback">
            {{ __(ucfirst($message)) }}
        </div>
    @enderror

    @if ($description)
        <small>{{ __($description) }}</small>
    @endif
</div>
