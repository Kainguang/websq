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
<div class="container mt-5">
    <h1>{{ isset($facility) ? 'แก้ไขสิ่งอำนวยความสะดวก' : 'เพิ่มสิ่งอำนวยความสะดวก' }}</h1>
    <form action="{{ isset($facility) ? route('facility_update', $facility->id) : route('facility_create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <!-- ชื่อสิ่งอำนวยความสะดวก -->
            <div class="form-group col-md-6">
                <label for="facility_name">ชื่อสิ่งอำนวยความสะดวก:</label>
                <input type="text" id="facility_name" name="facility_name" class="form-control" value="{{ isset($facility) ? $facility->facility_name : '' }}" required>
            </div>

            <!-- จำนวนสิ่งอำนวยความสะดวก -->
            <div class="form-group col-md-6">
                <label for="facility_amount">จำนวน:</label>
                <input type="number" id="facility_amount" name="facility_amount" class="form-control" value="{{ isset($facility) ? $facility->facility_amount : '' }}" required>
            </div>

            <!-- คำอธิบาย -->
            <div class="form-group col-md-12">
                <label for="description">คำอธิบาย:</label>
                <textarea id="description" name="description" class="form-control" rows="3" required>{{ isset($facility) ? $facility->description : '' }}</textarea>
            </div>

            <!-- รูปภาพสิ่งอำนวยความสะดวก -->
            <div class="form-group col-md-12">
                <label for="facility_pics">รูปภาพสิ่งอำนวยความสะดวก:</label>
                <input type="file" id="facility_pics" name="facility_pics[]" class="form-control" multiple>
            </div>

            <!-- แสดงรูปภาพที่มีอยู่ -->
            @if (isset($facility))
            <div class="form-group col-md-12">
                <label>รูปภาพที่มีอยู่:</label>
                <div class="row">
                    @foreach ($facility->picture as $picture)
                        <div class="col-md-3">
                            <img src="{{ asset('storage/' . $picture->picture) }}" alt="รูปภาพ" class="img-thumbnail" style="width: 100px; height: 100px;">
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

        <!-- ปุ่มบันทึก -->
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">{{ isset($facility) ? 'บันทึกการแก้ไข' : 'เพิ่มสิ่งอำนวยความสะดวก' }}</button>
            <a href="/admin/facility" class="btn btn-secondary">กลับ</a>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
