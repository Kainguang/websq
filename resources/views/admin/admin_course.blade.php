@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/course.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="course-title">คอร์ส</h1>

                <!-- Info Boxes -->
                <div class="row text-center mb-4">
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>คอร์สทั้งหมด</h5>
                            <h2>{{ $totalCourses }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>รายได้เฉลี่ยต่อคอร์ส</h5>
                            <h2>{{ number_format($averageRevenue, 2) }} ฿</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>รายได้</h5>
                            <h2>{{ number_format($totalRevenue, 2) }} ฿</h2>
                        </div>
                    </div>
                </div>
                <!-- Search and Course Section -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>คอร์สทั้งหมด</h4>
                    <a href="{{ route('courses_create') }}" class="btn btn-dark addButton float-end">เพิ่ม</a>
                </div>

                <table id="coursesTable" class="display table table-striped">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อคอร์ส</th>
                            <th>จำนวนคนสมัคร</th>
                            <th>สถานะคอร์ส</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->id }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>{{ $course->total_booked }}</td>
                            <td>
                                @if($course->course_status == 1)
                                    <span class="text-success">เปิดอยู่</span>
                                @else
                                    <span class="text-danger">ถูกปิดแล้ว</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.course.details', $course->id) }}" class="btn btn-primary">ดูรายละเอียด</a>
                                <a href="{{ route('courses_edit', $course->id) }}" class="btn btn-warning">แก้ไข</a>
                                <button class="btn btn-danger deleteButton" onclick="confirmDelete('{{ $course->id }}')">ลบ</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </main>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        var table = $('#coursesTable').DataTable({
            "columnDefs": [{
                "searchable": false, // ไม่ต้องค้นหาที่คอลัมน์ลำดับ
                "orderable": true,   // เปิดใช้งานการเรียงลำดับที่คอลัมน์ลำดับ
                "targets": 0         // คอลัมน์แรก (ลำดับ)
            }],
            "order": [[0, 'asc']],  // เรียงลำดับตามคอลัมน์ที่ 0 (ลำดับ)
            "paging": true,         // เปิดใช้งานการแบ่งหน้า
            "lengthMenu": [5, 10, 25], // จำนวนรายการที่แสดงต่อหน้า
            "pageLength": 5,        // ค่าเริ่มต้นแสดง 5 รายการต่อหน้า
            "language": {
                "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                "zeroRecords": "ไม่พบข้อมูล",
                "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                "infoEmpty": "ไม่มีข้อมูล",
                "infoFiltered": "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                "search": "ค้นหา: ",
                "paginate": {
                    "first": "หน้าแรก",
                    "last": "หน้าสุดท้าย",
                    "next": "ถัดไป",
                    "previous": "ก่อนหน้า"
                }
            },
            "drawCallback": function(settings) {
                var api = this.api();
                var start = api.page.info().start; // ดึงข้อมูลการเริ่มต้นของแต่ละหน้า
                api.column(0, {page: 'current'}).nodes().each(function(cell, i) {
                    cell.innerHTML = start + i + 1; // อัปเดตลำดับของแต่ละแถวในคอลัมน์แรก
                });
            }
        });
    });

    // ฟังก์ชันสำหรับปุ่มลบพร้อม SweetAlert2
    function confirmDelete(course_id) {
        Swal.fire({
            title: 'คุณต้องการลบคอร์สนี้หรือไม่?',
            text: "การกระทำนี้ไม่สามารถย้อนกลับได้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin/course/delete?course_id=' + course_id;
            }
        });
    }
    </script>

</body>

</html>
@endsection
