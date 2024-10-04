@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ชำระเงิน</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/payment.css">
</head>

<body>
    <!-- Main Content -->
    <div class="container mt-5">
        <div class="card mx-auto">
            <div class="card-header">
                ชำระเงิน
            </div>
            <div class="card-body">
                <form action="{{ route('booking.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="images-block text-center">
                        <img src="../images/IMG_0452.jpg" alt="QR" class="img-fluid">
                    </div>
                    <div class="text-center mt-4">
                        <label for="slip_picture" class="form-label">อัปโหลดสลิปโอนเงิน:</label>
                        <input type="file" class="form-control" id="slip_picture" name="slip_picture" accept="image/*" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="button" class="btn btn-secondary" id="backButton">ย้อนกลับ</button>
                        <button type="submit" class="btn btn-dark" id="confirmButton">ยืนยันการจอง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
       document.addEventListener('DOMContentLoaded', function() {
            // ปุ่มย้อนกลับ
            document.getElementById('backButton').addEventListener('click', function() {
                window.location.href = "{{ url()->previous() }}";
            });

            // เมื่อฟอร์มถูกส่ง
            const form = document.querySelector('form');
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // ป้องกันการส่งฟอร์มปกติ

                // แสดง SweetAlert
                Swal.fire({
                    title: 'ขอบคุณ!',
                    text: 'ยืนยันการจองสำเร็จแล้ว!',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                    confirmButtonColor: '#000',
                    background: '#fff'
                }).then(() => {
                    // ส่งฟอร์มหลังจากผู้ใช้กดยืนยัน
                    form.submit();
                });
            });
        });
    </script>

    <!-- Footer -->
    <footer class="footer text-center mt-5">
        <p class="mb-0">&copy; 2024 WellNessWave. All rights reserved.</p>
    </footer>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection
