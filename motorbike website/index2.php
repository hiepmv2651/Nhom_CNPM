<?php

$xml_data = simplexml_load_file("Nhom.xml");

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý cửa hàng xe</title>

    <link rel="shortcut icon" type="image/png" href="image/favicon.png" />

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span>Xe </span>máy </a>

        <nav class="navbar">
            <a href="#home">trang chủ</a>
            <a href="#vehicles">xe phổ biến</a>
            <a href="#services">dịch vụ</a>
            <a href="#featured">xe máy</a>
            <a href="#reviews">đánh giá</a>
            <a href="#contact">liên hệ</a>
        </nav>

        <div id="login-btn">

        </div>


    </header>

    <div class="login-form-container" id="login-form">

        <span id="close-login-form" class="fas fa-times"></span>

        <form action="index.php" method="POST">
            <h3>đăng nhập</h3>
            <input type="email" name="username" placeholder="Email" class="box">
            <input type="password" name="password" placeholder="Mật khẩu" class="box">
            <input type="submit" value="đăng nhập" name="login" class="btn">
            <p> chưa có tài khoản <a href="/crud/qlnv/add_qlnv.php">tạo tài khoản</a> </p>
        </form>

    </div>





    <!-- TODO Trang chủ -->
    <section class="home" id="home">

        <h3 data-speed="-2" class="home-parallax">Tìm xe của bạn</h3>

        <img data-speed="5" class="home-parallax" src="image/xe_may/xe_may_home.jpg" alt="">

        <a data-speed="7" href="#featured" class="btn home-parallax">Khám phá thêm</a>

    </section>

    <section class="icons-container">

        <div class="icons">
            <i class="fas fa-home"></i>
            <div class="content">
                <h3>10+</h3>
                <p>chi nhánh</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-motorcycle"></i>
            <div class="content">
                <h3>1000+</h3>
                <p>xe máy đã bán</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-users"></i>
            <div class="content">
                <h3>300+</h3>
                <p>khách hàng</p>
            </div>
        </div>

        <div class="icons">
            <i class="fas fa-motorcycle"></i>
            <div class="content">
                <h3>500+</h3>
                <p>xe máy mới</p>
            </div>
        </div>

    </section>

    <!-- TODO Xe phổ biến -->
    <section class="vehicles" id="vehicles">

        <h1 class="heading"> <span>phương tiện</span> phổ biến </h1>

        <div class="swiper vehicles-slider">

            <div class="swiper-wrapper">
                <!--TODO:  thay đổi src image  -->
                <?php
                for ($i = count($xml_data->XeMay) - 1; $i >= count($xml_data->XeMay) - 5; $i--) {
                    echo '<div class="swiper-slide box">
                    <img src="image/xe_may/' . $xml_data->XeMay[$i]->AnhXM . '" alt=""> 
                    <div class="content">
                        <h3>' . $xml_data->XeMay[$i]->TenXM . '</h3>
                        <div class="price" id="DonGia"> <span>đơn giá : </span> ' . $xml_data->XeMay[$i]->DonGia . ' VNĐ</div>
                        <p>
                            new
                            <span class="fas fa-circle"></span> 2022
                            <span class="fas fa-circle"></span> ' . $xml_data->XeMay[$i]->MaXM . '
                            <span class="fas fa-circle"></span> petrol
                            <span class="fas fa-circle"></span> ' . $xml_data->XeMay[$i]->SoLuong . 'chiếc
                        </p>
                        <a href="#" class="btn">check out</a>
                    </div>
                </div>';
                }

                ?>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- TODO Dịch vụ -->
    <section class="services" id="services">

        <h1 class="heading"> <span>dịch vụ</span> của chúng tôi</h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-motorcycle"></i>
                <h3>bán xe máy</h3>
                <a href="#" class="btn"> xem thêm</a>
            </div>

            <div class="box">
                <i class="fas fa-tools"></i>
                <h3>sửa chữa bộ phận</h3>
                <a href="#" class="btn"> xem thêm</a>
            </div>

            <div class="box">
                <i class="fas fa-shield-alt"></i>
                <h3>bảo hiểm xe máy</h3>
                <a href="#" class="btn"> xem thêm</a>
            </div>

            <div class="box">
                <i class="fas fa-car-battery"></i>
                <h3>thay thế acquy</h3>
                <a href="#" class="btn"> xem thêm</a>
            </div>

            <div class="box">
                <i class="fas fa-gas-pump"></i>
                <h3>thay dầu</h3>
                <a href="#" class="btn"> xem thêm</a>
            </div>

            <div class="box">
                <i class="fas fa-headset"></i>
                <h3>hỗ trợ 24/7</h3>
                <a href="#" class="btn"> xem thêm</a>
            </div>

        </div>

    </section>

    <!-- TODO Xe máy -->
    <section class="featured" id="featured">

        <h1 class="heading"> <span>xe máy</span></h1>

        <div class="swiper featured-slider">

            <div class="swiper-wrapper">

                <?php

                for ($i = count($xml_data->XeMay) - 1; $i >= 0; $i--) {
                    echo '<div class="swiper-slide box">
                        <img src="image/xe_may/' . $xml_data->XeMay[$i]->AnhXM . '" alt="">
                        <div class="content">
                            <h3>' . $xml_data->XeMay[$i]->TenXM . '</h3>
                            <div class="stars">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <div class="price">' . $xml_data->XeMay[$i]->DonGia . ' VNĐ</div>
                            <a href="#" class="btn">check out</a>
                        </div>
                    </div>';
                }

                ?>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>


    <section class="newsletter">

        <h3>đăng kí để nhận được những cập nhật mới nhất</h3>
        <p>hãy trở thành những người đầu tiên sở hữu các dịch vụ mới nhất từ chúng tôi</p>

        <form action="">
            <input type="email" placeholder="Nhập email của bạn">
            <input type="submit" value="đăng kí">
        </form>

    </section>

    <!-- TODO Đánh giá -->
    <section class="reviews" id="reviews">

        <h1 class="heading"> <span>đánh giá</span> từ khách hàng</h1>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <!--TODO:  thay đổi src image  -->
                <?php
                for ($i = count($xml_data->KhachHang) - 1; $i >= count($xml_data->KhachHang) - 5; $i--) {
                    echo '<div class="swiper-slide box">
                    <img src="image/khach_hang/' . $xml_data->KhachHang[$i]->AnhKH . '" alt="">
                    <div class="content">
                        <p>rất tốt.</p>
                        <h3>' . $xml_data->KhachHang[$i]->HoTenKH . '</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>';
                }
                ?>

            </div>

            <div class="swiper-pagination"></div>

        </div>

    </section>

    <!-- TODO Liên hệ -->
    <section class="contact" id="contact">

        <h1 class="heading"><span>liên hệ</span> với chúng tôi</h1>

        <div class="row">

            <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3898.706224032123!2d109.20018721398871!3d12.268148933243754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317067ed3a052f11%3A0xd464ee0a6e53e8b7!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBOaGEgVHJhbmc!5e0!3m2!1svi!2s!4v1652780192976!5m2!1svi!2s" allowfullscreen="" loading="lazy"></iframe>

            <form action="">
                <h3>thông tin</h3>
                <input type="text" placeholder="Tên của bạn" class="box">
                <input type="email" placeholder="Email" class="box">
                <input type="tel" placeholder="Chủ đề" class="box">
                <textarea placeholder="Lời nhắn" class="box" cols="30" rows="10"></textarea>
                <input type="submit" value="gửi tin nhắn" class="btn">
            </form>

        </div>

    </section>

    <section class="footer" id="footer">

        <div class="box-container">

            <div class="box">
                <h3>chi nhánh của chúng tôi</h3>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Nha Trang </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Hà Nội </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Hồ Chí Minh </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Cam Ranh </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Phú Yên </a>
            </div>

            <div class="box">
                <h3>đường dẫn</h3>
                <a href="#"> <i class="fas fa-arrow-right"></i> trang chủ </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> xe phổ biến </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> dịch vụ </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> xe máy </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> đánh giá </a>
                <a href="#"> <i class="fas fa-arrow-right"></i> liên hệ </a>
            </div>

            <div class="box">
                <h3>thông tin liên lạc</h3>
                <a href="#"> <i class="fas fa-phone"></i> 0123456789 </a>
                <a href="#"> <i class="fas fa-envelope"></i> ntu@ntu.edu.vn </a>
                <a href="#"> <i class="fas fa-map-marker-alt"></i> Đại học Nha Trang - Nha Trang - Khánh Hòa </a>
            </div>

            <div class="box">
                <h3>liên hệ</h3>
                <a href="https://www.facebook.com/nhatranguniversity/" target="_blank> <i class=" fab fa-facebook-f"></i> facebook </a>
                <a href="#"> <i class="fab fa-instagram"></i> instagram </a>
                <a href="https://www.youtube.com/channel/UCS_yeu-PgQ8IfQmQkfHRVEw" target="_blank"> <i class="fab fa-youtube"></i> youtube </a>
                <a href="#"> <i class="fab fa-github"></i> github </a>
                <a href="#"> <i class="fab fa-tiktok"></i> tiktok </a>
            </div>

        </div>

        <div class="credit"> <a href="https://ntu.edu.vn/" target="_blank">đại học nha trang</a> © 2022 </div>

    </section>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="js/script.js"></script>

</body>

</html>