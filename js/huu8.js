// $(document).ready(function() {
//     $('.div_sp_ul-button').click(function(event) {
//         event.preventDefault(); // Ngăn chặn hành vi mặc định của nút submit
//         var form = $('#add-to-cart');
//         var formData = form.serialize(); // Thu thập dữ liệu của form
        
//         // Gửi dữ liệu của form bằng Ajax
//         $.ajax({
//             type: form.attr('method'),
//             url: form.attr('action'),
//             data: formData,
//             success: function(response) {
//                 // Xử lý phản hồi từ máy chủ (nếu cần)
//                 // Hiển thị thông báo cho người dùng
//                 $('#alert').css('right', '5px');
//                 var length = 60;
//                 var process = $('#process');

//                 var run = setInterval(function() {
//                     process.css('height', length + 'px');
//                     length -= 5;
//                     if (length <= 10) {
//                         clearInterval(run);
//                         $('#alert').css('right', '-500px');
//                     }
//                 }, 200);
//             },
//             error: function(xhr, status, error) {
//                 // Xử lý lỗi (nếu có)
//             }
//         });
//     });
// });
