<?php

use App\Models\Post;
use App\Libraries\MyClass;
//SELECT*FROM category WHERE status !=0 AND ODERBY created DESC
$id = $_REQUEST['id'];
$page = Post::find($id);
if ($page == NULL) {
   MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
   header("location:index.php?option=page");
}

?>
<?php require_once '../views/backend/header.php'; ?>
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <!-- CONTENT -->
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cập nhật trang đơn</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>
               <a href="index.php?option=page" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
            </div>
            <div class="card-body">
            <?php require_once "../views/backend/message.php"; ?>
               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-3">
                        <input type="hidden" name="id" value="<?= $page->id; ?>">
                        <label>Tên trang (*)</label>
                        <input type="text" value="<?= $page->title; ?>" name="title" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" value="<?= $page->slug; ?>" name="slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Chi tiết</label>
                        <textarea name="detail" class="form-control"><?= $page->detail; ?></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Kiểu trang</label>
                        <input type="text" name="type" class="form-control">
                     </div>

                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1" <?= ($page->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                           <option value="2" <?= ($page->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>