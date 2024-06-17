<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->getMeta(); ?>
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= PATH ?>/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <!--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">-->
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= PATH ?>/adminlte/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/adminlte/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/adminlte/dist/css/main.css">
    <link rel="stylesheet" href="<?= PATH ?>/adminlte/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="<?= PATH ?>/adminlte/plugins/dropzone/min/dropzone.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="<?= PATH; ?>" class="brand-link">
            <span class="brand-text font-weight-light">На сайт</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= PATH ?>/adminlte/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                         alt="User Image">
                </div>
                <div class="info">
                    <a href="<?= ADMIN; ?>" class="d-block">Администратор</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="<?= ADMIN ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>Главная</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= ADMIN ?>/order" class="nav-link">
                            <i class="nav-icon fas fa-cart-arrow-down"></i>
                            <p>Заказы</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Категории
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/category" class="nav-link">
                                    <p>Список категорий</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/category/add" class="nav-link">
                                    <p>Добавить категорию</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tshirt"></i>
                            <p>
                                Товары
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/product" class="nav-link">
                                    <p>Список товаров</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/product/add" class="nav-link">
                                    <p>Добавить товар</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?= ADMIN ?>/cache" class="nav-link">
                            <i class="nav-icon fas fa-save"></i>
                            <p>Кэширование</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Пользователи
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/user" class="nav-link">
                                    <p>Список пользователей</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/user/add" class="nav-link">
                                    <p>Добавить пользователя</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-filter"></i>
                            <p>
                                Фильтры
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/filter/attribute-group" class="nav-link">
                                    <p>Группы фильтров</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/filter/attribute" class="nav-link">
                                    <p>Фильтры</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>
                                Страницы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/page" class="nav-link">
                                    <p>Список страниц</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/page/add" class="nav-link">
                                    <p>Добавить страницу</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-images"></i>
                            <p>
                                Слайдер
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/slide" class="nav-link">
                                    <p>Список слайдов</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= ADMIN ?>/slide/add" class="nav-link">
                                    <p>Добавить слайд</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5>Ошибка!</h5>
                        <?= $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    </div>
                <?php endif; ?>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?= $_SESSION['success'];
                        unset($_SESSION['success']); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?= $content; ?>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
    const path = '<?=PATH;?>',
        adminpath = '<?=ADMIN;?>';
</script>
<!-- jQuery -->
<script src="<?= PATH ?>/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= PATH ?>/adminlte/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= PATH ?>/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= PATH ?>/adminlte/dist/js/adminlte.js"></script>
<script src="<?= PATH ?>/adminlte/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?= PATH ?>/adminlte/plugins/ckeditor/ckeditor.js"></script>
<script src="<?= PATH ?>/adminlte/plugins/ckeditor/translations/ru.js"></script>
<script src="<?= PATH ?>/adminlte/plugins/ckfinder/ckfinder.js"></script>
<script src="<?= PATH ?>/adminlte/plugins/select2/js/select2.full.min.js"></script>
<script src="<?= PATH ?>/adminlte/plugins/dropzone/dropzone.js"></script>
<script src="<?= PATH ?>/adminlte/dist/js/main.js"></script>
<script>
    Dropzone.autoDiscover = false;
    if (document.getElementById('dropzone')) {
        const myDropzone = new Dropzone("#dropzone", {
            method: "POST",
            url: adminpath + "/product/add-image",
            addRemoveLinks: true,
            uploadMultiple: false,
            maxFiles: 1,
            filesizeBase: 1024,
            // parallelUploads: 1,
            dictDefaultMessage: 'Загрузить фото',
            dictCancelUpload: 'Ошибка загрузки',
            dictRemoveFile: 'Удалить файл',
            sending: function (file, xhr, formData) {
                formData.append("filesize", file.size);
                formData.append("name", 'single');
            },
            success: function (file, response, e) {
                var res = JSON.parse(response);
                if (res.error) {
                    $(file.previewTemplate).children('.dz-error-mark').css('opacity', '1')
                }
            }
        });
    }

    if (document.getElementById('dropzone2')) {
        const myDropzone2 = new Dropzone("#dropzone2", {
            method: "POST",
            url: adminpath + "/product/add-image",
            addRemoveLinks: true,
            uploadMultiple: false,
            maxFiles: 10,
            filesizeBase: 1024,
            autoProcessQueue: true,
            // parallelUploads: 12,
            dictDefaultMessage: 'Загрузить фото',
            dictCancelUpload: 'Ошибка загрузки',
            dictRemoveFile: 'Удалить файл',
            init: function () {
                this.on("maxfilesexceeded", function (file) {
                    this.removeAllFiles();
                    this.addFile(file);
                })
            },
            sending: function (file, xhr, formData) {
                formData.append("filesize", file.size);
                formData.append("name", 'multy');
            },
            success: function (file, response, e) {
                var res = JSON.parse(response);
                if (res.error) {
                    $(file.previewTemplate).children('.dz-error-mark').css('opacity', '1')
                }
            }
        });
    }

    if(document.querySelector( '#editor1' )){
        ClassicEditor
            .create( document.querySelector( '#editor1' ), {
                // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
                ckfinder: {
                    // To avoid issues, set it to an absolute path that does not start with dots, e.g. '/ckfinder/core/php/(...)'
                    uploadUrl: '../core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
                toolbar: {
                    items: [
                        'ckfinder', '|',
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'outdent', 'indent', '|',
                        'undo', 'redo',
                        '-',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                        'alignment', '|',
                        'link', 'insertTable', 'codeBlock', 'htmlEmbed', '|',
                        'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                        'textPartLanguage', '|',
                        'sourceEditing'
                    ]
                },
                htmlEmbed: {
                    showPreviews: true
                },
                language: 'ru'
            } )
            .then( editor => {
                window.editor = editor;
            } )
            .catch( err => {
                console.error( err.stack );
            } );
    }

</script>
</body>
</html>
