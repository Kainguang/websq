<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Apply</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/trainer _apply.css">
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

    <!-- Registration Form Container -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>สมัครสมาชิก</h3>
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
                        <!-- <p>คลาสที่ต้องการสอน</p>
                        <select name="class" required>
                            <option value="โยคะ">โยคะ</option>
                            <option value="เต้น">เต้น</option>
                            <option value="มวยไทย">มวยไทย</option>
                            <option value="ซุมบา">ซุมบา</option>
                        </select>
                        <button type="submit">สมัคร</button> -->
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