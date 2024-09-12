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
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- โลโก้เป็นรูปภาพ -->
            <a class="navbar-brand" href="index.html">
                <img src="/image/logo.jpeg" alt="logo">
            </a>
            

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- คลาส / อุปกรณ์ -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            คลาส
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="yoga.html#yoga">คลาสโยคะ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="dance.html#dance">คลาสเต้น</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="muaythai.html#muaythai">คลาสมวยไทย</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="zumba.html#zumba">คลาสซุมบา</a></li>
                        </ul>
                    </li>

                    <!-- เวลา -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            เวลา
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="class_time.html#morning">ช่วงเช้า</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="class_time.html#afternoon">ช่วงบ่าย</a></li>
                        </ul>
                    </li>

                    <!-- ครูผู้สอน -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ครูผู้สอน
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="class_gender.html#instructors-female">เพศหญิง</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="class_gender.html#instructors-male">เพศชาย</a></li>
                        </ul>
                    </li>
                </ul>
                
                <!-- ช่องค้นหา และ ลิงก์เข้าสู่ระบบ -->
                <div class="d-flex align-items-center ms-3">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
                        <button class="btn btn-primary" type="submit">ค้นหา</button>
                    </form>

                    <a class="btn btn-primary ms-3" href="#" role="button" onclick="window.location.href='login.html'">เข้าสู่ระบบ</a>

                    <a href="profile.html">
                        <img src="image/kuromi.jpg" alt="Profile" class="rounded-circle ms-3" style="width: 40px; height: 40px;">
                    </a>
                    
                </div>
            </div>
        </div>
    </nav>

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
                        <input type="number" class="form-control" id="weight" placeholder="กรุณาใส่น้ำหนัก" min="1"
                            required>
                    </div>
                    <br>

                    <!-- ส่วนสูง -->
                    <div class="form-group">
                        <label for="height">ส่วนสูง (เซนติเมตร):</label>
                        <input type="number" class="form-control" id="height" placeholder="กรุณาใส่ส่วนสูง" min="1"
                            required>
                    </div>
                    <br>

                    <!-- อัปโหลดรูปภาพโปรไฟล์ -->
                    <div class="form-group">
                        <label for="profile-picture">อัปโหลดรูปภาพโปรไฟล์:</label>
                        <input type="file" class="form-control-file" id="profile-picture" accept="image/*">
                    </div>
                    <br>

                    <!-- ปุ่มสมัครสมาชิก -->
                    <button type="submit" class="btn btn-block">สมัครสมาชิก</button>
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