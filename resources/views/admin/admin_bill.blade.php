@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการบิล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bill.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="bill-title">จัดการบิล</h1>
                </div>

                <!-- Approved Bills -->
                <div>
                    <h4>บิลที่อนุมัติแล้ว</h4>
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

                <!-- Pending Bills -->
                <div class="mt-5">
                    <h4>บิลที่ยังไม่อนุมัติ</h4>
                    <table id="pendingBillTable" class="table table-striped table-bordered text-center">
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
                            @foreach($pendingBills as $bill)
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
                                    <a href="{{ route('admin.approveBill', $bill->id) }}" class="btn btn-success">ยืนยัน</a>
                                    <button class="btn btn-danger deleteButton" onclick="confirmDeletePendingBill('{{ $bill->id }}')">ลบ</button>
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
            // Initialize DataTable for approved bills
            var tableApproved = $('#approvedBillTable').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": true,
                    "targets": 0,
                }],
                "order": [
                    [1, 'asc']
                ],
                "paging": true,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var start = api.page.info().start;
                    api.column(0, {page: 'current'}).nodes().each(function(cell, i) {
                        cell.innerHTML = start + i + 1;
                    });
                }
            });

            // Initialize DataTable for pending bills
            var tablePending = $('#pendingBillTable').DataTable({
                "columnDefs": [{
                    "searchable": false,
                    "orderable": true,
                    "targets": 0,
                }],
                "order": [
                    [0, 'asc']
                ],
                "paging": true,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var start = api.page.info().start;
                    api.column(0, {page: 'current'}).nodes().each(function(cell, i) {
                        cell.innerHTML = start + i + 1;
                    });
                }
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
</body>

</html>
@endsection
