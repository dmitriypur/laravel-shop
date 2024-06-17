<div class="page-header-area product-header__title" data-bg-img="">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="page-header-content">
                    <h2 class="title" data-aos="fade-down" data-aos-duration="1000">Регистрация</h2>
                    <nav class="breadcrumb-area" data-aos="fade-down" data-aos-duration="1200">
                        <ul class="breadcrumb">
                            <li><a href="<?=PATH;?>">Главная</a></li>
                            <li class="breadcrumb-sep">/</li>
                            <li>Регистрация</li>
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
                    <form action="<?=PATH;?>/user/signup" method="post" id="register-form">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name">Имя <span class="required">*</span></label>
                                    <input id="name" name="name" class="form-control" type="text" value="<?= isset($_SESSION['form_data']['name']) ? h($_SESSION['form_data']['name']) : '';?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="phone">Телефон <span class="required">*</span></label>
                                    <input id="phone" name="phone" class="form-control" type="tel" value="<?= isset($_SESSION['form_data']['phone']) ? h($_SESSION['form_data']['phone']) : '';?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input id="email" name="email" class="form-control" type="email" value="<?= isset($_SESSION['form_data']['email']) ? h($_SESSION['form_data']['email']) : '';?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="password">Password <span class="required">*</span></label>
                                    <input id="password" name="password" class="form-control" type="password" value="<?= isset($_SESSION['form_data']['password']) ? h($_SESSION['form_data']['password']) : '';?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-5">
                                    <label for="address" class="form-label">Адрес</label>
                                    <textarea class="form-control" name="address" id="address" rows="3"><?= isset($_SESSION['form_data']['address']) ? h($_SESSION['form_data']['address']) : '';?></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group mb--0">
                                    <button class="btn-register" type="submit">Регистрация</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                </div>
            </div>
        </div>
    </div>
</section>