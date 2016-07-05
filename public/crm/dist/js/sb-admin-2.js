$(function() {
    $('#side-menu').metisMenu();
});

//Loads the correct sidebar on window load,
//collapses the sidebar on window resize.
// Sets the min-height of #page-wrapper to window size
$(function() {
    $(window).bind("load resize", function () {
        topOffset = 50;
        width = (this.window.innerWidth > 0) ? this.window.innerWidth : this.screen.width;
        if (width < 768) {
            $('div.navbar-collapse').addClass('collapse');
            topOffset = 100; // 2-row-menu
        } else {
            $('div.navbar-collapse').removeClass('collapse');
        }

        height = ((this.window.innerHeight > 0) ? this.window.innerHeight : this.screen.height) - 1;
        height = height - topOffset;
        if (height < 1) height = 1;
        if (height > topOffset) {
            $("#page-wrapper").css("min-height", (height) + "px");
        }
    });

    var url = window.location;
    var element = $('ul.nav a').filter(function () {
        return this.href == url || url.href.indexOf(this.href) == 0;
    }).addClass('active').parent().parent().addClass('in').parent();
    if (element.is('li')) {
        element.addClass('active');
    }

    $('#newPhone').keyup(function () {
        if ($('#customerId').length) {
            $('#customerId').val('');
        }

        $('#newName').removeAttr('disabled');

        if ($(this).val().length != 10) {
            $(this).parent().parent().attr('class', 'col-lg-6 has-error');
            $('#newPhoneError').attr('class', 'control-label');

            return false;
        }

        $(this).parent().parent().attr('class', 'col-lg-6');
        $('#newPhoneError').attr('class', 'control-label hide');
    });

    $('#newName').keyup(function () {
        $(this).parent().attr('class', 'col-lg-6');
        $('#newNameError').attr('class', 'control-label hide');
    });

    $('#addNewCustomer').click(function () {
        if ($('#newPhone').val().length != 10) {
            var errorText = '<div class="alert alert-danger"><strong>Количество цифр телефона не равно 10!</strong> ' +
                'Проверьте правильность ввода номера телефона.</div>';
            $('#newPhone').parent().parent().attr('class', 'col-lg-6 has-error');
            $('#newPhoneError').attr('class', 'control-label');
            $('#errorModalBody').html(errorText);
            $('#errorModal').modal();

            return false;
        }

        if ($('#newName').val().length == 0) {
            var errorText = '<div class="alert alert-danger"><strong>Не указано наименование!</strong> ' +
                'Проверьте зополненность поля наименование.</div>';
            $('#newName').parent().attr('class', 'col-lg-6 has-error');
            $('#newNameError').attr('class', 'control-label');
            $('#errorModalBody').html(errorText);
            $('#errorModal').modal();

            return false;
        }

        $.ajax({
            type: 'POST', url: '/crm/ajax/check_user_phone', async: true, data: {
                phone: $('#newPhone').val()
            },
            success: function (data) {
                if (data == 1) {
                    var errorText = '<div class="alert alert-danger"><strong>Клиент с таким номером телефона есть в базе!</strong> ' +
                        'Проверьте правильность ввода номера телефона.</div>'
                    $('#errorModalBody').html(errorText);
                    $('#errorModal').modal();

                    return false;
                }

                addCustomerForm.submit();
            }
        });
    });

    $('#redactNewCustomer').click(function () {
        if ($('#redactName').val().length == 0) {
            var errorText = '<div class="alert alert-danger"><strong>Не указано наименование!</strong> ' +
                'Проверьте зополненность поля наименование.</div>';
            $('#redactName').parent().attr('class', 'col-lg-6 has-error');
            $('#redactNameError').attr('class', 'control-label');
            $('#errorModalBody').html(errorText);
            $('#errorModal').modal();

            return false;
        }

        redactCustomerForm.submit();
    });

    $('#redactOrderClient').click(function () {
        if ($('#redactName').val().length == 0) {
            var errorText = '<div class="alert alert-danger"><strong>Не указано имя!</strong> ' +
                'Проверьте заполненность поля имя.</div>';
            $('#redactName').parent().attr('class', 'col-lg-6 has-error');
            $('#redactNameError').attr('class', 'control-label');
            $('#errorModalBody').html(errorText);
            $('#errorModal').modal();

            return false;
        }

        redactOrderClientForm.submit();
    });

    $('#redactActionClient').click(function () {
        var errorText = '';

        if ($('#redactName').val().length == 0) {
            errorText = '<div class="alert alert-danger"><strong>Не указано имя!</strong> ' +
                'Проверьте заполненность поля имя.</div>';

            showErrorModal(errorText, 'redactName');

            return false;
        }

        if ($('#redactCity').length && $('#redactCity').val().length == 0) {
            errorText = '<div class="alert alert-danger"><strong>Не указан адрес!</strong> ' +
                'Проверьте заполненность поля адрес.</div>';

            showErrorModal(errorText, 'redactCity');

            return false;
        }

        if ($('#redactTk').length && $('#redactTk').val().length == 0) {
            errorText = '<div class="alert alert-danger"><strong>Не указана транспортная компания!</strong> ' +
                'Проверьте заполненность поля транспортная компания.</div>';

            showErrorModal(errorText, 'redactTk');

            return false;
        }

        redactActionClientForm.submit();
    });

    $('#addProductRowBtn').click(function () {
        var rowLength = $('.product-row').length * 1;

        $('#redactProductForm').append('<div class="form-group product-row" id="productRow' + (rowLength + 1) + '" data-row="' + (rowLength + 1) + '">' +
            '<input class="col-lg-6-important form-control" id="productName" name="productName[]" onkeyup="initTypeaheadProductName($(this));" onchange="getCurrentTypeahead($(this));" placeholder="Название" autocomplete="off">' +
            '<input class="col-lg-2-important form-control" id="productQuantity" name="productQuantity[]" placeholder="Кол-во" autocomplete="off">' +
            '<input class="col-lg-2-important form-control" id="productPrice" name="productPrice[]" placeholder="Цена" autocomplete="off">' +
            '<button class="btn btn-default col-lg-1-important form-control" onclick="$(\'#productRow' + (rowLength + 1) + '\').remove();"><i class="fa fa-remove fa-fw"></i></button>' +
            '<input type="hidden" name="storeRemainId[]" id="storeRemainId">' +
        '</div>');
    });

    $('#dataTables-sales').dataTable();

    $('#addSaleProductRow').click(function(){
        var rowCount = $('.newSaleProductRow').length;
        var newRowCount = rowCount + 1;

        var html = '<p id="row-' + newRowCount + '" class="newSaleProductRow">' +
            '<input type="hidden" id="newSaleProductCode' + newRowCount + '" name="newSaleProductCode[]">' +
            '<input class="col-lg-12-important form-control newSaleProductName" id="newSaleProductName' + newRowCount + '"' +
            'data-row="' + newRowCount + '"' +
            'name="newSaleProductName[]" placeholder="Название товара" autocomplete="off">' +
            '</p>' +
            '<script>' +
            '$("#newSaleProductName' + newRowCount +'").typeahead({' +
                'source: function (item, process) {' +
                    'return $.get("/crm/ajax/find_product_by_item", {' +
                        'item: item' +
                    '}, function (response) {' +
                        'var data = [];' +
                        'var parseResponse = JSON.parse(response);' +
                        'for (var i in parseResponse) {' +
                            'data.push(parseResponse[i].item_id + "#" + parseResponse[i].full_size + " " + parseResponse[i].model);' +
                        '}' +
                        'return process(data);' +
                    '});' +
                '},' +
                'highlighter: function (item) {' +
                    'var parts = item.split("#");' +
                    'var html = "<div class=\'typeahead\'>" +' +
                        '"<div class=\'pull-left margin-small\'>" +' +
                        '"<div class=\'text-left\'><strong>" + parts[0] + "#" + parts[1] + "</strong></div>" +' +
                        '"</div>" +' +
                        '"<div class=\'clearfix\'></div>" +' +
                        '"</div>";' +
                    'return html;' +
                '},' +
                'updater: function (item) {' +
                    'var parts = item.split("#");' +
                    '$("#newSaleProductCode' + newRowCount +'").val(parts[0]);' +
                    'return parts[1];' +
                '}' +
            '});' +
        '</script>';

        $('#newSaleProductList').append(html);
    });

    $('.redactProductBtn').click(function(){
        $('#redactProductModal #productId').val($(this).data('id'));
        $('#redactProductModal #productName').val($('#rowProduct' + $(this).data('id') + ' .product-name-cell').text());
        $('#redactProductModal #productQuantity').val($('#rowProduct' + $(this).data('id') + ' .product-quantity-cell').text());
        $('#redactProductModal #productPrice').val($('#rowProduct' + $(this).data('id') + ' .product-price-cell').text());
        $('#redactProductModal').modal('toggle');
    });

    $('#addActionModal #newPhone').typeahead({
        source: function (item, process) {
            return $.post('/ajax/find_customer_by_phone', {
                phone: item
            }, function (response) {
                var data = [];
                var parseResponse = JSON.parse(response);

                for (var i in parseResponse) {
                    data.push(parseResponse[i].customers_id + '#' + parseResponse[i].name + '#' + parseResponse[i].phone + '#' + parseResponse[i].email);
                }

                return process(data);
            });
        },
        highlighter: function (item) {
            var parts = item.split('#');
            var html = '<div class="typeahead">' +
                '<div class="pull-left margin-small">' +
                '<div class="text-left"><strong>' + parts[2] + '</strong></div>' +
                '</div>' +
                '<div class="clearfix"></div>' +
                '</div>';

            return html;
        },
        updater: function (item) {
            var parts = item.split('#');
            $('#customerId').val(parts[0]);
            $('#newName').val(parts[1]).attr('disabled', 'disabled');
            $('#newEmail').val(parts[3]);

            $('#newPhone').parent().parent().attr('class', 'col-lg-6');
            $('#newPhoneError').attr('class', 'control-label hide');

            return parts[2];
        }
    });

    $('#addActionModal #newName').keyup(function () {
        if($(this).val().length != 0) {
            $('#newNameError').attr('class', 'control-label hide');
            $(this).parent().attr('class', 'col-lg-12');
        } else {
            $('#newNameError').attr('class', 'control-label');
            $(this).parent().attr('class', 'col-lg-12 has-error');
        }
    });

    $('#addNewAction').click(function () {
        if ($('#newType').val() == 0) {
            $('#newActionError').attr('class', 'control-label');

            return false;
        }

        if ($('#newName').val().length == 0) {
            $('#newNameError').attr('class', 'control-label');

            return false;
        }

        addActionForm.submit();
    });

    $('#addStoreProductModal #newStoreProductBrand').typeahead({
        source: function (item, process) {
            return $.post('/ajax/find_brand_by_subbrand', {
                brand: item
            }, function (response) {
                var data = [];
                var parseResponse = JSON.parse(response);

                for (var i in parseResponse) {
                    data.push(parseResponse[i].id + '#' + parseResponse[i].name);
                }

                return process(data);
            });
        },
        highlighter: function (item) {
            var parts = item.split('#');
            return '<div class="typeahead">' +
                '<div class="pull-left margin-small">' +
                '<div class="text-left"><strong>' + parts[1] + '</strong></div>' +
                '</div>' +
                '<div class="clearfix"></div>' +
                '</div>';
        },
        updater: function (item) {
            var parts = item.split('#');

            $('#newBrand').parent().parent().attr('class', 'col-lg-6');
            $('#newBrandError').attr('class', 'control-label hide');

            return parts[1];
        }
    });

    $('#addNewStoreProduct').click(function () {
        if (checkErrorField('#newStoreProductName', 12, 'Не указано название товара!', 'Проверьте заполненность поля название товара.')) {
            return false;
        }

        if (checkErrorField('#newStoreProductBrand', 6, 'Не указан бренд!', 'Проверьте заполненность поля бренд.')) {
            return false;
        }

        if (checkErrorField('#newStoreProductArticle', 6, 'Не указан артикул!', 'Проверьте заполненность поля артикул.')) {
            return false;
        }

        if (checkErrorField('#newStoreProductDistributor', 12, 'Не указан поставщик!', 'Проверьте заполненность поля поставщик.')) {
            return false;
        }

        if (checkErrorField('#newStoreProductPrice', 6, 'Не указана цена!', 'Проверьте заполненность поля цена.')) {
            return false;
        }

        if (checkErrorField('#newStoreProductQuantity', 6, 'Не указано количество!', 'Проверьте заполненность поля количество.')) {
            return false;
        }

        addStoreProductForm.submit();
    });

    $('.check-field').keyup(function () {
        if($(this).val().length != 0) {
            $($(this).id + 'Error').attr('class', 'control-label hide');
            $(this).parent().attr('class', 'col-lg-' + $(this).data('col-num'));
        } else {
            $($(this).id + 'Error').attr('class', 'control-label');
            $(this).parent().attr('class', 'col-lg-' + $(this).data('col-num') + ' has-error');
        }
    });
    
    $('.markup-type').change(function () {
        setMarkup($(this).data('key'));
    });

    $('.markup-value').blur(function () {
        setMarkup($(this).data('key'));
    });

    $('.form-control').on("keyup", function () {
        var parentClass = $(this).parent().attr('class');

        if (parentClass.indexOf('has-error') != -1) {
            parentClass = parentClass.replace(/has-error/g, "");

            $(this).parent().attr('class', parentClass);
            $(this).parent().find('.control-label').attr('class', 'control-label hide');
        }
    });
});

function checkErrorField(id, colNum, strong, text) {
    if ($(id).val() == '') {
        $(id).parent().attr('class', 'col-lg-' + colNum + ' has-error');
        $(id + 'Error').attr('class', 'control-label');
        $('#errorModalBody').html('<div class="alert alert-danger"><strong>' + strong + '</strong> ' + text + '</div>');
        $('#errorModal').modal();

        return true;
    }

    return false;
}

function setMarkup(key) {
    var distributor_id = $('#row' + key + ' .markup-distributor').val();
    var type = $('#row' + key + ' .markup-type').val();
    var markup = $('#row' + key + ' .markup-value').val();

    $.ajax({
        type: 'POST', url: '/ajax/set_markup', async: true, data: {
            distributor_id: distributor_id,
            type: type,
            markup: markup
        }
    });
}

function initTypeahead($newSaleProductName) {
    $newSaleProductName.typeahead({
        source: function (item, process) {
            return $.get('/crm/ajax/find_product_by_item', {
                item: item
            }, function (response) {
                var data = [];
                var parseResponse = JSON.parse(response);

                for (var i in parseResponse) {
                    data.push(parseResponse[i].item_id + '#' + parseResponse[i].full_size + ' ' + parseResponse[i].model);
                }

                return process(data);
            });
        }
    });

    return false;
}

function initTypeaheadProductName($input)
{
    $input.typeahead({
        source: function (item, process) {
            return $.post('/ajax/find_productname_by_subproductname', {
                name: item
            }, function (response) {
                var data = [];
                var parseResponse = JSON.parse(response);

                for (var i in parseResponse) {
                    data.push(
                        parseResponse[i].id +
                        '#' + parseResponse[i].full_product_name +
                        '#' + parseResponse[i].markup +
                        '#' + parseResponse[i].price +
                        '#' + parseResponse[i].distributor_name +
                        '#' + parseResponse[i].quantity
                    );
                }

                return process(data);
            });
        },
        highlighter: function (item) {
            var parts = item.split('#');

            return '<div class="typeahead">' +
                '<div class="pull-left margin-small">' +
                '<div class="text-left"><strong>' + parts[1] + ' Поставщик: ' + parts[4] +' Наличие на складе: ' + parts[5] +'</strong></div>' +
                '</div>' +
                '<div class="clearfix"></div>' +
                '</div>';
        },
        updater: function (item) {
            var parts = item.split('#');

            return parts[1];
        }
    });
}

function getCurrentTypeahead($input) 
{
    var current = $input.typeahead("getActive");
    var parts = current.split('#');

    if (parts.length < 2) {
        return false;
    }

    var row = $input.parent().data('row');

    $('#productRow' + row + ' #storeRemainId').val(parts[0]);
    $('#productRow' + row + ' #productPrice').val((1 + (parts[2] / 100)) * parts[3]);
}
function initChange($newSaleProductName) {
    var current = $newSaleProductName.typeahead("getActive");
    var parts = current.split('#');
    var rowId = $newSaleProductName.data('row');

    $('#newSaleProductCode' + rowId).val(parts[0]);
    $newSaleProductName.val(parts[1]);
}

function showErrorModal(errorText, id) {
    var errorClass = $('#' + id).parent().attr('class');

    $('#' + id).parent().attr('class', errorClass + ' has-error');
    $('#' + id + 'Error').attr('class', 'control-label');
    $('#errorModalBody').html(errorText);
    $('#errorModal').modal();
}