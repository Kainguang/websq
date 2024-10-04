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
    <div class="container">
        <h2>ประวัติการจองทั้งหมด</h2>

        <!-- คอร์สที่ยังดำเนินการอยู่ -->
        <h3>คอร์สที่ยังดำเนินการอยู่</h3>
        @if($bookings->where('your_course', 1)->isEmpty()) <!-- ตรวจสอบว่ามีคอร์สที่ยังดำเนินการอยู่หรือไม่ -->
            <p>ไม่มีคอร์สที่ดำเนินการอยู่</p>
        @else
            @foreach ($bookings as $booking)
                @if($booking->your_course == 1) <!-- แสดงคอร์สที่ยังดำเนินการอยู่ -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <img src="{{ asset('storage/' . $booking->picture_path) }}" alt="Course Image" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="mb-3">{{ $booking->course_name }}</h3>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> {{ $booking->instructor_name }}</li>
                                <li><strong>วันที่เรียน:</strong> {{ $booking->class_days }}</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> {{ $booking->period }} สัปดาห์ (สัปดาห์ละ {{ $booking->times }} ครั้ง)</li>
                                <li><strong>วันที่จอง:</strong> {{ $booking->start_day }}</li>
                                <li><strong>วันที่คอร์สสิ้นสุด:</strong> {{ $booking->end_day }}</li>
                                <li><strong>ราคา:</strong> ฿{{ number_format($booking->price, 2) }}</li>
                                <li><strong>สถานะคอร์ส:</strong>
                                    @if($booking->course == 0)
                                        <span class="text-danger">ถูกปิดแล้ว</span>
                                    @else
                                        <span class="text-success">เปิดอยู่</span>
                                    @endif
                                </li>
                                <hr>
                                <li><strong>สถานะคอร์สของคุณ:</strong>
                                    @if($booking->course == 0)
                                        <span class="text-danger">หมดอายุแล้ว</span>
                                    @elseif($booking->course == 1)
                                        <span class="text-success">ดำเนินการอยู่</span>
                                    @elseif($booking->course == 2)
                                        <span class="text-success">ยกเลิกแล้ว</span>
                                    @endif
                                </li>
                                <li><strong>การชำระเงิน:</strong>
                                    @if($booking->payment_status == 0)
                                        <span class="text-warning">รอยืนยันการชำระเงิน</span>
                                    @elseif($booking->payment_status == 1)
                                        <span class="text-success">ยืนยันการชำระเงินแล้ว</span>
                                    @elseif($booking->payment_status == 2)
                                        <span class="text-warning">รอยืนยันการยกเลิก</span>
                                    @elseif($booking->payment_status == 3)
                                        <span class="text-danger">ยืนยันการยกเลิกแล้ว</span>
                                    @endif
                                </li>
                            </ul>
                            <!-- ปุ่มยกเลิกการจอง -->
                            <form id="cancel" method="POST" action="{{ route('cancel_booking', ['id' => $booking->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100 cancel-booking">ยกเลิกการจอง</button>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif

        <!-- เส้น hr แยกส่วน -->
        <hr>

        <!-- คอร์สที่ถูกยกเลิกแล้ว -->
        <h3>คอร์สที่ถูกยกเลิกแล้ว</h3>
        @if($bookings->where('your_course', 2)->isEmpty())
            <div class="card mb-4 no-course-card">
                    <h5>ไม่มีคอร์สที่ถูกยกเลิก</h5>
            </div>
        @else
            @foreach ($bookings as $booking)
                @if($booking->your_course == 2) <!-- แสดงคอร์สที่ถูกยกเลิกแล้ว -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card">
                            <img src="{{ asset('storage/' . $booking->picture_path) }}" alt="Course Image" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="mb-3">{{ $booking->course_name }}</h3>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> {{ $booking->instructor_name }}</li>
                                <li><strong>วันที่เรียน:</strong> {{ $booking->class_days }}</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> {{ $booking->period }} สัปดาห์ (สัปดาห์ละ {{ $booking->times }} ครั้ง)</li>
                                <li><strong>วันที่จอง:</strong> {{ $booking->start_day }}</li>
                                <li><strong>วันที่คอร์สสิ้นสุด:</strong> {{ $booking->end_day }}</li>
                                <li><strong>ราคา:</strong> ฿{{ number_format($booking->price, 2) }}</li>
                                <li><strong>สถานะคอร์ส:</strong>
                                    @if($booking->course == 0)
                                        <span class="text-danger">ถูกปิดแล้ว</span>
                                    @else
                                        <span class="text-success">เปิดอยู่</span>
                                    @endif
                                </li>
                                <hr>
                                <li><strong>สถานะคอร์สของคุณ:</strong>
                                    @if($booking->course == 0)
                                        <span class="text-danger">หมดอายุแล้ว</span>
                                    @elseif($booking->course == 1)
                                        <span class="text-success">ดำเนินการอยู่</span>
                                    @elseif($booking->course == 2)
                                        <span class="text-success">ยกเลิกแล้ว</span>
                                    @endif
                                </li>
                                <li><strong>การชำระเงิน:</strong>
                                    @if($booking->payment_status == 0)
                                        <span class="text-warning">รอยืนยันการชำระเงิน</span>
                                    @elseif($booking->payment_status == 1)
                                        <span class="text-success">ยืนยันการชำระเงินแล้ว</span>
                                    @elseif($booking->payment_status == 2)
                                        <span class="text-warning">รอยยันยกเลิก</span>
                                    @elseif($booking->payment_status == 3)
                                        <span class="text-danger">ยืนยันการยกเลิกแล้ว</span>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        @endif
    </div> 

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // สำหรับยกเลิกการจอง
        document.querySelectorAll('.cancel-booking').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault(); // ป้องกันการ submit ฟอร์มทันที

                Swal.fire({
                    title: 'คุณต้องการยกเลิกการจองคอร์สนี้ใช่หรือไม่?',
                    text: "โปรดทราบ: หากคุณยืนยันที่จะจองคอร์สนี้แล้ว เมื่อยกเลิกคุณจะไม่มีการคืนเงิน เนื่องจากมีการจัดเตรียมทรัพยากร และจองที่นั่ง เพื่อความยุติธรรมต่อผู้เข้าร่วมทุกคน",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ถ้ายืนยัน ให้ทำการ submit ฟอร์ม
                        document.getElementById('cancel').submit();
                    }
                });
            });
        });
    </script>

</body>
</html>
@endsection
