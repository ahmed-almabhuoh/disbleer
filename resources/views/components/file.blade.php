<div class="{{ $classes }}">
    <label for="{{ $id ?? $name }}" class="form-label"> {{ __(ucfirst($label)) }} </label>
    <input class="form-control @error($model ?? $name)
        is-invalid
        @enderror" id="{{ $id ?? $name }}"
        name="{{ $name }}" wire:model="{{ $model ?? $name }}" type="file"
        @if ($isMulti) multiple @endif>

    @error($model ?? $name)
        <div class="invalid-feedback">
            {{ __(ucfirst($message)) }}
        </div>
    @enderror

    @if ($description)
        <small>{{ __(ucfirst($description)) }}</small>
    @endif
</div>
