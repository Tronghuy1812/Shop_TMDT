<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <strong>Basic Form</strong> Elements
                    </div>
                    <div class="card-body card-block">
                        <form action="?module=backend&controller=product&action=addProduct" method="post" enctype="multipart/form-data" class="form-horizontal">
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">type_product_name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <!-- <input type="text" id="text-input" name="name" placeholder="Tên danh mục..."
                                        class="form-control"> -->
                                    <select name="id_cat" id="id_cat" class="form-control">
                                        <?php
                                            require_once("./Models/CategoryModel.php");
                                            require_once("./Helper/Tienich.php");
                                            $nps = new clsCategory();
                                            $nps->LayDanhSachNhomSanpham(1,0);//lấy nhóm sp có status=1
                                            ShowOptions($nps->data,"id","name",0);
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="name" placeholder="Tên danh mục..."
                                        class="form-control">
                                    <small class="form-text text-muted">Vui lòng nhập tên danh mục.</small>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="textarea-input" class=" form-control-label">description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <textarea name="description" id="textarea-input" rows="9"
                                        placeholder="Content..." class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="text-input" class=" form-control-label">Giá</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="text" id="text-input" name="price" placeholder="Giá..."
                                        class="form-control">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="file-input" class=" form-control-label">image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input type="file" id="file-input" name="image" class="form-control-file">
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3">
                                    <label for="radio-input" class=" form-control-label">Status</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    Có<input type="radio" id="radio-input1" name="status" value="1" checked=""> &nbsp;
                                    Không<input type="radio" id="radio-input2" name="status" value="0">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-sm" name='btn-submit'>
                                    <i class="fa fa-dot-circle-o"></i> Submit
                                </button>
                                <button type="reset" class="btn btn-danger btn-sm">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                            href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>