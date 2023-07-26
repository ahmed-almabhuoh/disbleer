<div class="{{ $classes }}">
    {{-- <label for="{{ $id ?? $name }}" class="form-label">{{ __(ucfirst($label)) }}</label> --}}
    <textarea id="{{ $id ?? $name }}" name="{{ $name }}" wire:model="{{ $model ?? $name }}"></textarea>
</div>

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var editors = document.querySelectorAll('.editor');

            editors.forEach(function(editor) {
                new Quill(editor, {
                    theme: 'snow'
                });
            });
        });
    </script>
@endpush
