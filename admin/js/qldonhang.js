$(document).ready(function () {
    $("#viewOrderDetails").click(function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
        
        var orderId = $(this).data("id"); // Lấy ID đơn hàng từ thuộc tính data-id
        $.ajax({
            url: "index.php?ctrl=orderController&action=showCTDonHang",
            type: "GET",
            data: { id: orderId }, // Gửi ID đơn hàng đến máy chủ
            success: function(response) {
                // Update the table content
                $('table').html($(data).find('table').html());
    
                // Log relevant information (e.g., response data)
                console.log(url);
            },
            error: function(xhr, status, error) {
                console.error("Lỗi khi gửi yêu cầu AJAX:", error);
            }
        });
    });
})