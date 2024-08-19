<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../admin/js/searchAjax.js"></script>
    <title>Thống kê</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
</head>
<body>
<h2>Thống kê sản phẩm bán chạy</h2>
<form id="selectForm">
    Top sản phẩm: <select id="numColumn">
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
    </select>
    <button type="button" onclick="filterProducts()">Lọc</button>
</form>
<div id="chart" style="height: 250px;"></div>


<h2>Thống kê doanh thu</h2>

<form action="index.php" method="GET" class="searchStats">
    <input type="hidden" name="ctrl" value="statsController">
    <input type="hidden" name="action" value="searchStats">
    Thống kê năm: <input id="thongkenam" type="text" name="thongkenam">
    <button type="submit">Lọc</button>
</form>
<div id="inner"></div>
<div id="chartbydate" style="height: 250px;"></div>
        <!-- <?php
                $products = [];
                foreach ($stats as $row) {
                    $product = [
                        'name' => $row['ten_sp'],
                        'price' => $row['don_gia'],
                        'sale' => $row['TotalRevenue'],
                        'quantity' => $row['TotalSold']
                    ];
                        $products[] = $product;
                }
            ?> -->
        <!-- <?php
                $productsDate = [];
                for($i = 1 ; $i <=12 ; $i++ ){
                    $temp =0;
                foreach ($yearstats as $row) {
                    if($row['month_dat'] == $i){
                        $product = [
                            'datetime' => $row['month_dat'],
                            'sale' => $row['total_revenue'],
                            'namdat' => $row['year_dat']
                        ];
                            $productsDate[] = $product;
                            $temp =1;
                            break;
                    }
                    else{
                        $temp =0;
                    }
                }
                if($temp == 0){
                    $product = [
                        'datetime' => $i,
                        'sale' => 0
                    ];
                        $productsDate[] = $product;
                        $temp =1;
                }
            }
            ?> -->

                
    <script type="text/javascript">

        var products = <?php echo json_encode($products); ?>;
        function drawchart(products){
            document.getElementById('chart').innerHTML = '';
            new Morris.Bar({
            // ID of the element in which to draw the chart.
            element: 'chart',

            data: products,

            xkey: 'name',

            ykeys: ['price', 'sale', 'quantity'],

            labels: ['Đơn giá', 'Doanh thu', 'Số lượng']
            });
        }


        var productsDate = <?php echo json_encode($productsDate); ?>;
        function drawchartbydate(products){
            document.getElementById('chartbydate').innerHTML = '';
            new Morris.Line({
            // ID of the element in which to draw the chart.
            element: 'chartbydate',

            data: productsDate,

            xkey: 'datetime',

            ykeys: ['sale'],

            labels: ['Doanh thu'],
            parseTime: false
            });
        }

        function filterProducts() {
        var numColumns = document.getElementById("numColumn").value;
        // Update products array with only selected number of products
        var filteredProducts = products.slice(0, numColumns);
        drawchart(filteredProducts);
    }
    // Initial draw
    filterProducts();
    drawchartbydate();
    </script>

    
</body>
</html>