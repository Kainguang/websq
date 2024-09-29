@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave - โปรไฟล์ลูกค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_customer.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="customer-title">ข้อมูลลูกค้า</h1>
                <a href="{{ route('customer_create') }}" class="btn btn-dark addButton float-end">เพิ่มเทรนเนอร์</a>
                <div>
                    <table id="customerTable" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>นามสกุล</th>
                                <th>อีเมล</th>
                                <th>เบอร์โทร</th>
                                <th>น้ำหนัก</th>
                                <th>ส่วนสูง</th>
                                <th>ที่อยู่</th>
                                <th>การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{ $customer-> id }}</td> <!-- คอลัมน์สำหรับลำดับ -->
                                <td>{{ $customer->firstname }}</td>
                                <td>{{ $customer->lastname }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phonenum }}</td>
                                <td>{{ $customer->weight }}</td>
                                <td>{{ $customer->height }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>
                                    <a href="{{ route('customer_edit', $customer->id) }}" class="btn btn-warning">แก้ไข</a>
                                    <button class="btn btn-danger deleteButton" onclick="confirmDelete('{{ $customer->id }}')">ลบ</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>

    <!-- DataTable Initialization -->
    <script>
    $(document).ready(function() {
        var table = $('#customerTable').DataTable({
            "columnDefs": [{
                "searchable": false, // ไม่ต้องค้นหาที่คอลัมน์ลำดับ
                "orderable": true, // เปิดใช้งานการเรียงลำดับที่คอลัมน์ลำดับ
                "targets": 0, // คอลัมน์แรก (ลำดับ)
            }],
            "order": [
                [0, 'asc']
            ], // เรียงลำดับตามชื่อ (คอลัมน์ที่ 2)
            "paging": true, // เปิดใช้งานการแบ่งหน้า
            "drawCallback": function(settings) {
                var api = this.api();
                var start = api.page.info().start; // ดึงข้อมูลการเริ่มต้นของแต่ละหน้า
            }
        });
    });

    // ฟังก์ชันสำหรับปุ่มลบพร้อม SweetAlert2
    function confirmDelete(customer_id) {
        Swal.fire({
            title: 'คุณต้องการลบผู้ใช้นี้หรือไม่?',
            text: "การกระทำนี้ไม่สามารถย้อนกลับได้!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ยืนยันการลบ',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '/admin/customer/delete?customer_id=' + customer_id;
            }
        });
    }
    </script>

</body>

</html>
@endsection
