<section class=" bg-dark" >
<form action="/register" method="post" class="mb-0" >
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong bg-secondary" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">فرم عضویت</h3>
            <hr class="my-4">
            <div class="form-outline mb-4 ">
            <label class="form-label">نام کاربری</label>
              <input name="user_name" type="text" class="form-control form-control-lg" style="background-color: #eea;" placeholder="نام کاربری" required/>
            </div>
            <div class="form-outline mb-4 ">
            <label class="form-label">ایمیل</label>
              <input name="email" type="email" class="form-control form-control-lg" style="background-color: #eea;" placeholder="ایمیل" required/>
            </div>
            <div class="form-outline mb-4">
            <label class="form-label">رمز ورود</label>
              <input name="user_password" type="password" class="form-control form-control-lg" style="background-color: #eea;" placeholder="رمز ورود" required/>
            </div>
            <div class="form-outline mb-4">
            <hr class="my-4">
            <button class="btn btn-warning btn-lg btn-block w-100" type="submit">ثبت نام</button>
            <hr class="my-4">
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>