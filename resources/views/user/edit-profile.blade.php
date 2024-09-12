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
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- โลโก้เป็นรูปภาพ -->
            <a class="navbar-brand" href="index.html">
                <img src="image/logo.jpeg" alt="logo">
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
        <div class="edit-body">
            <h2>แก้ไขข้อมูลส่วนตัว</h2>
            <form id="edit-profile-form">
                <div class="mb-3">
                    <label for="first-name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="first-name" placeholder="กรุณาใส่ชื่อ" required>
                </div> 
                <div class="mb-3">
                    <label for="last-name" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" id="last-name" placeholder="กรุณาใส่นามสกุล" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" id="email" placeholder="กรุณาใส่อีเมล" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">หมายเลขโทรศัพท์</label>
                    <input type="tel" class="form-control" id="phone" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>
                </div>
                <div class="mb-3">
                    <label for="dob" class="form-label">วัน/เดือน/ปี เกิด</label>
                    <input type="text" class="form-control" id="dob" placeholder="วว/ดด/ปปปป" required>
                </div>
                <div class="mb-3">
                    <label for="weight" class="form-label">น้ำหนัก</label>
                    <input type="text" class="form-control" id="weight" placeholder="กรุณาใส่น้ำหนัก" required>
                </div>
                <div class="mb-3">
                    <label for="height" class="form-label">ส่วนสูง</label>
                    <input type="text" class="form-control" id="height" placeholder="กรุณาใส่ส่วนสูง" required>
                </div>
                <div class="mb-3">
                    <label for="gender" class="form-label">เพศ</label>
                    <select class="form-select" id="gender" required>
                        <option selected>กรุณาเลือกเพศ</option>
                        <option value="male">ชาย</option>
                        <option value="female">หญิง</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Custom JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('edit-profile-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent the form from submitting normally
                Swal.fire({
                    title: 'แก้ไขข้อมูลเสร็จสิ้นแล้ว',
                    icon: 'success',
                    width: 600,
                    padding: '3em',
                    color: '#716add',
                    background: '#fff url(/image/trees.png)',
                    backdrop: `
                        rgba(0,0,123,0.4)
                        url("/image/nyan-cat.gif")
                        top left
                        no-repeat
                    `
                }).then(() => {
                    window.location.href = 'index.html'; // Redirect to the main page
                });
            });
        });
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>