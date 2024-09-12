<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    
</head>
<body>
    <div class="container">
        <div class="login-form">
            <div class="logo">
                <img src="/images/unnamed.jpg" alt="Wellness Wave Logo">
            </div>
            <br>
            <br>
            <form action="#">
                <p>ชื่อผู้ใช้ หรือ อีเมล</p>
                <input type="text" placeholder="ชื่อผู้ใช้ หรือ อีเมล" required>
                <p>รหัสผ่าน</p>
                <input type="password" placeholder="รหัสผ่าน" required>
                <div class="forgotpassword_links">
                    <a href="#">ลืมรหัสผ่าน</a>
                </div>
                <button type="submit" onclick="window.location.href='index.html'">เข้าสู่ระบบ</button>
                <div class="signup_links">
                    มีบัญชีแล้วหรือยัง ?<br>
                    <a href="trainer_apply.html">สมัครสมาชิก</a>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>