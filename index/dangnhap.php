<form onsubmit="return (validateData());" action="xulydangnhap.php" method="POST">
    <table cellspacing="10">
        <tr>
            <td><span>Username:</span></td>
            <td><input type="text" name="txtusername"/></td>
        </tr>
        <tr>
            <td><span>Password:</span></td>
            <td><input type="password" name="txtpassword"/></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" value="Đăng nhập"/></td>
        </tr>
    </table>
</form>
<script>
function validateData()
{
    var getListInput = document.getElementsByTagName('input');
    if(getListInput[0].value === "" || getListInput[1].value === "")
    {
        alert('Các fields không được để trống');
        return false;
    }
    else{
        return true;
    }
}
</script>