<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>شركة فؤاد علي العزي التجارية</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

body{
font-family: "Tajawal", sans-serif;
}

.navbar{
background:#2f3e4c;
}

.navbar a{
color:white;
margin-left:15px;
}

.hero{
background:url('/images/hero.jpg') center/cover;
height:600px;
display:flex;
align-items:center;
justify-content:center;
color:white;
text-align:center;
}

.hero h1{
font-size:45px;
font-weight:bold;
}

.section-title{
background:#2f3e4c;
color:white;
padding:20px;
text-align:center;
font-size:25px;
}

.about{
padding:80px 0;
}

.services{
background:#f5f5f5;
padding:60px 0;
text-align:center;
}

.service-box{
padding:30px;
}

.service-box i{
font-size:50px;
margin-bottom:20px;
}

footer{
background:#2f3e4c;
color:white;
padding:40px 0;
text-align:center;
}

.social i{
margin:10px;
font-size:20px;
}

</style>

</head>

<body>

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg">
<div class="container">

<a class="navbar-brand text-white" href="#">
<img src="/images/logo.png" width="60">
</a>

<button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navMenu">

<ul class="navbar-nav me-auto">

<li class="nav-item"><a class="nav-link" href="#">الرئيسية</a></li>
<li class="nav-item"><a class="nav-link" href="#">من نحن</a></li>
<li class="nav-item"><a class="nav-link" href="#">شركاء النجاح</a></li>
<li class="nav-item"><a class="nav-link" href="#">الوظائف</a></li>
<li class="nav-item"><a class="nav-link" href="#">اتصل بنا</a></li>
<li class="nav-item"><a class="nav-link" href="#">English</a></li>

</ul>

{{-- login register icons --}}
<div class="d-flex">

<a href="{{ route('login') }}" class="text-white me-3">
<i class="fa-solid fa-right-to-bracket"></i>
</a>

<a href="{{ route('register') }}" class="text-white">
<i class="fa-solid fa-user-plus"></i>
</a>

</div>

</div>
</div>
</nav>

{{-- Hero --}}
<section class="hero">

<div>

<h1>شركة فؤاد علي العزي التجارية</h1>

<div class="social">

<i class="fab fa-instagram"></i>
<i class="fab fa-facebook"></i>
<i class="fab fa-twitter"></i>
<i class="fab fa-snapchat"></i>
<i class="fab fa-tiktok"></i>
<i class="fab fa-youtube"></i>

</div>

</div>

</section>

{{-- About --}}
<section class="about container">

<div class="row align-items-center">

<div class="col-md-6">
<img src="/images/about.png" class="img-fluid">
</div>

<div class="col-md-6">

<h3>شركة فؤاد علي العزي التجارية</h3>

<p>
تم تأسيس شركة فؤاد علي العزي التجارية استكمالاً لمسيرة المؤسس
الطويلة في مجال البيع بالجملة، حيث تسعى الشركة لتوسيع نشاطها
وتقديم أفضل المنتجات والخدمات بما يواكب رؤية المملكة 2030.
</p>

<a href="#" class="btn btn-warning">اعرف أكثر</a>

<a href="#" class="btn btn-outline-secondary">حمل بروفايل الشركة</a>

</div>

</div>

</section>

{{-- Services --}}
<div class="section-title">
مجالات العمل
</div>

<section class="services">

<div class="container">

<div class="row">

<div class="col-md-4 service-box">

<i class="fa-solid fa-hotel"></i>

<h5>البيع بالجملة</h5>

<p>في مستلزمات الفنادق</p>

</div>

<div class="col-md-4 service-box">

<i class="fa-solid fa-cart-shopping"></i>

<h5>البيع بالجملة</h5>

<p>في أدوات البلاستيك والورقيات والكمامات</p>

</div>

<div class="col-md-4 service-box">

<i class="fa-solid fa-bag-shopping"></i>

<h5>البيع بالجملة</h5>

<p>في المنظفات وأدوات النظافة</p>

</div>

</div>

</div>

</section>

{{-- Partners --}}
<div class="section-title">
شركاء النجاح
</div>

<section class="container text-center py-5">

<p>سيتم إضافة شعارات الشركاء هنا</p>

</section>

{{-- Footer --}}
<footer>

<img src="/images/logo.png" width="70">

<div class="social">

<i class="fab fa-instagram"></i>
<i class="fab fa-facebook"></i>
<i class="fab fa-twitter"></i>
<i class="fab fa-snapchat"></i>
<i class="fab fa-tiktok"></i>
<i class="fab fa-youtube"></i>

</div>

<p class="mt-3">
جميع الحقوق محفوظة لشركة فؤاد علي العزي التجارية © 2025
</p>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
