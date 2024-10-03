@extends('layouts.sidebar')

@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($customer) ? 'แก้ไขข้อมูลลูกค้า' : 'เพิ่มลูกค้าใหม่' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/add_customer.css') }}">
</head>

<body>
<div class="container-fluid">
    <div class="row">
        <!-- Main Content -->
        <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            <h1>{{ isset($customer) ? 'แก้ไขลูกค้า' : 'เพิ่มลูกค้าใหม่' }}</h1>

            <form action="{{ isset($customer) ? route('customer_update', $customer->id) : route('customer_store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="firstname">ชื่อ:</label>
                            <input type="text" id="firstname" name="firstname" class="form-control" value="{{ isset($customer) ? $customer->firstname : '' }}" placeholder="กรุณาใส่ชื่อ" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="lastname">นามสกุล:</label>
                            <input type="text" id="lastname" name="lastname" class="form-control" value="{{ isset($customer) ? $customer->lastname : '' }}" placeholder="กรุณาใส่นามสกุล" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="birthdate">วัน/เดือน/ปี เกิด:</label>
                        <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ isset($customer) ? $customer->birthdate : '' }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="gender">เพศ:</label>
                        <select id="gender" name="gender" class="form-control" required>
                            <option value=null>กรุณาเลือกเพศ</option>
                            <option value="ชาย" {{ isset($customer) && $customer->gender == 'ชาย' ? 'selected' : '' }}>ชาย</option>
                            <option value="หญิง" {{ isset($customer) && $customer->gender == 'หญิง' ? 'selected' : '' }}>หญิง</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">อีเมล:</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ isset($customer) ? $customer->email : '' }}" placeholder="กรุณาใส่อีเมล" required>
                        </div>
                    </div>

                    <!-- กรณีเป็นการเพิ่มลูกค้าใหม่ ให้แสดงฟิลด์รหัสผ่าน -->
                    @if (!isset($customer))
                    <div class="form-group col-md-6 col-12">
                        <label for="password">รหัสผ่าน:</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="กรุณาใส่รหัสผ่าน" required>
                    </div>
                    @endif

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="phonenum">เบอร์โทรศัพท์:</label>
                            <input type="text" id="phonenum" name="phonenum" class="form-control" value="{{ isset($customer) ? $customer->phonenum : '' }}" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="weight">น้ำหนัก (กิโลกรัม):</label>
                            <input type="number" id="weight" name="weight" class="form-control" value="{{ isset($customer) ? $customer->weight : '' }}" placeholder="กรุณาใส่น้ำหนัก" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="height">ส่วนสูง (เซนติเมตร):</label>
                            <input type="number" id="height" name="height" class="form-control" value="{{ isset($customer) ? $customer->height : '' }}" placeholder="กรุณาใส่ส่วนสูง" required>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="address">ที่อยู่:</label>
                            <textarea id="address" name="address" class="form-control" placeholder="กรุณาใส่ที่อยู่" rows="3" required>{{ isset($customer) ? $customer->address : '' }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="profile_picture" class="form-label">อัปโหลดรูปโปรไฟล์</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                        @if(isset($customer) && $customer->profile_picture)
                            <img src="{{ asset('storage/' . $customer->profile_picture) }}" alt="Profile Picture" style="width: 100px; height: 100px;" class="mt-3">
                        @endif
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit" class="btn btn-primary">{{ isset($customer) ? 'บันทึก' : 'เพิ่ม' }}</button>
                        <a href="/admin/customer" class="btn btn-secondary">กลับ</a>
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
