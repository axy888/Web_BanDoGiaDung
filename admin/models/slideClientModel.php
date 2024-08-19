<meta charset="UTF-8">
<html lang="en">
<?php
include(__DIR__ . '/../../database/database.php');

class slideModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getAllslide()
    {
        $query = "SELECT * FROM slide";
        return $this->db->select($query);
    }
    public function getAllslideDetail()
    {
        $query = "SELECT * FROM slidedetail";
        return $this->db->select($query);
    }
    

    // public function getSlideProduct()
    // {
    //     $query = "SELECT * FROM slide
    //     INNER JOIN slidedetail ON slide.slideid = slidedetail.slide_id
    //     INNER JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp";
    //     return $this->db->select($query);
    // }
    public function getSlideProduct()
    {
        $query = "SELECT * FROM slidedetail
        INNER JOIN slide ON slidedetail.slide_id = slide.slideid
        INNER JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp";
        return $this->db->select($query);
    }
    
    public function getSlideDetail($maSlide)
    {
        $item_per_page = 6;
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;
        $query = "SELECT * FROM slidedetail
        JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp
        WHERE slidedetail.slide_id = $maSlide
        ORDER BY slidedetail.ma_sp ASC
        LIMIT $item_per_page OFFSET $offset";/*Gioi han so luong hang duoc tra ve và bắt đầu từ hàng thứ mấy */
        return $this->db->select($query);
    }
    public function getSlideDetailandSX($maSlide)
    {
        $item_per_page = 6;
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;
        $query = "SELECT * FROM slidedetail
        JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp
        WHERE slidedetail.slide_id = $maSlide
        ORDER BY sanpham.don_gia DESC
        LIMIT $item_per_page OFFSET $offset";/*Gioi han so luong hang duoc tra ve và bắt đầu từ hàng thứ mấy */
        return $this->db->select($query);
    }
    public function getSlideDetailandSxTtc($maSlide)
    {
        $item_per_page = 6;
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;
        $query = "SELECT * FROM slidedetail
        JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp
        WHERE slidedetail.slide_id = $maSlide
        ORDER BY sanpham.don_gia ASC
        LIMIT $item_per_page OFFSET $offset";/*Gioi han so luong hang duoc tra ve và bắt đầu từ hàng thứ mấy */
        return $this->db->select($query);
    }
    public function getPage($maSlide){  
        $item_per_page = 6;
        $query1 ="SELECT * FROM slidedetail
        INNER JOIN slide ON slidedetail.slide_id = slide.slideid
        INNER JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp
        WHERE slidedetail.slide_id = $maSlide";
        $query_result = $this->db->select($query1);
        $Total = count($query_result); // lấy số dòng trong sql
        $TotalPages= ceil($Total/$item_per_page); //tính số trang sản phẩm
        return  $TotalPages;
    }
    public function getPageSxBc($maSlide){  
        $item_per_page = 6;
        $query1 = "SELECT slidedetail.*, sanpham.*, SUM(ct_donhang.so_luong) as TotalSold
        FROM slidedetail
        JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp
        JOIN ct_donhang ON sanpham.ma_sp = ct_donhang.ma_sp
        WHERE slidedetail.slide_id = $maSlide AND ct_donhang.ma_don IN (
            SELECT ma_don
            FROM donhang
            WHERE trang_thai NOT IN (0, 1)
        )
        GROUP BY sanpham.ma_sp
        ORDER BY TotalSold DESC";
        $query_result = $this->db->select($query1);
        $Total = count($query_result); // lấy số dòng trong sql
        $TotalPages= ceil($Total/$item_per_page); //tính số trang sản phẩm
        return  $TotalPages;
    }
    public function getLoai(){  
        $query ="SELECT * FROM loai where da_xoa = 0";
        return $this->db->select($query);
    }
    // public function getsanPham($textTimKiem){  
    //     $query ="SELECT * FROM sanpham WHERE sanpham.ten_sp LIKE '%".$textTimKiem."%'";
    //     return $this->db->select($query);
    // }
    public function getSlTimKiem($textTimKiem){  
        $query ="SELECT * FROM sanpham WHERE trang_thai = 'on' and sanpham.ten_sp LIKE '%".$textTimKiem."%'";
        $query_result = $this->db->select($query);
        $sl = count($query_result);
        return $sl;
    }
    public function getSanPhamTimKiem($textTimKiem)
    {
        $item_per_page = 6;
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;
        $query ="SELECT * FROM sanpham WHERE trang_thai = 'on' and  sanpham.ten_sp LIKE '%".$textTimKiem."%'
        ORDER BY sanpham.ten_sp ASC
        LIMIT $item_per_page OFFSET $offset";/*Gioi han so luong hang duoc tra ve và bắt đầu từ hàng thứ mấy */
        return $this->db->select($query);
    }
    public function getPageSanPhamTimKiem($textTimKiem){  
        $item_per_page = 6;
        $query1 ="SELECT * FROM sanpham WHERE trang_thai = 'on' and sanpham.ten_sp LIKE '%".$textTimKiem."%'";
        $query_result = $this->db->select($query1);
        $Total = count($query_result); // lấy số dòng trong sql
        $TotalPages= ceil($Total/$item_per_page); //tính số trang sản phẩm
        return  $TotalPages;
    }
    public function getSP($page){
        $item_per_page = 6; 
        $current_page = (int) $page;
        $offset = ($current_page -1 ) * $item_per_page;
        $query ="SELECT * FROM sanpham  where trang_thai = 'on'
        ORDER BY sanpham.ten_sp ASC
        LIMIT $item_per_page OFFSET $offset";
        return $this->db->select($query);
    }
    public function getSPandSX(){
        $item_per_page = 6; 
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;
        $query ="SELECT * FROM sanpham where trang_thai = 'on'
        ORDER BY sanpham.don_gia DESC
        LIMIT $item_per_page OFFSET $offset";
        return $this->db->select($query);
    }
    public function getSPandSXttc(){
        $item_per_page = 6; 
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;
        $query ="SELECT * FROM sanpham where trang_thai = 'on'
        ORDER BY sanpham.don_gia ASC
        LIMIT $item_per_page OFFSET $offset";
        return $this->db->select($query);
    }
    public function getPageAll(){  
        $item_per_page = 6;
        $query1 ="SELECT * FROM sanpham where trang_thai = 'on'";
        $query_result = $this->db->select($query1);
        $Total = count($query_result); // lấy số dòng trong sql
        $TotalPages= ceil($Total/$item_per_page); //tính số trang sản phẩm
        return  $TotalPages;
    }
    public function getPageAllsxBC(){  
        $item_per_page = 6;
        $query1 ="SELECT ct_donhang.ma_sp,sanpham.ten_sp,sanpham.don_gia,sanpham.hinh, SUM(ct_donhang.so_luong) as TotalSold
        FROM ct_donhang
        INNER JOIN sanpham ON ct_donhang.ma_sp = sanpham.ma_sp
        WHERE ma_don IN (
            SELECT ma_don
            FROM donhang
            WHERE trang_thai NOT IN (0, 1)
        )
        GROUP BY ma_sp
        ORDER BY TotalSold DESC";
        $query_result = $this->db->select($query1);
        $Total = count($query_result); // lấy số dòng trong sql
        $TotalPages= ceil($Total/$item_per_page); //tính số trang sản phẩm
        return  $TotalPages;
    }
    public function getSPbyMaLoai($maLoai){
        $item_per_page = 6; 
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;

        $query ="SELECT * FROM sanpham 
        WHERE ma_loai = '$maLoai' and trang_thai = 'on'   
        ORDER BY ma_loai ASC
        LIMIT $item_per_page OFFSET $offset";
        return $this->db->select($query);
    }
    public function getSPbyMaLoaiandSx($maLoai){
        $item_per_page = 6; 
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;

        $query = "SELECT * FROM sanpham 
        WHERE sanpham.ma_loai = '$maLoai' and trang_thai = 'on'
        ORDER BY don_gia DESC
        LIMIT $item_per_page OFFSET $offset";

        return $this->db->select($query);
    }
    public function getSPbyMaLoaiandSxTtc($maLoai){
        $item_per_page = 6; 
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;

        $query = "SELECT * FROM sanpham 
        WHERE sanpham.ma_loai = '$maLoai' and trang_thai = 'on'
        ORDER BY sanpham.don_gia ASC
        LIMIT $item_per_page OFFSET $offset";

        return $this->db->select($query);
    }
    public function getPagebyMaLoai($maLoai){  
        $item_per_page = 6;
        $query =" SELECT * FROM sanpham 
        WHERE sanpham.ma_loai = '$maLoai' and trang_thai='on'";
        $query_result = $this->db->select($query);
        $Total = count($query_result); // lấy số dòng trong sql
        $TotalPages= ceil($Total/$item_per_page); //tính số trang sản phẩm
        return  $TotalPages;
    }
    public function getPagebyMaLoaiSxBc($maLoai){  
        $item_per_page = 6;
        $query = "SELECT sanpham.*, SUM(ct_donhang.so_luong) as TotalSold
        FROM sanpham
        INNER JOIN ct_donhang ON sanpham.ma_sp = ct_donhang.ma_sp
        WHERE sanpham.ma_loai = '$maLoai' AND ct_donhang.ma_don IN (
            SELECT ma_don
            FROM donhang
            WHERE trang_thai NOT IN (0, 1)
        )
        GROUP BY sanpham.ma_sp
        ORDER BY TotalSold DESC";
        $query_result = $this->db->select($query);
        $Total = count($query_result); // lấy số dòng trong sql
        $TotalPages= ceil($Total/$item_per_page); //tính số trang sản phẩm
        return  $TotalPages;
    }
    public function getSpGiaTuCaoXuongThap() {
        $query = "SELECT * FROM sanpham where trang_thai = 'on'
                  ORDER BY don_gia DESC"; 
        return $this->db->select($query); 
    }
    public function getSPandSXBanChay(){
        $item_per_page = 6; 
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page - 1) * $item_per_page;
        $query ="SELECT ct_donhang.ma_sp,sanpham.ten_sp,sanpham.don_gia,sanpham.hinh, SUM(ct_donhang.so_luong) as TotalSold
        FROM ct_donhang
        INNER JOIN sanpham ON ct_donhang.ma_sp = sanpham.ma_sp
        WHERE ma_don IN (
            SELECT ma_don
            FROM donhang
            WHERE trang_thai NOT IN (0, 1)
        )
        GROUP BY ma_sp
        ORDER BY TotalSold DESC
        LIMIT $item_per_page OFFSET $offset"; 
        return $this->db->select($query);
    }


    public function getSPbyMaLoaiandSxbc($maLoai){
        $item_per_page = 6; 
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;

        $query = "SELECT sanpham.*, SUM(ct_donhang.so_luong) as TotalSold
        FROM sanpham
        INNER JOIN ct_donhang ON sanpham.ma_sp = ct_donhang.ma_sp
        WHERE sanpham.ma_loai = '$maLoai' AND ct_donhang.ma_don IN (
            SELECT ma_don
            FROM donhang
            WHERE trang_thai NOT IN (0, 1)
        )
        GROUP BY sanpham.ma_sp
        ORDER BY TotalSold DESC
        LIMIT $item_per_page OFFSET $offset";
    

        return $this->db->select($query);
    }
    public function getSlideDetailandSXbc($maSlide)
    {
        $item_per_page = 6;
        if(isset($_GET["page"]) && is_numeric($_GET["page"])) {
            $current_page = $_GET["page"];
        } else {
            $current_page = 1; 
        }
        $offset = ($current_page -1 ) * $item_per_page;

        $query = "SELECT slidedetail.*, sanpham.*, SUM(ct_donhang.so_luong) as TotalSold
        FROM slidedetail
        JOIN sanpham ON slidedetail.ma_sp = sanpham.ma_sp
        JOIN ct_donhang ON sanpham.ma_sp = ct_donhang.ma_sp
        WHERE slidedetail.slide_id = $maSlide AND ct_donhang.ma_don IN (
            SELECT ma_don
            FROM donhang
            WHERE trang_thai NOT IN (0, 1)
        )
        GROUP BY sanpham.ma_sp
        ORDER BY TotalSold DESC
        LIMIT $item_per_page OFFSET $offset";
    

        return $this->db->select($query);
    }
    
    


}
?>
