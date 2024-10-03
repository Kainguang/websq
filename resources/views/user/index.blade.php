@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>หน้าหลัก</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!-- Main Section -->
    <section id="home" class="main">
        <div class="container">
        <h1>ยินดีต้อนรับสู่ WellnessWave!</h1>
        <h5>สุขภาพที่ดีของคุณเริ่มต้นได้ที่นี่ ที่ WellnessWave เรามุ่งมั่นที่จะช่วยคุณพัฒนาคุณภาพชีวิตผ่านการออกกำลังกายและดูแลสุขภาพอย่างเต็มที่</h5>
        </div>
    </section>

    <!-- Section Details -->
    <div class="container-fluid section-detail">
        <h1 class="text-center mb-4">คลาสของเรา</h1>
        <div class="row">
            @foreach ($filteredCourses as $course)
                <div class="col-md-3">
                    <a href="{{route($course->course_name_en)}}" class="class-card">
                        <img src="{{ asset('storage/' . $course->picture_path) }}" class="card-img-top-our" alt="คลาส{{ $course->course_name}}">
                        <div class="card-body">
                            @php
                                switch ($course->course_name_en) {
                                    case 'yoga':
                                        $descript_1 = 'เปิดประสบการณ์การฝึกโยคะที่ไม่เพียงแค่พัฒนาให้แข็งแรงและยืดหยุ่น แต่ยังเป็นการพัฒนาจิตใจและอารมณ์เพื่อความสมดุลในชีวิตประจำวัน!';
                                        $descript_2 = 'โยคะเป็นมากกว่าการออกกำลังกาย มันคือวิถีชีวิตที่ช่วยให้คุณเชื่อมต่อกับตนเองได้อย่างลึกซึ้ง พร้อมทั้งเสริมสร้างความสงบและความมีสติในทุกๆ ลมหายใจ คลาสโยคะของเราออกแบบมาเพื่อทุกคน ไม่ว่าคุณจะเป็นมือใหม่หรือมืออาชีพ เพราะเรามีครูผู้เชี่ยวชาญที่พร้อมจะแนะนำคุณในทุกท่วงท่าของการฝึกฝน ตั้งแต่ขั้นพื้นฐานไปจนถึงขั้นสูง';
                                        break;
                                    case 'dance':
                                        $descript_1 = 'ยินดีต้อนรับสู่คลาสเต้นของเรา! ปลดปล่อยตัวเองไปกับจังหวะดนตรีที่มีชีวิตชีวาและเรียนรู้การเต้นในหลากหลายสไตล์ ตั้งแต่ฮิปฮอปไปจนถึงแจ๊ส ';
                                        $descript_2 = 'ด้วยการเต้นที่ไม่เพียงช่วยเผาผลาญแคลอรี่ แต่ยังช่วยเพิ่มความมั่นใจในการเคลื่อนไหวและความสามารถในการแสดงออกทางร่างกาย ไม่ว่าคุณจะเป็นมือใหม่ที่อยากลองอะไรใหม่ๆ หรือนักเต้นที่มีประสบการณ์ที่อยากพัฒนาทักษะให้ดียิ่งขึ้น ครูผู้สอนของเราพร้อมที่จะสนับสนุนคุณทุกก้าว! อย่ารอช้า มามีสุขภาพที่ดีไปด้วยกัน!';
                                        break;
                                    case 'muaythai':
                                        $descript_1 = 'ปลุกความแข็งแกร่งและความมั่นใจในตัวคุณด้วยคลาสมวยไทยที่เราภูมิใจนำเสนอ! เรียนรู้ศาสตร์ศิลปะการป้องกันตัวที่เก่าแก่ของไทย';
                                        $descript_2 = 'ซึ่งไม่เพียงแต่จะช่วยให้คุณมีความแข็งแรงทางกายภาพเท่านั้น แต่ยังเสริมสร้างความอดทน การควบคุมตนเอง และความมั่นใจในทุกย่างก้าว คลาสของเรามีทั้งแบบพื้นฐานสำหรับผู้ที่เริ่มต้น และแบบขั้นสูงสำหรับผู้ที่ต้องการท้าทายตนเองมากยิ่งขึ้น มาร่วมฝึกทักษะการเตะ ต่อย และป้องกันตัวด้วยบรรยากาศที่สนุกสนานและปลอดภัยกับเรา!';
                                        break;
                                    case 'zumba':
                                        $descript_1 = 'มาร่วมสัมผัสความสนุกและพลังงานที่เปี่ยมล้นในคลาสซุมบาของเรา! การออกกำลังกายแบบคาร์ดิโอที่ผสมผสานท่าเต้นจากจังหวะละติน';
                                        $descript_2 = 'จะช่วยให้คุณได้เผาผลาญแคลอรี่ สร้างความกระปรี้กระเปร่า และเติมเต็มความสนุกทุกครั้งที่เข้าร่วม ไม่ต้องกังวลเรื่องทักษะการเต้น เพราะซุมบาเน้นที่ความสนุกสนานและการเคลื่อนไหวไปตามจังหวะที่คุณรู้สึกสบายที่สุด มาสร้างพลังและรอยยิ้มให้กับตัวเองไปพร้อมกับเรา! จองวันนี้เพื่อค้นพบชีวิตที่มีพลังและมีสุขภาพที่ดีไปด้วยกัน!';
                                        break;}
                            @endphp
                            <h3 class="class-title">คลาส{{ $course->course_name }}</h3>
                            <p class="class-description">{{$descript_1}}
                            <br><br>{{$descript_2}}</p>
                        </div>            
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Section Details Popular -->
    <div class="container-fluid section-detail">
        <h1 class="text-center mb-4">คลาสยอดนิยม</h1>
        <div class="row">
            @foreach ($popularCourses as $course)
                <div class="popular-card col-md-6">
                    <img src="{{ asset('storage/' . $course->picture_path) }}" class="card-img-top-popular" alt="{{ $course->course_name }} Class">
                    <div class="card-body">
                        <h3 class="class-title">{{ $course->course_name }}</h3>
                        <p class="class-description">'{{ $course->course_name }}' ของเราได้รับความนิยมสูงสุดในขณะนี้ ด้วยจำนวนผู้เข้าร่วมที่เพิ่มขึ้นอย่างต่อเนื่อง ไม่เพียงแต่เนื้อหาที่เข้มข้นและคุณภาพการสอนที่ยอดเยี่ยม คอร์สนี้ยังตอบโจทย์ทั้งเรื่องการพัฒนาทักษะและการเสริมสร้างความแข็งแรงให้กับผู้เข้าร่วมทุกคน ด้วยครูผู้สอนที่มีประสบการณ์และการออกแบบการเรียนการสอนที่หลากหลาย ทำให้ผู้เข้าร่วมสามารถฝึกฝนและพัฒนาตนเองได้อย่างเต็มที่</p>
                        <p class="class-amount"><b>จำนวนผู้เข้าร่วมทั้งหมด:</b> {{ $course->total_participants }} คน</p>
                    </div>
                </div>
            @endforeach
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
@endsection