@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>มวยไทย</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/muaythai.css">
</head>

<body>
    <section id="yoga" class="sectiondetail section-dark">
        <div class="container">
            <h2 class="sectiondetail-title">คลาสมวยไทย</h2>
            <div class="row">
            @foreach($muaythaiCourses as $course)
                <div class="row mb-4">
                @if($loop->iteration % 2 == 1)
                        <!-- คอลัมน์ด้านซ้าย: รูปภาพ -->
                        <div class="col-md-6">
                            <div class="card">
                                <img src="{{ asset('storage/' . $course->picture_path) }}" class="card-img-top" alt="{{ $course->course_name }}">
                            </div>
                        </div>
                        <!-- คอลัมน์ด้านขวา: รายละเอียด -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                <hr>
                                <ul class="list-unstyled">
                                    <li><strong>ชื่อครูผู้สอน:</strong> {{ $course->instructor_name }}</li>
                                    <li><strong>ราคาต่อคอร์ส:</strong> {{ number_format($course->course_sellprice) }} บาท</li>
                                    <li><strong>วันที่เรียน:</strong> {{ $course->class_days }}</li>
                                    <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 
                                        {{ date('H:i', strtotime($course->start_time)) }} - 
                                        {{ date('H:i', strtotime($course->end_time)) }} น.
                                    </li>
                                    <li><strong>ระยะเวลาคอร์ส:</strong> {{ $course->period }} สัปดาห์ (ฝึกสัปดาห์ละ {{ $course->times }} ครั้ง)</li>
                                    <li><strong style="color: green;">จองไปแล้ว: </strong>{{ $course->total_booked }} / {{ $course->max_participant }} คน</li>
                                </ul>
                                <button id="bookingButton-{{$course->id}}" class="btn btn-primary">จองคอร์ส</button>
                            </div>
                        </div>
                    @else
                        <!-- คอลัมน์ด้านซ้าย: รายละเอียด -->
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">{{ $course->course_name }}</h5>
                                <p class="card-text">{{ $course->description }}</p>
                                <hr>
                                <ul class="list-unstyled">
                                    <li><strong>ชื่อครูผู้สอน:</strong> {{ $course->instructor_name }}</li>
                                    <li><strong>ราคาต่อคอร์ส:</strong> {{ number_format($course->course_sellprice) }} บาท</li>
                                    <li><strong>วันที่เรียน:</strong> {{ $course->class_days }}</li>
                                    <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 
                                        {{ date('H:i', strtotime($course->start_time)) }} - 
                                        {{ date('H:i', strtotime($course->end_time)) }} น.
                                    </li>
                                    <li><strong>ระยะเวลาคอร์ส:</strong> {{ $course->period }} สัปดาห์ (ฝึกสัปดาห์ละ {{ $course->times }} ครั้ง)</li>
                                    <li><strong style="color: green;">จองไปแล้ว: </strong>{{ $course->total_booked }} / {{ $course->max_participant }} คน</li>
                                </ul>
                                <button id="bookingButton-{{$course->id}}" class="btn btn-primary">จองคอร์ส</button>
                            </div>
                        </div>
                        <!-- คอลัมน์ด้านขวา: รูปภาพ -->
                        <div class="col-md-6">
                            <div class="card">
                                <img src="{{ asset('storage/' . $course->picture_path) }}" class="card-img-top" alt="{{ $course->course_name }}">
                            </div>
                        </div>
                    @endif
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

    <div class="container my-5">
        <h2 class="text-center mb-4">สิ่งอำนวยความสะดวก</h2>
        <div class="row">
            @foreach($facilities as $facility)
                <div class="col-md-3 mb-4">
                    <div class="card h-100">
                        <div style="text-align: center; padding: 40px;">
                            <img src="{{ asset('storage/' . $facility->picture_path) }}" alt="{{ $facility->facility_name }}" style="width: 150px;">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title-amenities">{{ $facility->facility_name }}</h5>
                            <p class="card-text flex-grow-1">{{ $facility->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection