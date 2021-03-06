    <div class="contentpanel">
      
      <div class="row">

      <ul class="nav nav-tabs">
          <li class="active"><a href="#home" data-toggle="tab"><strong>Danh sách người dùng</strong></a></li>
          <li><a href="#profile" data-toggle="tab"><strong>Thêm người dùng</strong></a></li>
      </ul>

        <div class="tab-content mb30">
          <div class="tab-pane active" id="home">
            <div class="row">
               <div class="clearfix mb30"></div>           
          <?php echo form_error('tendangnhap'); ?>
          <?php echo form_error('email'); ?>
          <h5 class="subtitle mb5">Danh sách người dùng</h5>
          
           <div class="alert alert-danger msgalert" style=" display:none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>Có lỗi!</strong> Dữ liệu đang được sử dụng!
              </div>
           <div class="alert alert-danger msgerror" style=" display:none;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>Có lỗi!</strong> Xảy ra lỗi xử lý!
            </div>
           <div class="alert alert-success msgsuccess" style=" display:none;">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Xử lý thành công!
            </div>

          <br />
            <div class="col-sm-8"> 
                <label>Phân người dùng theo loại:</label>
                <select name="quyen" onchange="quyen()">
                  <option value="0" <?=(isset($_GET['quyen']) && $_GET['quyen'] == 0)?"selected":''?>>--- Tất cả ---</option>
                  <option value="1" <?=(isset($_GET['quyen']) && $_GET['quyen'] == 1)?"selected":''?>>Quản lý</option> 
                  <option value="2" <?=(isset($_GET['quyen']) && $_GET['quyen'] == 2)?"selected":''?>>Nhân viên</option>
                  <option value="3" <?=(isset($_GET['quyen']) && $_GET['quyen'] == 3)?"selected":''?>>Khách hàng</option>                
                </select>
            </div>
            <br/>
            <br/>
          <div class="table-responsive">
          <table class="table table-hover" id="table2">
              <thead>
                 <tr>
                    <th>Tên người dùng</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Giới tính</th>
                    <th>SĐT</th>
                    <th>Trạng thái</th>
                    <th>Thao tác </th>
                 </tr>
              </thead>
              <tbody>
              <?php foreach ($result as $item) { ?>              	              
                 <tr id="cate_<?=$item['ID'] ?>" class="odd gradeX">
                    <td><?=$item['TENNGUOIDUNG']?></td>
                    <td><?=$item['TENDANGNHAP']?></td>
                    <td><?=$item['EMAIL']?></td>
                    <td class="center"><?php if($item['GIOITINH'] == 1) echo "Nam"; else echo "Nữ"; ?></td>
                    <td class="center"><?=$item['SDT'] ?></td>
                    <td class="center"><?php if($item['TRANGTHAI'] == 1) echo "Mở"; else echo "Đóng"; ?></td>
                    <td class="table-action">                    
	                  <a href="<?=base_url()?>admin/nguoidung/edit?id=<?php echo $item['ID'] ?>" ><i class="fa fa-pencil"></i></a>
                    <?php if ($UserID!=$item['ID']) 
                    {                                
                        if ($Quyen==2)
                        {
                            if ($item['QUYEN']!=1) 
                              echo '<a href="#" onclick="DeleteCate('.$item['ID'].',\''.$page.'\')" class="delete-row"><i class="fa fa-trash-o"></i></a>';                            
                        }
                        else
                          echo '<a href="#" onclick="DeleteCate('.$item['ID'].',\''.$page.'\')" class="delete-row"><i class="fa fa-trash-o"></i></a>';
                    }
                    ?>
	                </td>
                 </tr>     
                <?php } ?>           
              </tbody>
           </table>
          </div><!-- table-responsive -->

            </div>
          </div>
          <div class="tab-pane" id="profile">
            <div class="row">
                 <form id="basicForm" action="<?=base_url()?>admin/nguoidung/insert" method="post" class="form-horizontal">
          <div class="panel panel-default">
              <div class="panel-heading">
                <div class="panel-btns">
                  <a href="#" class="panel-close">&times;</a>
                  <a href="#" class="minimize">&minus;</a>
                </div>
                <h4 class="panel-title">Thêm người dùng</h4>
                <p>Xin hãy nhập đúng các thông tin sau đây.</p>
              </div>
              <div class="panel-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Họ tên <span class="asterisk">*</span></label>
                  <div class="col-sm-6">                    
                    <input type="text" name="hoten" id="hoten" title="Điền họ tên đầu đủ!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" />
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tên đăng nhập <span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input type="text" name="tendangnhap" id="tendangnhap" title="Điền tên đăng nhập!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" />                    
                  </div>
                </div>      

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Mật khẩu <span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input type="password" name="matkhau" id="matkhau" title="Điền mật khẩu!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" />
                  </div>
                </div>    

                <div class="form-group">
                  <label class="col-sm-2 control-label">Email <span class="asterisk">*</span></label>
                  <div class="col-sm-6">
                    <input type="email" name="email" id="email" title="Điền địa chỉ email!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Ngày sinh <span class="asterisk">*</span></label>
                  <div class="col-sm-4">
                     <div class="input-group">
                      <input name="namsinh" type="text" title="Chọn ngày sinh!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" placeholder="mm/dd/yyyy" id="datepicker">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Giới tính</label>
                  <div class="col-sm-6">
                    <div class="rdio rdio-primary">
                      <input type="radio" id="male" value="1" name="gioitinh" checked>
                      <label for="male">Nam</label>
                    </div><!-- rdio -->
                    <div class="rdio rdio-primary">
                      <input type="radio" value="0" id="female" name="gioitinh">
                      <label for="female">Nữ</label>
                    </div><!-- rdio -->
                    <label class="error" for="gioitinh"></label>
                  </div>
                  </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Địa chỉ</label>
                  <div class="col-sm-6">
                    <input name="diachi" title="Điền địa chỉ!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" id="diachi"></input>
                  </div>
                </div>   

                <div class="form-group">
                  <label class="col-sm-2 control-label">CMND</label>
                  <div class="col-sm-6">
                    <input name="CMND" title="Điền số chứng minh nhân dân!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" id="CMND"></input>
                  </div>
                </div>          

                  <div class="form-group">
                  <label class="col-sm-2 control-label">Số điện thoại</label>
                  <div class="col-sm-6">
                    <input name="SDT" title="Điền số điện thoại!" data-toggle="tooltip" data-trigger="hover" class="form-control tooltips" id="SDT"></input>
                  </div>
                </div>        
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Quyền</label>
                  <div class="col-sm-3">
                    <select id="fruits" name="quyen" class="form-control ">                        
                      <option value="1">Quản lý</option> 
                      <option value="2">người dùng</option>
                      <option value="3" selected>Khách hàng</option>                     
                    </select>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Chọn trạng thái</label>
                  <div class="col-sm-6">
                    <div class="col-sm-6">
                      <div class="rdio rdio-primary">
                        <input type="radio" id="on" value="1" name="trangthai" checked>
                        <label for="on">Đang hoạt động</label>
                      </div><!-- rdio -->
                    </div>
                    <div class="col-sm-4">
                      <div class="rdio rdio-primary">
                        <input type="radio" id="off" value="0" name="trangthai" required="">
                        <label for="off">Ngưng hoạt động</label>
                      </div><!-- rdio -->
                    </div>                           
                    <label class="error" for="trangthai"></label>
                  </div>
                  </div>

                <div class="form-group">
              <label class="col-sm-2 control-label">Hình đại diện</label>
              <div class="col-sm-6">
                <span class="field">
                <div class="col-sm-6">
                  <img src="" id="ViewHinh" alt="" width="150px" height="auto" />
                </div>
                <div class="col-sm-6">
                <input type="text" name="HinhDaiDien" class="form-control" id="HinhAnh" onchange="ChangeImage()"  value="<?=set_value('HinhDaiDien')?>" />
                <a class="btn btn-default" href="javascript:BrowseServer(HinhAnh)" > <span>Chọn hình</span></a> </span><br />
                <small style="font-size:14px;" class="desc">Click vào nút chọn hình để up hình hoặc dán link hình vào ô trống. Up hình với tỉ lệ width x height: 210x210; 300x300</small> </p>
                 </div>
                  </div>
                </div>
              </div>
            </div>

              </div><!-- panel-body -->
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-5 col-sm-offset-4">
                    <button class="btn btn-primary">Thêm mới</button>                    
                  </div>
                </div>
              </div>
            
          </div><!-- panel -->
          </form>
            </div>
          </div>
        </div>

      </div>

    </div><!-- contentpanel -->
<script type="text/javascript">
 var link = "http://localhost/SMobile/admin/nguoidung";
  function quyen()
  {
      window.location.href = link +'?quyen=' + jQuery('select[name=quyen]').val();
  }  
</script>