@extends('layouts.sidebar')
@section('content')

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดคอร์ส</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Main Content -->
    <main class="col-md-10 ms-sm-auto px-md-4 py-4 main-content">
        <div class="container">
            <div class="row">
                <h3 class="mb-4" class="card-title">{{ $course->course_name }}</h3>
                <div class="col-md-6">
                    <!-- ซ้าย รูป -->
                    <div class="card">
                        <img src="{{ asset('storage/' . $course->picture) }}" alt="Class Picture" class="card-img-top">
                    </div>
                </div>
                <!-- ขวา รายละเอียด -->
                <div class="col-md-6">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> {{ $course->instructor_name }}</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> {{ number_format($course->course_sellprice) }} บาท</li>
                            <li><strong>วันที่เรียน:</strong> {{ $course->days }}</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 
                                {{ date('H:i', strtotime($course->start_time)) }} - 
                                {{ date('H:i', strtotime($course->end_time)) }} น.
                            </li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> {{ $course->period }} สัปดาห์ (ฝึกสัปดาห์ละ {{ $course->times }} ครั้ง)</li>
                            <li><strong>จำนวนคนสูงสุดต่อคอร์ส:</strong> {{ $course->max_participant }} คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong> {{ $course->total_booked }} / {{ $course->max_participant }} คน</li>
                            <li><strong>จำนวนที่ว่าง:</strong> {{ $course->max_participant - $course->total_booked }} / {{ $course->max_participant }} คน</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- แสดงรายชื่อผู้จองคอร์ส -->
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
        <!-- ปุ่มย้อนกลับไปหน้ารายการคอร์ส -->
        <a href="{{ route('admin_course') }}" class="btn btn-secondary">ย้อนกลับ</a>
    </main>
</body>

</html>
@endsection
