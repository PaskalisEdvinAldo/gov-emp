<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.2/css/buttons.dataTables.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    {{-- navbar start --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            {{-- sidebar trigger --}}
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            {{-- end of sidebar trigger --}}
            <a class="navbar-brand fw-bold text-uppercase me-auto" href="#">Gov-Emp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 d-flex ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="bi bi-person-circle"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="{{ route('login.logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    {{-- end of navbar --}}

    {{-- sidebar start --}}
    <div class="offcanvas offcanvas-start bg-dark text-white sidebar-nav" tabindex="-1" id="offcanvasExample"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0">
            <nav class="navbar-dark">
                <ul class="navbar-nav">
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">CORE FEATURE</div>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('dashboard.index') }}" class="nav-link px-3 {{ Request::is('dashboard*') ? 'active' : '' }}">
                            <span class="me-2">
                                <i class="bi bi-speedometer2"></i>
                            </span>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="my-4">
                        <hr class="dropdown-divider">
                    </li>
                    <li>
                        <div class="text-muted small fw-bold text-uppercase px-3">SIDE FEATURES</div>
                    </li>
                    <li>
                        <a class="nav-link px-3 sidebar-link" data-bs-toggle="collapse" href="#collapseExample"
                            role="button" aria-expanded="false" aria-controls="collapseExample">
                            <span class="me-2"><i class="bi bi-people"></i></span>
                            <span>Employee</span>
                            <span class="right-icon ms-auto"><i class="bi bi-chevron-down"></i></span>
                        </a>
                        <div class="collapse {{ Request::is('employee*') ? 'show' : '' }}" id="collapseExample">
                            <div>
                                <ul class="navbar-nav ps-3">
                                    <li class="nav-item">
                                        <a class="nav-link px-3 {{ Request::is('employee/create') ? 'active' : '' }}" href="{{ route('employee.create') }}">
                                            <span class="me-2"><i class="bi bi-journal-plus"></i></span>
                                            <span>Add Employee</span>
                                        </a>
                                        <a class="nav-link px-3 {{ Request::is('employee-lists') ? 'active' : '' }}" href="{{ route('employee.show') }}">
                                            <span class="me-2"><i class="bi bi-list-columns"></i></i></span>
                                            <span>Employee Data Lists</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    {{-- end of sidebar --}}

    {{-- main --}}
    <main class="mt-5 pt-3">
        <div class="container-fluid">
            <div class="row">
                @yield('container')
            </div>
        </div>
    </main>
    {{-- end of main --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>
    <script>
        new DataTable('#employeesdata', {
            dom: '<"row"<"col-md-6"l><"col-md-6"f>>' +
                 '<"row"<"col-md-12"B>>' +
                 '<"row"<"col-md-12"tr>>' +
                 '<"row"<"col-md-5"i><"col-md-7 d-flex justify-content-end"p>>',
            buttons: [
                {
                    extend: 'copy',
                    exportOptions: { columns: ':not(.no-export)' }
                },
                {
                    extend: 'csv',
                    exportOptions: { columns: ':not(.no-export)' }
                },
                {
                    extend: 'excel',
                    exportOptions: { columns: ':not(.no-export)' }
                },
                {
                    extend: 'pdf',
                    orientation: 'landscape',
                    pageSize: 'A3',
                    exportOptions: { columns: ':not(.no-export)' },
                    customize: function (doc) {
                        doc.styles.tableHeader = {
                            bold: true,
                            fontSize: 12,
                            color: 'white',
                            fillColor: '#007BFF',
                            alignment: 'center'
                        };
                        doc.defaultStyle.fontSize = 10;
                        doc.pageMargins = [5, 5, 5, 5];
                        doc.content[1].table.widths = [
                            '10%', '10%', '5%', '10%', '5%',
                            '5%', '4%', '5%', '5%', '5%',
                            '5%', '13%', '8%', '10%'
                        ];
                    }
                },
                {
                    extend: 'print',
                    exportOptions: { columns: ':not(.no-export)' }
                }
            ],
            stateSave: true,
            scrollX: true,
            scrollY: 200
        });
    </script>
</body>

</html>
