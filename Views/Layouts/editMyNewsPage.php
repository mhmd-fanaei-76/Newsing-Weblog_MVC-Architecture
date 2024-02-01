<section class=" bg-dark">
    <form action="/editMyNews" method="post" class="mb-0" enctype="multipart/form-data">
        <div class="container py-5">
            <?php foreach ($result as $record) { ?>
                <div class="row d-flex justify-content-center align-items-center">
                    <h3 class="text-white text-center">فرم ویرایش خبر</h3>
                    <div class="col-6">
                        <div class="card shadow-2-strong bg-secondary" style="border-radius: 1rem;">
                            <div class="card-body p-1 py-3 text-center">
                                <div class="form-outline mb-4">
                                    <label class="form-label">عنوان خبر</label>
                                    <input name="id" type="hidden" class="form-control form-control-lg"
                                        value="<?= $record['id']; ?>" />
                                    <input name="title" type="text" class="form-control form-control-lg"
                                        value="<?= $record['title']; ?>" style="background-color: #eea;"
                                        placeholder="عنوان خبر" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="card shadow-2-strong bg-secondary" style="border-radius: 1rem;">
                            <div class="card-body p-1 py-3 text-center">
                                <div class="form-outline mb-4 ">
                                    <label class="form-label">خلاصه خبر</label>
                                    <input name="short_news" type="text" class="form-control form-control-lg"
                                        value="<?= $record['short_news']; ?>" style="background-color: #eea;"
                                        placeholder="خلاصه خبر" required />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 mt-1">
                        <div class="card shadow-2-strong bg-secondary" style="border-radius: 1rem;">
                            <div class="card-body p-1 py-2 text-center">
                                <div class="form-outline mb-4">
                                    <label class="form-label">متن خبر</label>
                                    <div class="input-group">
                                        <textarea rows="15"
                                            style="background-color: #eea;" placeholder="متن خبر" type="text"
                                            class="form-control" name="full_news" required><?= $record['full_news']; ?></textarea>
                                    </div>

                                </div>
                                <div class="float-end  mb-3">
                                    <label class="form-label">تصویر جدید خبر</label>
                                    <input name="pic_news" class="form-control" style="background-color: #eea;" type="file"
                                        required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 text-center mt-3">
                        <div class="form-outline mb-2">
                            <button class="btn btn-warning btn-lg btn-block w-25" type="submit">ثبت ویرایش</button>
                        </div>
                    </div>

                </div>

            <?php } ?>

        </div>
    </form>
</section>