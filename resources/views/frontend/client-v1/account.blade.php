<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title')</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/icon.png" rel="icon">
    <link href="assets/img/icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/client-v1/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/client-v1/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/client-v1/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/client-v1/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/client-v1/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/client-v1/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/client-v1/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ asset('frontend/client-v1/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>

    <!-- ======= Header ======= -->
    @include('partials.header')
    <!-- End Header -->

    <!-- ======= Sidebar ======= -->
    @include('frontend.partials.sidebar')
    <!-- End Sidebar-->

    <main id="main" class="main">

        <div class="pagetitle">
            <h1> {{ __('Profile') }} </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"> {{ __('Home') }} </a></li>
                    @if (auth('manager')->check())
                        <li class="breadcrumb-item"> {{ __('Managers') }} </li>
                    @elseif(auth('disable')->check())
                        <li class="breadcrumb-item"> {{ __('Disables') }} </li>
                    @else
                        <li class="breadcrumb-item"> {{ __('Supervisor') }} </li>
                    @endif
                    <li class="breadcrumb-item active"> {{ __('Profile') }} </li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            @if (auth()->user()->image)
                                <img src=" {{ Storage::url(auth()->user()->image) }} " alt="Profile"
                                    class="rounded-circle">
                            @endif

                            <h2> {{ auth()->user()->name }} </h2>
                            <h3> {{ auth()->user()->metadata->job }} </h3>
                            <div class="social-links mt-2">
                                @if (auth()->user()->socialMedia->twitter)
                                    <a href="{{ auth()->user()->socialMedia->twitter }}" class="twitter"><i
                                            class="bi bi-twitter"></i></a>
                                @endif

                                @if (auth()->user()->socialMedia->facebook)
                                    <a href="{{ auth()->user()->socialMedia->facebook }}" class="facebook"><i
                                            class="bi bi-facebook"></i></a>
                                @endif

                                @if (auth()->user()->socialMedia->instagram)
                                    <a href="{{ auth()->user()->socialMedia->instagram }}" class="instagram"><i
                                            class="bi bi-instagram"></i></a>
                                @endif

                                @if (auth()->user()->socialMedia->linkedin)
                                    <a href="{{ auth()->user()->socialMedia->linkedin }}" class="linkedin"><i
                                            class="bi bi-linkedin"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview"> {{ __('Overview') }} </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">
                                        {{ __('Profile') }} </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">
                                        {{ __('Settings') }} </button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password"> {{ __('Change Password') }}
                                    </button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title"> {{ __('About') }} </h5>
                                    <p class="small fst-italic"> {{ auth()->user()->metadata->about }} </p>

                                    <h5 class="card-title"> {{ __('Profile Details') }} </h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label "> {{ __('Name') }} </div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"> {{ __('Company') }} </div>
                                        <div class="col-lg-9 col-md-8"> {{ auth()->user()->metadata->company }} </div>
                                    </div>


                                    @if (auth('manager')->check())
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label"> {{ __('Role/s') }} </div>
                                            <div class="col-lg-9 col-md-8">{{ auth()->user()->metadata->job }}</div>
                                        </div>
                                    @else
                                        <div class="row">
                                            <div class="col-lg-3 col-md-4 label"> {{ __('Job') }} </div>
                                            <div class="col-lg-9 col-md-8">{{ auth()->user()->metadata->job }}</div>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"> {{ __('Country') }} </div>
                                        <div class="col-lg-9 col-md-8"> {{ $country_name }} </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"> {{ __('Address') }} </div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->metadata->address }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"> {{ __('Phone') }} </div>
                                        <div class="col-lg-9 col-md-8"> {{ auth()->user()->metadata->phone }} </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label"> {{ __('Email') }} </div>
                                        <div class="col-lg-9 col-md-8"> {{ auth()->user()->email }} </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form>
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Profile Image') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                @if (auth()->user()->image)
                                                    <img src=" {{ Storage::url(auth()->user()->image) }} "
                                                        alt="Profile">
                                                @else
                                                    {{ __('No Image') }}
                                                @endif
                                                {{-- <div class="pt-2">
                                                    <a href="{{ route('managers.edit', Crypt::encrypt(auth()->user()->id)) }}"
                                                        class="btn btn-primary btn-sm"
                                                        title="Upload new profile image"><i
                                                            class="bi bi-upload"></i></a>
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName"
                                                class="col-md-4 col-lg-3 col-form-label">{{ __('Full Name') }}</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control"
                                                    id="fullName" value="{{ auth()->user()->name }}" readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('About') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px"> {{ auth()->user()->metadata->about }} </textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="company" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Company') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="company" type="text" class="form-control"
                                                    id="company" value="{{ auth()->user()->metadata->company }}"
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Job" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Job') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="job" type="text" class="form-control"
                                                    id="Job" value=" {{ auth()->user()->metadata->job }} "
                                                    readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Country') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control"
                                                    id="country_id" value="{{ $country_name }}" readonly>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Address') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control"
                                                    id="address" value="{{ auth()->user()->metadata->address }} ">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Phone') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control"
                                                    id="phone" value="{{ auth()->user()->metadata->phone }} ">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Email') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control"
                                                    id="Email" value="{{ auth()->user()->email }}" readonly>
                                            </div>
                                        </div>



                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Twitter Profile') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter" type="text" class="form-control"
                                                    id="twitter"
                                                    value=" {{ auth()->user()->socialMedia->twitter }} ">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook"
                                                class="col-md-4 col-lg-3 col-form-label">{{ __('Facebook Profile') }}</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook" type="text" class="form-control"
                                                    id="facebook"
                                                    value=" {{ auth()->user()->socialMedia->facebook }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Instagram Profile') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram" type="text" class="form-control"
                                                    id="instagram"
                                                    value=" {{ auth()->user()->socialMedia->instagram }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Linkedin Profile') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin" type="text" class="form-control"
                                                    id="linkedin"
                                                    value=" {{ auth()->user()->socialMedia->linkedin }}">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="button" onclick="updateMyInformation()"
                                                class="btn btn-primary"> {{ __('Save Changes') }} </button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="securityNotify" checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="current_password" class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Current Password') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="current_password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password"
                                                class="col-md-4 col-lg-3 col-form-label">{{ __('New Password') }}</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password" type="password" class="form-control"
                                                    id="new_password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="new_password_confirmation"
                                                class="col-md-4 col-lg-3 col-form-label">
                                                {{ __('Re-enter New Password') }} </label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="new_password_confirmation" type="password"
                                                    class="form-control" id="new_password_confirmation">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary"
                                                onclick="confirmationChange()">
                                                {{ __('Change Password') }} </button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main><!-- End #main -->


    <!-- ======= Footer ======= -->
    @include('partials.footer')
    <!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/client-v1/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('frontend/client-v1/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/client-v1/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('frontend/client-v1/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('frontend/client-v1/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('frontend/client-v1/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('frontend/client-v1/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('frontend/client-v1/assets/vendor/php-email-form/validate.js') }}"></script>

    <!--  Main JS File -->
    <script src="{{ asset('frontend/client-v1/assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmationChange(lang = 'ar') {

            var title, text, confirmButtonText, cancelButtonText;
            if (lang == "ar") {
                title = "هل أنت متأكد؟";
                text = "لن تتمكن من التراجع عن هذا!";
                confirmButtonText = "نعم، تغيير";
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
                    changePassword();
                }
            })
        }

        function changePassword() {
            const currentPasswordInput = document.getElementById('current_password');
            const newPasswordInput = document.getElementById('new_password');
            const confirmPasswordInput = document.getElementById('new_password_confirmation');

            axios.post('/cpanel/change-password', {
                    current_password: currentPasswordInput.value,
                    new_password: newPasswordInput.value,
                    new_password_confirmation: confirmPasswordInput.value,
                })
                .then((response) => {
                    showMessage(response.data);

                    // Clear input values
                    currentPasswordInput.value = '';
                    newPasswordInput.value = '';
                    confirmPasswordInput.value = '';
                })
                .catch((error) => {
                    showMessage(error.response.data);
                });
        }


        function showMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 4000
            });
        }
    </script>

    <script>
        function updateMyInformation(lang = 'ar') {

            var title, text, confirmButtonText, cancelButtonText;
            if (lang == "ar") {
                title = "هل أنت متأكد؟";
                text = "لن تتمكن من التراجع عن هذا!";
                confirmButtonText = "نعم، تغيير";
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
                    updateTheInformatiopn();
                }
            })
        }

        function updateTheInformatiopn() {
            const aboutManager = document.getElementById('about');
            const addressManager = document.getElementById('address');
            const phoneManager = document.getElementById('phone');
            const twitterManager = document.getElementById('twitter');
            const facebookManager = document.getElementById('facebook');
            const instagramManager = document.getElementById('instagram');
            const linkedinManager = document.getElementById('linkedin');


            axios.post('/cpanel/update-information', {
                    about: aboutManager.value,
                    address: addressManager.value,
                    phone: phoneManager.value,
                    twitter: twitterManager.value,
                    facebook: facebookManager.value,
                    instagram: instagramManager.value,
                    linkedin: linkedinManager.value,
                })
                .then((response) => {
                    showMessage(response.data);
                })
                .catch((error) => {
                    showMessage(error.response.data);
                });
        }


        function showMessage(data) {
            Swal.fire({
                icon: data.icon,
                title: data.title,
                text: data.text,
                showConfirmButton: false,
                timer: 4000
            });
        }
    </script>

</body>

</html>
