@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($course) ? 'แก้ไขคอร์ส' : 'เพิ่มคอร์สใหม่' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add_course.css') }}">
</head>

<body>
<div class="container mt-5">
    <h1>{{ isset($course) ? 'แก้ไขคอร์ส' : 'เพิ่มคอร์สใหม่' }}</h1>
    <form action="{{ isset($course) ? route('courses_update', $course->id) : route('courses_store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- ชื่อคอร์ส -->
            <div class="form-group col-md-6">
                <label for="course_name">ชื่อคอร์ส:</label>
                <input type="text" id="course_name" name="course_name" class="form-control" value="{{ isset($course) ? $course->course_name : '' }}" placeholder="กรุณาใส่ชื่อคอร์ส" required>
            </div>

            <!-- เวลาที่คอร์สเริ่ม -->
            <div class="form-group col-md-6">
                <label for="start_time">เวลาที่คอร์สเริ่ม:</label>
                <input type="time" id="start_time" name="start_time" class="form-control" value="{{ isset($course) ? $course->start_time : '' }}" required>
            </div>

            <!-- เวลาที่คอร์สสิ้นสุด -->
            <div class="form-group col-md-6">
                <label for="end_time">เวลาที่คอร์สสิ้นสุด:</label>
                <input type="time" id="end_time" name="end_time" class="form-control" value="{{ isset($course) ? $course->end_time : '' }}" required>
            </div>

            <!-- ราคาต้นทุน -->
            <div class="form-group col-md-6">
                <label for="course_cost">ราคาต้นทุน:</label>
                <input type="number" id="course_cost" name="course_cost" class="form-control" value="{{ isset($course) ? $course->course_cost : '' }}" placeholder="กรุณาใส่ราคาต้นทุน" required>
            </div>

            <!-- ราคาขาย -->
            <div class="form-group col-md-6">
                <label for="course_sellprice">ราคาขาย:</label>
                <input type="number" id="course_sellprice" name="course_sellprice" class="form-control" value="{{ isset($course) ? $course->course_sellprice : '' }}" placeholder="กรุณาใส่ราคาขาย" required>
            </div>

            <!-- เรียนกี่สัปดาห์ -->
            <div class="form-group col-md-6">
                <label for="period">ระยะเวลาของคอร์ส (สัปดาห์):</label>
                <input type="number" id="period" name="period" class="form-control" value="{{ isset($course) ? $course->period : '' }}" placeholder="กรุณาใส่ระยะเวลาของคอร์ส" required>
            </div>

            <!-- จำนวนครั้งที่เรียน -->
            <div class="form-group col-md-6">
                <label for="times">จำนวนครั้งที่เรียน (ต่อสัปดาห์):</label>
                <input type="number" id="times" name="times" class="form-control" value="{{ isset($course) ? $course->times : '' }}" placeholder="กรุณาใส่จำนวนครั้งที่เรียน" required>
            </div>

            <!-- เทรนเนอร์ที่สอน -->
            <div class="form-group col-md-6">
                <label for="employee_id">เทรนเนอร์:</label>
                <select id="employee_id" name="employee_id" class="form-control" required>
                    <option value=null>กรุณาเลือกเทรนเนอร์</option>
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ isset($course) && $course->employee_id == $employee->id ? 'selected' : '' }}>
                            {{ $employee->id }} - {{ $employee->firstname }} {{ $employee->lastname }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- จำนวนคนสูงสุดต่อคอร์ส -->
            <div class="form-group col-md-6">
                <label for="max_participant">จำนวนคนสูงสุด:</label>
                <input type="number" id="max_participant" name="max_participant" class="form-control" value="{{ isset($course) ? $course->max_participant : '' }}" placeholder="กรุณาใส่จำนวนคนสูงสุด" required>
            </div>

            <!-- คำอธิบาย -->
            <div class="form-group col-12">
                <label for="description">คำอธิบาย:</label>
                <textarea id="description" name="description" class="form-control" placeholder="กรุณาใส่คำอธิบาย" rows="3" required>{{ isset($course) ? $course->description : '' }} </textarea>
            </div>

            <!-- รูปภาพคอร์ส -->
            <div class="form-group col-md-12 mt-3">
                <label for="course_pics" class="form-label">อัปโหลดรูปโปรไฟล์</label>
                <input type="file" class="form-control" id="course_pics" name="picture_path" accept="image/*">
                @if(isset($course) && $course->picture_path)
                    <img src="{{ asset('storage/' . $course->picture_path) }}" alt="course Picture" style="width: 100px; height: 100px;" class="mt-3">
                @endif
            </div>

            <!-- เลือกวัน -->
            <div class="form-group col-12">
                <label for="days">เลือกวัน:</label>
                <div class="row">
                    @foreach($days as $day)
                        <div class="form-check col-md-3">
                            <input class="form-check-input" type="checkbox" name="days[]" value="{{ $day->id }}" id="day_{{ $day->id }}"
                                   @if(isset($course) && $course->days->contains($day->id)) checked @endif>
                            <label class="form-check-label" for="day_{{ $day->id }}">{{ $day->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- สถานะของคอร์ส -->
            <div class="form-group col-md-6">
                <label for="course_status">สถานะคอร์ส:</label>
                <select id="course_status" name="course_status" class="form-control">
                    <option value="1" {{ isset($course) && $course->course_status == '1' ? 'selected' : '' }}>เปิดอยู่</option>
                    <option value="0" {{ isset($course) && $course->course_status == '0' ? 'selected' : '' }}>ถูกปิดแล้ว</option>
                </select>
            </div>

            <!-- ปุ่มบันทึก -->
            <div class="col-12 mt-4">
                <button type="submit" class="btn btn-primary">{{ isset($course) ? 'บันทึก' : 'เพิ่ม' }}</button>
                <a href="/admin/course" class="btn btn-secondary">กลับ</a>
            </div>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
