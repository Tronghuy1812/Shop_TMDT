<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <h3 class="title-5 m-b-35 ">Quản Lý Danh Mục Sản Phẩm</h3>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="?module=backend&controller=category&action=create" class="au-btn au-btn-icon btn btn-primary text-white">
                            <i class="zmdi zmdi-plus"></i>
                            add item
                        </a>

                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>description</th>
                                <th>image</th>
                                <th>status</th>
                                <th>ord</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rows = $nhomsanpham->data;

                            foreach ($rows as $row) :
                            ?>
                                <tr class="tr-shadow">
                                    <td><?= $row['name'] ?></td>
                                    <td class="desc"><?= $row['description'] ?></td>
                                    <td class="desc"><?= $row['image'] ?></td>
                                    <td class="desc"><?= $row['status'] ?></td>
                                    <td class="desc"><?= $row['ord'] ?></td>

                                    <td>
                                        <div class="table-data-feature">
                                            <a href="index_admin.php?module=backend&controller=category&action=update&id=<?=$row["id"]?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="index_admin.php?module=backend&controller=category&action=delete&id=<?=$row["id"]?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </a>
                                            <a href="" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="spacer"></tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- END DATA TABLE -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="copyright">
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>