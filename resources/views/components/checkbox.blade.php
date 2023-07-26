{{-- public function __construct(public $label, public $name, public $id = null, public $model = null,  public $isCheck = false, public $description = null) --}}

<div class="{{ $classes }}">
    <div class="form-check">
        <input class="form-check-input @error($model ?? $name)
        is-invalid
        @enderror"
            id="{{ $id ?? $name }}" name="{{ $name }}" wire:model="{{ $model ?? $name }}" type="checkbox"
            @if ($isCheck) checked="" @endif>
        <label class="form-check-label" for="{{ $id ?? $name }}">
            {{ __(ucfirst($label)) }}
        </label>
    </div>

    @error($model ?? $name)
        <div class="invalid-feedback">
            {{ __(ucfirst($message)) }}
        </div>
    @enderror

    @if ($description)
        <small>{{ __(ucfirst($description)) }}</small>
    @endif
</div>
