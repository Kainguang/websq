<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>คอร์ดออกกำลังกายของฉัน</title>
    <!-- ลิงก์ไปที่ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- ส่วนบนของหน้าเว็บ -->
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4>คอร์ดออกกำลังกายของฉัน</h4>
            </div>
        </div>
        <hr>

        <!-- ส่วนรายการคอร์ด -->
        <div class="row">
            <!-- คอร์ดที่ 1 -->
            <div class="col-md-6">
                <div class="class-item">
                    <h5>โยคะ</h5>
                    <p>วัน: วันจันทร์</p>
                    <p>เวลา: 8:00 น. - 9:00 น.</p>
                    <p>ผู้ฝึก: ครูพี่เปรี้ยว</p>
                    <p class="status text-warning">สถานะ: รอดำเนินการ</p>
                    <button class="btn btn-outline-danger">ยกเลิก</button>
                </div>
            </div>

            <!-- คอร์ดที่ 2 -->
            <div class="col-md-6">
                <div class="class-item">
                    <h5>บาร์เบล</h5>
                    <p>วัน: วันพุธ</p>
                    <p>เวลา: 13:00 น. - 14:00 น.</p>
                    <p>ผู้ฝึก: ครูเตย</p>
                    <p class="status text-success">สถานะ: ลงทะเบียนแล้ว</p>
                    <button class="btn btn-outline-danger">ยกเลิก</button>
                </div>
            </div>

            <!-- คอร์ดที่ 3 -->
            <div class="col-md-6">
                <div class="class-item">
                    <h5>เต้น</h5>
                    <p>วัน: วันศุกร์</p>
                    <p>เวลา: 10:00 น. - 11:30 น.</p>
                    <p>ผู้ฝึก: ครูคิตตี้</p>
                    <p class="status text-success">สถานะ: ลงทะเบียนแล้ว</p>
                    <button class="btn btn-outline-danger">ยกเลิก</button>
                </div>
            </div>

            <!-- คอร์ดที่ 4 -->
            <div class="col-md-6">
                <div class="class-item">
                    <h5>เคตเทิลเบล</h5>
                    <p>วัน: วันอาทิตย์</p>
                    <p>เวลา: 14:00 น. - 15:30 น.</p>
                    <p>ผู้ฝึก: ครูมุก</p>
                    <p class="status text-success">สถานะ: ลงทะเบียนแล้ว</p>
                    <button class="btn btn-outline-danger">ยกเลิก</button>
                </div>
            </div>
    </div>

    <!-- ฟอร์มสำหรับเพิ่มแพ็กเกจ -->
        <div class="add-package-form">
            <h5>เพิ่มแพ็กเกจใหม่</h5>
            <form>
                <div class="mb-3">
                    <label for="className" class="form-label">ชื่อคอร์ด</label>
                    <input type="text" class="form-control" id="className" placeholder="ชื่อคอร์ด">
                </div>
                <div class="mb-3">
                    <label for="classDay" class="form-label">วัน</label>
                    <input type="text" class="form-control" id="classDay" placeholder="วันของคอร์ด">
                </div>
                <div class="mb-3">
                    <label for="classTime" class="form-label">เวลา</label>
                    <input type="text" class="form-control" id="classTime" placeholder="เวลาเริ่ม - เวลาสิ้นสุด">
                </div>
                <div class="mb-3">
                    <label for="classInstructor" class="form-label">ผู้ฝึก</label>
                    <input type="text" class="form-control" id="classInstructor" placeholder="ชื่อผู้ฝึก">
                </div>
                
                <button type="submit" class="btn btn-primary">เพิ่มแพ็กเกจ</button>
            </form>
        </div>
    </div>
       

    <!-- ลิงก์ไปที่ Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>