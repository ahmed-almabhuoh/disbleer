<div class="{{ $classes }}">
    <label for="{{ $id ?? $name }}" class="form-label"> {{ __(ucfirst($label)) }} </label>
    <input type="date" name="{{ $name }}" id="{{ $id ?? $name }}" wire:model="{{ $model ?? $name }}"
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
