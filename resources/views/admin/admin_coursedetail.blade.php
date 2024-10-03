@extends('layouts.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดคอร์ส</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_coursedetail.css') }}">
</head>

<body>
    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto px-md-4 py-4 main-content">
        <div class="container">
            <!-- Card for course details -->
            <div class="card mb-4">
                <div class="row g-0">
                    <!-- Left: Course image -->
                    <div class="col-md-6">
                        <img src="{{ asset('storage/' . $course->picture_path) }}" alt="Course Picture" class="img-fluid rounded-start">
                    </div>

                    <!-- Right: Course details -->
                    <div class="col-md-6">
                        <div class="card-body">
                            <h3 class="card-title">{{ $course->course_name }}</h3>
                            <div class="course-details">
                                <p class="card-text"><strong>ชื่อครูผู้สอน:</strong> {{ $course->instructor_name }}</p>
                                <p class="card-text"><strong>ราคาต่อคอร์ส:</strong> {{ number_format($course->course_sellprice) }} บาท</p>
                                <p class="card-text"><strong>วันที่เรียน:</strong> {{ $course->days }}</p>
                                <p class="card-text"><strong>เวลาเริ่ม-สิ้นสุด:</strong> 
                                    {{ date('H:i', strtotime($course->start_time)) }} - 
                                    {{ date('H:i', strtotime($course->end_time)) }} น.
                                </p>
                                <p class="card-text"><strong>ระยะเวลาคอร์ส:</strong> {{ $course->period }} สัปดาห์ (ฝึกสัปดาห์ละ {{ $course->times }} ครั้ง)</p>
                                <p class="card-text"><strong>สถานะคอร์ส:</strong>
                                    @if($course->course_status == 1)
                                        <span class="text-success">เปิดอยู่</span>
                                    @else
                                        <span class="text-danger">ถูกปิดแล้ว</span>
                                    @endif
                                </p>
                                <p class="card-text"><strong>จองไปแล้ว:</strong> {{ $course->total_booked }} / {{ $course->max_participant }} คน</p>
                                <p class="card-text"><strong>จำนวนที่ว่าง:</strong> {{ $course->max_participant - $course->total_booked }} / {{ $course->max_participant }} คน</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Participants table -->
            <h4>รายชื่อผู้จอง</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>อีเมล</th>
                        <th>เบอร์โทรศัพท์</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($participants as $index => $participant)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $participant->firstname }} {{ $participant->lastname }}</td>
                        <td>{{ $participant->email }}</td>
                        <td>{{ $participant->phonenum }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center">ไม่มีผู้จองในคอร์สนี้</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Back button -->
            <a href="{{ route('admin_course') }}" class="btn btn-secondary">ย้อนกลับ</a>
        </div>
    </main>
</body>

</html>
@endsection
