<form onsubmit="return (getInfoRegister());" action="xulydangky.php">
    <table cellspacing="10">
        <tr>
            <td><label>Nhập mã số sinh viên</label></td>
            <td><input type="text" name="masv"/><div id="ID_error_message"></div></td>
        </tr>
        <tr>
            <td><label>Nhập họ tên</label></td>
            <td><input type="text" name="hoten"/><div id="ID_error_message"></div></td>
        </tr>
        <tr>
            <td><label>Nhập email</label></td>
            <td><input type="text" name="email"/><div id="ID_error_message"></div></td>
        </tr>
        <tr>
            <td><label>Nhập số điện thoại</label></td>
            <td><input type="text" name="sodienthoai"/><div id="ID_error_message"></div></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Đăng kí"/></td>
        </tr>
    </table>
    <script>
    function checkEmail(email)
    {
        var getEmail = email.split("@");
        if(getEmail.length===1){
            return false;//Co nghĩa là không có định dạng email '@' 
        }
        //^([a-zA-Z0-9_])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9\-]){3}+$ biểu thức chính quy cho email
        else if(getEmail.length===2){
            var getDot_DomainEmail = getEmail[1].split(".");
            if(getDot_DomainEmail.length===1)
            {
                return false;
            }
            return true;
        }
    }
    function checkSodienthoai(sdt)
    {
        if(!isNaN(sdt) && sdt.length===10)
        {
            return true;
        }
        return false;
        //^(0[3579])(\d{8})+$ biểu thức chính quy cho số diện thoại
    }
    function checkName(name)
    {
        var regex=/^[a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂẾưăạảấầẩẫậắằẳẵặẹẻẽềềểếỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+$/;
        return regex.test(name);
    }
    function checkMaSV(masv)
    {
        var isTrue = false;
        var regex = /^SV\d{4}$/;
        if(regex.test(masv))
        {
            isTrue = true;
        }
        return isTrue;
    }
    function getInfoRegister(){
        var email = document.getElementsByName('email')[0].value;
        var sdt = document.getElementsByName('sodienthoai')[0].value;
        var hoten = document.getElementsByName('hoten')[0].value;
        var masv = document.getElementsByName('masv')[0].value;
        var passedForm = false;
        var showError = document.getElementsByTagName('div');
        if(email==='' || sdt==='' || hoten==='' || masv ==='')
        {
            alert('Mọi thông tin phải điền đầy đủ');
        }
        if(checkMaSV(masv)===false)
        {
            showError[9].innerHTML="* Mã sinh viên không hợp lệ";
        }
        if(checkName(hoten)===false)
        {
            showError[10].innerHTML = "* Họ tên không hợp lệ";
        }
        if(checkEmail(email)===false)
        {
            showError[11].innerHTML = "* Email không hợp lệ";
        }
        if(checkSodienthoai(sdt)===false)
        {
            showError[12].innerHTML = "* Số điện thoại không hợp lệ";
        }
        else{
            passedForm = true;
        }
        return passedForm;
    }
</script>
</form>