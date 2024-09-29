@extends('layouts.nav')
@section('content')
<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/Increasethenumber.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <form action="{{ route('storeParticipants') }}" method="POST">
                @csrf

                @for ($i = 1; $i <= $amount; $i++)
                    <h4>ผู้จองคนที่ {{ $i }}</h4>
                    <div class="mb-3">
                        <label for="firstName{{ $i }}" class="form-label">ชื่อ:</label>
                        <input type="text" name="participants[{{ $i }}][first_name]" id="firstName{{ $i }}" class="form-control" placeholder="กรุณาใส่ชื่อ" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName{{ $i }}" class="form-label">นามสกุล:</label>
                        <input type="text" name="participants[{{ $i }}][last_name]" id="lastName{{ $i }}" class="form-control" placeholder="กรุณาใส่นามสกุล" required>
                    </div>
                    <div class="mb-3">
                        <label for="email{{ $i }}" class="form-label">อีเมล:</label>
                        <input type="email" name="participants[{{ $i }}][email]" id="email{{ $i }}" class="form-control" placeholder="กรุณาใส่อีเมล" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone{{ $i }}" class="form-label">เบอร์โทรศัพท์:</label>
                        <input type="text" name="participants[{{ $i }}][phone]" id="phone{{ $i }}" class="form-control" placeholder="กรุณาใส่เบอร์โทรศัพท์" required>
                    </div>
                    <div class="mb-3">
                        <label for="weight{{ $i }}" class="form-label">นํ้าหนัก (กิโลกรัม):</label>
                        <input type="number" name="participants[{{ $i }}][weight]" id="weight{{ $i }}" class="form-control" placeholder="กรุณาใส่นํ้าหนัก" required>
                    </div>
                    <div class="mb-3">
                        <label for="height{{ $i }}" class="form-label">ส่วนสูง (เซนติเมตร):</label>
                        <input type="number" name="participants[{{ $i }}][height]" id="height{{ $i }}" class="form-control" placeholder="กรุณาใส่ส่วนสูง" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender{{ $i }}" class="form-label">เพศ:</label>
                        <select name="participants[{{ $i }}][gender]" id="gender{{ $i }}" class="form-control" required>
                            <option selected>กรุณาเลือกเพศ</option>
                            <option value="หญิง">หญิง</option>
                            <option value="ชาย">ชาย</option>
                        </select>
                    </div>
                    <hr>
                @endfor

                <button type="submit" class="btn btn-primary">ถัดไป</button>
            </form>
            <button type="button" class="btn btn-danger" id="backButton">ย้อนกลับ</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="mt-4">
        <div class="container-fluid">
            <p>&copy; 2024 WellNessWave. All Rights Reserved.</p>
        </div>
    </footer>

    <script>
    // ปุ่มยกเลิก
    document.getElementById('backButton').addEventListener('click', function() {
        Swal.fire({
            title: 'คุณต้องการย้อนกลับหรือไม่?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'ยืนยัน',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '{{ url()->previous() }}';
            }
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
@endsection