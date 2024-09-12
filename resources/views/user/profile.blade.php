<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/profile.css">
    <script>
        function showBookingInfo(activity) {
            // เปลี่ยนเส้นทางไปยังหน้ารายละเอียดการจองและส่งข้อมูลกิจกรรมเป็น fragment
            window.location.href = 'history-booking.html';
        }
    </script>
    
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

                    <a href="edit-profile.html">
                        <img src="image/kuromi.jpg" alt="Profile" class="rounded-circle ms-3" style="width: 40px; height: 40px;">
                    </a>
                    
                </div>
            </div>
        </div>
    </nav>

    <!-- HTML สำหรับหน้าโปรไฟล์ -->
    <div class="profile-container">
        <h2>Your Fitness Journey</h2>

        <!-- ส่วนข้อมูลส่วนตัว -->
        <section class="personal-info">
            <h5>ข้อมูลส่วนตัว</h5>
            <img src="image/kuromi.jpg" alt="User Profile Picture" class="profile-pic">
            <div class="personal-item">
                <p><b>ชื่อ-นามสกุล:</b> <span>คุณไก่ กะต๊าก</span></p>
                <p><b>อีเมล:</b> <span>kai@gmail.com</span></p>
                <p><b>หมายเลขโทรศัพท์:</b> <span>081-234-5678</span></p>
                <p><b>ที่อยู่:</b> <span>กรุงเทพมหานคร</span></p>
                <button class="edit-btn" onclick="window.location.href='edit-profile.html'">แก้ไขข้อมูลส่วนตัว</button>
            </div>
        </section>


        <section class="booking-schedule">
            <h5>ตารางการจองคลาส</h5>
            <table>
                <thead>
                    <tr>
                        <th>Day/Time</th>
                        <th>9:00-10:00</th>
                        <th>10:00-11:00</th>
                        <th>11:00-12:00</th>
                        <th>12:00-13:00</th>
                        <th>13:00-14:00</th>
                        <th>14:00-15:00</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>อาทิตย์</td>
                        <td></td>
                        <td></td>
                        <td onclick="showBookingInfo('')">Yoga</td> <!-- คลิกเพื่อแสดงข้อมูล -->
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>จันทร์</td>
                        <td></td>
                        <td></td>
                        <td onclick="showBookingInfo('')">Yoga</td> <!-- คลิกเพื่อแสดงข้อมูล -->
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>อังคาร</td>
                        <td></td>
                        <td></td>
                        <td onclick="showBookingInfo('')">Yoga</td> <!-- คลิกเพื่อแสดงข้อมูล -->
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>พุธ</td>
                        <td></td>
                        <td></td>
                        <td onclick="showBookingInfo('')">Yoga</td> <!-- คลิกเพื่อแสดงข้อมูล -->
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>พฤหัสบดี</td>
                        <td></td>
                        <td></td>
                        <td onclick="showBookingInfo('')">Yoga</td> <!-- คลิกเพื่อแสดงข้อมูล -->
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ศุกร์</td>
                        <td></td>
                        <td></td>
                        <td onclick="showBookingInfo('')">Yoga</td> <!-- คลิกเพื่อแสดงข้อมูล -->
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>เสาร์</td>
                        <td></td>
                        <td></td>
                        <td onclick="showBookingInfo('')">Yoga</td> <!-- คลิกเพื่อแสดงข้อมูล -->
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <!-- เพิ่มแถวและเซลล์อื่น ๆ ตามต้องการ -->
                </tbody>
            </table>

            <script>
                function showBookingInfo(activity) {
                    // เปลี่ยนเส้นทางไปยังหน้ารายละเอียดการจอง
                    window.location.href = activity + 'history-booking.html';
                }
            </script>
        </section>
        
        
        <div id="booking-info-modal" class="modal">
            <!-- ที่จะแสดงข้อมูลการจอง -->
            <div class="modal-content">
                <span class="close-btn" onclick="closeBookingInfo()">&times;</span>
                <div id="booking-details"></div>
            </div>
        </div>
        
        
        <!-- ส่วนข้อมูลการชำระเงิน -->
        <section class="payment-info">
            <h5>ประวัติการชำระเงิน</h5>
            <!-- ตัวอย่างข้อมูลการชำระเงิน -->
            <div class="payment-item">
                <p><b>วันที่:</b> 10/09/2024</p>
                <p><b>จำนวนเงิน:</b> 500 บาท</p>
            </div>
        </section>

        <!-- ปุ่มออกจากระบบ -->
        <button onclick="logout()" class="logout-btn">ออกจากระบบ</button>
        <script>
            function logout() {
                // ลบข้อมูลของผู้ใช้ที่เก็บไว้ เช่น Token หรือข้อมูลอื่น ๆ
                localStorage.removeItem('userToken'); // ตัวอย่างการลบ Token ที่เก็บใน Local Storage
        
                // เปลี่ยนเส้นทางไปยังหน้าล็อกอิน
                window.location.href = 'login.html';
            }
        </script>        

        
    </div>


    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
