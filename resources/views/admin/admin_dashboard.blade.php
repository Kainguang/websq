@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แอดมิน - หน้าหลัก</title>
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
                    @php
                    $sections = [
                    'approvedBills' => 'บิลที่ยืนยันการชำระเงินแล้ว',
                    'cancelledBills' => 'บิลที่ยืนยันการยกเลิกแล้ว'
                    ];
                    @endphp

                    @foreach($sections as $status => $title)
                    <div class="mt-5">
                        <h4>{{ $title }}</h4>
                        <table id="billTable_{{ $status }}" class="table table-striped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>ชื่อ</th>
                                    <th>คอร์ส</th>
                                    <th>สถานะคอร์ส</th>
                                    <th>สถานะการจ่ายเงิน</th>
                                    <th>สลิปโอนเงิน</th>
                                    <th>แก้ไขล่าสุด</th>
                                    <th>การจัดการ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($$status as $bill)
                                <!-- ใช้ $$ เพื่อดึงตัวแปรตามชื่อ -->
                                <tr>
                                    <td></td>
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
                                        @elseif($bill->payment_status == 3)
                                        <span class="text-danger">ยืนยันการยกเลิกแล้ว</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($bill->slip_picture)
                                        <a href="javascript:void(0)"
                                            onclick="showSlip('{{ asset('storage/' . $bill->slip_picture) }}')">ดูสลิปโอนเงิน</a>
                                        @else
                                        <span class="text-danger">ไม่มีสลิป</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d/m/Y H:i:s', strtotime($bill->updated_at)) }}</td>
                                    <td>
                                        @if($bill->payment_status == 1)
                                            <a href="{{ route('admin.editBill', ['customer_id' => $bill->customer_id, 'course_id' => $bill->course_id]) }}" class="btn btn-warning">แก้ไข</a>
                                        @endif
                                        <button class="btn btn-danger deleteButton"onclick="confirmDeleteBill('{{ $bill->id }}')">ลบ</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="slipModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">สลิปโอนเงิน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img id="slipImage" src="" alt="Slip" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <!-- DataTable Initialization -->
    <script>
    $(document).ready(function() {
        // สร้างตัวแปรสำหรับเก็บ IDs ของแต่ละตาราง
        var tableIDs = [
            'billTable_approvedBills',
            'billTable_pendingBills',
            'billTable_pendingCancelBills',
            'billTable_cancelledBills'
        ];

        // วนลูปเพื่อสร้าง DataTable สำหรับแต่ละตาราง
        tableIDs.forEach(function(tableID) {
            $('#' + tableID).DataTable({
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "lengthMenu": [5, 10, 25],
                "pageLength": 5,
                "language": {
                    "lengthMenu": "แสดง _MENU_ รายการต่อหน้า",
                    "zeroRecords": "ไม่พบข้อมูล",
                    "info": "แสดงหน้า _PAGE_ จาก _PAGES_",
                    "infoEmpty": "ไม่มีข้อมูล",
                    "infoFiltered": "(ค้นหาจากทั้งหมด _MAX_ รายการ)",
                    "search": "ค้นหา: "
                },
                "drawCallback": function(settings) {
                    var api = this.api();
                    var start = api.page.info().start;
                    api.column(0, {
                        page: 'current'
                    }).nodes().each(function(cell, i) {
                        cell.innerHTML = start + i + 1; // อัปเดตลำดับในคอลัมน์แรก
                    });
                }
            });
        });
    });

    function showSlip(url) {
        Swal.fire({
            imageUrl: url,
            imageAlt: 'สลิปโอนเงิน',
            showCloseButton: true,
            showConfirmButton: false
        });
    }

    function confirmDeleteBill(bill_id) {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณต้องการลบบิลนี้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '/admin/bill/delete/' + bill_id;
                }
            });
        }

    var ctx = document.getElementById('studentsChart').getContext('2d');
    var studentsChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: @json($courseNames), // Laravel จะทำการแปลงข้อมูล PHP เป็น JSON
            datasets: [{
                label: 'จำนวนลูกค้าต่อคอร์ส',
                data: @json($studentsPerCourse), // Laravel จะทำการแปลงข้อมูล PHP เป็น JSON
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
</body>

</html>
@endsection