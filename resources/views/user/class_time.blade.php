@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คลาส - ช่วงเวลา</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/class_time.css">
</head>

<body>
    <section id="morning" class="sectiondetail section-dark">
        <div class="container">
            <h2 class="sectiondetail-title">คลาสยามเช้า</h2>
            <div class="row">
                @foreach($morningCourses as $course)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $course->picture_path) }}" class="card-img-top" alt="{{ $course->course_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <!-- <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p> -->
                                <hr>
                                <ul class="list-unstyled">
                                    <li><strong>ชื่อครูผู้สอน:</strong> {{ $course->instructor_name }}</li>
                                    <li><strong>ราคาต่อคอร์ส:</strong> {{ number_format($course->course_sellprice, 0) }} บาท</li>
                                    <li><strong>วันที่เรียน:</strong> {{ $course->class_days }}</li>
                                    <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> {{ date('H:i', strtotime($course->start_time)) }} - {{ date('H:i', strtotime($course->end_time)) }} น.</li>
                                    <li><strong>ระยะเวลาคอร์ส:</strong> {{ $course->period }} สัปดาห์ (ฝึกสัปดาห์ละ {{ $course->times }} ครั้ง)</li>
                                    <li><strong style="color: green;">จองไปแล้ว: </strong>{{ $course->total_booked }} / {{ $course->max_participant }} คน</li>
                                </ul>
                                <button id="bookingButton-{{$course->id}}" class="btn btn-primary">จองคอร์ส</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        // เช็คว่าผู้ใช้ล็อกอินใน Guard ของ customer หรือไม่
                        var isLoggedIn = "{{ Auth::guard('customer')->check() ? 'true' : 'false' }}";

                        document.getElementById('bookingButton-{{$course->id}}').addEventListener('click', function() {
                            console.log("Login status: " + isLoggedIn); // เช็คใน console ว่าได้ค่าถูกต้องไหม
                            if (isLoggedIn === 'true') {
                                // ถ้าผู้ใช้ล็อกอินแล้วให้ไปยังหน้าจอง
                                window.location.href = "{{ route('orderlist', ['course_id' => $course->id]) }}";
                            } else {
                                // ถ้ายังไม่ได้ล็อกอิน ให้แสดง SweetAlert เพื่อให้ล็อกอินก่อน
                                Swal.fire({
                                    title: 'กรุณาล็อกอินก่อนทำการจอง',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'ไปหน้าล็อกอิน',
                                    cancelButtonText: 'ยกเลิก'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{ route('show_login') }}"; // ไปยังหน้าล็อกอิน
                                    }
                                });
                            }
                        });
                    </script>
                @endforeach
            </div>
        </div>
    </section>

    <hr>

    <section id="afternoon" class="sectiondetail section-dark">
        <h2 class="sectiondetail-title">คลาสยามบ่าย</h2>
        <div class="container">
            <div class="row">
            @foreach($afternoonCourses as $course)
                    <div class="col-md-3">
                        <div class="card">
                            <img src="{{ asset('storage/' . $course->picture_path) }}" class="card-img-top" alt="{{ $course->course_name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <!-- <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p> -->
                                <hr>
                                <ul class="list-unstyled">
                                    <li><strong>ชื่อครูผู้สอน:</strong> {{ $course->instructor_name }}</li>
                                    <li><strong>ราคาต่อคอร์ส:</strong> {{ number_format($course->course_sellprice, 0) }} บาท</li>
                                    <li><strong>วันที่เรียน:</strong> {{ $course->class_days }}</li>
                                    <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> {{ date('H:i', strtotime($course->start_time)) }} - {{ date('H:i', strtotime($course->end_time)) }} น.</li>
                                    <li><strong>ระยะเวลาคอร์ส:</strong> {{ $course->period }} สัปดาห์ (ฝึกสัปดาห์ละ {{ $course->times }} ครั้ง)</li>
                                    <li><strong style="color: green;">จองไปแล้ว: </strong>{{ $course->total_booked }} / {{ $course->max_participant }} คน</li>
                                </ul>
                                <button id="bookingButton-{{$course->id}}" class="btn btn-primary">จองคอร์ส</button>
                            </div>
                        </div>
                    </div>
                    <script>
                        // เช็คว่าผู้ใช้ล็อกอินใน Guard ของ customer หรือไม่
                        var isLoggedIn = "{{ Auth::guard('customer')->check() ? 'true' : 'false' }}";

                        document.getElementById('bookingButton-{{$course->id}}').addEventListener('click', function() {
                            console.log("Login status: " + isLoggedIn); // เช็คใน console ว่าได้ค่าถูกต้องไหม
                            if (isLoggedIn === 'true') {
                                // ถ้าผู้ใช้ล็อกอินแล้วให้ไปยังหน้าจอง
                                window.location.href = "{{ route('orderlist', ['course_id' => $course->id]) }}";
                            } else {
                                // ถ้ายังไม่ได้ล็อกอิน ให้แสดง SweetAlert เพื่อให้ล็อกอินก่อน
                                Swal.fire({
                                    title: 'กรุณาล็อกอินก่อนทำการจอง',
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'ไปหน้าล็อกอิน',
                                    cancelButtonText: 'ยกเลิก'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = "{{ route('show_login') }}"; // ไปยังหน้าล็อกอิน
                                    }
                                });
                            }
                        });
                    </script>
                @endforeach
            </div>
        </div>
    </section>
        
    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection