$(document).ready(function () {
    // Tìm kiếm sản phẩm
    $('form.search-form').submit(function (event) {
        
            event.preventDefault();
            var keyword = $('#search').val();
            var field = $('#timkiem').val();
            console.log("helo");
            $.ajax({
                url: 'index.php?ctrl=productController&action=searchProducts&search=' + keyword + '&field='+field,
                method: 'GET',
                success: function (data) {
                    $('table').html($(data).find('table').html());
                }
            });
        
    });

    $('form.searchCategory').submit(function (event) {
        
            event.preventDefault();
            var keyword = $('#search').val();
            $.ajax({
                url: 'index.php?ctrl=categoryController&action=searchCategory&search=' + keyword,
                method: 'GET',
                success: function (data) {
                    $('table').html($(data).find('table').html());
                }
            });
        
    });
    $('form.timdonhang').submit(function (event) {
        event.preventDefault();
    
        // Get input values
    var status = $('.trangthai:checked').val();
    var startdate = $('.startdate').val();
    var enddate = $('.enddate').val();
    
    
        // Construct the URL
        var url = 'index.php?ctrl=orderController&action=searchOrder' +
            '&status=' + status +
            '&startdate=' + startdate +
            '&enddate=' + enddate ;
        
    
        // Make the AJAX request
        $.ajax({
            url: url,
            method: 'GET',
            success: function (data) {
                // Update the table content
                var newTableContent = $(data).find('#bangdonhang').html();
        
        // Tìm bảng trong trang hiện tại bằng ID
                var existingTable = $('#bangdonhang'); // Chỉ chọn bảng có ID này
        
        // Cập nhật nội dung bảng với dữ liệu mới
                existingTable.html(newTableContent);
                console.log("Hhahah");
            },
            error: function (xhr, status, error) {
                console.error('AJAX request failed:', error);
            }
        });
    
    });

    $('form.searchAccount').submit(function (event) {
        event.preventDefault();
        var keyword = $('#search').val();
        var field = $('#timkiem').val();
        var startdate = $('.startdate').val(); // Lấy giá trị của startdate
        var enddate = $('.enddate').val(); // Lấy giá trị của enddate
        $.ajax({
            url: 'index.php?ctrl=accountController&action=searchAccount&search=' + keyword + '&field=' + field + '&startdate=' + startdate + '&enddate=' + enddate,
            method: 'GET',
            success: function (data) {
                $('table').html($(data).find('table').html());
            }
        });
    });


    $('form.searchUser').submit(function (event) {
        
        event.preventDefault();
        var keyword = $('#search').val();
        var field = $('#timkiem').val();
        console.log("helo");
        $.ajax({
            url: 'index.php?ctrl=userController&action=searchUser&search=' + keyword + '&field='+field,
            method: 'GET',
            success: function (data) {
                $('table').html($(data).find('table').html());
            }
        });
    
       

        });
        $('form.searchImport').submit(function (event) {
            event.preventDefault();
            var keyword = $('#search').val();
            var field = $('#timkiem').val();
            var startdate = $('.startdate').val(); // Lấy giá trị của startdate
            var enddate = $('.enddate').val(); // Lấy giá trị của enddate
            var giafrom = $('.giafrom').val(); 
            var giato = $('.giato').val(); 
            $.ajax({
                url: 'index.php?ctrl=importController&action=searchImport&search=' + keyword + '&field=' + field + '&startdate=' + startdate + '&enddate=' + enddate+ '&giafrom=' + giafrom+ '&giato=' + giato,
                method: 'GET',
                success: function (data) {
                    $('table').html($(data).find('table').html());
                }
            });
        });

        $('form.searchImportDetail').submit(function (event) {
            event.preventDefault();
            var keyword = $('#search').val();
            var field = $('#timkiem').val();
            var soluongfrom = $('.soluongfrom').val(); // Lấy giá trị của startdate
            var soluongto = $('.soluongto').val(); // Lấy giá trị của enddate
            var giafrom = $('.giafrom').val(); 
            var giato = $('.giato').val(); 
            $.ajax({
                url: 'index.php?ctrl=importController&action=searchImportDetail&search=' + keyword + '&field=' + field + '&soluongfrom=' + soluongfrom + '&soluongto=' + soluongto+ '&giafrom=' + giafrom+ '&giato=' + giato,
                method: 'GET',
                success: function (data) {
                    $('table').html($(data).find('table').html());
                }
            });
        });

    // $('form.themctslide').submit(function (event) {
    //     event.preventDefault();
    
    //     // Get input values
    // var status = $('.trangthai:checked').val();
    // var startdate = $('.startdate').val();
    // var enddate = $('.enddate').val();
    
    
    //     // Construct the URL
    //     var url = 'index.php?ctrl=orderController&action=searchOrder' +
    //         '&status=' + status +
    //         '&startdate=' + startdate +
    //         '&enddate=' + enddate ;
        
    
    //     // Make the AJAX request
    //     $.ajax({
    //         url: url,
    //         method: 'GET',
    //         success: function (data) {
    //             // Update the table content
    //             var newTableContent = $(data).find('#bangdonhang').html();
        
    //     // Tìm bảng trong trang hiện tại bằng ID
    //             var existingTable = $('#bangdonhang'); // Chỉ chọn bảng có ID này
        
    //     // Cập nhật nội dung bảng với dữ liệu mới
    //             existingTable.html(newTableContent);
    //             console.log("Hhahah");
    //         },
    //         error: function (xhr, status, error) {
    //             console.error('AJAX request failed:', error);
    //         }
    //     });
    
    // });


})