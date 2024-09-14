<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muay-Thai</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/muaythai.css">
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
    </nav>

    <section id="yoga" class="sectiondetail section-dark">
        <div class="container">
            <h2 class="sectiondetail-title">Empower Your Strikes</h2>
            <div class="row">
                <!-- มวยไทย 1 -->
                <!-- คอลัมน์ด้านซ้าย: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/muaythai2.jpg" class="card-img-top" alt="muaythai">
                    </div>
                </div>
                <!-- คอลัมน์ด้านขวา: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Muay Thai</h5>
                        <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทย</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูสุกิจตรา โคแสงรักษา (องุ่น)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>

                <!-- มวยไทย 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Muay Thai</h5>
                        <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทย</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูศิริวรรณ ชลธาร (วรรณ)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/muaythaigirl2.jpg" class="card-img-top" alt="muaythai">
                    </div>
                </div>

        <div class="container">
            <div class="row">
                <!-- มวยไทย 1-->
                <!-- คอลัมน์ด้านซ้าย: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/muaythaimen3.jpg" class="card-img-top" alt="muaythai">
                    </div>
                </div>
                <!-- คอลัมน์ด้านขวา: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Muay Thai</h5>
                        <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทยจากผู้สอนที่มีประสบการณ์ เพื่อช่วยเพิ่มความแข็งแรงและความยืดหยุ่นของร่างกาย</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูฉัตรชัย มีความสุข (ฉลาม)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>
                
                <!-- มวยไทย 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Muay Thai</h5>
                        <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทยจากผู้สอนที่มีประสบการณ์ เพื่อช่วยเพิ่มความแข็งแรงและความยืดหยุ่นของร่างกาย</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูศราวุธ เชาวน์กร (วุธ)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/muaythaimen2.jpg" class="card-img-top" alt="muaythai">
                    </div>
                </div>
    </section>

    <hr>

    <div class="container my-5">
        <h2 class="text-center mb-4">Amenities for Muay-Thai Class</h2>
        <div class="row">
            <!-- สิ่งอำนวยความสะดวก 1 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn4.iconfinder.com/data/icons/gym-workout-1/128/12-512.png" alt="Punching Bags and Pads" style="width: 150px;">
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Punching Bags and Pads</h5>
                        <p class="card-text flex-grow-1">อุปกรณ์สำหรับการฝึกการโจมตีและการป้องกัน ซึ่งช่วยพัฒนาทักษะการต่อสู้และความแข็งแกร่ง</p>
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 2 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn0.iconfinder.com/data/icons/fitness-95/24/exercise-mat-512.png" alt="Matted Floor Area" style="width: 150px;">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Matted Floor Area</h5>
                        <p class="card-text flex-grow-1">พื้นที่ที่ปูด้วยเสื่อนวมเพื่อป้องกันการบาดเจ็บเมื่อฝึกท่าต่อสู้และการล้ม</p>
                       
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 3 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn4.iconfinder.com/data/icons/martial-arts-13/504/boxing-gloves-punch-fight-sport-1024.png" alt="Fresh Towels" style="width: 150px;">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Protective Gear</h5>
                        <p class="card-text flex-grow-1">ชุดอุปกรณ์ป้องกันเช่น หมวกกันกระแทก, ปลอกแขน, และปลอกขา เพื่อความปลอดภัยในระหว่างการฝึกซ้อม</p>
                        
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 4 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn1.iconfinder.com/data/icons/monocromatic-vol-1/128/mirror-512.png" alt="Water" style="width: 150px;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Mirrors for Technique Review</h5>
                        <p class="card-text flex-grow-1">กระจกที่ช่วยให้ผู้ฝึกสามารถตรวจสอบและปรับปรุงท่าทางการต่อสู้ได้อย่างถูกต้อง</p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
