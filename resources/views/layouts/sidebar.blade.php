<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">

</head>

<body>
    <!-- Sidebar -->
    <nav class="col-md-2 sidebar">
        <div class="profile-section">
            @if (Auth::guard('employee')->check())
            <img src="{{ Auth::guard('employee')->user()->profile_picture ? asset('storage/' . Auth::guard('employee')->user()->profile_picture) : asset('profile_picture/default-profile.jpg') }}"
                alt="Admin profile picture" class="profile-picture">
            <h3 class="profile-name">{{ Auth::guard('employee')->user()->firstname }}</h3>
            @endif
        </div>
        <ul class="nav flex-column text-center">
            <!-- ตรวจสอบเส้นทางด้วย Request::is() -->
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/dashboard') ? 'active' : '' }}" href="/admin/dashboard"><i
                        class="fas fa-chart-line"></i>สรุปภาพรวม</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/customer') ? 'active' : '' }}" href="/admin/customer"><i class="bi bi-people-fill"></i>ผู้ใช้งาน</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/course') ? 'active' : '' }}" href="/admin/course"><i class="fas fa-book"></i>คอร์ส</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/facility') ? 'active' : '' }}" href="/admin/facility"><i class="bi bi-speaker-fill"></i>สิ่งอำนวยความสะดวก</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/bill') ? 'active' : '' }}" href="/admin/bill"><i class="fas fa-file-invoice"></i>บิล</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('admin/trainer') ? 'active' : '' }}" href="/admin/trainer"><i class="fas fa-user-tie"></i>เทรนเนอร์</a>
            </li>
            <li class="nav-item">
                <a id="logoutButton" class="nav-link" href="#" style="color: red;"><i class="fas fa-sign-out-alt"></i>ออกจากระบบ</a>
            </li>
        </ul>
    </nav>

    <form id="logout" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>

    <main>
        @yield('content')
    </main>

    <script>
        document.getElementById('logoutButton').addEventListener('click', function(e) {
            e.preventDefault(); // ป้องกันการ redirect ทันที
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณต้องการออกจากระบบหรือไม่?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'ยืนยัน',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    // ถ้ากดยืนยัน ให้ส่งฟอร์มออกจากระบบ
                    document.getElementById('logout').submit();
                }
            });
        });
    </script>
</body>

</html>