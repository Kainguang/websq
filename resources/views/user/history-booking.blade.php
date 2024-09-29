@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการจอง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/history-booking.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
</head>

<body>
    <h2>ประวัติการจองทั้งหมด</h2>
    <div class="container">
        <!-- รายการการจอง -->
        @foreach ($bookings as $booking)
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <img src="{{ $booking->course_picture }}" alt="Course Image" class="img-fluid rounded">
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body">
                    <h3 class="mb-3">{{ $booking->course_name }}</h3>
                    <ul class="list-unstyled">
                        <li><strong>ชื่อครูผู้สอน:</strong> {{ $booking->instructor_name }}</li>
                        <li><strong>วันที่เรียน:</strong> {{ $booking->class_days }}</li>
                        <li><strong>ระยะเวลาคอร์ส:</strong> {{ $booking->period }} สัปดาห์ (สัปดาห์ละ
                            {{ $booking->times }} ครั้ง)</li>
                        <!-- ตรวจสอบสถานะการชำระเงิน -->
                        @if($booking->payment_status == 0)
                        <li><strong>วันที่จอง:</strong>
                            <span class="text-warning">รอยืนยันการชำระเงิน</span>
                        </li>
                        <li><strong>วันที่คอร์สสิ้นสุด:</strong>
                            <span class="text-warning">รอยืนยันการชำระเงิน</span>
                        </li>
                        @else
                        <li><strong>วันที่จอง:</strong> {{ $booking->start_day }}</li>
                        <li><strong>วันที่คอร์สสิ้นสุด:</strong> {{ $booking->end_day }}</li>
                        @endif
                        <li><strong>ราคา:</strong> ฿{{ number_format($booking->price, 2) }}</li>
                        <hr>
                        <li><strong>คอร์ส:</strong>
                            @if($booking->course_status == 1)
                            <span class="text-success">ดำเนินการอยู่</span>
                            @else
                            <span class="text-danger">หมดอายุแล้ว</span>
                            @endif
                        </li>
                        <li><strong>การชำระเงิน:</strong>
                            @if($booking->payment_status == 1)
                            <span class="text-success">ยืนยันการชำระเงินแล้ว</span>
                            @else
                            <span class="text-warning">รอยืนยันการชำระเงิน</span>
                            @endif
                        </li>
                    </ul>

                    <!-- ปุ่มยกเลิกการจอง -->
                    <form method="POST" action="{{ route('cancel_booking', ['id' => $booking->id]) }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">ยกเลิกการจอง</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div> 

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert สำหรับยกเลิกการจอง -->
    <script>
        document.querySelectorAll('#cancelButton').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // ป้องกันการ submit ฟอร์มทันที

                Swal.fire({
                    title: 'ยืนยันการยกเลิกการจอง?',
                    text: "คุณต้องการยกเลิกการจองคอร์สนี้ใช่หรือไม่?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ถ้ายืนยัน ให้ทำการ submit ฟอร์ม
                        this.closest('form').submit();
                    }
                });
            });
        });
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection