<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <form role="search">
        <div class="form-group">
            {{--<input type="text" class="form-control" placeholder="Tìm kiếm">--}}
        </div>
        <br>
        <br>
    </form>
    <ul class="nav menu">
        <li class="active"><a #><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Trang chủ quản trị</a></li>
        <li class="parent ">
            <a href="admin/truong/danhsachtruong">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý trường
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="admin/truong/danhsachtruong">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Danh sách trường
                    </a>
                </li>
                <li>
                    <a class="" href="admin/truong/themtruong">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm trường
                    </a>
                </li>
                <li>
                    <a class="" href="admin/truong/themlop">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm lớp
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="admin/vanthu/danhsachvanthu">
                <span data-toggle="collapse" href="#sub-item-2"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý văn thư
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li>
                    <a class="" href="admin/vanthu/danhsachvanthu">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Danh sách văn thư
                    </a>
                </li>
                <li>
                    <a class="" href="admin/vanthu/themvanthu">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm văn thư
                    </a>
                </li>
            </ul>
        </li>

        <li class="parent ">
            <a href="admin/monhoc/danhsachmon">
                <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản môn học
            </a>
            <ul class="children collapse" id="sub-item-3">
                <li>
                    <a class="" href="admin/monhoc/danhsachmon">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Danh sách môn học
                    </a>
                </li>
                <li>
                    <a class="" href="admin/monhoc/themmon">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm môn học
                    </a>
                </li>
            </ul>
        </li>

        <li class="parent ">
            <a href="admin/hocki/danhsachhocki">
                <span data-toggle="collapse" href="#sub-item-4"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý năm học
            </a>
            {{--<ul class="children collapse" id="sub-item-4">--}}
                {{--<li>--}}
                    {{--<a class="" href="admin/hocki/danhsachhocki">--}}
                        {{--<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Danh sách học kì--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li>--}}
                    {{--<a class="" href="admin/hocki/themhocki">--}}
                        {{--<svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm học kì--}}
                    {{--</a>--}}
                {{--</li>--}}
            {{--</ul>--}}
        </li>
        <li class="parent ">
            <a href="admin/quantri/dsquantri">
                <span data-toggle="collapse" href="#sub-item-6"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Quản lý quản trị
            </a>
            <ul class="children collapse" id="sub-item-6">
                <li>
                    <a class="" href="admin/quantri/dsquantri">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Danh sách quản trị
                    </a>
                </li>
                <li>
                    <a class="" href="admin/quantri/themquantri">
                        <svg class="glyph stroked plus sign"><use xlink:href="#stroked-plus-sign"/></svg> Thêm quản trị
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent ">
            <a href="admin/lammoimatkhau">
                <span data-toggle="collapse" href="#sub-item-7"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Lấy mới mật khẩu
            </a>
        </li>

        <!--   <li class="parent ">
              <a href="#">
                  <span data-toggle="collapse" href="#sub-item-5"><svg class="glyph stroked two messages"><use xlink:href="#stroked-two-messages"/></svg></span> Quản lý bình luận
              </a>

          </li>
          <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"/></svg> Cấu hình</a></li> -->

        <li role="presentation" class="divider"></li>
        <li><a href="logout"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Đăng xuất</a></li>
    </ul>

</div><!--/.sidebar-->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <!-- content            -->
    <script>
        function xoaSanPham(){
            var conf=confirm("Bạn có chắc chắn muốn xóa?");
            return conf;
        }
        function khoiPhucSanPham(){
            var conf=confirm("Bạn có chắc chắn muốn khôi phục?");
            return conf;
        }
        function themSanPham(){
            var conf=confirm("Bạn có chắc chắn muốn thêm ?");
            return conf;
        }
    </script>
