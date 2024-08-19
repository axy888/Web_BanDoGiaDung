function dangky() // dung chung cho dang nhap voi dang ky
{
    var makh=document.getElementById("makh").value;
    var makhRegrex= /^KH\d{5}$/;

    if(!makhRegrex.test(makh))
    {
        alert("Mã khách hàng không đúng định dạng");
        makh.focus()
        return false;
    }
    
    var username = document.getElementById("username").value;
    var tenRegrex = /^[a-zA-Z0-9]{6,}$/
    //ít nhất 6 ký tự
    if (username == "") 
    {
      alert("Tên đăng nhập không được rỗng");
      username.focus()
      return false;
    }
    if(!tenRegrex.test(username))
    {
        alert("Tên đăng nhập không đúng định dạng");
        username.focus()
        return false;
    }

    //mật khẩu ít nhất 6 ký tự, có cả chữ và số
    var password=document.getElementById("password").value
    if (password.trim().length <6) 
    {
        alert("Mật khẩu phải có ít nhất 6 ký tự");
        password.focus()
        return false;
    }
    var hasLetter = /[a-zA-Z]/.test(password);
    var hasNumber = /\d/.test(password);
    
    if (!hasLetter || !hasNumber) {
        alert("Mật khẩu phải chứa cả ký tự chữ và số");
        password.focus();
        return false;
    }

    //confirm password phải trùng với password
    var confirmpassword=document.getElementById("confirmpassword").value
    if (confirmpassword.trim() != password) 
    {
        alert("Mật khẩu phải trùng với mật khẩu xác nhận");
        confirmpassword.focus()
        return false;
    }
    
    // bao gồm một phần tên người dùng, ký tự @, tên miền và domain
    var email = document.getElementById("email").value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if(!emailRegex.test(email))
    {
        alert("Email không đúng định dạng");
        email.focus()
        return false;
    }

    //địa chỉ phải có ít nhất 10 ký tự
    var diachi=document.getElementById("diachi").value
    if (diachi.trim().length <10) 
    {
        alert("Địa chỉ phải có ít nhất 10 ký tự");
        diachi.focus()
        return false;
    }

    //bắt đầu = số 0 kèm theo đó là 9 chữ số khác
    var sdt = document.getElementById("sdt").value;
    var sdtRegres= /^0\d{9}$/
    if (sdt == "") {
      alert("Số điện thoại  không được rỗng");
      sdt.focus()
      return false;
    }
    if(!sdtRegres.test(sdt))
    {
        alert("Số diện thoại không đúng định dạng");
        sdt.focus()
        return false;
    }

    else
    {
        // alert("đăng nhập thành công");
        
        // clearInputs();
    }

}

//clear các input người dùng nhập
function clearInputs() 
{
    var inputs = document.querySelectorAll('input[type="text"]');
    inputs.forEach(function(input) 
    {
        input.value = '';
    });
}

function dangnhap()
{

}