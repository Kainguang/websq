@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจองคลาส</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/Oderlist.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container mt-4">
        <section class="cart mt-4">
            <h2 class="mb-4">คลาส {{ $course->course_name }}</h2>
            <div class="row align-items-center mb-4 p-2 border bg-white">
                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $course->picture_path) }}" alt="{{$course->course_name}} Class" class="img-fluid rounded mb-3">
                </div>
                <div class="col-md-6 shadow bg-light p-3 mb-4">
                    <h3>{{$course->course_name}}</h3>
                    <p><b>ชื่อครูผู้สอน :</b> {{$course->instructor_name}}</p>
                    <p><b>ราคาต่อคอร์ส :</b> {{ number_format($course->course_sellprice) }} บาท</p>
                    <p><b>วันที่เรียน :</b> {{ $course->class_days }}</p>
                    <p><b>เวลาเริ่ม-สิ้นสุด :</b> {{ date('H:i', strtotime($course->start_time)) }} - {{ date('H:i', strtotime($course->end_time)) }} น.</p>
                    <p><b>ระยะเวลาคอร์ส :</b> {{ $course->period }} สัปดาห์ (ฝึกสัปดาห์ละ {{ $course->times }} ครั้ง)</p>
                    <p><b>จำนวนคนต่อคอร์ส :</b> สูงสุด {{ $course->max_participant }} คน</p>
                    <p><b>จำนวนคนในคอร์ส :</b> {{ $course->total_booked }} คน<p>
                </div>
            </div>

            <!-- Section สรุป -->
            <div class="summary bg-white p-3 border mb-4 rounded shadow">
                <h3>ข้อมูลการชำระเงิน</h3>
                <p>คอร์ส {{$course->course_name}}
                    <span style="float: right;">
                        ฿{{ number_format($course->course_sellprice, 2) }}
                    </span>
                </p>

                <hr>
                
                <!-- แสดงยอดรวมทั้งหมด -->
                <p style="font-size: 20px; font-weight: bold;">ยอดรวมทั้งหมด:
                    <span style="float: right; font-size: 20px;">
                        ฿{{ number_format($course->course_sellprice, 2) }}
                    </span>
                </p>

                <!-- ปุ่มยืนยันการจองและย้อนกลับอยู่ภายใน section ของข้อมูลการชำระเงิน -->
                <div class="d-flex justify-content-between mt-4">
                    <!-- ปุ่มย้อนกลับ -->
                    <button type="button" class="btn btn-danger mt-3" id="clearSessionButton">ย้อนกลับ</button>

                    <!-- ปุ่มยืนยันการจอง -->
                    <form method="POST" action="{{ route('storeOrder') }}">
                        @csrf
                        <!-- ฟิลด์ซ่อนสำหรับส่งข้อมูลไปยัง session -->
                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                        <input type="hidden" name="total" id="total_input" value="{{ $course->course_sellprice }}">

                        <!-- ปุ่มยืนยันการจอง -->
                        <button type="submit" class="btn btn-primary mt-3">ยืนยันการจอง</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
        
    <script>
        // ปุ่มย้อนกลับ
        document.getElementById('clearSessionButton').addEventListener('click', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'คุณต้องการออกจากการจองหรือไม่?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ถ้ายืนยัน ให้ไปที่ route 'clearsession'
                    window.location.href = "{{ route('clearsession') }}";
                }
            });
        });
    </script>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
