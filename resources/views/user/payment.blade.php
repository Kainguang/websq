
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>สมัครสมาชิก - WellNessWave</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/css/payment.css">
    

</head>

<body>
     <!-- Navigation -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <!-- โลโก้เป็นรูปภาพ -->
                    <a class="navbar-brand" href="{{route('index')}}">
                        <img src="images/logo.jpeg" alt="logo">
                    </a>
            

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <!-- คลาส-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            คลาส
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{route('yoga')}}">คลาสโยคะ</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('dance')}}">คลาสเต้น</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('muaythai')}}">คลาสมวยไทย</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{route('zumba')}}">คลาสซุมบา</a></li>
                        </ul>
                    </li>

                    <!-- เวลา -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            เวลา
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('class_time') }}#morning">ช่วงเช้า</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('class_time') }}#afternoon">ช่วงบ่าย</a></li>
                    </ul>
                    </li>

                    <!-- ครูผู้สอน -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ครูผู้สอน
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('class_gender') }}#instructors-female">เพศหญิง</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{ route('class_gender') }}#instructors-male">เพศชาย</a></li>
                    </ul>
                    </li>
                </ul>
                
                <!-- ช่องค้นหา และ ลิงก์เข้าสู่ระบบ -->
                <div class="d-flex align-items-center ms-3">
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="ค้นหา" aria-label="Search">
                        <button class="btn btn-primary" type="submit">ค้นหา</button>
                    </form>

                    <a class="btn btn-primary ms-3" href="{{ route('login') }}" role="button">เข้าสู่ระบบ</a>
                

                    <a href="{{ route('profile') }}">
                        <img src="images/kuromi.jpg" alt="Profile" class="rounded-circle ms-3" style="width: 40px; height: 40px;">
                    </a> 
                    
                </div>    
            </div>
        </div>
    </nav>


    <!-- Main Content -->
    <div class="container mt-5">
        <div class="card mx-auto">
            <div class="card-header">
                ชำระเงิน
            </div>
            <div class="card-body">
                <div class="images-block">
                    <img src="./images/IMG_0452.jpg" alt="QR">
                </div>
                <div class="text-center mt-4">
                    <label for="profile-picture" class="form-label">อัปโหลดสลิปโอนเงิน:</label>
                    <input type="file" class="form-control-file" id="profile-picture" accept="images/*">
                </div>
                <div class="text-center mt-4">
                    <button type="button" class="btn btn-dark">ยืนยัน</button>
                </div>
            </div>
        </div>
    </div>

<!-- รวม SweetAlert2 CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<!-- รวม SweetAlert2 JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelector('.btn-dark').addEventListener('click', function() {
            Swal.fire({
                title: 'ขอบคุณ!',
                text: 'จ่ายเงินสำเร็จแล้ว!',
                icon: 'success',
                confirmButtonText: 'ตกลง',
                confirmButtonColor: '#000', // Black button color
                background: '#fff', // White background
                color: '#000', // Black text color
                customClass: {
                    popup: 'sweetalert-popup',
                    title: 'sweetalert-title',
                    content: 'sweetalert-content',
                    confirmButton: 'sweetalert-confirm-button'
                },
                backdrop: `
                    rgba(0, 0, 0, 0.6)
                    url('/images/nyan-cat.gif')
                    center top
                    no-repeat
                `
            }).then(() => {
                // เปลี่ยน URL ที่ต้องการให้ไป
                window.location.href = "{{ route('index') }}";
            });
        });
    });
</script>

                    
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