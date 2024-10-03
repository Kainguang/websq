<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แถบนำทาง</title>
    <link rel="stylesheet" href="{{asset('css/nav.css')}}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- โลโก้เป็นรูปภาพ -->
            <a class="navbar-brand" href="{{ route('index') }}"> 
                <img src="{{ asset('images/logo.jpeg') }}" alt="logo"> 
            </a>


            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">

                    <!-- คลาส-->
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            คลาส
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($filteredCourses as $course)
                            <li><a class="dropdown-item" href="{{ route($course->course_name_en) }}">คลาส{{ $course->course_name }}</a></li>
                            <li><hr class="dropdown-divider"></li>
                        @endforeach
                        </ul>
                    </li>

                    <!-- เวลา -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            เวลา
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('course_time') }}#morning">ช่วงเช้า</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('course_time') }}#afternoon">ช่วงบ่าย</a></li>
                        </ul>
                    </li>

                    <!-- ครูผู้สอน -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ครูผู้สอน
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('course_gender') }}#instructors-female">เพศหญิง</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('course_gender') }}#instructors-male">เพศชาย</a></li>
                        </ul>
                    </li>
                </ul>
                
                <!-- ลิงก์เข้าสู่ระบบ -->
                <div class="d-flex align-items-center ms-3">
                @if(Auth::guard('customer')->check())
                    <a href="{{ route('profile') }}">
                        <img src="{{ Auth::guard('customer')->user()->profile_picture ? asset('storage/' . Auth::guard('customer')->user()->profile_picture) : asset('storage/profile_pictures/default-profile.jpg') }}" alt="User Profile Picture" class="rounded-circle ms-3" style="width: 40px; height: 40px;">
                    </a>
                @else
                    <a class="btn btn-primary ms-3" href="{{ route('show_login') }}" role="button">เข้าสู่ระบบ</a>
                @endif
                </div>
            </div>
        </div>
    </nav>
    <main>
        @yield('content')
    </main>
</body>
</html>