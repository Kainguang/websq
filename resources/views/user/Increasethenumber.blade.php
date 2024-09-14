<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="/css/Increasethenumber.css">
</head>

<body>
       <!-- Navigation -->
       <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- โลโก้เป็นรูปภาพ -->
            <a class="navbar-brand" href="index.html">
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

                    <a class="btn btn-primary ms-3" href="{{ route('index') }}" role="button">เข้าสู่ระบบ</a>
                

                    <a href="profile.html">
                        <img src="images/kuromi.jpg" alt="Profile" class="rounded-circle ms-3" style="width: 40px; height: 40px;">
                    </a>
                    
                </div>    
            </div>
        </div>
    </nav>


    <div class="container">
        <div class="form-container">
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="memberID" class="form-label">รหัสสมาชิก หรือ อีเมลสมาชิก</label>
                        <input type="text" class="form-control" id="memberID"
                            placeholder="กรอกข้อมูลนี้เฉพาะสมาชิกเท่านั้น">
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">เพศ <span class="text-danger">*</span></label>
                        <select class="form-select" id="gender">
                            <option selected>กรุณาเลือก</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">ชื่อกลาง (ถ้ามี) และชื่อ <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstName"
                            placeholder="ชื่อกลาง (ถ้ามี) และชื่อจริง">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">นามสกุล <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastName" placeholder="นามสกุล">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="birthdate" class="form-label">วันเกิด (DD/MM/YYYY) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="birthdate" placeholder="__/__/____">
                    </div>
                    <div class="col-md-6">
                        <label for="nationality" class="form-label">สัญชาติ <span class="text-danger">*</span></label>
                        <select class="form-select" id="nationality">
                            <option selected>กรุณาเลือก</option>
                            <option value="thai">ไทย</option>
                            <option value="other">อื่นๆ</option>
                        </select>
                    </div>
                </div>

             <hr class="mt-5">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="memberID" class="form-label">รหัสสมาชิก หรือ อีเมลสมาชิก</label>
                        <input type="text" class="form-control" id="memberID"
                            placeholder="กรอกข้อมูลนี้เฉพาะสมาชิกเท่านั้น">
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">เพศ <span class="text-danger">*</span></label>
                        <select class="form-select" id="gender">
                            <option selected>กรุณาเลือก</option>
                            <option value="male">ชาย</option>
                            <option value="female">หญิง</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">ชื่อกลาง (ถ้ามี) และชื่อ <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="firstName"
                            placeholder="ชื่อกลาง (ถ้ามี) และชื่อจริง">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">นามสกุล <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="lastName" placeholder="นามสกุล">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="birthdate" class="form-label">วันเกิด (DD/MM/YYYY) <span
                                class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="birthdate" placeholder="__/__/____">
                    </div>
                    <div class="col-md-6">
                        <label for="nationality" class="form-label">สัญชาติ <span class="text-danger">*</span></label>
                        <select class="form-select" id="nationality">
                            <option selected>กรุณาเลือก</option>
                            <option value="thai">ไทย</option>
                            <option value="other">อื่นๆ</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-primary" onclick="handleSave()">บันทึก</button>
                </div>
                
                <script>
                    function handleSave() {
                        // เปลี่ยน URL ที่ต้องการให้ไป
                        window.location.href = "{{ route('Orderlist') }}";
                    }
                </script>
                
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-4">
        <div class="container-fluid">
            <p>&copy; 2024 WellNessWave. All Rights Reserved.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
