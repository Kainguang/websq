<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WellnessWave - โปรไฟล์</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin_profile.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <nav class="col-md-2 sidebar">
                <div class="profile-section">
                    <img src="https://i.pinimg.com/564x/a7/00/79/a7007909daf4cbe86433b4072ffdc6d0.jpg" alt="Admin profile picture" class="profile-picture">
                    <a class="nav-link active" href="/admin/profile" class="profile-link">
                        <h3 class="profile-name">Adminja</h3>
                    </a>
                </div>
                <ul class="nav flex-column text-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/admin/dashboard">สรุปภาพรวม</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/course">คอร์ส</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/bill">บิล</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/trainer">เทรนเนอร์</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/user/index" style="color: red;">ออกจากระบบ</a>
                    </li>
            </ul>
        </nav>

            <!-- Main Content -->
            <main class="col-md-10 ms-sm-auto px-md-4 py-4">
            <div class="container mt-5">
    <div class="card" style="width: 30rem; margin: auto;">
        <div class="card-body">
            <div class="text-center">
                <img src="https://i.pinimg.com/564x/a7/00/79/a7007909daf4cbe86433b4072ffdc6d0.jpg" alt="Adminja profile picture" class="profile-picture">
            </div>
            <h5 class="card-title text-center mt-3">ข้อมูลโปรไฟล์</h5>
            <p class="card-text"><strong>ชื่อ:</strong> Adminja</p>
            <p class="card-text"><strong>อีเมล:</strong> admin@example.com</p>
            <p class="card-text"><strong>เบอร์โทร:</strong> 089-123-4567</p>
            <div class="text-center">
            <button class="btn btn-primary" id="editProfileButton" data-bs-toggle="modal" data-bs-target="#editProfileModal">
                             แก้ไขโปรไฟล์
            </button>
            </div>
        </div>
    </div>
</div>
                <!-- Edit Profile Form -->
                <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProfileModalLabel">แก้ไขโปรไฟล์</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="editProfileForm">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">ชื่อ</label>
                                        <input type="text" class="form-control" id="name" value="Adminja">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">อีเมล</label>
                                        <input type="email" class="form-control" id="email" value="admin@example.com">
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">เบอร์โทร</label>
                                        <input type="text" class="form-control" id="phone" value="089-123-4567">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                                <button type="button" class="btn btn-primary" id="saveProfileChanges">บันทึกการเปลี่ยนแปลง</button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // เปิด Modal เพื่อแก้ไขโปรไฟล์
        document.getElementById('editProfileButton').addEventListener('click', function () {
            var editProfileModal = new bootstrap.Modal(document.getElementById('editProfileModal'), {
                keyboard: false
            });
            editProfileModal.show();
        });

        // บันทึกการแก้ไขโปรไฟล์
        document.getElementById('saveProfileChanges').addEventListener('click', function () {
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;

            if (!name || !email || !phone) {
                Swal.fire({
                    icon: 'error',
                    title: 'ข้อมูลไม่ครบถ้วน',
                    text: 'กรุณากรอกข้อมูลทั้งหมด'
                });
            } else {
                Swal.fire({
                    icon: 'success',
                    title: 'บันทึกเรียบร้อย',
                    text: 'ข้อมูลโปรไฟล์ของคุณถูกบันทึกเรียบร้อยแล้ว'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ทำการบันทึกข้อมูลใหม่ไปยังเซิร์ฟเวอร์ที่นี่ (ใช้ AJAX หรือการรีเฟรชหน้าเพจ)
                        location.reload();
                    }
                });
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
