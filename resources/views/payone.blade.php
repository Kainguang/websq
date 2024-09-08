<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ตระกร้าสินค้า</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<!-- ไอคอนตะกร้า -->
<div class="cart-icon">
    <i class="fas fa-shopping-cart"></i>
</div>

<div class="container">
    <h4>คลาสที่จอง (1)</h4>
    <div class="row">
        <!-- col-8: แบ่งเป็นรูปภาพและข้อมูลอยู่ข้างกัน และอยู่ในกรอบเดียวกัน -->
        <div class="col-8">
            <div class="custom-border">
                <div class="row">
                    <!-- ส่วนรูปภาพ (col-4) -->
                    <div class="col-3">
                        <img src="https://files.vogue.co.th/uploads/yoga-Tree_Pose.jpg" class="img-thumbnail" alt="yoka" width="250" height="100">
                    </div>
                    <!-- ส่วนข้อมูล (col-8) -->
                    <div class="col-6">
                        <h5>คลาสโยคะ</h5>
                        <p>ผู้สอน: คุณสมศรี  </p>
                        <p>เวลา: 10:00 AM - 11:30 AM</p>
                        <p>สถานที่: ห้องโยคะ 4 ชั้น 2</p>
                    </div>
                    <div class="col-3">
                        <p class="custom-font-color" style="color: rgb(159, 7, 7);">฿150,000</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- col-4: การจอง -->
        <div class="col-4">
            <div class="card" style="width: 18rem;">
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>ยอดรวม:</span>
                        <strong>฿150,000</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>ส่วนลด:</span>
                        <strong>- ฿0</strong>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>ยอดรวมสุทธิ:</span>
                        <strong>฿150,000</strong>
                    </li>
                </ul>
                <button class="btn btn-danger btn-block">ดำเนินการจอง</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>