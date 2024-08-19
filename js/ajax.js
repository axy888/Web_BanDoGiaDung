$(document).ready(function () {
    function loadContent(url) {
        $.ajax({
          type: "GET",
          url: url,
          data: {},
          success: function(data) {
            window.history.pushState({}, "", url);
            const thbleElement = $(data).find('#trang-quan-li');
            $('#trang-quan-li').html(thbleElement.html());
          }
        });
      }
      $('#loadCategory').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=categoryController");
      });
      
      $('#loadProduct').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=productController");
      });
      $('#ql-ncc').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=supplierController");
      });
      $('#ql-dh').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=orderController");
      });
      
      $('#ql-km').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=promotionController");
      });
      $('#ql-nh').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=importController");
      });
      
      $('#ql-tk').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=accountController");
      });
      $('#ql-nd').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=userController");
      });
      $('#ql-q').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=permissionController");
      });
      
      $('#ql-sl').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=slideController");
      });
      $('#ql-thongke').click(function (event) {
        event.preventDefault();
        loadContent("index.php?ctrl=statsController");
      });
});
