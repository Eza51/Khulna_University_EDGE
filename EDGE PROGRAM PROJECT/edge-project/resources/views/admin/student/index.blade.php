@extends('admin.layouts.master')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Student List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Students</li>
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
                            <h3 class="card-title">Student List</h3>
                            <a href="{{ route('student.create') }}" class="btn btn-primary float-right">Add Student</a>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Profile Picture</th>
                                        <th>Name</th>
                                        <th>Course</th>
                                        <th>Mobile</th>
                                        <th>Email</th>
                                        <th>Created At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>
                                            @if($student->profile_picture)
                                                <img src="{{ asset('storage/' . $student->profile_picture) }}" alt="Profile Picture" width="50" height="50" class="img-thumbnail">
                                            @else
                                                <span>No picture</span>
                                            @endif
                                        </td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->course ? $student->course->name : 'No Course Assigned' }}</td>
                                        <td>{{ $student->mobile_number }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->created_at->format('d M Y') }}</td>
                                        <td>
                                            <a href="{{ route('student.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('student.delete', $student->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this student?')">Delete</a>
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
