<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/class_gender.css">
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

    <section id="instructors-female" class="sectiondetail section-dark">
        <div class="container">
            <h2 class="sectiondetail-title">Classes Taught by Female Instructors</h2>
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>


                <!-- คอลัมน์ด้านขวา: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/yogagirl2.jpg" class="card-img-top" alt="Yoga">
                    </div>
                </div>

                <!------------------------------------------------------------------------------------------------------------------------->

                <!-- เต้น 1 -->
                <!-- คอลัมน์ด้านซ้าย: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/dance.jpeg" class="card-img-top" alt="Dance">
                    </div>
                </div>

                <!-- คอลัมน์ด้านขวา: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Dance</h5>
                        <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูเกศกนก ประสมทรัพย์ (อั้ม)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>

                <!-- เต้น 2 -->
                <!-- คอลัมน์ด้านซ้าย: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Dance</h5>
                        <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูพรรณวดี นิลทอง (พรรณ)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>
                <!-- คอลัมน์ด้านขวา: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/dancegirl2.jpg" class="card-img-top" alt="Dance">
                    </div>
                </div>
                <!------------------------------------------------------------------------------------------------------------------------->

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

                <!------------------------------------------------------------------------------------------------------------------------->
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/zumbagirl2.jpg" class="card-img-top" alt="zumba">
                    </div>
                </div>
    </section>

    <hr>

    <section id="instructors-male" class="sectiondetail section-dark">
        <div class="container">
            <h2 class="sectiondetail-title">Classes Taught by Male Instructors</h2>
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/yoga2.jpg" class="card-img-top" alt="Yoga">
                    </div>
                </div>

                <!------------------------------------------------------------------------------------------------------------------------->

                <!-- เต้น 1 -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/dancemen2.jpg" class="card-img-top" alt="Dance">
                    </div>
                </div>

                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Dance</h5>
                        <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูต้นน้ำ ใจดี (ต้นน้ำ)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  09:00-12:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>

                <!-- เต้น 2 -->
                <!-- คอลัมน์ด้านซ้าย: รายละเอียด -->
                <div class="col-md-6 mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Dance</h5>
                        <p class="card-text">เพลิดเพลินกับการเต้นในหลากหลายสไตล์ ในบรรยากาศที่สนุกสนาน</p>
                        <hr>
                        <ul class="list-unstyled">
                            <li><strong>ชื่อครูผู้สอน:</strong> ครูธนพล สมบัติ (ธน)</li>
                            <li><strong>ราคาต่อคอร์ส:</strong> 2,000 บาท</li>
                            <li><strong>วันที่เรียน:</strong> จันทร์ , อังคาร</li>
                            <li><strong>เวลาเริ่ม-สิ้นสุด:</strong>  13:00-15:00 น.</li>
                            <li><strong>ระยะเวลาคอร์ส:</strong> 6 สัปดาห์ (ฝึกสัปดาห์ละ 2 ครั้ง)</li>
                            <li><strong>จำนวนคนต่อคอร์ส:</strong> สูงสุด 15 คน</li>
                            <li><strong style="color: green;">จองไปแล้ว: </strong>10 คน</li>
                        </ul>
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>
                <!-- คอลัมน์ด้านขวา: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/dancemen3.jpg" class="card-img-top" alt="Dance">
                    </div>
                </div>

                <!------------------------------------------------------------------------------------------------------------------------->

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


                <!------------------------------------------------------------------------------------------------------------------------->
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
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
                        <button class="btn btn-primary" onclick="window.location.href='{{ route('Orderlist') }}'">จองคลาส</button>
                    </div>
                </div>
                <!-- คอลัมน์ด้านขวา: รูปภาพ -->
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <img src="images/zumbamen3.jpg" class="card-img-top" alt="zumba">
                    </div>
                </div>
                <hr>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Fitness Center. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
