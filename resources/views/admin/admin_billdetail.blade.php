@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายละเอียดบิล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_billdetail.css') }}">
</head>

<body>
    <div class="container mt-5">
        <div class="bill-container">
            <h1 class="bill-header">รายละเอียดบิล</h1>
            <div class="bill-info">

            <div class="row">
    <div class="col-md-8">
        <div class="bill-info-item">
            <span class="bill-label">ชื่อผู้จอง:</span>
            <span class="bill-value">{{ $bill->firstname }} {{ $bill->lastname }}</span>
        </div>

        <div class="bill-info-item">
            <span class="bill-label">วันที่จ่ายเงิน:</span>
            <span class="bill-value">{{ date('d/m/Y', strtotime($bill->created_at)) }}</span>
        </div>

        <div class="bill-info-item">
            <span class="bill-label">วันที่เริ่มเรียน:</span>
            <span class="bill-value">{{ $bill->start_time }}</span>
        </div>

        <div class="bill-info-item">
            <span class="bill-label">วันที่สิ้นสุด:</span>
            <span class="bill-value">{{ $bill->end_time }}</span>
        </div>

        <div class="bill-info-item">
            <span class="bill-label">คอร์ส:</span>
            <span class="bill-value">{{ $bill->course_name }}</span>
        </div>

        <div class="bill-info-item">
            <span class="bill-label">ราคารวม:</span>
            <span class="bill-value"> {{ number_format($bill->totalprice) }} บาท</span>
        </div>
    </div>
    
    
    <div class="col-md-4">
        <div class="bill-info-item">
            <span class="bill-label">สลิปการโอนเงิน:</span>
            <span class="bill-value">
                @if ($bill->slip_picture)
                    <img src="{{ asset('storage/' . $bill->slip_picture) }}" alt="Slip Picture" class="img-fluid mt-2" style="max-width: 100%;">
                @else
                    <p>ไม่มีสลิปการโอนเงิน</p>
                @endif
            </span>
        </div>
    </div>
</div>
<hr>


                <div class="col-md-6">
                    <img src="{{ asset('storage/' . $bill->picture_path) }}" alt="Course Picture" class="img-fluid rounded-start">
                </div>
                <div class="col-md-6">
                    <div class="card-body">
                            <h3 class="card-title">{{ $bill->course_name }}</h3>
                            <div class="course-details">
                                <p><strong>วันเริ่มคอร์ส:</strong> {{ $bill->start_day }}</p>
                                <p><strong>วันสิ้นสุดคอร์ส:</strong> {{ $bill->end_day }}</p>
                </div>
            <div class="bill-button">
                <a href="/admin/bill" class="btn btn-secondary back-button">กลับ</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
