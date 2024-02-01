<section class="bg-dark" >
<form action="/login" method="post" class="mb-0">
  <div class="container py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong bg-secondary" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">فرم ورود</h3>
            <hr class="my-4">
            <div class="form-outline mb-4 ">
            <label class="form-label">نام کاربری</label>
              <input name="user_name" type="text" class="form-control form-control-lg" style="background-color: #eea;" placeholder="نام کاربری" required/>
            </div>
            <div class="form-outline mb-4">
            <label class="form-label">رمز ورود</label>
              <input name="user_password" type="password" class="form-control form-control-lg" style="background-color: #eea;" placeholder="رمز ورود" required/>
            </div>
            <hr class="my-4">
            <button class="btn btn-warning btn-lg btn-block" type="submit">Login</button>
            <hr class="my-4">
            <h5>برای <a href="/register" class="text-decoration-none text-warning"> ثبت نام </a>کلیک کنید </h5>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</section>