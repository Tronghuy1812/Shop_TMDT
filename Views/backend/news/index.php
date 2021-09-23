<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <h3 class="title-5 m-b-35 ">Quản Lý Tin Tức</h3>
                    </div>
                    <div class="table-data__tool-right">
                        <a href="?module=backend&controller=new&action=create" class="au-btn au-btn-icon btn btn-primary text-white">
                            <i class="zmdi zmdi-plus"></i>
                            add item
                        </a>

                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>title</th>
                                <th>summary</th>
                                <th>content</th>
                                <th>image</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $rows = $tintuc->data;

                            foreach ($rows as $row) :
                            ?>
                                <tr class="tr-shadow">
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['summary'] ?></td>
                                    <td><?= $row['content'] ?></td>
                                    <td class="desc"><?= $row['image'] ?></td>
                                    <td class="desc"><?= $row['status'] ?></td>

                                    <td>
                                        <div class="table-data-feature">
                                            <a href="index_admin.php?module=backend&controller=new&action=update&id=<?=$row["id"]?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </a>
                                            <a href="index_admin.php?module=backend&controller=new&action=delete&id=<?=$row["id"]?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
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