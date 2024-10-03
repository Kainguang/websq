@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($facility) ? 'แก้ไขสิ่งอำนวยความสะดวก' : 'เพิ่มสิ่งอำนวยความสะดวก' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add_facility.css') }}">
</head>

<body>
<div class="container-fluid">
    <div class="row"></div>
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            <h1>{{ isset($facility) ? 'แก้ไขสิ่งอำนวยความสะดวก' : 'เพิ่มสิ่งอำนวยความสะดวก' }}</h1>
            <form action="{{ isset($facility) ? route('facility_update', $facility->id) : route('facility_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <!-- ชื่อสิ่งอำนวยความสะดวก -->
                    <div class="form-group col-md-6">
                        <label for="facility_name">ชื่อสิ่งอำนวยความสะดวก:</label>
                        <input type="text" id="facility_name" name="facility_name" class="form-control" value="{{ isset($facility) ? $facility->facility_name : '' }}" placeholder="กรุณาใส่ชื่อ" required>
                    </div>

                    <!-- จำนวนสิ่งอำนวยความสะดวก -->
                    <div class="form-group col-md-6">
                        <label for="facility_amount">จำนวน:</label>
                        <input type="number" id="facility_amount" name="facility_amount" class="form-control" value="{{ isset($facility) ? $facility->facility_amount : '' }}" placeholder="กรุณาใส่จำนวน" required>
                    </div>

                    <!-- คำอธิบาย -->
                    <div class="form-group col-md-12">
                        <label for="description">คำอธิบาย:</label>
                        <textarea id="description" name="description" class="form-control" placeholder="กรุณาใส่คำอธิบาย" rows="3" required>{{ isset($facility) ? $facility->description : '' }}</textarea>
                    </div>

                    <!-- รูปภาพ fac -->
                    <div class="form-group col-md-12 mt-3">
                        <label for="fac_pics" class="form-label">อัปโหลดรูปโปรไฟล์</label>
                        <input type="file" class="form-control" id="fac_pics" name="picture_path" accept="image/*">
                        @if(isset($facility) && $facility->picture_path)
                            <img src="{{ asset('storage/' . $facility->picture_path) }}" alt="facility Picture" style="width: 100px; height: 100px;" class="mt-3">
                        @endif
                    </div>

                    <!-- ปุ่มบันทึก -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($facility) ? 'บันทึก' : 'เพิ่ม' }}</button>
                        <a href="/admin/facility" class="btn btn-secondary">กลับ</a>
                    </div>
                </div>
            </form>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
