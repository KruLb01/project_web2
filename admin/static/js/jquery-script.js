let currentPUDefault = 1;
let currentPADefault = 1;

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

//
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

$('.dashboard-content-table-item').eq(0).load('handle/hDefault-content.php?cid=1')


function setSelectedP(current) {
    $('.default-users-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $('.default-users-pagination').eq(current).addClass('dashboard-content-table-pagination-btn-selected');
}

//
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
$('#next-btn-admin').ready(function() {             // them len tren
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

$('.dashboard-content-table-item').eq(1).load('handle/hDefault-content.php?uid=1')


function setSelectedA(current) {
    $('.default-admin-pagination').removeClass('dashboard-content-table-pagination-btn-selected');
    $('.default-admin-pagination').eq(current).addClass('dashboard-content-table-pagination-btn-selected');
}