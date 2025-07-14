@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Teacher List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Teachers</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <div class="card-header">
                            <h3 class="card-title">Teacher List</h3>
                            <a href="{{ route('assign-teacher.create') }}" class="btn btn-primary float-right">Add Teacher</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Assigned Courses</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>
                                            <!-- Display Assigned Courses -->
                                            @if ($teacher->assignedCourses->isEmpty())
                                                No courses assigned
                                            @else
                                                <ul>
                                                    @foreach ($teacher->assignedCourses as $course)
                                                        <li>{{ $course->name }}</li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('customJs')
<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
<script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": true,
            "pageLength": 5,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
            "paging": true,
            "info": true,
            "language": {
                "paginate": {
                    "previous": "Previous",
                    "next": "Next"
                },
                "search": "Search:"
            },
            "pagingType": "simple_numbers",
            "dom": '<"top"f<"clear">l>rt<"bottom"ip><"clear">',
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection
