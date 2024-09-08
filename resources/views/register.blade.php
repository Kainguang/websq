<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - WellNessWave</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleforregister.css">
</head>

<body>
    <!-- Haeder -->
    <div class="container">
        <header class="header">
                <h1 class="mb-0">WellNessWave</h1>
        </header>
    </div>

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

                    <!-- อีเมล -->
                    <div class="form-group">
                        <label for="email">อีเมล:</label>
                        <input type="email" class="form-control" id="email" placeholder="กรุณาใส่อีเมล" required>
                    </div>

                    <!-- รหัสผ่าน -->
                    <div class="form-group">
                        <label for="password">รหัสผ่าน:</label>
                        <input type="password" class="form-control" id="password" placeholder="กรุณาใส่รหัสผ่าน" required>
                    </div>

                    <!-- ยืนยันรหัสผ่าน -->
                    <div class="form-group">
                        <label for="confirm-password">ยืนยันรหัสผ่าน:</label>
                        <input type="password" class="form-control" id="confirm-password" placeholder="กรุณายืนยันรหัสผ่าน" required>
                    </div>

                    <!-- เบอร์โทรศัพท์ -->
                    <div class="form-group">
                        <label for="phone">เบอร์โทรศัพท์:</label>
                        <input type="tel" class="form-control" id="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>
                    </div>

                    <!-- ที่อยู่ -->
                    <div class="form-group">
                        <label for="address">ที่อยู่:</label>
                        <textarea class="form-control" id="address" rows="3" placeholder="กรุณาใส่ที่อยู่" required></textarea>
                    </div>

                    <!-- วันเดือนปีเกิด -->
                    <div class="form-group">
                        <label for="birthdate">วันเดือนปีเกิด:</label>
                        <input type="date" class="form-control" id="birthdate" required>
                    </div>


                    <!-- น้ำหนัก -->
                    <div class="form-group">
                        <label for="weight">น้ำหนัก (กิโลกรัม):</label>
                        <input type="number" class="form-control" id="weight" placeholder="กรุณาใส่น้ำหนัก" min="1" required>
                    </div>

                    <!-- ส่วนสูง -->
                    <div class="form-group">
                        <label for="height">ส่วนสูง (เซนติเมตร):</label>
                        <input type="number" class="form-control" id="height" placeholder="กรุณาใส่ส่วนสูง" min="1" required>
                    </div>

                    <!-- อัปโหลดรูปภาพโปรไฟล์ -->
                    <div class="form-group">
                        <label for="profile-picture">อัปโหลดรูปภาพโปรไฟล์:</label>
                        <input type="file" class="form-control-file" id="profile-picture" accept="image/*">
                    </div>

                    <!-- ปุ่มสมัครสมาชิก -->
                    <button type="submit" class="btn btn-block">สมัครสมาชิก</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="container">
        <footer class="footer">
            <p class="mb-0">&copy; 2024 WellNessWave. All rights reserved.</p>
        </footer>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
