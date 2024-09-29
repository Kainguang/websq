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
                    <a href="{{ route('courses_create') }}" class="btn btn-dark addButton float-end">เพิ่มคอร์ส</a>
                </div>

                <table id="coursesTable" class="display table table-striped">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อคอร์ส</th>
                            <th>จำนวนคนสมัคร</th>
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
        // ดึงรายชื่อผู้จองเมื่อกดปุ่มดูรายชื่อผู้จอง
        $('.viewParticipantsButton').on('click', function() {
            const courseId = $(this).data('id');
            
            // ส่งคำขอ AJAX เพื่อดึงรายชื่อผู้จอง
            $.ajax({
                url: '/admin/course/' + courseId + '/participants',
                type: 'GET',
                success: function(data) {
                    // ล้างรายชื่อเก่าออกก่อน
                    $('#participantsList').empty();
                    
                    // เพิ่มรายชื่อใหม่เข้าไปใน modal
                    data.forEach(participant => {
                        $('#participantsList').append('<li class="list-group-item">' + participant.firstname + ' ' + participant.lastname + '</li>');
                    });

                    // แสดง modal
                    $('#participantsModal').modal('show');
                },
                error: function() {
                    alert('ไม่สามารถดึงข้อมูลได้');
                }
            });
        });
    });
        $(document).ready(function() {
            $('#coursesTable').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25, 50],
                "pageLength": 5,
                "language": {
                    "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                    "paginate": {
                        "first": "หน้าแรก",
                        "last": "หน้าสุดท้าย",
                        "next": "ถัดไป",
                        "previous": "ก่อนหน้า"
                    },
                    "search": "ค้นหา : "
                }
            });
        });

        // ฟังก์ชันแก้ไขคอร์ส
        $('.editButton').on('click', function() {
            const courseId = $(this).data('id');
            Swal.fire({
                title: 'แก้ไขข้อมูลคอร์ส',
                input: 'text',
                inputLabel: 'ชื่อคอร์สใหม่',
                inputValue: '',
                showCancelButton: true,
                confirmButtonText: 'บันทึก',
                cancelButtonText: 'ยกเลิก',
                preConfirm: (newCourseName) => {
                    $.ajax({
                        url: '/admin/course/' + courseId + '/edit',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            course_name: newCourseName
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'แก้ไขเรียบร้อย!',
                                text: response.success
                            }).then(() => {
                                location.reload(); // รีเฟรชหน้าเว็บเพื่ออัปเดตข้อมูล
                            });
                        },
                        error: function(response) {
                            Swal.fire({
                                icon: 'error',
                                title: 'ผิดพลาด!',
                                text: response.error
                            });
                        }
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
