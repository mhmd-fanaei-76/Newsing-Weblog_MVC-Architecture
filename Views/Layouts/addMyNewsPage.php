<section class=" bg-dark">
    <form action="/addMyNews" method="post" class="mb-0" enctype="multipart/form-data">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <h3 class="text-white text-center">فرم درج خبر</h3>
                <div class="col-6">
                    <div class="card shadow-2-strong bg-secondary" style="border-radius: 1rem;">
                        <div class="card-body p-1 py-3 text-center">
                            <div class="form-outline mb-4">
                                <label class="form-label">عنوان خبر</label>
                                <input name="title" type="text" class="form-control form-control-lg"
                                    style="background-color: #eea;" placeholder="عنوان خبر" required />
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
                                    style="background-color: #eea;" placeholder="خلاصه خبر" required />
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
                                    <textarea rows="15" style="background-color: #eea;" placeholder="متن خبر"
                                        type="text" class="form-control" name="full_news" required></textarea>
                                </div>
                                <div class="form-group">
                                    <select name="category" class="form-select form-select-lg mt-1 w-25 mb-2"
                                        style="background-color: #eea;" required>
                                        <option value="">انتخاب نوع خبر</option>
                                        <option value="siasy">سیاسی</option>
                                        <option value="varzeshi">ورزشی</option>
                                        <option value="ejtemaei">اجتماعی</option>
                                    </select>
                                </div>

                            </div>
                            <div class="float-end  mb-3">
                                <label class="form-label float-end">تصویر خبر</label>
                                <input name="pic_news" class="form-control" style="background-color: #eea;" type="file"
                                    required>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center mt-3">
                    <div class="form-outline mb-2">
                        <button class="btn btn-warning btn-lg btn-block w-25" type="submit">ثبت خبر</button>
                    </div>
                </div>

            </div>
        </div>
    </form>
</section>