<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zumba</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/zumba.css">
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
            <h2 class="sectiondetail-title">Rhythm and Radiance</h2>
            <div class="row">
                <!-- ซุมบา 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/zumba6.jpg" class="card-img-top" alt="zumba">
                    </div>
                </div>


                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Zumba</h5>
                        <p class="card-text">เข้าร่วมคลาสซุมบาที่จัดขึ้นในบรรยากาศสนุกสนาน ผ่านท่าเต้นที่หลากหลาย</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูสรัลชนา ชื่นชมกิจ (ซาร่า)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 5 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>

                <!-- ซุมบา 2 -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Zumba</h5>
                        <p class="card-text">เข้าร่วมคลาสซุมบาที่จัดขึ้นในบรรยากาศสนุกสนาน ผ่านท่าเต้นที่หลากหลาย</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูกฤติกา กุลธรรมนิติ (ติ๊ก)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 5 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/zumbagirl2.jpg" class="card-img-top" alt="zumba">
                    </div>
                </div>

        <div class="container">
            <div class="row">
                <!-- ซุมบา 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/zumbamen.jpg" class="card-img-top" alt="zumba">
                    </div>
                </div>
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Zumba</h5>
                        <p class="card-text">คลาสซุมบานี้เหมาะสำหรับทุกคน ไม่ว่าคุณจะมีประสบการณ์ในการเต้นมาก่อนหรือไม่ คุณจะได้สัมผัสกับบรรยากาศที่เป็นกันเองและการฝึกที่ไม่เครียด</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูณเดชน์ เรียนเก่ง (เดช)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 5 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>

                <!-- ซุมบา 2 -->
                <!-- คอลัมน์ด้านซ้าย: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Zumba</h5>
                        <p class="card-text">คลาสซุมบานี้เหมาะสำหรับทุกคน ไม่ว่าคุณจะมีประสบการณ์ในการเต้นหรือไม่มี</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูอรรถพล จันทรา (อรรถ)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 5 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                    </div>
                </div>
                <!-- คอลัมน์ด้านขวา: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/zumbamen3.jpg" class="card-img-top" alt="zumba">
                    </div>
                </div>
    </section>

    <hr>

    <div class="container my-5">
        <h2 class="text-center mb-4">Amenities for Zumba Class</h2>
        <div class="row">
            <!-- สิ่งอำนวยความสะดวก 1 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn1.iconfinder.com/data/icons/monocromatic-vol-1/128/mirror-512.png" alt="Mirrored Dance Studio" style="width: 150px;">
                    </div>
                    
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Mirrored Dance Studio</h5>
                        <p class="card-text flex-grow-1">ผนังกระจกที่ช่วยให้คุณสามารถติดตามและปรับปรุงท่าทางการเต้นของตัวเองได้อย่างสะดวกสบาย</p>
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 2 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn2.iconfinder.com/data/icons/squircle-ui/32/Sound-512.png" alt="High-Quality Sound System" style="width: 150px;">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">High-Quality Sound System</h5>
                        <p class="card-text flex-grow-1">ระบบเสียงที่มีคุณภาพดีเยี่ยม เพื่อให้คุณได้ยินจังหวะเพลงและเสียงเพลงที่ชัดเจน</p>
                       
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 3 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn0.iconfinder.com/data/icons/actions-alphabet-c-set-5-of-25/288/actions-C-5-10-512.png" alt="Comfortable and Spacious Changing Rooms" style="width: 150px;">
                    </div>

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Comfortable and Spacious Changing Rooms</h5>
                        <p class="card-text flex-grow-1">ห้องเปลี่ยนเสื้อผ้าที่มีพื้นที่กว้างขวางและตกแต่งอย่างสะดวกสบาย</p>
                        
                    </div>
                </div>
            </div>
            <!-- สิ่งอำนวยความสะดวก 4 -->
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <div style="text-align: center; padding: 40px;">
                        <img src="https://cdn3.iconfinder.com/data/icons/font-awesome-solid/512/fan-512.png" alt="Cooling Fans and Climate Control" style="width: 150px;">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title-amenities">Cooling Fans and Climate Control</h5>
                        <p class="card-text flex-grow-1">พัดลมที่มีประสิทธิภาพสูงช่วยให้การระบายความร้อนในห้องเรียนเป็นไปอย่างรวดเร็ว</p>
                        
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
