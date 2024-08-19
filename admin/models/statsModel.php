<?php
include_once(__DIR__."/../../database/database.php");
class StatsModel{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getStats()
    {
        $query="SELECT sanpham.*, SUM(ct_donhang.so_luong) as TotalSold,
        SUM(ct_donhang.so_luong * sanpham.don_gia) AS TotalRevenue
        FROM sanpham
        INNER JOIN ct_donhang ON sanpham.ma_sp = ct_donhang.ma_sp
        WHERE ct_donhang.ma_don IN (
                                    SELECT ma_don
                                    FROM donhang
                                    WHERE trang_thai NOT IN (0, 1)
                                    )
        GROUP BY sanpham.ma_sp
        ORDER BY TotalSold DESC";

        return $this->db->select($query);
    }
    public function getStatsByDate()
    {
        $query="SELECT
        YEAR(ngay_dat) AS year_dat,
        MONTH(ngay_dat) AS month_dat,
        SUM(ct_donhang.so_luong * sanpham.don_gia) AS total_revenue
      FROM sanpham
      INNER JOIN ct_donhang ON sanpham.ma_sp = ct_donhang.ma_sp
      INNER JOIN donhang d ON ct_donhang.ma_don = d.ma_don
      WHERE d.trang_thai NOT IN (0, 1)
      GROUP BY YEAR(ngay_dat), MONTH(ngay_dat)
      
      ORDER BY year_dat, month_dat DESC;";

        return $this->db->select($query);
    }
    public function getStatsByYear($data)
    {
        $query="SELECT
        YEAR(ngay_dat) AS year_dat,
        MONTH(ngay_dat) AS month_dat,
        SUM(ct_donhang.so_luong * sanpham.don_gia) AS total_revenue
      FROM sanpham
      INNER JOIN ct_donhang ON sanpham.ma_sp = ct_donhang.ma_sp
      INNER JOIN donhang d ON ct_donhang.ma_don = d.ma_don
      WHERE d.trang_thai NOT IN (0, 1) AND YEAR(ngay_dat) = $data
      GROUP BY YEAR(ngay_dat), MONTH(ngay_dat)
      
      ORDER BY year_dat, month_dat DESC;";

        return $this->db->select($query);
    }
}
?>