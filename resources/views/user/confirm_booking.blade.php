@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ยืนยันการจอง</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-4">
        <h2>ยืนยันการจอง</h2>

        <!-- ข้อมูลคอร์ส -->
        <p>คอร์ส: {{ $course->course_name }}</p>

        <!-- แสดงยอดรวมและ VAT -->
        <p>ยอดรวมย่อย: ฿{{ number_format(session('subtotal'), 2) }}</p>
        <p>จำนวนคนที่จอง: {{ $amount }} คน</p>
        <p>ยอดรวมทั้งหมด: ฿{{ number_format(session('total'), 2) }}</p>

        @if ($amount == 1)
            <!-- ข้อมูลผู้จอง 1 คน -->
            <h3>ข้อมูลผู้จอง</h3>
            <p>ชื่อ: {{ $customer->firstname }} {{ $customer->lastname }}</p>
            <p>อีเมล: {{ $customer->email }}</p>
            <p>เบอร์โทรศัพท์: {{ $customer->phonenum }}</p>
            <p>นํ้าหนัก (กิโลกรัม): {{ $customer->weight }}</p>
            <p>ส่วนสูง (เซนติเมตร): {{ $customer->height }}</p>
            <p>เพศ: {{ $customer->gender }}</p>
        @else
            <!-- ข้อมูลผู้จองหลายคน -->
            <h3>ข้อมูลผู้จอง</h3>
            @foreach ($participants as $index => $participant)
                <p>ผู้จองคนที่ {{ $index + 1 }}</p>
                <p>ชื่อ: {{ $participant['first_name'] }} {{ $participant['last_name'] }}</p>
                <p>อีเมล: {{ $participant['email'] }}</p>
                <p>เบอร์โทร: {{ $participant['phonenum'] }}</p>
                <p>นํ้าหนัก (กิโลกรัม): {{ $participant['weight'] }}</p>
                <p>ส่วนสูง (เซนติเมตร): {{ $participant['height'] }}</p>
                <p>เพศ: {{ $participant['gender'] }}</p>
                <hr>
            @endforeach
        @endif

        <!-- ปุ่มยืนยันการจอง -->
        <form id="confirmBookingForm" action="{{ route('booked') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-success" id="confirmButton">ยืนยันการจอง</button>
        </form>

        <button type="button" class="btn btn-danger mt-3" id="backButton">ย้อนกลับ</button>

    </div>

    <script>
        // ปุ่มย้อนกลับ
        document.getElementById('backButton').addEventListener('click', function() {
            Swal.fire({
                title: 'คุณต้องการย้อนกลับหรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ url()->previous() }}';
                }
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
