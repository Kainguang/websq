<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Center</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
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
    </nav>

    <!-- Main Section -->
    <section id="home" class="main">
        <div class="container">
            <h1>Welcome to WellNessWave</h1>
            <p>Your journey to a healthier you starts here.</p>
        </div>
    </section>

    <!-- Section Details -->
    <div class="container-fluid section-detail">
        <h1 class="text-center mb-4">Our Classes</h1>
        <div class="row">
            <!-- โยคะ -->
            <!-- โยคะ -->
            <div class="col-md-3">
                <a href="yoga.html#yoga" class="class-card">
                    <img src="images/yogamen2.jpg" class="card-img-top" alt="Yoga Class">
                    <div class="card-body">
                        <h3 class="class-title">Yoga Class</h3>
                        <p class="class-description">เปิดประสบการณ์การฝึกโยคะที่ไม่เพียงแค่พัฒนาให้ร่างกายแข็งแรงและยืดหยุ่น แต่ยังเป็นการพัฒนาจิตใจและอารมณ์เพื่อความสมดุลในชีวิตประจำวัน!
                        <br><br> โยคะเป็นมากกว่าการออกกำลังกาย มันคือวิถีชีวิตที่ช่วยให้คุณเชื่อมต่อกับตนเองได้อย่างลึกซึ้ง พร้อมทั้งเสริมสร้างความสงบและความมีสติในทุกๆ ลมหายใจ คลาสโยคะของเราออกแบบมาเพื่อทุกคน ไม่ว่าคุณจะเป็นมือใหม่หรือมืออาชีพ เพราะเรามีครูผู้เชี่ยวชาญที่พร้อมจะแนะนำคุณในทุกท่วงท่าของการฝึกฝน ตั้งแต่ขั้นพื้นฐานไปจนถึงขั้นสูง</p>
                    </div>
                </a>
            </div>


            <!-- เต้น -->
            <!-- เต้น -->
            <div class="col-md-3">
                <a href="dance.html" class="class-card">
                    <img src="images/dance.jpeg" class="card-img-top" alt="Dance Class">
                    <div class="card-body">
                        <h3 class="class-title">Dance Class</h3>
                        <p class="class-description">ยินดีต้อนรับสู่คลาสเต้นของเรา! ปลดปล่อยตัวเองไปกับจังหวะดนตรีที่มีชีวิตชีวาและเรียนรู้การเต้นในหลากหลายสไตล์ ตั้งแต่ฮิปฮอปไปจนถึงแจ๊ส 
                        <br><br> ด้วยการเต้นที่ไม่เพียงช่วยเผาผลาญแคลอรี่ แต่ยังช่วยเพิ่มความมั่นใจในการเคลื่อนไหวและความสามารถในการแสดงออกทางร่างกาย ไม่ว่าคุณจะเป็นมือใหม่ที่อยากลองอะไรใหม่ๆ หรือนักเต้นที่มีประสบการณ์ที่อยากพัฒนาทักษะให้ดียิ่งขึ้น ครูผู้สอนของเราพร้อมที่จะสนับสนุนคุณทุกก้าว! อย่ารอช้า มามีสุขภาพที่ดีไปด้วยกัน!</p>
                    </div>
                </a>
            </div>


            <!-- มวยไทย -->
            <div class="col-md-3">
                <a href="muaythai.html" class="class-card">
                    <img src="images/muaythai2.jpg" class="card-img-top" alt="Muay Thai Class">
                    <div class="card-body">
                        <h3 class="class-title">Muay Thai Class</h3>
                        <p class="class-description">ปลุกความแข็งแกร่งและความมั่นใจในตัวคุณด้วยคลาสมวยไทยที่เราภูมิใจนำเสนอ! เรียนรู้ศาสตร์ศิลปะการป้องกันตัวที่เก่าแก่ของไทย
                        <br><br>ซึ่งไม่เพียงแต่จะช่วยให้คุณมีความแข็งแรงทางกายภาพเท่านั้น แต่ยังเสริมสร้างความอดทน การควบคุมตนเอง และความมั่นใจในทุกย่างก้าว คลาสของเรามีทั้งแบบพื้นฐานสำหรับผู้ที่เริ่มต้น และแบบขั้นสูงสำหรับผู้ที่ต้องการท้าทายตนเองมากยิ่งขึ้น มาร่วมฝึกทักษะการเตะ ต่อย และป้องกันตัวด้วยบรรยากาศที่สนุกสนานและปลอดภัยกับเรา!</p>
                    </div>
                </a>
            </div>


            <!-- ซุมบา -->
            <div class="col-md-3">
                <a href="zumba.html" class="class-card">
                    <img src="images/zumba5.jpg" class="card-img-top" alt="Zumba Class">
                    <div class="card-body">
                        <h3 class="class-title">Zumba Class</h3>
                        <p class="class-description">มาร่วมสัมผัสความสนุกและพลังงานที่เปี่ยมล้นในคลาสซุมบาของเรา! การออกกำลังกายแบบคาร์ดิโอที่ผสมผสานท่าเต้นจากจังหวะละติน
                        <br><br>จะช่วยให้คุณได้เผาผลาญแคลอรี่ สร้างความกระปรี้กระเปร่า และเติมเต็มความสนุกทุกครั้งที่เข้าร่วม ไม่ต้องกังวลเรื่องทักษะการเต้น เพราะซุมบาเน้นที่ความสนุกสนานและการเคลื่อนไหวไปตามจังหวะที่คุณรู้สึกสบายที่สุด มาสร้างพลังและรอยยิ้มให้กับตัวเองไปพร้อมกับเรา! จองวันนี้เพื่อค้นพบชีวิตที่มีพลังและมีสุขภาพที่ดีไปด้วยกัน!</p>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- Section Details Popular -->
    <div class="container-fluid section-detail">
        <h1 class="text-center mb-4">Our Popular Classes</h1>
        <div class="row">
            <!-- โยคะ (Popular) -->
            <div class="col-md-6">
                <a href="yoga.html" class="class-card popular">
                    <img src="images/yogamen2.jpg" class="card-img-top" alt="Yoga Class">
                    <div class="card-body">
                        <h3 class="class-title">Yoga Class</h3>
                        <p class="class-description">คลาสโยคะของเราได้รับความนิยมสูงเพราะช่วยให้ร่างกายและจิตใจของผู้เข้าร่วมมีความสมดุล การฝึกโยคะไม่เพียงแต่ช่วยเพิ่มความยืดหยุ่น แต่ยังส่งเสริมการทำสมาธิและลดความเครียด คลาสนี้เป็นที่นิยมเพราะเหมาะกับทุกเพศทุกวัย และผู้เข้าร่วมจะได้รับประโยชน์จากการฝึกที่มีครูผู้เชี่ยวชาญคอยแนะนำ</p>
                    </div>
                </a>
            </div>


            <!-- เต้น (Popular) -->
            <div class="col-md-6">
                <a href="dance.html" class="class-card popular">
                    <img src="images/dance.jpeg" class="card-img-top" alt="Dance Class">
                    <div class="card-body">
                        <h3 class="class-title">Dance Class</h3>
                        <p class="class-description">คลาสเต้นของเราเป็นที่นิยมเนื่องจากเป็นวิธีที่สนุกสนานในการออกกำลังกายและสร้างความมั่นใจ การเต้นในคลาสนี้ช่วยเพิ่มความคล่องแคล่วและพลังงานให้กับผู้เข้าร่วม ด้วยเพลงที่หลากหลายและครูผู้สอนที่มีประสบการณ์ คลาสนี้จึงเหมาะสำหรับทุกคนที่ต้องการเรียนรู้ทักษะการเต้นและมีความสนุกสนานไปพร้อมกัน</p>
                    </div>
                </a>
            </div>

        </div>
    </div>
    <!-- Footer -->
    <footer class="mt-4">
        <div class="container-fluid">
            <p>&copy; 2024 WellNessWave. All Rights Reserved.</p>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
