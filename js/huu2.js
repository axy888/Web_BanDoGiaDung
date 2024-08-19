document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var ctrlParam = urlParams.get('ctrl');
    if (ctrlParam === 'DieuKhoanSuDung') {
        document.getElementById('link_DieuKhoanSuDung').style.color = "chocolate";
    }if (ctrlParam === 'ChuongTrinhKhuyenMai') {
        document.getElementById('link_ChuongTrinhKhuyenMai').style.color = "chocolate";
    }if (ctrlParam === 'VeChungToi') {
        document.getElementById('link_VeChungToi').style.color = "chocolate";
    }
});
document.addEventListener('DOMContentLoaded', function() {
    var urlParams = new URLSearchParams(window.location.search);
    var ctrlParam = urlParams.get('ctrl');
    var vtrParam=urlParams.get('vtr');
    var currentURL = window.location.href;
    var url = "http://localhost:8888/DoVoDung/product_detail.php?ma_sp=1";
    var start = url.lastIndexOf('/') + 1; // Tìm vị trí cuối cùng của dấu / trong URL
    var end = url.indexOf('?'); // Tìm vị trí của dấu ? trong URL

    // Trích xuất phần product_detail.php từ URL
    var productDetail = url.substring(start, end);


    if (ctrlParam === 'chinhSachVanChuyen') {
        document.getElementById('oTrong_a_rand').innerText = "Chính sách vận chuyển";
    }if(ctrlParam === 'giaoDichChung'){
        document.getElementById('oTrong_a_rand').innerText = "Thông tin về điều kiện giao dịch chung";
    }if(ctrlParam === 'hdMuaHang') {
        document.getElementById('oTrong_a_rand').innerText = "Hướng dẫn mua hàng";
    }if(ctrlParam === 'chinhSachThanhToan'){
        document.getElementById('oTrong_a_rand').innerText = "Chính sách thanh toán";
    }if (ctrlParam === 'dieuKhoanChinhSach') {
        document.getElementById('oTrong_a_rand').innerText = "Điều khoản chính sách";
    }if(ctrlParam === 'trungTamTroGiup'){
        document.getElementById('oTrong_a_rand').innerText = "Trung tâm trợ giúp";
    }if(ctrlParam === 'chinhSach'){
        document.getElementById('oTrong_a_rand').innerText = "Chính sách bảo mật";
    }if(ctrlParam === 'DieuKhoanSuDung'){
        document.getElementById('oTrong_a_rand').innerText = "Điều khoản sử dụng";
    }if(ctrlParam === 'ChuongTrinhKhuyenMai'){
        document.getElementById('oTrong_a_rand').innerText = "Chương trình khuyến mãi";
    }
    if(ctrlParam === 'thanhToan'){
        document.getElementById('oTrong_a_rand').innerText = "";    
        document.getElementById('oTrong_a_VCT').innerText = "";
        document.getElementById('oTrong_a_trangChu').innerText = "";
        document.getElementById('oTrong_a_p1').innerText = "";
        document.getElementById('oTrong_a_p2').innerText = "";
    }
    if(ctrlParam === 'VeChungToi'){
        document.getElementById('oTrong_a_rand').innerText = "";    
        document.getElementById('oTrong_a_VCT').innerText = "";
        document.getElementById('oTrong_a_trangChu').innerText = "";
        document.getElementById('oTrong_a_p1').innerText = "";
        document.getElementById('oTrong_a_p2').innerText = "";
    }if(ctrlParam === 'trangChu'){
        document.getElementById('oTrong_a_rand').innerText = "";
        document.getElementById('oTrong_a_VCT').innerText = "";
        document.getElementById('oTrong_a_trangChu').innerText = "";
        document.getElementById('oTrong_a_p1').innerText = "";
        document.getElementById('oTrong_a_p2').innerText = "";
    }if(vtrParam === 'slideClientController'){
        document.getElementById('oTrong_a_rand').innerText = "";
        document.getElementById('oTrong_a_VCT').innerText = "";
        document.getElementById('oTrong_a_trangChu').innerText = "";
        document.getElementById('oTrong_a_p1').innerText = "";
        document.getElementById('oTrong_a_p2').innerText = "";
    }if(vtrParam === 'thongtinController'){
        document.getElementById('oTrong_a_rand').innerText = "";
        document.getElementById('oTrong_a_VCT').innerText = "";
        document.getElementById('oTrong_a_trangChu').innerText = "";
        document.getElementById('oTrong_a_p1').innerText = "";
        document.getElementById('oTrong_a_p2').innerText = "";
    }
   
});
