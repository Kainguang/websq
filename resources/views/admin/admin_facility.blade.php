@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>facilities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_facilities.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4 main-content">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4>สิ่งอำนวยความสะดวก</h4>
                    <a href="{{ route('facility_create') }}" class="btn btn-dark addButton float-end">เพิ่มสิ่งอำนวยความสะดวก</a>
                </div>

                <table id="facilitiesTable" class="display table table-striped">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อ</th>
                            <th>จำนวน</th>
                            <th>อธิบาย</th>
                            <th>การจัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($facilities as $facility)
                        <tr>
                            <td>{{ $facility->id }}</td> <!-- แสดง ID ของคอร์ส -->
                            <td>{{ $facility->facility_name }}</td> <!-- แสดงชื่อคอร์ส -->
                            <td>{{ $facility->facility_amount }}</td> <!-- แสดงชื่อคอร์ส -->
                            <td>{{ $facility->description }}</td> <!-- แสดงชื่อคอร์ส -->
                            <td>
                            <a href="{{ route('facility_edit', $facility->id) }}" class="btn btn-warning">แก้ไข</a>
                                <button class="btn btn-danger deleteButton" onclick="confirmDelete('{{ $facility->id }}')">ลบ</button>
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
            // DataTable Initialization
            $('#facilitiesTable').DataTable({
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

    // ฟังก์ชันสำหรับปุ่มลบพร้อม SweetAlert2
    function confirmDelete(facility_id) {
        Swal.fire({
            title: 'คุณต้องการลบเทรนเนอร์คนนี้หรือไม่?',
            text: "การกระทำนี้ไม่สามารถย้อนกลับได้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin/facility/delete?facility_id=' + facility_id;
            }
        });
    }
    </script>
    
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection