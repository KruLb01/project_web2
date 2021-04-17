let currentPUDefault = 1;
let currentPADefault = 1;
let currentPSDefault = 1;
let currentPPDefault = 1;

$(".logout-btn").click(function() {
    $.get('./templates/controller.php', {action:"logout"} , function(data) {
        if (data==true) {
            window.location = './templates/login.php';
        }
    })
})

$("#top-menu-btn").click(function() {
    location.href = "./index.php";
})
$("#view-info-btn").click(function() {
    location.href = "?action=view-info-user";
})
$(".dashboard-content-box").click(function() {
    var indx = $(tdis).index();
    var link = "";
    if (indx == 0) link = "#customers";
    if (indx == 1) link = "#users";
    if (indx == 2) link = "#sales";
    if (indx == 3) link = "#products";
    location.href = link;
})

// Customers
$('.default-users-pagination').first().click(function() {
    if ($('.default-users-pagination').length!=1) {
        $('#previous-btn-users').addClass('disable');
        $('#next-btn-users').removeClass('disable');
    }
})
$('.default-users-pagination').last().click(function() {
    if ($('.default-users-pagination').length!=1) {
        $('#next-btn-users').addClass('disable');
        $('#previous-btn-users').removeClass('disable');
    }
})

$('#previous-btn-users').click(function() {
    currentPUDefault -= 1;
    $('#next-btn-users').removeClass('disable');
    setSelectedP(currentPUDefault-1);
    $.get('handle/hDefault-content.php', {cid:currentPUDefault}, function(data) {
        $('.dashboard-content-table-item').eq(0).html(data);
        if (currentPUDefault == 1) {
            $('#previous-btn-users').addClass('disable');
        }
    })
})
$('#next-btn-users').ready(function() {             
    if($('.default-users-pagination').length==1) {
        $('#next-btn-users').addClass('disable');
    }
})
$('#next-btn-users').click(function() {
    currentPUDefault = parseInt(currentPUDefault) + 1;
    $('#previous-btn-users').removeClass('disable');
    setSelectedP(currentPUDefault-1);
    $.get('handle/hDefault-content.php', {cid:currentPUDefault}, function(data) {
        $('.dashboard-content-table-item').eq(0).html(data);
        if (currentPUDefault == $('.default-users-pagination').length) {
            $('#next-btn-users').addClass('disable');
        }
    })
})

$('.default-users-pagination').click(function() {
    currentPUDefault = $(this).text();
    $('.default-users-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $(this).addClass('dashboard-content-table-pagination-btn-selected');
    if($(this)[0] != $('.default-users-pagination').first()[0] && $(this)[0] != $('.default-users-pagination').last()[0]){
        $('#previous-btn-users').removeClass('disable');
        $('#next-btn-users').removeClass('disable');
    }
    $.get('handle/hDefault-content.php', {cid:$(this).text()}, function(data) {
        $('.dashboard-content-table-item').eq(0).html(data);
    })
})

$('.dashboard-content-table-item').eq(0).ready(function() {
    $.get('handle/hDefault-content.php', {cid:'1'}, function(res) {
        if (res==false) {
            $('.no-things-available').eq(0).html("<span>No customers is available !</span>");
            $('.dashboard-content-table-pagination').eq(0).html('');
        } else {
            $('.dashboard-content-table-item').eq(0).html(res);
        }
    })
})

function setSelectedP(current) {
    $('.default-users-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $('.default-users-pagination').eq(current).addClass('dashboard-content-table-pagination-btn-selected');
}

// Users-managers
$('.default-admin-pagination').first().click(function() {
    if ($('.default-admin-pagination').length!=1) {
        $('#previous-btn-admin').addClass('disable');
        $('#next-btn-admin').removeClass('disable');
    }
})
$('.default-admin-pagination').last().click(function() {
    if ($('.default-admin-pagination').length!=1) {
        $('#next-btn-admin').addClass('disable');
        $('#previous-btn-admin').removeClass('disable');
    }
})

$('#previous-btn-admin').click(function() {
    currentPADefault -= 1;
    $('#next-btn-admin').removeClass('disable');
    setSelectedA(currentPADefault-1);
    $.get('handle/hDefault-content.php', {uid:currentPADefault}, function(data) {
        $('.dashboard-content-table-item').eq(1).html(data);
        if (currentPADefault == 1) {
            $('#previous-btn-admin').addClass('disable');
        }
    })
})
$('#next-btn-admin').ready(function() {             
    if($('.default-admin-pagination').length==1) {
        $('#next-btn-admin').addClass('disable');
    }
})
$('#next-btn-admin').click(function() {    
    currentPADefault = parseInt(currentPADefault) + 1;
    $('#previous-btn-admin').removeClass('disable');
    setSelectedA(currentPADefault-1);
    $.get('handle/hDefault-content.php', {uid:currentPADefault}, function(data) {
        $('.dashboard-content-table-item').eq(1).html(data);
        if (currentPADefault == $('.default-admin-pagination').length) {
            $('#next-btn-admin').addClass('disable');
        }
    })
})

$('.default-admin-pagination').click(function() {
    currentPADefault = $(this).text();
    $('.default-admin-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $(this).addClass('dashboard-content-table-pagination-btn-selected');
    if($(this)[0] != $('.default-admin-pagination').first()[0] && $(this)[0] != $('.default-admin-pagination').last()[0]){
        $('#previous-btn-admin').removeClass('disable');
        $('#next-btn-admin').removeClass('disable');
    }
    $.get('handle/hDefault-content.php', {uid:$(this).text()}, function(data) {
        $('.dashboard-content-table-item').eq(1).html(data);
    })
})

$('.dashboard-content-table-item').eq(1).ready(function() {
    $.get('handle/hDefault-content.php', {uid:'1'}, function(res) {
        if (res==false) {
            $('.no-things-available').eq(1).html("<span>No employees is available !</span>");
            $('.dashboard-content-table-pagination').eq(1).html('');
        } else {
            $('.dashboard-content-table-item').eq(1).html(res);
        }
    })
})

function setSelectedA(current) {
    $('.default-admin-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $('.default-admin-pagination').eq(current).addClass('dashboard-content-table-pagination-btn-selected');
}

// Sales
$('.default-sales-pagination').first().click(function() {
    if ($('.default-sales-pagination').length!=1) {
        $('#previous-btn-sales').addClass('disable');
        $('#next-btn-sales').removeClass('disable');
    }
})
$('.default-sales-pagination').last().click(function() {
    if ($('.default-sales-pagination').length!=1) {
        $('#next-btn-sales').addClass('disable');
        $('#previous-btn-sales').removeClass('disable');
    }
})

$('#previous-btn-sales').click(function() {
    currentPSDefault -= 1;
    $('#next-btn-sales').removeClass('disable');
    setSelectedS(currentPSDefault-1);
    $.get('handle/hDefault-content.php', {sid:currentPSDefault}, function(data) {
        $('.dashboard-content-table-item').eq(2).html(data);
        if (currentPSDefault == 1) {
            $('#previous-btn-sales').addClass('disable');
        }
    })
})
$('#next-btn-sales').ready(function() {             
    if($('.default-sales-pagination').length==1) {
        $('#next-btn-sales').addClass('disable');
    }
})
$('#next-btn-sales').click(function() {    
    currentPSDefault = parseInt(currentPSDefault) + 1;
    $('#previous-btn-sales').removeClass('disable');
    setSelectedS(currentPSDefault-1);
    $.get('handle/hDefault-content.php', {sid:currentPSDefault}, function(data) {
        $('.dashboard-content-table-item').eq(2).html(data);
        if (currentPSDefault == $('.default-sales-pagination').length) {
            $('#next-btn-sales').addClass('disable');
        }
    })
})

$('.default-sales-pagination').click(function() {
    currentPSDefault = $(this).text();
    $('.default-sales-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $(this).addClass('dashboard-content-table-pagination-btn-selected');
    if($(this)[0] != $('.default-sales-pagination').first()[0] && $(this)[0] != $('.default-sales-pagination').last()[0]){
        $('#previous-btn-sales').removeClass('disable');
        $('#next-btn-sales').removeClass('disable');
    }
    $.get('handle/hDefault-content.php', {sid:$(this).text()}, function(data) {
        $('.dashboard-content-table-item').eq(2).html(data);
    })
})

$('.dashboard-content-table-item').eq(2).ready(function() {
    $.get('handle/hDefault-content.php', {sid:'1'}, function(res) {
        if (res==false) {
            $('.no-things-available').eq(2).html("<span>No sales is available !</span>");
            $('.dashboard-content-table-pagination').eq(2).html('');
        } else {
            $('.dashboard-content-table-item').eq(2).html(res);
        }
    })
})


function setSelectedS(current) {
    $('.default-sales-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $('.default-sales-pagination').eq(current).addClass('dashboard-content-table-pagination-btn-selected');
}

// Products
$('.default-products-pagination').first().click(function() {
    if ($('.default-products-pagination').length!=1) {
        $('#previous-btn-products').addClass('disable');
        $('#next-btn-products').removeClass('disable');
    }
})
$('.default-products-pagination').last().click(function() {
    if ($('.default-products-pagination').length!=1) {
        $('#next-btn-products').addClass('disable');
        $('#previous-btn-products').removeClass('disable');
    }
})

$('#previous-btn-products').click(function() {
    currentPPDefault -= 1;
    $('#next-btn-products').removeClass('disable');
    setSelectedPr(currentPPDefault-1);
    $.get('handle/hDefault-content.php', {pid:currentPPDefault}, function(data) {
        $('.dashboard-content-table-item').eq(3).html(data);
        if (currentPPDefault == 1) {
            $('#previous-btn-products').addClass('disable');
        }
    })
})
$('#next-btn-products').ready(function() {             
    if($('.default-products-pagination').length==1) {
        $('#next-btn-products').addClass('disable');
    }
})
$('#next-btn-products').click(function() {    
    currentPPDefault = parseInt(currentPPDefault) + 1;
    $('#previous-btn-products').removeClass('disable');
    setSelectedPr(currentPPDefault-1);
    $.get('handle/hDefault-content.php', {pid:currentPPDefault}, function(data) {
        $('.dashboard-content-table-item').eq(3).html(data);
        if (currentPPDefault == $('.default-products-pagination').length) {
            $('#next-btn-products').addClass('disable');
        }
    })
})

$('.default-products-pagination').click(function() {
    currentPPDefault = $(this).text();
    $('.default-products-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $(this).addClass('dashboard-content-table-pagination-btn-selected');
    if($(this)[0] != $('.default-products-pagination').first()[0] && $(this)[0] != $('.default-products-pagination').last()[0]){
        $('#previous-btn-products').removeClass('disable');
        $('#next-btn-products').removeClass('disable');
    }
    $.get('handle/hDefault-content.php', {pid:$(this).text()}, function(data) {
        $('.dashboard-content-table-item').eq(3).html(data);
    })
})

$('.dashboard-content-table-item').eq(3).ready(function() {
    $.get('handle/hDefault-content.php', {pid:'1'}, function(res) {
        if (res==false) {
            $('.no-things-available').eq(3).html("<span>No products is available !</span>");
            $('.dashboard-content-table-pagination').eq(3).html('');
        } else {
            $('.dashboard-content-table-item').eq(3).html(res);
        }
    })
})


function setSelectedPr(current) {
    $('.default-products-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $('.default-products-pagination').eq(current).addClass('dashboard-content-table-pagination-btn-selected');
}
