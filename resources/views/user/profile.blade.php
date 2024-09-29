@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/profile.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- HTML สำหรับหน้าโปรไฟล์ -->
    <div class="profile-container container mt-4">
        <h2>Your Fitness Journey</h2>

        <!-- ส่วนข้อมูลส่วนตัว -->
        <section class="personal-info mb-4">
            <h5>ข้อมูลส่วนตัว</h5>
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('profile_picture/default-profile.jpg') }}" alt="User Profile Picture" class="profile-pic rounded-circle" style="width: 150px; height: 150px;">
            <div class="personal-item mt-3">
                <p><b>ชื่อ:</b> <span>{{ $customer->firstname }}</span></p>
                <p><b>นามสกุล:</b> <span>{{ $customer->lastname }}</span></p>
                <p><b>อีเมล:</b> <span>{{ $customer->email }}</span></p>
                <p><b>หมายเลขโทรศัพท์:</b> <span>{{ $customer->phonenum }}</span></p>
                <p><b>ที่อยู่:</b> <span>{{ $customer->address }}</span></p>
                <a href="/profile/edit/{{$customer->id}}" class="edit-btn btn btn-warning">แก้ไขข้อมูลส่วนตัว</a>
            </div>
        </section>

        <!-- ตารางการจองคลาส -->
        <section class="booking-schedule mb-4">
            <h5>ตารางการจองคลาส</h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>วัน/เวลา</th>
                        <th>9:00-10:00</th>
                        <th>10:00-11:00</th>
                        <th>11:00-12:00</th>
                        <th>12:00-13:00</th>
                        <th>13:00-14:00</th>
                        <th>14:00-15:00</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'] as $day)
                    <tr>
                        <td>{{ $day }}</td>
                        @php $hour = 9; @endphp
                        @while ($hour < 15)
                            @php $courseFound = false; @endphp
                            @foreach ($bookings as $booking)
                                <!-- ตรวจสอบวันและช่วงเวลาของการจอง -->
                                @if (strpos($booking->class_days, $day) !== false)
                                    @php
                                        $startHour = date('H', strtotime($booking->start_time));
                                        $endHour = date('H', strtotime($booking->end_time));
                                    @endphp
                                    @if ($hour == $startHour)
                                        <td colspan="{{ $endHour - $startHour }}" style="background-color: #e0f7fa; color: #00796b;">
                                            {{ $booking->course_name }} ({{ date('H:i', strtotime($booking->start_time)) }} - {{ date('H:i', strtotime($booking->end_time)) }})
                                        </td>
                                        @php
                                            $hour += ($endHour - $startHour);
                                            $courseFound = true;
                                            break;
                                        @endphp
                                    @endif
                                @endif
                            @endforeach
                            @if (!$courseFound)
                                <td>&nbsp;</td>
                                @php $hour++; @endphp
                            @endif
                        @endwhile
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>

        <!-- ประวัติการจองล่าสุด -->
        <h5>ประวัติการจองล่าสุด</h5>
        <section class="booking-info mb-5 p-4 bg-light shadow-sm rounded">
            @if ($latestBooking)
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <img src="{{ $latestBooking->course_picture }}" alt="Course Image" class="img-fluid rounded">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="mb-3">{{ $latestBooking->course_name }}</h3>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> {{ $latestBooking->instructor_name }}</li>
                                <li><strong>วันที่เรียน:</strong> {{ $latestBooking->class_days }}</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> {{ $latestBooking->period }} สัปดาห์ (สัปดาห์ละ {{ $latestBooking->times }} ครั้ง)</li>
                                <!-- ตรวจสอบสถานะการชำระเงิน -->
                                @if($latestBooking->payment_status == 0)
                                    <li><strong>วันที่จอง:</strong> 
                                        <span class="text-warning">รอยืนยันการชำระเงิน</span>
                                    </li>
                                    <li><strong>วันที่คอร์สสิ้นสุด:</strong> 
                                        <span class="text-warning">รอยืนยันการชำระเงิน</span>
                                    </li>
                                @else
                                    <li><strong>วันที่จอง:</strong> {{ $latestBooking->start_day }}</li>
                                    <li><strong>วันที่คอร์สสิ้นสุด:</strong> {{ $latestBooking->end_day }}</li>
                                @endif
                                <li><strong>ราคา:</strong> ฿{{ number_format($latestBooking->price, 2) }}</li>
                                <hr>
                                <li><strong>คอร์ส:</strong> 
                                    @if($latestBooking->course_status == 1)
                                        <span class="text-success">ดำเนินการอยู่</span>
                                    @else
                                        <span class="text-danger">หมดอายุแล้ว</span>
                                    @endif
                                </li>
                                <li><strong>การชำระเงิน:</strong> 
                                    @if($latestBooking->payment_status == 1)
                                        <span class="text-success">ยืนยันการชำระเงินแล้ว</span>
                                    @else
                                        <span class="text-warning">รอยืนยันการชำระเงิน</span>
                                    @endif
                                </li>
                            </ul>
                            
                            <!-- ปุ่มยกเลิกการจอง -->
                            <form method="POST" action="{{ route('cancel_booking', ['id' => $latestBooking->id]) }}">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">ยกเลิกการจอง</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center">ไม่มีประวัติการจองล่าสุด</p>
            @endif
        </section>

        <!-- ลิงก์ไปยังประวัติการจองทั้งหมด -->
        <div class="button-history">
            <a href="{{ route('history-booking') }}" class="btn btn-primary">ดูประวัติการจองทั้งหมด</a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">ออกจากระบบ</button>
            </form>
        </div>



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
    </div>

  <!-- Inline CSS สำหรับ Footer -->
<footer style="background-color: #000000; color: #ffffff; text-align: center; padding: 10px 0; bottom: -15px; width: 100%;">
    <p>&copy; 2024 Fitness Center. All rights reserved.</p>
</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
