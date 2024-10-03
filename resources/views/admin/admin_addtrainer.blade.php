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
        <h1>{{ isset($trainer) ? 'แก้ไขเทรนเนอร์' : 'เพิ่มเทรนเนอร์ใหม่' }}</h1>
        <form action="{{ isset($trainer) ? route('trainer_update', $trainer->id) : route('trainer_store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <!-- ชื่อ -->
                <div class="form-group col-md-6 col-12">
                    <label for="firstname">ชื่อ:</label>
                    <input type="text" id="firstname" name="firstname" class="form-control" value="{{ isset($trainer) ? $trainer->firstname : '' }}" placeholder="กรุณาใส่ชื่อ" required>
                </div>

                <!-- นามสกุล -->
                <div class="form-group col-md-6 col-12">
                    <label for="lastname">นามสกุล:</label>
                    <input type="text" id="lastname" name="lastname" class="form-control" value="{{ isset($trainer) ? $trainer->lastname : '' }}" placeholder="กรุณาใส่นามสกุล" required>
                </div>

                <!-- อีเมล -->
                <div class="form-group col-md-6 col-12">
                    <label for="email">อีเมล:</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ isset($trainer) ? $trainer->email : '' }}" placeholder="กรุณาใส่อีเมล" required>
                </div>

                <!-- รหัสผ่าน (เฉพาะการเพิ่มเทรนเนอร์ใหม่) -->
                @if (!isset($trainer))
                <div class="form-group col-md-6 col-12">
                    <label for="password">รหัสผ่าน:</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="กรุณาใส่รหัสผ่าน" required>
                </div>
                @endif

                <!-- เบอร์โทรศัพท์ -->
                <div class="form-group col-md-6 col-12">
                    <label for="phonenum">เบอร์โทรศัพท์:</label>
                    <input type="text" id="phonenum" name="phonenum" class="form-control" value="{{ isset($trainer) ? $trainer->phonenum : '' }}" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>
                </div>

                <!-- ที่อยู่ -->
                <div class="form-group col-md-6 col-12">                
                    <label for="address">ที่อยู่:</label>
                    <textarea id="address" name="address" class="form-control" placeholder="กรุณาใส่ที่อยู่" rows="3" required>{{ isset($customer) ? $customer->address : '' }}</textarea>
                </div>

                <!-- วันเกิด -->
                <div class="form-group col-md-6 col-12">
                    <label for="birthdate">วันเกิด:</label>
                    <input type="date" id="birthdate" name="birthdate" class="form-control" value="{{ isset($trainer) ? $trainer->birthdate : '' }}" required>
                </div>

                <!-- น้ำหนัก -->
                <div class="form-group col-md-6 col-12">
                    <label for="weight">น้ำหนัก (กิโลกรัม):</label>
                    <input type="number" id="weight" name="weight" class="form-control" placeholder="กรุณาใส่นํ้าหนัก" value="{{ isset($trainer) ? $trainer->weight : '' }}" required>
                </div>

                <!-- ส่วนสูง -->
                <div class="form-group col-md-6 col-12">
                    <label for="height">ส่วนสูง (เซนติเมตร):</label>
                    <input type="number" id="height" name="height" class="form-control" placeholder="กรุณาใส่ส่วนสูง" value="{{ isset($trainer) ? $trainer->height : '' }}" required>
                </div>

                <!-- เพศ -->
                <div class="form-group col-md-6 col-12">
                    <label for="gender">เพศ:</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">กรุณาเลือกเพศ</option>
                        <option value="ชาย" {{ isset($trainer) && $trainer->gender == 'ชาย' ? 'selected' : '' }}>ชาย</option>
                        <option value="หญิง" {{ isset($trainer) && $trainer->gender == 'หญิง' ? 'selected' : '' }}>หญิง</option>
                    </select>
                </div>

                <!-- เงินเดือน -->
                <div class="form-group col-md-6 col-12">
                    <label for="salary">เงินเดือน:</label>
                    <input type="number" id="salary" name="salary" class="form-control" placeholder="กรุณาใส่เงินเดือน" value="{{ isset($trainer) ? $trainer->salary : '' }}" required>
                </div>

                <!-- รูปโปรไฟล์ -->
                <div class="col-md-6 mb-3">
                    <label for="profile_picture" class="form-label">อัปโหลดรูปโปรไฟล์</label>
                    <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                    @if(isset($trainer) && $trainer->profile_picture)
                        <img src="{{ asset('storage/' . $trainer->profile_picture) }}" alt="Profile Picture" style="width: 100px; height: 100px;" class="mt-3">
                    @endif
                </div>

                <!-- ปุ่มบันทึก -->
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">{{ isset($trainer) ? 'บันทึก' : 'เพิ่ม' }}</button>
                    <a href="/admin/trainer" class="btn btn-secondary">กลับ</a>
                </div>
            </div>
        </form>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection