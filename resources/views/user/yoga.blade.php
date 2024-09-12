<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yoga</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/yoga.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- โลโก้เป็นรูปภาพ -->
            <a class="navbar-brand" href="index.html">
                <img src="/images/logo.jpeg" alt="logo">
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
                        <img src="images/kuromi.jpg" alt="Profile" class="rounded-circle ms-3" style="width: 40px; height: 40px;">
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <section id="yoga" class="sectiondetail section-dark">
        <div class="container">
            <h2 class="sectiondetail-title">Strength in Serenity</h2>
            <div class="row">
                <!-- โยคะ หญิง 1-->
                <!-- คอลัมน์ด้านซ้าย: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/yaga.avif" class="card-img-top" alt="Yoga">
                    </div>
                </div>

                <!-- คอลัมน์ด้านขวา: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Yoga</h5>
                        <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูนุสรา สารธิราช (ปูนา)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>

                <!-- โยคะ หญิง 2 -->
                <!-- คอลัมน์ซ้าย: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Yoga</h5>
                        <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูณิชา สุขสันต์ (ณิชา)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>


                <!-- คอลัมน์ด้านขวา: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/yogagirl2.jpg" class="card-img-top" alt="Yoga">
                    </div>
                </div>

        <div class="container">
            <div class="row">
                <!-- โยคะ ชาย 1-->
                <!-- คอลัมน์ด้านซ้าย: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/yogamen2.jpg" class="card-img-top" alt="Yoga">
                    </div>
                </div>

                <!-- คอลัมน์ด้านขวา: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Yoga</h5>
                        <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูหมูอ้วน ตัวกลม (หมู)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>

                <!-- โยคะ ชาย 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Yoga</h5>
                        <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูภูมิพัฒน์ กิตติวัฒน์ (ภูมิ)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/yoga2.jpg" class="card-img-top" alt="Yoga">
                    </div>
                </div>
    </section>

    <hr>

    <div class="container my-5">
        <h2 class="text-center mb-4">Amenities for Yoga Class</h2>
        <div class="row">
            <!-- สิ่งอำนวยความสะดวก 1 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn0.iconfinder.com/data/icons/fitness-95/24/exercise-mat-512.png" alt="Yoga Icon" style="width: 150px;">
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">High-Quality Yoga Mats</h5>
                        <p class="card-text flex-grow-1">เสื่อโยคะคุณภาพสูง ให้ความสะดวกสบายและความยึดเกาะที่ดีเยี่ยม</p>
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 2 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn2.iconfinder.com/data/icons/yoga-50/24/block-512.png" alt="Supportive Yoga Blocks" style="width: 150px;">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Supportive Yoga Blocks</h5>
                        <p class="card-text flex-grow-1">บล็อกโยคะที่ช่วยในการฝึกท่าที่ยาก และเพิ่มความยืดหยุ่นของร่างกาย</p>
                       
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 3 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn3.iconfinder.com/data/icons/outline-amenities-icon-set/64/Towel-512.png" alt="Fresh Towels" style="width: 150px;">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Fresh Towels</h5>
                        <p class="card-text flex-grow-1">ผ้าขนหนูสะอาด นุ่ม และพร้อมใช้งานทุกครั้งหลังคลาส</p>
                        
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 4 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src=" https://cdn4.iconfinder.com/data/icons/liny/24/glas-water-line-512.png" alt="Water" style="width: 150px;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Complimentary Water Bottles</h5>
                        <p class="card-text flex-grow-1">น้ำดื่มบรรจุขวดฟรี เพื่อให้คุณรู้สึกสดชื่นและมีพลังตลอดการฝึก</p>
                        
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
