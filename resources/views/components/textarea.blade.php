{{-- public function __construct(public $label, public $name, public $id = null, public $model = null, public $rowNumber = 3, public $columnNumner = 3, public $description = null, public $isActive = true) --}}

<div class="{{ $classes }}">
    <label for="{{ $id ?? $name }}" class="form-label"> {{ __(ucfirst($label)) }} </label>
    <div>
        <textarea class="form-control @error($model ?? $name)
        is-invalid
        @enderror" name="{{ $name }}"
            id="{{ $id ?? $name }}" wire:model="{{ $model ?? $name }}" rows="{{ $rowNumber }}" cols="{{ $columnNumber }}"
            style="height: 100px"></textarea>
    </div>

    @error($model ?? $name)
        <div class="invalid-feedback">
            {{ __(ucfirst($message)) }}
        </div>
    @enderror

    @if ($description)
        <small>{{ __($description) }}</small>
    @endif
</div>
