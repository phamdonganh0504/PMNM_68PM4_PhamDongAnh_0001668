<?php

class sinhvien extends Controller {

    public function index()
    {
        $middleware = new middleware();

        $middleware->checklogin();

        echo "
            <h2>Danh sach sinh vien</h2>

            <a href='/PMNM_68PM4_PhamDongAnh_0001668/public/auth/logout'>
                Dang xuat
            </a>
        ";
    }
}
?>