<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= " width=device-width, initial-scale=1.0">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/detail.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTOJ2qKjlxtKk4uRbgPjh2djGBVVmYvPfh2MTkjcZgYCc4Y3nxh"
                                class="d-block w-100" alt="Picture 1" width="500" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.maggi.co.th/sites/default/files/srh_recipes/22083cfb8eb29281fa1992e9aa589423.jpeg"
                                class="d-block w-100" alt="Picture 2" width="500" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="https://krop.in.th/wp-content/uploads/2022/01/9997979.jpg" class="d-block w-100"
                                alt="Picture 3" width="500" height="500">
                        </div>
                        <div class="carousel-item">
                            <img src="https://thecitizen.plus/wp-content/uploads/2021/08/%E0%B8%AB%E0%B8%A1%E0%B8%B8%E0%B8%94%E0%B8%AD%E0%B8%A2-11-1024x643.jpg"
                                class="d-block w-100" alt="Picture 3" width="500" height="500">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                        data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <div class="row">
                    <div class="col-3">
                        <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTOJ2qKjlxtKk4uRbgPjh2djGBVVmYvPfh2MTkjcZgYCc4Y3nxh"
                            class="img-thumbnail thumbnail active-thumbnail" alt="Thumbnail 1" onclick="changeSlide(0)">
                    </div>
                    <div class="col-3">
                        <img src="https://www.maggi.co.th/sites/default/files/srh_recipes/22083cfb8eb29281fa1992e9aa589423.jpeg"
                            class="img-thumbnail thumbnail" alt="Thumbnail 2" onclick="changeSlide(1)">
                    </div>
                    <div class="col-3">
                        <img src="https://krop.in.th/wp-content/uploads/2022/01/9997979.jpg" class="img-thumbnail thumbnail"
                            alt="Thumbnail 3" onclick="changeSlide(2)">
                    </div>
                    <div class="col-3">
                        <img src="https://thecitizen.plus/wp-content/uploads/2021/08/%E0%B8%AB%E0%B8%A1%E0%B8%B8%E0%B8%94%E0%B8%AD%E0%B8%A2-11-1024x643.jpg"
                            class="img-thumbnail thumbnail" alt="Thumbnail 4" onclick="changeSlide(3)">
                    </div>
                    <script>
                        // ฟังก์ชันสำหรับสลับ active-thumbnail
                        function setActiveThumbnail(index) {
                        var thumbnails = document.querySelectorAll('.thumbnail');
                        thumbnails.forEach(function(thumbnail) {
                            thumbnail.classList.remove('active-thumbnail'); // ลบ class active-thumbnail จากทุกรูป
                        });
                        thumbnails[index].classList.add('active-thumbnail'); // เพิ่ม class active-thumbnail ให้กับรูปที่ถูกเลือก
                        }

                        // ฟังก์ชันเมื่อกด thumbnail
                        function changeSlide(index) {
                        var carousel = new bootstrap.Carousel(document.getElementById('carouselExampleControlsNoTouching'));
                        carousel.to(index); // สลับรูปใหญ่
                        setActiveThumbnail(index); // สลับกรอบ thumbnail
                        }

                        // ดักจับเหตุการณ์ตอนสไลด์รูปใหญ่
                        document.getElementById('carouselExampleControlsNoTouching').addEventListener('slid.bs.carousel', function (event) {
                        var activeIndex = event.to; // ดึง index ของรูปที่กำลังถูกแสดง
                        setActiveThumbnail(activeIndex); // สลับกรอบ thumbnail ตาม index ที่แสดง
                        });
                    </script>
                </div>
            </div>
            <div class="col-6">
                <div class="row product-name">
                    <h2>XXX Class Course</h2>
                </div>
                <div class="product-detail">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae reiciendis modi ipsam est quaerat, minima, nam saepe facilis, similique placeat mollitia quia ducimus quibusdam. Laboriosam doloremque recusandae fugiat quaerat aliquid.
                    <ul>
                        <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                        <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                        <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                        <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</li>
                    </ul>
                </div>
                <h4 class="product-price">฿199</h4>
                <label for="quantity">จำนวน </label>
                <button type="button" class="minus-btn">-</button>
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="10">
                <button type="button" class="plus-btn">+</button><br>
                <button type="submit" class="add-to-cart-btn">หยิบใส่ตะกร้า</button>
                <button type="submit" class="buy-now-btn">ซื้อสินค้า</button>
                <script>
                    document.querySelector('.plus-btn').addEventListener('click', function() {
                    let quantityInput = document.getElementById('quantity');
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue < parseInt(quantityInput.max)) {
                      quantityInput.value = currentValue + 1;
                    }
                  });
                  
                  document.querySelector('.minus-btn').addEventListener('click', function() {
                    let quantityInput = document.getElementById('quantity');
                    let currentValue = parseInt(quantityInput.value);
                    if (currentValue > parseInt(quantityInput.min)) {
                      quantityInput.value = currentValue - 1;
                    }
                  });
                </script>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>