$('.delete').on('click', function(){
    let res = confirm('Подтвердить');
    if(!res) return false;
});

$('.nav-link').each(function(el){
    let linkHref = this.href;
    let adminLocation = window.location.protocol + '//' + window.location.host + window.location.pathname;
    if(adminLocation == linkHref){
        $(this).addClass('active');
        if($(this).closest('.nav-treeview')){
            $(this).closest('.nav-treeview').prev().addClass('active')
            $(this).closest('.nav-treeview').prev().parent().addClass('menu-open')
        }
    }
})

$('#reset-filter').click(function(){
    $('.product-filter input[type=radio]').prop('checked', false);
})

$('.select2').select2({
    // minimumInputLength: 2,
    cache: true,
    ajax: {
        url: adminpath + '/product/related-product',
        delay: 250,
        dataType: 'json',
        data: function (params) {
            return {
                q: params.term,
                page: params.page
            };
        },
        processResults: function (data, params) {
            return {
                results : data.items,
            }
        }
    }
});

// $(function () {
//     $('#editor1').summernote();
// })



$('.del-item').on('click', function (){
    let $this = $(this),
        id = $this.data('id'),
        src = $this.data('src');
    $.ajax({
        url: adminpath + '/product/delete-gallery',
        data: {id:id, src: src},
        type: 'POST',
        success: function (res) {
            if(res == 1){
                $this.parent().fadeOut();
            }
        },
        error: function () {
            alert('Ошибка');
        }
    })
})
$('.del-img').on('click', function (){
    let $this = $(this),
        id = $this.data('id'),
        src = $this.data('src');
    $.ajax({
        url: adminpath + '/product/delete-image',
        data: {id:id, src: src},
        type: 'POST',
        success: function (res) {
            if(res == 1){
                $this.parent().fadeOut();
                $this.closest('.dropzone').attr('id', 'dropzone');
                let block = `<div class="dz-default dz-message"><button class="dz-button" type="button">Загрузить фото</button></div>`;
                $this.closest('.dropzone').append(block);

                const myDropzone = new Dropzone("#dropzone", {
                    method: "POST",
                    url: adminpath + "/product/add-image",
                    addRemoveLinks: true,
                    uploadMultiple: false,
                    maxFiles: 1,
                    filesizeBase: 1024,
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
        },
        error: function () {
            alert('Ошибка');
        }
    })
})
//
// $('#add').on('submit', function () {
//     if(!isNumeric($('#category_id').val())){
//         alert('Выберите категорию');
//         return false;
//     }
// })
//
// function isNumeric(n){
//     return !isNaN(parseFloat(n)) && isFinite(n);
// }

$('.status-list').on('change', function (e) {
    let $this = $(this);
    let id = $this.data('id');
    let status;
    let hit;

    if(this.checked){
        if(this.name == 'status'){
            status = 1;
        }
        if(this.name == 'hit'){
            hit = 1;
        }
    }else{
        if(this.name == 'status'){
            status = 0;
        }
        if(this.name == 'hit'){
            hit = 0;
        }
    }

    $.ajax({
        url: path + '/admin/product/edit-list',
        method: 'POST',
        data: {id: id, status: status, hit: hit},
        success: function (res) {
            console.log(res);
        },
        error: function (e) {
            alert('Ошибка! Попробуйте еще раз');
        }
    })
})