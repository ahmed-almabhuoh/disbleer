{{-- public function __construct(public $label, public $name, public $collection, public $id = null, public $model = null, public $classes = 'col-md-12', public $description = null, public $additional = true) --}}

<div class="{{ $classes }}">
    <label for="{{ $id ?? $name }}" class="form-label"> {{ __($label) }} </label>
    <select id="{{ $id ?? $name }}" wire:model="{{ $model ?? $name }}" name="{{ $name }}"
        @if ($isMulti) multiple @endif
        class="form-select @error($model ?? $name)
    is-invalid
    @enderror">
        @if ($additional)
            <option> {{ __('-- Select a Choice --') }} </option>
        @endif

        @foreach ($collection as $key => $value)
            <option value="{{ $key }}"> {{ __(ucfirst($value)) }} </option>
        @endforeach
    </select>

    @error($model ?? $name)
        <div class="invalid-feedback">
            {{ __(ucfirst($message)) }}
        </div>
    @enderror

    @if ($description)
        <small>{{ __(ucfirst($description)) }}</small>
    @endif
</div>
