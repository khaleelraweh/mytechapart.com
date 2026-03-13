@extends('layouts.app')

@section('content')
<!-- Import Google Fonts for Arabic Typography -->
<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">
<!-- FontAwesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* -------------------------------------
       Nazil-Style Premium CSS Theme
    -------------------------------------- */
    :root {
        --primary-gold: #c5a059;
        --primary-gold-hover: #b38f4d;
        --dark-bg: #121212;
        --dark-surface: #1e1e1e;
        --light-bg: #f5f7fa;
        --text-primary: #2d3748;
        --text-secondary: #718096;
        --white: #ffffff;
    }

    body {
        font-family: 'Cairo', sans-serif;
        background-color: var(--light-bg);
        direction: rtl; /* Enforce RTL for Arabic */
        text-align: right;
    }

    /* Override Laravel Default py-4 in app layout */
    main.py-4 {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
    }

    /* Hero Section */
    .hero-section {
        position: relative;
        height: 80vh;
        min-height: 600px;
        background: url('https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(18,18,18,0.85) 0%, rgba(18,18,18,0.4) 100%);
    }

    .hero-content {
        position: relative;
        z-index: 2;
        text-align: center;
        color: var(--white);
        max-width: 800px;
        padding: 0 20px;
        animation: fadeInDown 1s ease-out;
    }

    .hero-title {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    }

    .hero-subtitle {
        font-size: 1.25rem;
        font-weight: 400;
        margin-bottom: 2.5rem;
        color: #e2e8f0;
    }

    /* Glassmorphic Search Bar */
    .search-box {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(12px);
        -webkit-backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 16px;
        padding: 20px;
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
    }

    .search-input-group {
        flex: 1;
        min-width: 200px;
        text-align: right;
    }

    .search-input-group label {
        display: block;
        font-size: 0.9rem;
        color: var(--white);
        margin-bottom: 8px;
        font-weight: 600;
    }

    .search-input-group input,
    .search-input-group select {
        width: 100%;
        padding: 12px 15px;
        border-radius: 8px;
        border: 1px solid rgba(255,255,255,0.4);
        background: rgba(255,255,255,0.9);
        color: var(--text-primary);
        font-family: inherit;
        outline: none;
        transition: all 0.3s ease;
    }

    .search-input-group input:focus,
    .search-input-group select:focus {
        border-color: var(--primary-gold);
        box-shadow: 0 0 0 3px rgba(197, 160, 89, 0.3);
    }

    .btn-search {
        background: var(--primary-gold);
        color: var(--white);
        border: none;
        padding: 14px 40px;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        height: 100%;
        margin-top: 28px;
    }

    .btn-search:hover {
        background: var(--primary-gold-hover);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(197, 160, 89, 0.4);
    }

    /* Section Headings */
    .section-title {
        text-align: center;
        margin: 5rem 0 3rem;
        position: relative;
    }

    .section-title h2 {
        font-size: 2.5rem;
        color: var(--text-primary);
        font-weight: 800;
    }

    .section-title p {
        color: var(--text-secondary);
        font-size: 1.1rem;
        margin-top: 10px;
    }

    .section-title::after {
        content: '';
        display: block;
        width: 60px;
        height: 4px;
        background: var(--primary-gold);
        margin: 15px auto 0;
        border-radius: 2px;
    }

    /* Features Section */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        padding: 0 1rem;
    }

    .feature-card {
        background: var(--white);
        padding: 2.5rem 2rem;
        border-radius: 16px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0,0,0,0.03);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(0,0,0,0.02);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
    }

    .feature-icon {
        width: 80px;
        height: 80px;
        background: rgba(197, 160, 89, 0.1);
        color: var(--primary-gold);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin: 0 auto 1.5rem;
        transition: all 0.3s ease;
    }

    .feature-card:hover .feature-icon {
        background: var(--primary-gold);
        color: var(--white);
    }

    .feature-card h3 {
        font-size: 1.3rem;
        font-weight: 700;
        margin-bottom: 1rem;
        color: var(--text-primary);
    }

    .feature-card p {
        color: var(--text-secondary);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Apartments List Section */
    .apartments-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 2.5rem;
        padding: 0 1rem 5rem;
    }

    .apartment-card {
        background: var(--white);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
        transition: all 0.3s ease;
        position: relative;
    }

    .apartment-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 25px 45px rgba(0,0,0,0.1);
    }

    .apt-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: var(--primary-gold);
        color: var(--white);
        padding: 6px 16px;
        border-radius: 30px;
        font-size: 0.85rem;
        font-weight: 700;
        z-index: 10;
        box-shadow: 0 4px 10px rgba(0,0,0,0.2);
    }

    .apt-img {
        width: 100%;
        height: 240px;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .apartment-card:hover .apt-img {
        transform: scale(1.05);
    }

    .apt-img-wrapper {
        overflow: hidden;
        position: relative;
    }

    .apt-details {
        padding: 25px;
    }

    .apt-title {
        font-size: 1.4rem;
        font-weight: 700;
        color: var(--text-primary);
        margin-bottom: 10px;
    }

    .apt-location {
        color: var(--text-secondary);
        font-size: 0.95rem;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .apt-amenities {
        display: flex;
        gap: 15px;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        padding: 15px 0;
        margin-bottom: 20px;
    }

    .amenity {
        display: flex;
        align-items: center;
        gap: 6px;
        color: var(--text-secondary);
        font-size: 0.9rem;
    }

    .amenity i {
        color: var(--primary-gold);
    }

    .apt-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .apt-price {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary-gold);
    }

    .apt-price span {
        font-size: 0.9rem;
        font-weight: 400;
        color: var(--text-secondary);
    }

    .btn-book {
        background: transparent;
        color: var(--text-primary);
        border: 2px solid var(--text-primary);
        padding: 8px 24px;
        border-radius: 8px;
        font-weight: 700;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-book:hover {
        background: var(--text-primary);
        color: var(--white);
    }

    /* Animations */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    @media (max-width: 768px) {
        .hero-title { font-size: 2.2rem; }
        .search-input-group { min-width: 100%; }
        .btn-search { margin-top: 10px; width: 100%; }
    }
</style>

<div class="rtl-wrapper" dir="rtl">

    <!-- Hero Section -->
    <header class="hero-section">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">ارتقِ بتجربة إقامتك مع فؤاد نزيل</h1>
            <p class="hero-subtitle">شقق فندقية مخدومة بتصاميم عصرية لتشعر وكأنك في منزلك، مع خدمات ضيافة لا تضاهى.</p>

            <form action="#" method="GET" class="search-box">
                <div class="search-input-group">
                    <label>الوجهة</label>
                    <input type="text" placeholder="أين تريد الذهاب؟">
                </div>
                <div class="search-input-group">
                    <label>تاريخ الوصول</label>
                    <input type="date">
                </div>
                <div class="search-input-group">
                    <label>تاريخ المغادرة</label>
                    <input type="date">
                </div>
                <div class="search-input-group">
                    <label>الضيوف</label>
                    <select>
                        <option>1 ضيف</option>
                        <option>2 ضيوف</option>
                        <option>3 - 5 ضيوف</option>
                        <option>عائلة (+6)</option>
                    </select>
                </div>
                <button type="button" class="btn-search"><i class="fa-solid fa-magnifying-glass ms-2"></i> ابحث</button>
            </form>
        </div>
    </header>

    <div class="container">
        <!-- Why Choose Us / Features -->
        <section>
            <div class="section-title">
                <h2>لماذا تختار شققنا المخدومة؟</h2>
                <p>نقدم لك مزيجاً مثالياً من رفاهية الفنادق وراحة المنزل</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-broom"></i></div>
                    <h3>خدمة تنظيف يومية</h3>
                    <p>فريقنا المتخصص يوفر لك خدمة تنظيف وترتيب الغرف بشكل دوري لضمان بيئة صحية ومريحة.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-wifi"></i></div>
                    <h3>إنترنت عالي السرعة</h3>
                    <p>ابق على اتصال بأعمالك وأحبائك مع شبكة واي فاي مجانية وسريعة متوفرة في جميع الشقق.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-couch"></i></div>
                    <h3>أثاث فاخر ومريح</h3>
                    <p>تم تجهيز شققنا بأرقى أنواع الأثاث العصري الذي يجمع بين الأناقة المطلقة والمتانة.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon"><i class="fa-solid fa-headset"></i></div>
                    <h3>دعم على مدار الساعة</h3>
                    <p>فريق خدمة العملاء لدينا متاح 24/7 لتلبية كافة احتياجاتك وضمان إقامة لا تُنسى.</p>
                </div>
            </div>
        </section>

        <!-- Featured Apartments -->
        <section>
            <div class="section-title">
                <h2>أفخم الشقق المتاحة</h2>
                <p>استكشف مجموعتنا المختارة من الشقق المجهزة بالكامل</p>
            </div>

            <div class="apartments-grid">
                <!-- Unit 1 -->
                <div class="apartment-card">
                    <div class="apt-badge">الأكثر طلباً</div>
                    <div class="apt-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1502672260266-1c1e52d15461?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Apartment 1" class="apt-img">
                    </div>
                    <div class="apt-details">
                        <h3 class="apt-title">جناح رويال إكزكيوتف</h3>
                        <p class="apt-location"><i class="fa-solid fa-location-dot"></i> حي العليا، الرياض</p>

                        <div class="apt-amenities">
                            <span class="amenity"><i class="fa-solid fa-bed"></i> 2 غرف</span>
                            <span class="amenity"><i class="fa-solid fa-bath"></i> 2 حمام</span>
                            <span class="amenity"><i class="fa-solid fa-ruler-combined"></i> 120 م²</span>
                        </div>

                        <div class="apt-footer">
                            <div class="apt-price">850 <span>ر.س / ليلة</span></div>
                            <a href="#" class="btn-book">احجز الآن</a>
                        </div>
                    </div>
                </div>

                <!-- Unit 2 -->
                <div class="apartment-card">
                    <div class="apt-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1600596542815-ffad4c1539a9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Apartment 2" class="apt-img">
                    </div>
                    <div class="apt-details">
                        <h3 class="apt-title">شقة بانوراما ديلوكس</h3>
                        <p class="apt-location"><i class="fa-solid fa-location-dot"></i> الكورنيش، جدة</p>

                        <div class="apt-amenities">
                            <span class="amenity"><i class="fa-solid fa-bed"></i> 3 غرف</span>
                            <span class="amenity"><i class="fa-solid fa-bath"></i> 3 حمام</span>
                            <span class="amenity"><i class="fa-solid fa-ruler-combined"></i> 180 م²</span>
                        </div>

                        <div class="apt-footer">
                            <div class="apt-price">1,200 <span>ر.س / ليلة</span></div>
                            <a href="#" class="btn-book">احجز الآن</a>
                        </div>
                    </div>
                </div>

                <!-- Unit 3 -->
                <div class="apartment-card">
                    <div class="apt-badge" style="background: #2d3748;">عرض خاص</div>
                    <div class="apt-img-wrapper">
                        <img src="https://images.unsplash.com/photo-1512918728675-ed5a9ecdebfd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Apartment 3" class="apt-img">
                    </div>
                    <div class="apt-details">
                        <h3 class="apt-title">استديو الأعمال الحديث</h3>
                        <p class="apt-location"><i class="fa-solid fa-location-dot"></i> حي الملقا، الرياض</p>

                        <div class="apt-amenities">
                            <span class="amenity"><i class="fa-solid fa-bed"></i> 1 غرفة</span>
                            <span class="amenity"><i class="fa-solid fa-bath"></i> 1 حمام</span>
                            <span class="amenity"><i class="fa-solid fa-ruler-combined"></i> 65 م²</span>
                        </div>

                        <div class="apt-footer">
                            <div class="apt-price">450 <span>ر.س / ليلة</span></div>
                            <a href="#" class="btn-book">احجز الآن</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </div>
</div>

@endsection
