<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจองคลาสออกกำลังกาย</title>
    <!-- ลิงก์ไปที่ Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- ส่วนบนของหน้าเว็บ -->
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h4>คลาสที่คุณเลือกจอง</h4>
            </div>
        </div>
        <hr>

        <!-- ส่วนรายการคลาส -->
        <div class="row">
            <!-- คอลัมน์ซ้าย แสดงคลาสที่จอง -->
            <div class="col-md-8">
                <div class="d-flex mb-4 align-items-start">
                    <img src="https://st-th-1.byteark.com/assets.punpro.com/contents/i43983/1663665633222-yoga-1.jpg" class="class-item-img" alt="โยคะ">
                    <div class="ms-3">
                        <h5>โยคะ</h5>
                        <p>วัน: วันเสาร์<br>เวลา: 7:00 น. - 8:00 น.<br>จำนวนผู้เข้าร่วม: 10 คน</p>
                    </div>
                    <div class="ms-auto text-end">
                        <h5>฿500.00</h5>
                        <button class="btn btn-outline-danger"><i class="bi bi-trash"></i> ยกเลิก</button>
                    </div>
                </div>
            </div>

            <!-- คอลัมน์ขวา สรุปการจอง -->
            <div class="col-md-4">
                <div class="booking-summary">
                    <h5>สรุปการจอง</h5>
                    <p>ยอดรวมย่อย: <span class="float-end">฿500.00 บาท</span></p>
                    <p>ค่าธรรมเนียมการบริการ: <span class="float-end">ฟรี</span></p>
                    <hr>
                    <h5>ยอดรวม: <span class="float-end">฿500.00</span></h5>
                    <button class="btn btn-dark w-100 mt-3">ยืนยันการจอง</button>
                    <button class="btn btn-outline-secondary w-100 mt-3">PayPal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ลิงก์ไปที่ Bootstrap JS และไอคอน -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.js"></script>
</body>
</html>
