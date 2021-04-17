let currentPUDefault = 1;
let currentPADefault = 1;
let currentPSDefault = 1;
let currentPPDefault = 1;

$(".logout-btn").click(function() {
    $.get('./templates/controller.php', {action:"logout"} , function(res) {
        if (res==true) {
            window.location = './templates/login.php';
        }
    })
})

$("#top-menu-btn").click(function() {
    location.href = "./index.php";
})
$(".view-info-btn").click(function() {
    location.href = "?action=view-info-user";
})
$(".change-password-btn").click(function() {
    location.href = "?action=change-password";
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


// View info user
$('#update-profile-btn').click(function(event) {
    event.preventDefault();
    if(!checkEmptyUpdateInfoUser()) {
        $('.error').eq(0).html("Error : Input can't be gaped !");
        $('.error').eq(0).css('display','block');
        return;   
    } else {
        $('.error').eq(0).html('');
        $('.error').eq(0).css('display','none');
    }
    $.ajax({
        method:'get',
        url:'handle/hView-info-user.php',
        data: $('#view-info-user-form').serialize()+'&action=view',
        success: function(res) {
            if (res == 1) {
                alert('Update information successfully !');
                $('.header-info-user span').eq(0).html(document.getElementsByName('username')[0].value);
            } else if (res == 0) {
                alert('Failed when update information !');
            }
        }
    }) 
})

function checkEmptyUpdateInfoUser() {
    if (document.getElementsByName('username')[0].value == '' || document.getElementsByName('user-email')[0].value == '' ||
    document.getElementsByName('user-phone')[0].value == '' || document.getElementsByName('other-information')[0].value == '' ) return false;

    return true
}

let flag_checkNewPassword_ChangePassword = true;
var flag = 0;
$('#change-password-btn').click(function(event) {
    event.preventDefault();
    field1 = document.getElementsByName('old-password')[0].value;
    field2 = document.getElementsByName('new-password')[0].value;
    field3 = document.getElementsByName('retype-password')[0].value;
    if(!checkEmptyChangePassword()) {
        $('.error').eq(0).html("Error : Input can't be gaped !");
        $('.error').eq(0).css('display','block');
        return;   
    } else if (!flag_checkNewPassword_ChangePassword) {
        return;   
    } else {
        $('.error').eq(0).html('');
        $('.error').eq(0).css('display','none');
    }
    $.ajax({
        method:'post',
        url:'handle/hView-info-user.php',
        data: $('#change-password-form').serialize()+'&action=change-password',
        success:function(res) {
            if (res == 1) {
                alert('Change password successfully !');
            } else if (res == 0) {
                alert('Failed when change password !');
            } else if (res.trim() == 'incorrect') {
                alert('Old password is not correct !');
                flag++;
                if (flag == 5) {
                    var count = 30;
                    $('#change-password-btn').css('background','rgb(201, 201, 201)');
                    $('#change-password-btn').css('color','#f35454');
                    $('#change-password-btn').css('pointer-events','none');
                    $('#change-password-btn').html('Can change password in '+count);
                    var status = countUnlockBtnChangePass(count-1);
                    flag = 0;
                }
            }
        }
    })
})

function countUnlockBtnChangePass(count) {
    if (count == -1) {
        $('#change-password-btn').css('background','#169981')
        $('#change-password-btn').css('color','white')
        $('#change-password-btn').css('pointer-events','unset')
        $('#change-password-btn').html('Change password');
        return true;
    }
    setTimeout(() => {
        $('#change-password-btn').html('Can change password in '+count);
        countUnlockBtnChangePass(count-1);
    }, 1000);
};

var link = false;
$('.password-cont').eq(1).keyup(function() {
    val = document.getElementsByName('new-password')[0].value;
    if (val.length <= 10) {
        $('.error').eq(0).html("Error : Password must be > 10 character !");
        $('.error').eq(0).css('display','block');
        flag_checkNewPassword_ChangePassword = false;
        return;   
    } else if (!/[A-Z]+/g.test(val)) {
        $('.error').eq(0).html("Error : Password must have at least 1 upper character !");
        $('.error').eq(0).css('display','block');
        flag_checkNewPassword_ChangePassword = false;
        return;  
    } else if (/[!-/|:-@|[-`|{-~]/g.test(val)) {
        $('.error').eq(0).html("Error : Password can't contain special character !");
        $('.error').eq(0).css('display','block');
        flag_checkNewPassword_ChangePassword = false;
        return;  
    } else {
        $('.error').eq(0).html('');
        $('.error').eq(0).css('display','none');
        flag_checkNewPassword_ChangePassword = true;
        link = true;
    }
})

$('.password-cont').eq(2).keyup(function() {
    retypeVal = document.getElementsByName('retype-password')[0].value;
    newVal = document.getElementsByName('new-password')[0].value;
    if (link == true) {
        if (retypeVal != newVal) {
            $('.error').eq(0).html("Error : Retype password must be equal new password !");
            $('.error').eq(0).css('display','block');
            flag_checkNewPassword_ChangePassword = false;
            return;  
        } else {
            $('.error').eq(0).html('');
            $('.error').eq(0).css('display','none');
            flag_checkNewPassword_ChangePassword = true;
        }
    }
})

$('.position').click(function() {
    if ($('.position').eq(0)[0] == $(this)[0]) {
        pos = 0;
    } else if ($('.position').eq(1)[0] == $(this)[0]) {
        pos = 1;
    } else pos = 2;

    className = $(this).attr('class').split(' ');
    className.forEach(item => {
        if (item == 'fa-eye-slash') {
            $('.password-cont').eq(pos).prop('type','text')
            $(this).addClass('fa-eye')
            $(this).removeClass('fa-eye-slash')
        } else if (item == 'fa-eye') {
            $('.password-cont').eq(pos).prop('type','password')
            $(this).addClass('fa-eye-slash')
            $(this).removeClass('fa-eye')
        }
    });
})

function checkEmptyChangePassword() {
    if (document.getElementsByName('old-password')[0].value == '' || document.getElementsByName('new-password')[0].value == '' ||
    document.getElementsByName('retype-password')[0].value == '') return false;

    return true
}