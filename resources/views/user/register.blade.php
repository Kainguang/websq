<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - WellNessWave</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
   
</head>
<body>
    <div class="container mt-5">
        <!-- Card -->
        <div class="card mx-auto">
            <div class="card-header">
                <h3>สมัครสมาชิก</h3>
            </div>
            <div class="card-body">
                <!-- Form -->
                <form>
                    <!-- ชื่อผู้ใช้ -->
                    <div class="form-group">
                        <label for="username">ชื่อผู้ใช้:</label>
                        <input type="text" class="form-control" id="username" placeholder="กรุณาใส่ชื่อผู้ใช้" required>
                    </div>
                    <br>

                    <!-- อีเมล -->
                    <div class="form-group">
                        <label for="email">อีเมล:</label>
                        <input type="email" class="form-control" id="email" placeholder="กรุณาใส่อีเมล" required>
                    </div>
                    <br>

                    <!-- รหัสผ่าน -->
                    <div class="form-group">
                        <label for="password">รหัสผ่าน:</label>
                        <input type="password" class="form-control" id="password" placeholder="กรุณาใส่รหัสผ่าน"
                            required>
                    </div>
                    <br>

                    <!-- ยืนยันรหัสผ่าน -->
                    <div class="form-group">
                        <label for="confirm-password">ยืนยันรหัสผ่าน:</label>
                        <input type="password" class="form-control" id="confirm-password"
                            placeholder="กรุณายืนยันรหัสผ่าน" required>
                    </div>
                    <br>

                    <!-- เบอร์โทรศัพท์ -->
                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์:</label>
                        <input type="tel" class="form-control" id="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>
                    </div>
                    <br>

                    <!-- ที่อยู่ -->
                    <div class="form-group">
                        <label for="address">ที่อยู่:</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="กรุณาใส่ที่อยู่"
                            required></textarea>
                    </div>
                    <br>

                    <!-- วันเดือนปีเกิด -->
                    <div class="form-group">
                        <label for="birthdate">วันเดือนปีเกิด:</label>
                        <input type="date" class="form-control" id="birthdate" required>
                    </div>
                    <br>


                    <!-- น้ำหนัก -->
                    <div class="form-group">
                        <label for="weight">น้ำหนัก (กิโลกรัม):</label>
                        <input type="number" class="form-control" id="weight" placeholder="กรุณาใส่น้ำหนัก" min="0" step="0.1" required>
                    </div>
                    <br>

                    <!-- ส่วนสูง -->
                    <div class="form-group">
                        <label for="height">ส่วนสูง (เซนติเมตร):</label>
                        <input type="number" class="form-control" id="height" placeholder="กรุณาใส่ส่วนสูง" min="0" step="0.1" required>
                    </div>
                    <br>

                    <!-- อัปโหลดรูปภาพโปรไฟล์ -->
                    <div class="form-group">
                        <label for="profile-picture">อัปโหลดรูปภาพโปรไฟล์:</label>
                        <input type="file" class="form-control-file" id="profile-picture" accept="image/*">
                    </div>
                    <br>

                    <!-- ปุ่มสมัครสมาชิก -->
                    <button type="button" class="btn btn-block" onclick="window.location.href='{{ route('index') }}'">สมัครสมาชิก</button>
                </form>
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