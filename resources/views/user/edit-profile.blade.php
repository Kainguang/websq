@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit-profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/edit-profile.css">
</head>

<body>
    <div class="container mt-5">
        <div class="edit-body">
            <h2>แก้ไขข้อมูลส่วนตัว</h2>
            <form action="{{ route('profile_update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $customer->id }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstname" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" value="{{ $customer->firstname }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastname" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="{{ $customer->lastname }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">อีเมล</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="phonenum" class="form-label">หมายเลขโทรศัพท์</label>
                        <input type="text" class="form-control" id="phone" name="phonenum" value="{{ $customer->phonenum }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">ที่อยู่</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="birthdate" class="form-label">วัน/เดือน/ปี เกิด</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $customer->birthdate }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="weight" class="form-label">น้ำหนัก</label>
                        <input type="text" class="form-control" id="weight" name="weight" value="{{ $customer->weight }}" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="height" class="form-label">ส่วนสูง</label>
                        <input type="text" class="form-control" id="height" name="height" value="{{ $customer->height }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">เพศ</label>
                        <select class="form-select" name="gender" id="gender" required>
                            <option selected>กรุณาเลือกเพศ</option>
                            <option value="ชาย" @if($customer->gender == "ชาย") selected @endif>ชาย</option>
                            <option value="หญิง" @if($customer->gender == "หญิง") selected @endif>หญิง</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="profile_picture" class="form-label">อัปโหลดรูปโปรไฟล์</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*">
                        @if($customer->profile_picture)
                            <img src="{{ asset('storage/' . Auth::user()->profile_picture) }}" alt="Profile Picture" style="width: 100px; height: 100px;" class="mt-3">
                        @endif
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" id="submitButton" class="btn btn-primary me-2">บันทึก</button>
                    <button type="button" id="cancelButton" class="btn btn-secondary">ยกเลิก</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Inline CSS สำหรับ Footer -->
    <footer style="background-color: #000000; color: #ffffff; text-align: center; padding: 10px 0; position: fixed; bottom: -15px; width: 100%;">
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>


    <script>
            // ปุ่มยกเลิก
            document.getElementById('cancelButton').addEventListener('click', function() {
                Swal.fire({
                    title: 'คุณต้องการย้อนกลับหรือไม่?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'ยืนยัน',
                    cancelButtonText: 'ยกเลิก'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '{{ url()->previous() }}';
                    }
                });
            });
        
    </script>


    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection