<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/class_time.css">
</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <!-- โลโก้เป็นรูปภาพ -->
            <a class="navbar-brand" href="{{route('index')}}">
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
                            <li><a class="dropdown-item" href="class_time.html#moring">ช่วงเช้า</a></li>
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

    <section id="morning" class="sectiondetail section-dark">
        <div class="container">
            <h2 class="sectiondetail-title">Morning Power Sessions</h2>
            <div class="row">
                <!-- โยคะ หญิง 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/yaga.avif" class="card-img-top" alt="Yoga">
                        <div class="card-body">
                            <h5 class="card-title">Yoga</h5>
                            <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูนุสรา สารธิราช</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <!-- เต้น 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/dance.jpeg" class="card-img-top" alt="Dance">
                        <div class="card-body">
                            <h5 class="card-title">Dance</h5>
                            <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูเกศกนก ประสมทรัพย์</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <!-- มวยไทย 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/muaythai2.jpg" class="card-img-top" alt="Muay Thai">
                        <div class="card-body">
                            <h5 class="card-title">Muay Thai</h5>
                            <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทย สนุกแถมยังแข็งแรง</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูสุกิจตรา โคแสงรักษา</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <!-- ซุมบา 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/zumba6.jpg" class="card-img-top" alt="Zumba">
                        <div class="card-body">
                            <h5 class="card-title">Zumba</h5>
                            <p class="card-text">เข้าร่วมคลาสซุมบาที่จัดขึ้นในบรรยากาศสนุกสนาน ผ่านท่าเต้นที่หลากหลาย</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูสรัลชนา ชื่นชมกิจ</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-10:30 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <!-- โยคะ ชาย 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/yogamen2.jpg" class="card-img-top" alt="Yoga">
                        <div class="card-body">
                            <h5 class="card-title">Yoga</h5>
                            <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูหมูอ้วน ตัวกลม</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <!-- เต้น 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/dancemen2.jpg" class="card-img-top" alt="Dance">
                        
                        <div class="card-body">
                            <h5 class="card-title">Dance</h5>
                            <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูต้นน้ำ ใจดี</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <!-- มวยไทย 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/muaythaimen3.jpg" class="card-img-top" alt="Muay Thai">
                        <div class="card-body">
                            <h5 class="card-title">Muay Thai</h5>
                            <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทยจากผู้สอนที่มีประสบการณ์</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูฉัตรชัย มีความสุข</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <!-- ซุมบา 1 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/zumbamen.jpg" class="card-img-top" alt="Zumba">
                        <div class="card-body">
                            <h5 class="card-title">Zumba</h5>
                            <p class="card-text">คลาสซุมบ้าสุดฟิน ออกกำลังกายแบบสนุกสนาน พร้อมกับเสียงเพลงที่กระตุ้นพลัง</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูณเดชน์ เรียนเก่ง</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 09:00-12:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section id="afternoon" class="sectiondetail section-dark">
        <h2 class="sectiondetail-title">Afternoon Boosters</h2>
        <div class="container">
            <div class="row">
                <!-- โยคะ หญิง 2 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/yogagirl2.jpg" class="card-img-top" alt="Yoga">
                        <div class="card-body">
                            <h5 class="card-title">Yoga</h5>
                            <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูณิชา สุขสันต์</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>
        
                <!-- เต้น 2 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/dancegirl2.jpg" class="card-img-top" alt="Dance">
                        <div class="card-body">
                            <h5 class="card-title">Dance</h5>
                            <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูพรรณวดี นิลทอง</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>
        
                <!-- มวยไทย 2 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/muaythaigirl2.jpg" class="card-img-top" alt="Muay Thai">
                        <div class="card-body">
                            <h5 class="card-title">Muay Thai</h5>
                            <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทย มาแข็งแรงไปด้วยกัน</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูศิริวรรณ ชลธาร</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>
        
                <!-- ซุมบา 2 -->
                <div class="col-md-3">
                    <div class="card">
                        <img src="images/zumbagirl2.jpg" class="card-img-top" alt="Zumba">
                        <div class="card-body">
                            <h5 class="card-title">Zumba</h5>
                            <p class="card-text">เข้าร่วมคลาสซุมบาที่จัดขึ้นในบรรยากาศสนุกสนาน ผ่านท่าเต้นที่หลากหลาย</p>
                            <hr>
                            <ul class="list-unstyled">
                                <li><strong>ชื่อครูผู้สอน:</strong> ครูกฤติกา กุลธรรมนิติ</li>
                                <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                                <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                <li><strong>ระยะเวลาคอร์ส:</strong> 5 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                                <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                                <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                            </ul>
                            <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <!-- โยคะ ชาย 2 -->
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="images/yoga2.jpg" class="card-img-top" alt="Yoga">
                                <div class="card-body">
                                    <h5 class="card-title">Yoga</h5>
                                    <p class="card-text">ฝึกสมาธิ และเสริมสร้างความยืดหยุ่นให้กับร่างกายผ่านการฝึกโยคะ</p>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li><strong>ชื่อครูผู้สอน:</strong> ครูภูมิพัฒน์ กิตติวัฒน์</li>
                                        <li><strong>ราคาต่อคอร์ส:</strong> 1,500 บาท</li>
                                        <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                        <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                        <li><strong>ระยะเวลาคอร์ส:</strong> 8 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                        <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 12 คน</li>
                                        <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                                    </ul>
                                    <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                                </div>
                            </div>
                        </div>
                
                        <!-- เต้น 2 -->
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="images/dancemen3.jpg" class="card-img-top" alt="Dance">
                                <div class="card-body">
                                    <h5 class="card-title">Dance</h5>
                                    <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li><strong>ชื่อครูผู้สอน:</strong> ครูธนพล สมบัติ</li>
                                        <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                                        <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                        <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                        <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                                        <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                                        <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                                    </ul>
                                    <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                                </div>
                            </div>
                        </div>
                
                        <!-- มวยไทย 2 -->
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="images/muaythaimen2.jpg" class="card-img-top" alt="Muay Thai">
                                <div class="card-body">
                                    <h5 class="card-title">Muay Thai</h5>
                                    <p class="card-text">เรียนรู้ทักษะการป้องกันตัวและการออกกำลังกายด้วยมวยไทยจากผู้สอนที่มีประสบการณ์</p>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li><strong>ชื่อครูผู้สอน:</strong> ครูศราวุธ เชาวน์กร</li>
                                        <li><strong>ราคาต่อคอร์ส:</strong> 2,500 บาท</li>
                                        <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                        <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                        <li><strong>ระยะเวลาคอร์ส:</strong> 10 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                                        <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 10 คน</li>
                                        <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                                    </ul>
                                    <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                                </div>
                            </div>
                        </div>
                
                        <!-- ซุมบา 2 -->
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <img src="images/zumbamen3.jpg" class="card-img-top" alt="Zumba">
                                <div class="card-body">
                                    <h5 class="card-title">Zumba</h5>
                                    <p class="card-text">คลาสซุมบานี้เหมาะสำหรับทุกคน ไม่ว่าคุณจะมีประสบการณ์ในการเต้นหรือไม่มี</p>
                                    <hr>
                                    <ul class="list-unstyled">
                                        <li><strong>ชื่อครูผู้สอน:</strong> ครูอรรถพล จันทรา</li>
                                        <li><strong>ราคาต่อคอร์ส:</strong> 1,800 บาท</li>
                                        <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                                        <li><strong>เวลาเริ่ม-สิ้นสุด:</strong> 13:00-15:00 น.</li>
                                        <li><strong>ระยะเวลาคอร์ส:</strong> 5 สัปดาห์ (ฝึกสัปดาห์ละ 3 ครั้ง)</li>
                                        <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 20 คน</li>
                                        <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                                    </ul>
                                    <button class="btn btn-primary mt-auto" onclick="window.location.href='Orderlist.html'">จองคลาส</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
