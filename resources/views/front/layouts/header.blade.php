<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>N1</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link href="/assets/img/favicon.png" rel="icon">
    <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://kit.fontawesome.com/cfe6bc4ca1.css" crossorigin="anonymous">
    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    @viteReactRefresh
    @vite('resources/js/app.js')
</head>

<body>
    <div class="container d-flex align-items-center justify-content-between">
        <n1-auth style="justify-content: start;" id="login"></n1-auth>
        <!-- <a class="btn px-4" id="login" data-bs-toggle="modal" href="#exampleModalToggle" role="button">تسجيل الدخول <i class="fa-solid fa-circle-user"></i></i></a> -->

        <nav id="navbar" class="navbar" dir="rtl">
            <img class="p-3" src="{{ asset('images/logo.png') }}" alt="logo">
            <ul>
                <li><a class="nav-link text-black  active" href="/">الرئيسية</a></li>
                <li><a class="nav-link text-black scrollto" href="/contact">اتصل بنا</a></li>
                <li><a class="nav-link text-black scrollto" href="/about">عن N1</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle" style="background-color: #ff8914"></i>
        </nav><!-- .navbar -->
    </div>

    <!-- <div class="modal fade border-0" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" dir="rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: calc(100% - 30px);"></button>
                </div>

                <div class="modal-body">
                <div class="col-lg-6 mt-5 mt-lg-0 text-end" data-aos-delay="100">
                        <h2 class="text-bold" style="color: #ff8000">تسجيل الدخول</h2>
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                            <div class="form-group mt-3">
                                <label class="mb-3">البريد الالكتروني</label>
                                <input type="email" class="form-control rounded-0" name="email" id="email" required>
                            </div>

                            <div class="form-group mt-3">
                                <label class="mb-3">كلمة المرور</label>
                                <input type="text" class="form-control rounded-0" name="subject" id="subject" required>
                            </div>

                            <div class="form-group mt-3">
                                <input type="checkbox"> تذكرني
                            </div>
                        </form>
                    </div>

                    <div class="form-group mt-3 text-center">
                        <a class="btn px-5 mb-3" id="login" href="admin">تسجيل الدخول</a> <br>
                        <a data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" style="cursor: pointer;">لا تمتلك حسابا بعد؟ <span class="text-danger text-decoration-underline">انشاء حساب تاجر</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1" dir="rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="margin-right: calc(100% - 30px);"></button>
                </div>

                <div class="modal-body mt-5 mt-lg-0 text-end">
                    <h2 class="fw-bold" style="color: #ff8000">انشاء حساب تاجر</h2>
                    <form action="forms/contact.php" method="post" role="form" class="php-email-form" autocomplete="off">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label class="mb-3">اسم الشركة</label>
                                    <input type="text" class="form-control rounded-0" name="CompanyName" id="CompanyName" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="mb-3">رقم السجل التجاري/ معروف</label>
                                    <input type="text" class="form-control rounded-0" name="number" id="number" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="mb-3">رقم الجوال</label>
                                    <input type="text" class="form-control rounded-0" name="phone" id="phone" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="mb-3">كلمة المرور</label>
                                    <input type="password" class="form-control rounded-0" name="password" id="password" required>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group mt-3">
                                    <label class="mb-3">نوع النشاط</label>
                                    <select class="form-control rounded-0" name="ActiveType">
                                        <option value="">اختر نوع النشاط</option>
                                        <option value=""> </option>
                                    </select>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="mb-3">صورة السجل التجاري/ معروف</label><br>
                                    <label for="file" class="upload form-control d-flex flex-row-reverse"><i class="fa fa-duotone fa-cloud-arrow-up text-secondary"></i> ارفع السجل التجاري\ معروف</label>
                                    <input type="file" class="form-control rounded-0" name="image" id="file" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="mb-3">البريد الالكتروني</label>
                                    <input type="email" class="form-control rounded-0" name="email" id="email" required>
                                </div>

                                <div class="form-group mt-3">
                                    <label class="mb-3">تأكيد كلمة المرور</label>
                                    <input type="password" class="form-control rounded-0" name="confirmPassword" id="confirmPassword" required>
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="form-group mt-4 text-center">
                        <a class="btn px-5 mb-3" id="login" data-bs-target="#exampleModalToggle3" data-bs-toggle="modal">انشاء الحساب</a> <br>
                        <a data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="cursor: pointer;"> تمتلك حسابا؟ <span class="text-danger text-decoration-underline">تسجيل الدخول</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <div class="modal fade border-0" id="exampleModalToggle3" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1" dir="rtl">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body">
                    <div class="mt-5 mt-lg-0 text-end" data-aos-delay="100">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">

                            <div class="form-group mt-3">
                                <div class="container height-100 d-flex justify-content-center align-items-center">
                                    <div class="position-relative">
                                        <h2 class="fw-bold" style="color: #e57504">التحقق من رقم الجوال</h2>
                                        <div> <span class="mb-3">ادخل الكود المرسل الى</span> <small>+*******9897</small>
                                        </div>

                                        <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2">
                                            <input class="m-2 text-center form-control rounded-0" type="text" id="first" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded-0" type="text" id="second" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded-0" type="text" id="third" maxlength="1" />
                                            <input class="m-2 text-center form-control rounded-0" type="text" id="fourth" maxlength="1" />
                                        </div>

                                        <div class="text-center mt-3">
                                            <div class="countdown">59:00</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> -->