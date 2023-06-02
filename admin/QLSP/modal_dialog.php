<?php
include('../../model/db.class.php');
include '../../model/ADMINsanpham.class.php';
include '../../view/ADMINsanphamView.php';
$sanpham = new sanphamview();

?>
<div class="modal fade" id="modal_dialog" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method="post" id="insert_product">
          <div class="form-group">
            <img id="image_preview" src="" alt="">
            <input type="file" id="file_upload" accept=".jpg, .png" name="displayImage" hidden onchange="imagePreview(this)">
            <label for="file_upload" class="label_upload"><b>Choose image</b></label>
          </div>
          <div class="form-group">
            <label for="id_dt" id="id">ID_dienthoai</label>
            <input class="form-control" type="text" name="id_dt" id="id_dt" value='<?php echo $id ?>' placeholder="ID_dienthoai" disabled>
          </div>
          <div class="form-group">
            <label for="idthuonghieu">Tên thương hiệu</label></br>
            <select id="idthuonghieu" name="idthuonghieu">
              <option value="">--option--</option>
              <?php

              $result = $sanpham->getCartegoryView();
              foreach ($result as $data) {
                $id_th = $data['id_thuonghieu'];
                $tenTH = $data['tenthuonghieu'];
              ?>
                <option value="<?php echo $id_th; ?>"><?php echo $tenTH; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="idncc">Tên nhà cung cấp</label></br>
            <select id="idncc" name="idncc">
              <option value="">--option--</option>
              <?php
              $result = $sanpham->getNhacungcapView();
              foreach ($result as $data) {
                $id_ncc = $data['id_nhacungcap'];
                $tenNcc = $data['tennhacungcap'];
              ?>
                <option value="<?php echo $id_ncc; ?>"><?php echo $tenNcc; ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="tendt">Tên điện thoại</label>
            <input class="form-control" type="text" name="tendt" id="tendt" placeholder="tendt">
          </div>

          <div class="form-group">
            <label for="mota">Mô tả </label>
            <textarea class="form-control" type="text" name="mota" id="mota" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="gia">Giá</label>
            <input class="form-control" type="text" name="gia" id="gia"  disabled>
          </div>
          <div class="form-group">
            <label for="soluong">Số lượng</label>
            <input class="form-control" type="text" id="soluong" name="soluong" disabled>
          </div>
         
            <div class="form-group">
              <label for="idkm">Tên khuyến mãi</label></br>
              <select id="idkm" name="idkm">
                <option value="">--option--</option>
                <?php
                $result = $sanpham->getKhuyenmaiView();
                foreach ($result as $data) {
                  $id_km = $data['id_khuyenmai'];
                  $tenKM = $data['tenkhuyenmai'];
                ?>
                  <option value="<?php echo $id_km; ?>"><?php echo $tenKM; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label for="idbh">Tên bảo hành</label></br>
              <select id="idbh" name="idbh">
                <option value="">--option--</option>
                <?php
                $result = $sanpham->getBaohanhView();
                foreach ($result as $data) {
                  $id_bh = $data['ID_Baohanh'];
                  $tenBH = $data['Tenbaohanh'];
                ?>
                  <option value="<?php echo $id_bh; ?>"><?php echo $tenBH; ?></option>
                <?php
                }
                ?>
              </select>
            </div>
        </form>
      </div>
      <div class='row mt-3' id="active">
        <div class='col'>
          <div class='form-check form-switch d-flex justify-content-start align-items-center'>
            <input class='form-check-input' type='checkbox' id='flexSwitchCheckChecked' name='active'>
            <label class='form-check-label fs-5 text-success fw-bold ms-3' for='flexSwitchCheckChecked'>Active</label>
          </div>
        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-success" data-key='edit' name='edit' id="button_edit">
          Edit
        </button>
        <button type="button" class="btn btn-success" data-key='insert' name='insert' id="button_insert">
          Insert Product
        </button>
      </div>

    </div>
  </div>
</div>