@extends('layouts.sidebar')
@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($trainer) ? 'แก้ไขข้อมูลเทรนเนอร์' : 'เพิ่มเทรนเนอร์ใหม่' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add_trainer.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>

<body>
    <div class="content">
        <div class="container mt-5">
            <!-- ส่วนบิล -->
            <h1 class="section-header">รายละเอียดบิล</h1>
            <form action="{{ route('admin.updateBill', ['customer_id' => $customer->id, 'course_id' => $course->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- ชื่อลูกค้า -->
                    <div class="form-group col-md-6">
                        <label for="customer_name">ชื่อลูกค้า:</label>
                        <input type="text" id="customer_name" class="form-control" value="{{ $customer->firstname }} {{ $customer->lastname }}" disabled>
                    </div>

                    <!-- สถานะการจ่ายเงิน -->
                    <div class="form-group col-md-6">
                        <label for="payment_status">สถานะการจ่ายเงิน:</label>
                        <select id="payment_status" name="payment_status" class="form-control" disabled>
                            <option value="1" {{ $enrollment->pivot->payment_status == 1 ? 'selected' : '' }}>ชำระแล้ว</option>
                            <option value="0" {{ $enrollment->pivot->payment_status == 0 ? 'selected' : '' }}>ยังไม่ได้ชำระ</option>
                        </select>
                    </div>

                    <!-- สลิปโอนเงิน -->
                    <div class="form-group col-md-12">
                        <label for="slip_picture">สลิปโอนเงิน:</label>
                        @if($enrollment->pivot->slip_picture)
                            <img src="{{ asset('storage/' . $enrollment->pivot->slip_picture) }}" alt="Slip" class="mt-3 img-thumbnail">
                        @else
                            <p>ไม่มีสลิปแสดง</p>
                        @endif
                    </div>
                </div>

                <!-- เส้นแบ่ง -->
                <hr class="hr-divider">

                <!-- ส่วนข้อมูลคอร์ส -->
                <h1 class="section-header">ข้อมูลคอร์สที่จอง</h1>
                <div class="row">
                    <!-- คอร์สที่ลงทะเบียน (Dropdown เพื่อแก้ไขคอร์สที่จอง) -->
                    <div class="form-group col-md-6">
                        <label for="course_id">ชื่อคอร์ส:</label>
                        <select id="course_id" name="course_id" class="form-control">
                            @foreach($allCourses as $availableCourse)
                                <option value="{{ $availableCourse->id }}" {{ $availableCourse->id == $course->id ? 'selected' : '' }}>
                                    {{ $availableCourse->course_name }} (ราคา: {{ $availableCourse->course_cost }} บาท)
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- ชื่อเทรนเนอร์ -->
                    <div class="form-group col-md-6">
                        <label for="trainer_name">ชื่อเทรนเนอร์:</label>
                        <input type="text" id="trainer_name" class="form-control" value="{{ $course->trainer_firstname }} {{ $course->trainer_lastname }}" disabled>
                    </div>

                    <!-- สถานะคอร์ส -->
                    <div class="form-group col-md-6">
                        <label for="course_status">สถานะคอร์ส:</label>
                        <select id="course_status" name="course_status" class="form-control" disabled>
                            <option value="1" {{ $enrollment->pivot->course_status == 1 ? 'selected' : '' }}>เปิดอยู่</option>
                            <option value="0" {{ $enrollment->pivot->course_status == 0 ? 'selected' : '' }}>ถูกปิดแล้ว</option>
                        </select>
                    </div>
                </div>

                <!-- ปุ่มบันทึก -->
                <div class="col-12 mt-4">
                    <button type="submit" class="btn btn-primary">บันทึก</button>
                    <a href="{{ route('admin_bill') }}" class="btn btn-secondary">ย้อนกลับ</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection