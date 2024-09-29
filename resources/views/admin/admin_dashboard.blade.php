@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <h1 class="dashboard-title">สรุปภาพรวม</h1>

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
                            <h5>เทรนเนอร์ทั้งหมด</h5>
                            <h2>{{ $totalEmployees }}</h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="info-box">
                            <h5>รายได้สุทธิ</h5>
                            <h2>{{ number_format($totalRevenue, 2) }} ฿</h2>
                        </div>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="chart-container">
                    <h3>จำนวนนักเรียนต่อคอร์ส</h3>
                    <canvas id="studentsChart"></canvas>
                </div>

                <!-- Bill Section (Enrolls) -->
                <div class="table-container">
                <h4>บิล</h4>
                    <table id="approvedBillTable" class="table table-striped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>ชื่อ</th>
                                <th>คอร์ส</th>
                                <th>สถานะคอร์ส</th>
                                <th>สถานะการจ่ายเงิน</th> <!-- เพิ่มคอลัมน์สถานะการจ่ายเงิน -->
                                <th>การจัดการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($approvedBills as $bill)
                            <tr>
                                <td>{{ $bill->id }}</td>
                                <td>{{ $bill->firstname }} {{ $bill->lastname }}</td>
                                <td>{{ $bill->course_name }}</td>
                                <td>
                                    @if($bill->course_status == 1)
                                        <span class="text-success">กำลังดำเนินการ</span>
                                    @else
                                        <span class="text-danger">ถูกยกเลิก</span>
                                    @endif
                                </td>
                                <td>
                                    @if($bill->payment_status == 1)
                                        <span class="text-success">ยืนยันการชำระเงินแล้ว</span>
                                    @else
                                        <span class="text-warning">รอการยืนยันการชำระเงิน</span>
                                    @endif
                                </td>
                                <td>
                                    <button type="button" class="btn btn-warning editButton">แก้ไข</button>
                                    <button class="btn btn-danger deleteButton" onclick="confirmDeleteConfirmedBill('{{ $bill->id }}')">ลบ</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            <script>
                $(document).ready(function() {
                    var table = $('#approvedBillTable').DataTable({
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
                </script>
                <!-- DataTable Initialization -->
       <script>
                 var ctx = document.getElementById('studentsChart').getContext('2d');
                        var studentsChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: @json($courseNames), // ชื่อคอร์สทั้งหมด
                                datasets: [{
                                    label: 'จำนวนลูกค้าต่อคอร์ส',
                                    data: @json(  $studentsPerCourse), // จำนวนลูกค้าต่อคอร์ส
                                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                                    borderColor: 'rgba(75, 192, 192, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                </script>
                    <script>
                document.querySelectorAll('.editButton').forEach(button => {
                    button.addEventListener('click', function() {
                        Swal.fire({
                            title: 'แก้ไขข้อมูล',
                            html: `
                            <div class="form-container">
                                <div class="form-group">
                                    <label for="name">ชื่อ :</label>
                                    <input type="text" id="name" class="swal2-input" placeholder="ชื่อ">
                                </div>
                                <div class="form-group">
                                    <label for="email">อีเมล :</label>
                                    <input type="email" id="email" class="swal2-input" placeholder="อีเมล">
                                </div>
                                <div class="form-group">
                                    <label for="phone">เบอร์โทร :</label>
                                    <input type="text" id="phone" class="swal2-input" placeholder="เบอร์โทร">
                                </div>
                                <div class="form-group">
                                    <label for="course">คอร์สเรียน :</label>
                                    <input type="text" id="course" class="swal2-input" placeholder="คอร์สเรียน">
                                </div>
                            </div>
                        `,
                            focusConfirm: false,
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'บันทึก',
                            cancelButtonText: 'ยกเลิก',
                            preConfirm: () => {
                                const name = document.getElementById('name').value;
                                const email = document.getElementById('email').value;
                                const phone = document.getElementById('phone').value;
                                const course = document.getElementById('course').value;

                                if (!name || !email || !phone || !course) {
                                    Swal.showValidationMessage('กรุณากรอกข้อมูลให้ครบถ้วน');
                                    return false;
                                }

                                return {
                                    name: name,
                                    email: email,
                                    phone: phone,
                                    course: course
                                };
                            }
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    icon: "success",
                                    title: 'แก้ไขเรียบร้อย!',
                                    text: 'แก้ไขข้อมูลเรียบร้อยแล้ว'
                                });

                                console.log(result.value);
                            }
                        });
                    });
                });

                function confirmDeleteConfirmedBill(bill_id) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณต้องการลบใบเสร็จที่ยืนยันการชำระเงินแล้ว!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ส่งคำขอลบไปที่เซิร์ฟเวอร์
                    window.location.href = '/admin/bill/delete/' + bill_id;
                }
            });
        }

        function confirmDeletePendingBill(bill_id) {
            Swal.fire({
                title: 'คุณต้องการลบใบเสร็จนี้หรือไม่?',
                text: "บิลยังไม่ยืนยันการชำระเงิน คุณสามารถลบได้",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ส่งคำขอลบไปที่เซิร์ฟเวอร์
                    window.location.href = '/admin/bill/delete/' + bill_id;
                }
            });
        }
    </script>
                </script>

            </main>
        </div>
    </div>
</body>

</html>
@endsection
