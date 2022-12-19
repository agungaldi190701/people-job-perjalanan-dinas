<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body>
    <br>
    <br>
    <br>

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">

                    <div class="row justify-content-center">

                        <div class="col-lg-5">
                            <div class="card shadow-md border-1 rounded-lg mt-5">
                                <div class="card-header border-0">

                                    <img src="{{ asset('img/logoSamarinda.png') }}" class="rounded mx-auto d-block"
                                        alt="..." width="70px">

                                </div>
                                <div class="card-body">
                                    <h3 class="text-center font-light my-2">Sign in</h3>
                                    <p class="text-center"> Gunakan akun dinas anda</p>
                                    <form action="/masuk" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="username" type="text" name="username"
                                                placeholder="username" />
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password"
                                                placeholder="Password" />
                                            <label for="password">Password</label>
                                        </div>

                                        <div class=" float-end align-items-center mt-2 mb-0">
                                            <a class="btn btn-secondary" href="/">Home</a>
                                            <button class="btn btn-primary" type="submit">Login

                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer border-0 text-center py-3">
                                    <div class="small">Copyright © <br> Dinas perpustakaan dan kearsipan Samarinda
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Dinas perpustakaan dan kearsipan Samarinda</div>
                        <div>
                            Developt by
                            &middot;
                            <a href="#">Kemar.tech</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

</body>
<style>
    body {
        background-image: url("{{ asset('img/perpus.png') }}");
        background-repeat: no-repeat;
        background-size: cover;
    }
</style>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('js/scripts.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('assets/demo/chart-area-demo.js') }}"></script>
<script src="{{ asset('assets/demo/chart-bar-demo.js') }}"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script> --}}
{{-- <script src="{{ asset('js/datatables-simple-demo.js') }}"></script> --}}
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
{{-- toastr --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- SweetAlert -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session()->has('success'))
    <script>
        toastr.success(`{{ session('success') }}`);
    </script>
@endif
@if (session()->has('loginErorr'))
    <script>
        toastr.error(`{{ session('loginErorr') }}`);
    </script>
@endif
@if (count($errors) > 0)
    <script>
        toastr.error(`{{ $errors->first() }}`);
    </script>
@endif

</html>
