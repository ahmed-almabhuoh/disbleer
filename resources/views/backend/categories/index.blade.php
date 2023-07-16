@extends('backend.cpanel')

@section('title', __('Categories'))
@section('category', __('Categories'))
@section('index', __('CMS'))

@section('styles')

@endsection

@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ __('Show all categories') }}</h5>

            <livewire:backend.categories.index />

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function confirmationDelete(id, refrance, lang = 'ar') {

            var title, text, confirmButtonText, cancelButtonText;
            if (lang == "ar") {
                title = "هل أنت متأكد؟";
                text = "لن تتمكن من التراجع عن هذا!";
                confirmButtonText = "نعم، احذفها";
                cancelButtonText = "لا، ألغِ الأمر";
            } else {
                title = "Are you sure?";
                text = "You won't be able to revert this!";
                confirmButtonText = "Yes, delete it!";
                cancelButtonText = "No, cancel";
            }

            Swal.fire({
                title: title,
                text: text,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: confirmButtonText,
                cancelButtonText: cancelButtonText
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteAdmin(id, refrance);
                }
            })
        }

        function deleteAdmin(id, refrance) {
            axios.delete('/cpanel/categories/' + id)
                .then((response) => {
                    refrance.closest('tr').remove();
                    showDeletingMessage(response.data);
                })
                .catch((error) => {
                    showDeletingMessage(error.response.data);
                });
        }

        function showDeletingMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 4000
            });
        }
    </script>
@endsection
