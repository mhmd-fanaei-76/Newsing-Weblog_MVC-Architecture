<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link href="../../Css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="Css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>

    </style>

</head>

<body>

    <header class="mb-1">
        <div class="container-fluid  bg-dark text-white">
            <div class="d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
                <div class="mt-2 ms-auto">
                    <a href="/"><img src="Images/Logos/logo.png" width="150" height="120" /></a>
                </div>
                <div class="ms-auto">
                    <a href="/"><img src="Images/Logos/logo2.png" width="600" height="100" /></a>
                </div>
                <form class="row g-3 mt-2">
                    <div class="col-auto">
                        <input type="search" class="form-control form-control-dark" placeholder="Search...">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-warning ms-2">جست و جو</button>
                    </div>
                </form>
            </div>
            <div
                class="text-start  mx-2 pb-4 d-flex flex-wrap align-items-center justify-content-end justify-content-lg-end">
                <div class="ms-auto">
                    <a href="/"><img src="Images/Logos/logo3.png" width="160" height="80"
                            style="margin-left: auto!important;" /></a>
                </div>

                <?php
                if (!empty($_SESSION['userInfo'])) { ?>
                    <h5 class="mt-3 mx-4 text-secondary">
                        <?= "Wellcome " . $_SESSION['userInfo']['user_name']; ?>
                    </h5>
                    <a class="text-decoration-none text-warning" href="/editMyUserName"><button type="button"
                            class="btn btn-outline-light mx-2 px-4">ویرایش پروفایل</button></a>
                    <a class="text-decoration-none text-warning" href="/logout"><button type="button"
                            class="btn btn-outline-light mx-2 px-4">خروج</button></a>
                <?php } ?>

                <?php if (empty($_SESSION['userInfo'])) { ?>
                    <a class="text-decoration-none text-warning" href="/login"><button type="button"
                            class="btn btn-outline-light mx-2 px-4">ورود</button></a>
                    <a class="text-decoration-none text-black" href="/register"> <button type="button"
                            class="btn btn-warning px-3 me-1">عضویت</button></a>
                <?php } ?>

            </div>

        </div>
        <div class="container-fluid p-2 bg-dark text-white mt-1 ml-auto">
            <div class="row">
                <div class="clo-8">
                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-start mb-md-0">
                        <li><a href="/" class="nav-link px-2 text-secondary">صفحه نخست</a></li>
                        <li><a href="/siasyNews" class="nav-link px-2 text-white">اخبار سیاسی</a></li>
                        <li><a href="/varzeshiNews" class="nav-link px-2 text-white">اخبار ورزشی</a></li>
                        <li><a href="/ejtemaeiNews" class="nav-link px-2 text-white">اخبار اجتماعی</a></li>
                        <li><a href="/aboutUs" class="nav-link px-2 text-white">درباره ما</a></li>
                        <?php if (!empty($_SESSION['userInfo'])) { ?>
                            <li class="me-auto ms-4"><a href="/myNews" class="nav-link px-2 text-warning">خبر های من</a></li>
                            <li class=" ms-4"><a href="/addMyNews" class="nav-link px-2 text-warning">اضافه کردن خبر</a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    {{content}}

    <footer class="bg-dark text-center text-white mt-1">
        <div class="container p-4">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com" role="button"><i
                        class="fa fa-facebook-f"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://twitter.com" role="button"><i
                        class="fa fa-twitter"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://mail.google.com" role="button"><i
                        class="fa fa-google"></i></a>
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.instagram.com" role="button"><i
                        class="fa fa-instagram"></i></a>
            </section>
            <section class="">
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase me-4">لینک های مرتبط</h5>

                        <ul class="list-unstyled mb-0">
                            <li class="my-3">
                                <a href="#!" class="text-warning text-decoration-none">آموزش خبر نگاری</a>
                            </li>
                            <li class="my-3">
                                <a href="#!" class="text-warning text-decoration-none">خبر های داغ روز</a>
                            </li>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
                        <h5 class="text-uppercase me-4">لینک های مرتبط</h5>

                        <ul class="list-unstyled mb-0">
                            <li class="my-3">
                                <a href="#!" class="text-warning text-decoration-none">وبسایت ایران خبر</a>
                            </li>
                            <li class="my-3">
                                <a href="#!" class="text-warning text-decoration-none">خبر هی سیاسی دنیا</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div>
                <a href="/"><img src="Images/Logos/nemad.png" width="160" height="140" /></a>
                </div>
            </section>
        </div>
        <section class="mb-4">
            <p>
                تمامی حقوق مادی و معنوی این سایت متعلق به انتخاب است و استفاده از مطالب با ذکر منبع بلامانع است.
            </p>
        </section>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2023 Copyright:
            <a class="text-white" href="https://mdbootstrap.com/">NewsWebLog.ir</a>
        </div>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>