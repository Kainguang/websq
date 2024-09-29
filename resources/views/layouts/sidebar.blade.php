<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

</head>
<body>
    <!-- Sidebar -->
    <nav class="col-md-2 sidebar">
                <div class="profile-section">
                    <img src="https://i.pinimg.com/564x/a7/00/79/a7007909daf4cbe86433b4072ffdc6d0.jpg"
                        alt="Admin profile picture" class="profile-picture">
                    <a href="/admin/profile" class="profile-link">
                        <h3 class="profile-name">Adminja</h3>
                    </a>
                </div>
                <ul class="nav flex-column text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/dashboard"><i class="fas fa-chart-line"></i>สรุปภาพรวม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/customer"><i class="bi bi-people-fill"></i>ผู้ใช้งาน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/course"><i class="fas fa-book"></i>คอร์ส</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " href="/admin/facility"><i class="bi bi-speaker-fill"></i>สิ่งอำนวยความสะดวก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/bill"><i class="fas fa-file-invoice"></i>บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/trainer"><i class="fas fa-user-tie"></i>เทรนเนอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/home" style="color: red;"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
                    </li>
                </ul>
            </nav>
            <main>
                @yield('content')
            </main>
</body>
</html>