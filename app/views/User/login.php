<div class="page-header-area product-header__title" data-bg-img="">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Авторизация</h2>
                    <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                        <ul class="breadcrumb">
                            <li><a href="<?=PATH;?>">Главная</a></li>
                            <li class="breadcrumb-sep">/</li>
                            <li>Авторизация</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Page Header Area Wrapper ==-->

<!--== Start My Account Area Wrapper ==-->
<section class="account-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="register-form-content">
                    <form action="<?=PATH;?>/user/login" method="post">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="login">Логин <span class="required">*</span></label>
                                    <input id="login" name="login" class="form-control" type="text">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password <span class="required">*</span></label>
                                    <input id="password" name="password" class="form-control" type="password">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb--0">
                                    <button class="btn-register" type="submit">Войти</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>