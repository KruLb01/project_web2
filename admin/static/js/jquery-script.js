$(".logout-btn").click(function() {
    $.get('./templates/controller.php', {action:"logout"} , function(data) {
        if (data==true) {
            window.location = './templates/login.php';
        }
    })
})

$(".content-dashboard").ready(function() {
    $.get('./templates/controller.php', {action:''}, function(data) {
        document.getElementsByClassName("content-dashboard")[0].innerHTML = data;
    })
})

$("#view-info-btn").click(function() {
    $.get('./templates/controller.php', {action:"view-info-user"} , function(data) {
        document.getElementsByClassName("content-dashboard")[0].innerHTML = data;
    })
})

$('.dashboard-content-box').eq(0).click(function() {
    location.href = '#customers';
})
$('.dashboard-content-box').eq(1).click(function() {
    location.href = '#users';
})
$('.dashboard-content-box').eq(2).click(function() {
    location.href = '#sales';
})
$('.dashboard-content-box').eq(3).click(function() {
    location.href = '#products';
})