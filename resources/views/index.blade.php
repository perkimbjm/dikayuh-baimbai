<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Coordinates Search">
        <meta name="author" content="DPRKP Kota Banjarmasin">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="{{ asset('img/logo.png') }}" rel="shortcut icon" type="image/png">
        <title>Dikayuh Baimbai</title>

        <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

        <!-- feather icons -->
        <script src="https://unpkg.com/feather-icons"></script>

        <!-- CSS Bootstrap -->
        <link rel="stylesheet" href="{{ asset('css/frontpage.css') }}">
        
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">dikayuh<span> baimbai</span></a>
        <div class="navbar-nav">
            <a href="#">Home</a>
            <a href="/map">Webmap</a>
            <a href="https://lookerstudio.google.com/u/0/reporting/d22cb19f-fb40-47b5-9d44-886fc67540b5">Dasbor Analitik</a>
            <a href="ded">Survey</a>
            <a href="https://ampihkumuhs-organization.gitbook.io/tutorial-dikayuh-baimbai">Panduan</a>
            <a href="https://bakawan.banjarmasinkota.go.id">RTLH</a>
        </div>
    
        <div class="navbar-extra">
            <a href="#" class="login">Login</a>
            <a href="#" id="hamburger"><i data-feather="menu"></i></a>
        </div>
    
    </nav>

    <section class="section-img1">
        <div class="heading-container">
            <h2 class="heading-container_heading text-hero">Data Intervensi Kawasan Yang Kumuh</h2>
        </div>
    </section>
    
    <section class="section-light">
        <h2 class="section_heading">Dikayuh Baimbai</h2>
        <br>
        <p>"Dikayuh Baimbai" adalah sebuah platform berbasis web yang dirancang untuk memvisualisasikan data terkait kawasan kumuh di Banjarmasin dalam bentuk informasi geospasial yang dapat mendukung keputusan, media kolaborasi, dan akselerasi informasi. Dikayuh adalah singkatan dari Data Intervensi Kawasan Yang Kumuh. Kosakata <strong><b>dikayuh</b></strong> sekaligus memiliki filosofi perjuangan atau effort. <strong>Baimbai</strong> adalah kosakata dari bahasa Banjar yang berarti bersama-sama atau kolaborasi.</p>
    </section>

    <section class="section-img2">
        <div class="heading-container">
            <h2 class="heading-container_heading2">Kolaborasi Penanganan Kumuh</h2>
        </div>
    </section>
    <section class="section-dark">
        
    </section>
    <section class="section-img3">
        <div class="heading-container">
           
        </div>
    </section>
   <section class="section-dark">
    <h2 class="section_heading">Disclaimer</h2>
    <p>Dikayuh Baimbai bertujuan mendukung orientasi pelayanan publik yang berkeadilan, keterbukaan informasi publik, dan mewujudkan tata kelola pemerintahan yang efektif, adaptif, dan kolaboratif. Garis batas yang tercantum pada peta merupakan batas indikatif sehingga tidak dapat dijadikan sebagai referensi resmi /acuan batas administrasi. Garis batas tidak boleh digunakan untuk tujuan hukum atau rekayasa sipil. Semua informasi di situs web ini diterbitkan dengan itikad baik dan hanya untuk tujuan informasi umum. Unit pengelola berupaya menyajikan data dan informasi sesuai kondisi aktual tetapi unit pengelola tidak bertanggung jawab atau menjamin ketepatan waktu, keakuratan, atau kelengkapan data dan informasi.</p>
   </section>
   <section class="section-img4">
    </section>

    @include('footer')
    
  
</body>
</html>