<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <h3 class="title-5 m-b-35 " >Quản Lý Hóa Đơn</h3>
                    </div>
                </div>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>name</th>
                                <th>address</th>
                                <th>phone_number</th>
                                <th>order_date</th>
                                <th>received_date</th>
                                <th>sum</th>
                                <th>status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $rows= $hoadon->data;
                            foreach ($rows as $row):
                                $status="";
                                if($row["status"]==0)
                                    $status = "HĐ mới";
                                else if($row["status"]==1)
                                    $status = "Đã duyệt";
                                else if($row["status"]==2)
                                    $status = "Đã Thanh toán";
                                else if($row["status"]==3)
                                    $status = "Tạm hủy";
                        ?>
                            <tr class="tr-shadow">
                                <td><?=$row['name']?></td>
                                <td>
                                    <span class="block-email"><?=$row['address']?></span>
                                </td>
                                <td class="desc"><?=$row['phone_number']?></td>
                                <td class="desc"><?=$row['order_date']?></td>
                                <td class="desc"><?=$row['received_date']?></td>
                                <td><?=$hoadon->TongTien($row["id_bill"])?></td>
                                <td><?=$status?></td>
                            </tr>
                            <tr class="spacer"></tr>
                            <td>
                                <div class="table-data-feature">
                                    <!-- <a href="?module=backend&controller=bill&action=delete&id=" class="item" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="Delete">
                                        <i class="zmdi zmdi-delete"></i>
                                    </a> -->

                                    <?php
                                        if ($row['status'] != 2) {
                                            echo "<a href='?module=backend&controller=bill&action=delete&id_bill=".$row['id_bill']."'>Xóa---</a>";
                                        } else {
                                            echo "xóa";
                                        }
                                    ?>

                                    <a href="?module=backend&controller=bill&action=detail&id_bill=<?=$row['id_bill']?>" class="item" data-toggle="tooltip" data-placement="top" title=""
                                        data-original-title="More">
                                        <i class="zmdi zmdi-more"></i>
                                    </a>
                                </div>
                            </td>
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
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                            href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>