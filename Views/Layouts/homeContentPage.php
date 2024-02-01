<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 col-12 pl-md-1">

            <div class="card my-2 bg-dark text-white float-center">
                <a href="https://www.bachehayeaseman.org"><img src="Images/Breaks/breaks7right.gif" height="270"
                        class="card-img-top" alt="..."></a>
            </div>
            <div class="card my-2 bg-dark text-white float-center">
                <a href="https://bankmellat.ir"><img src="Images/Breaks/breaks3right.gif" height="270" class="card-img-top"
                        alt="..."></a>
            </div>
            <div class="card my-2 bg-dark text-white float-center">
                <a href="https://clickaval.com"><img src="Images/Breaks/breaks4right.gif" height="600" class="card-img-top"
                        alt="..."></a>
            </div>
        </div>

        <!-- ************************ -->
        <?php
        if ($continue[0] == 'true') {
            foreach ($result as $record) { ?>
                <div class="col-md-7 col-12 pl-md-1">
                    <?php
                    foreach ($result as $record) { ?>
                        <div class="card my-2  bg-dark text-white">
                            <div class="card-header">
                                <?php echo $record['title']; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                    <?php echo $record['short_news']; ?>
                                </h5>

                                <div>
                                    <img src="<?= $record['pic_news']; ?>" class="card-img-bottom" alt="...">
                                </div>
                                <p class="card-text mt-4">
                                    <?php echo $record['full_news']; ?>
                                </p>
                            </div>
                            <div class="card-footer text-end">
                                <a class="btn btn-outline-light btn-floating m-1" href="/comment?id=<?= $record['id']; ?>"
                                    role="button"><i class="fa fa-comment"></i></a>
                                <a class="btn btn-outline-light btn-floating m-1" href="/like?id=<?= $record['id']; ?>"
                                    role="button"><i class="fa fa-thumbs-up"></i></a>
                                <a class="btn btn-outline-light btn-floating m-1" href="/dis_like?id=<?= $record['id']; ?>"
                                    role="button"><i class="fa fa-thumbs-down"></i></a>
                                <span class="float-start mt-3">
                                    <?php echo jdate('Y/m/d H:i:s', $record['time_news']); ?>
                                </span>
                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            <?php }

        } else if ($continue[0] == 'myNews') { ?>
                <div class="col-md-7 col-12 pl-md-1">
                    <?php
                    foreach ($result as $record) { ?>
                        <div class="card my-2  bg-dark text-white">
                            <div class="card-header">
                            <?php echo $record['title']; ?>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title mb-4">
                                <?php echo $record['short_news']; ?>
                                </h5>

                                <div>
                                    <img src="<?= $record['pic_news']; ?>" class="card-img-bottom" alt="...">
                                </div>
                                <p class="card-text mt-4">
                                <?php echo $record['full_news']; ?>
                                </p>
                            </div>
                            <div class="card-footer text-start">
                            <?php echo jdate('Y/m/d H:i:s', $record['time_news']); ?>
                                <a href="/editMyNews?id=<?= $record['id']; ?>" class="btn btn-warning float-end">ویرایش خبر</a>
                                <a href="/deleteMyNews?id=<?= $record['id']; ?>" class="btn btn-warning float-end mx-3">حذف خبر</a>
                            </div>
                        </div>
                <?php }
                    ?>
                </div>
        <?php } else if ($continue[0] == 'false') { ?>
                    <div class="col-md-7 col-12 pl-md-1">
                    <?php
                    foreach ($result as $record) { ?>
                            <div class="card my-2  bg-dark text-white">
                                <div class="card-header">
                            <?php echo $record['title']; ?>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title mb-4">
                                <?php echo $record['short_news']; ?>
                                    </h5>
                                    <div>
                                        <img src="<?= $record['pic_news']; ?>" class="card-img-bottom" alt="...">
                                    </div>
                                    <p class="card-text">
                                <?php //echo $record['full_news']; ?>
                                    </p>
                                </div>
                                <div class="card-footer text-start">
                            <?php echo jdate('Y/m/d H:i:s', $record['time_news']); ?>
                                    <a href="/continue_news?id=<?= $record['id']; ?>" class="btn btn-warning float-end">ادامه خبر
                                        ...</a>
                                </div>
                            </div>
                <?php }
                    ?>
                    </div>
        <?php } else if ($continue[0] == 'nothingMyNews') { ?>
                        <div class="col-md-7 col-12 pl-md-1">
                            <div class="alert alert-dark mt-2 text-center" role="alert">شما هنوز هیچ خبری درج نکرده اید!!!</div>
                        </div>
        <?php } else if ($continue[0] == 'nothingAllNews') { ?>
                            <div class="col-md-7 col-12 pl-md-1">
                                <div class="alert alert-dark mt-2 text-center" role="alert">هیچ خبری در این صفحه وجود ندارد!!!</div>
                            </div>
        <?php } else if ($continue[0] == 'siasy') { ?>
                                <div class="col-md-7 col-12 pl-md-1">
                    <?php
                    foreach ($result as $record) { ?>
                                        <div class="card my-2  bg-dark text-white">
                                            <div class="card-header">
                            <?php echo $record['title']; ?>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title mb-4">
                                <?php echo $record['short_news']; ?>
                                                </h5>
                                                <div>
                                                    <img src="<?= $record['pic_news']; ?>" class="card-img-bottom" alt="...">
                                                </div>
                                                <p class="card-text">
                                <?php //echo $record['full_news']; ?>
                                                </p>
                                            </div>
                                            <div class="card-footer text-start">
                            <?php echo jdate('Y/m/d H:i:s', $record['time_news']); ?>
                                                <a href="/continue_news?id=<?= $record['id']; ?>" class="btn btn-warning float-end">ادامه خبر
                                                    ...</a>
                                            </div>
                                        </div>
                <?php } ?>
                                </div>
        <?php } else if ($continue[0] == 'varzeshi') { ?>
                                    <div class="col-md-7 col-12 pl-md-1">
                    <?php
                    foreach ($result as $record) { ?>
                                            <div class="card my-2  bg-dark text-white">
                                                <div class="card-header">
                            <?php echo $record['title']; ?>
                                                </div>
                                                <div class="card-body">
                                                    <h5 class="card-title mb-4">
                                <?php echo $record['short_news']; ?>
                                                    </h5>
                                                    <div>
                                                        <img src="<?= $record['pic_news']; ?>" class="card-img-bottom" alt="...">
                                                    </div>
                                                    <p class="card-text">
                                <?php //echo $record['full_news']; ?>
                                                    </p>
                                                </div>
                                                <div class="card-footer text-start">
                            <?php echo jdate('Y/m/d H:i:s', $record['time_news']); ?>
                                                    <a href="/continue_news?id=<?= $record['id']; ?>" class="btn btn-warning float-end">ادامه خبر
                                                        ...</a>
                                                </div>
                                            </div>
                <?php } ?>
                                    </div>
        <?php } else if ($continue[0] == 'ejtemaei') { ?>
                                        <div class="col-md-7 col-12 pl-md-1">
                    <?php
                    foreach ($result as $record) { ?>
                                                <div class="card my-2  bg-dark text-white">
                                                    <div class="card-header">
                            <?php echo $record['title']; ?>
                                                    </div>
                                                    <div class="card-body">
                                                        <h5 class="card-title mb-4">
                                <?php echo $record['short_news']; ?>
                                                        </h5>
                                                        <div>
                                                            <img src="<?= $record['pic_news']; ?>" class="card-img-bottom" alt="...">
                                                        </div>
                                                        <p class="card-text">
                                <?php //echo $record['full_news']; ?>
                                                        </p>
                                                    </div>
                                                    <div class="card-footer text-start">
                            <?php echo jdate('Y/m/d H:i:s', $record['time_news']); ?>
                                                        <a href="/continue_news?id=<?= $record['id']; ?>" class="btn btn-warning float-end">ادامه خبر
                                                            ...</a>
                                                    </div>
                                                </div>
                <?php } ?>
                                        </div>
        <?php } else if ($continue[0] == 'comments') { ?>
                                            <div class="col-md-7 col-12 pl-md-1 mt-4">
                <?php foreach ($result as $record) { ?>
                                                    <div class="me-4 bg-secondary">
                                                        <p class="fs-5 text-white mx-4">*
                            <?= $record['comment']; ?> *
                                                        </p>
                                                    </div>
                <?php } ?>
                                                <form class="row g-3 me-3 mt-4" action="/addcomment" method="post">
                                                    <div class="col-9">
                                                        <input type="hidden" name="news_id" class="form-control" value="<?= $news_id['id']; ?>">
                                                        <input type="text" name="comment" class="form-control" placeholder="کامنت خود را وارد کنید...">
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-primary mb-3">ثبت کامنت</button>
                                                    </div>
                                                </form>
                                            </div>
        <?php  } ?>


        <!-- *********************************** -->

        <div class="col-md-3 col-12 pl-md-1">
            <div class="card my-2 bg-dark text-white float-center">
                <a href="https://www.mvmco.ir"><img src="Images/Breaks/breaks1.gif" height="270" class="card-img-top"
                        alt="..."></a>
            </div>
            <div class="card my-2 bg-dark text-white float-center">
                <a href="https://tehrantechsummit.com"><img src="Images/Breaks/breaks2.jpg" height="270" class="card-img-top"
                        alt="..."></a>
            </div>
            <div class="card my-2 float-center">
                <a href="https://b2b.shatelmobile.ir"><img src="Images/Breaks/breaks5left.gif" height="270"
                        class="card-img-top" alt="..."></a>
            </div>
            <div class="my-2 text-center">
                <a href="https://online.inverseschool.com"><img src="Images/Breaks/breaks6left.gif" height="520"
                        style="width:9rem;" class="card-img-top" alt="..."></a>
            </div>
        </div>





    </div>
</div>