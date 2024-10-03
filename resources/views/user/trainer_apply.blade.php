@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - เทรนเนอร์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/trainer_apply.css">
</head>
<body>
    <!-- Registration Form Container -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>สมัครเป็นเทรนเนอร์</h3>
            </div>
            <div class="card-body">
                <div class="registration-container">
                    <form action="#" method="POST">
                        <p>ชื่อ</p>
                        <input type="text" name="firstname" placeholder="กรุณาใส่ชื่อ" required>
                        <p>นามสกุล</p>
                        <input type="text" name="lastname" placeholder="กรุณาใส่นามสกุล" required>
                        <p>อีเมล</p>
                        <input type="email" name="email" placeholder="กรุณาใส่อีเมล" required>
                        <p>เบอร์โทรศัพท์</p>
                        <input type="text" name="phonenum" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>
                        <p>วัน/เดือน/ปี เกิด</p>
                        <input type="date" name="birthdate" required>
                        <p>น้ำหนัก</p>
                        <input type="number" name="weight" placeholder="กรุณาใส่น้ำหนัก" required>
                        <p>ส่วนสูง</p>
                        <input type="number" name="height" placeholder="กรุณาใส่ส่วนสูง" required>
                        <p>เพศ</p>
                        <select name="gender" required>
                            <option value="หญิง">หญิง</option>
                            <option value="ชาย">ชาย</option>
                        </select>
                        <p>คลาสที่ต้องการสอน</p>
                        <select name="class" required>
                            <option value="โยคะ">โยคะ</option>
                            <option value="เต้น">เต้น</option>
                            <option value="มวยไทย">มวยไทย</option>
                            <option value="ซุมบา">ซุมบา</option>
                        </select>
                        <button type="submit">สมัคร</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <footer class="footer">
            <p class="mb-0">&copy; 2024 WellNessWave. All rights reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection