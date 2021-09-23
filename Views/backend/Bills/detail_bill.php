<div class="section__content section__content--p30">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <!-- DATA TABLE -->
                <div class="table-data__tool">
                    <div class="table-data__tool-left">
                        <h3 class="title-5 m-b-35 " >Quản Lý Chi Tiết Hóa Đơn</h3>
                    </div>
                </div>

                <?php
                    $status="";
                    if($rowHD["status"]==0)
                        $status = "HĐ mới";
                    else if($rowHD["status"]==1)
                        $status = "Đã duyệt";
                    else if($rowHD["status"]==2)
                        $status = "Đã Thanh toán";
                    else if($rowHD["status"]==3)
                        $status = "Tạm hủy";
                ?>

                <p> Status :<b> <?=$status?> </b>
                <select name="sTT" id="sTT" onChange="sTT_Change(this.value);">
                    <option value=""> Đổi trạng thái HĐ</option>
                    <option value="0"> Hóa đơn mới</option>
                    <option value="1"> Hóa đơn đã duyệt</option>
                    <option value="2"> Hóa đơn đã thanh toán</option>
                    <option value="3"> Hóa đơn tạm hủy</option>
                </select>
                <script>
                    function sTT_Change(new_value)
                    {
                        if(new_value!="")
                        window.location.href=
                        "index_admin.php?module=backend&controller=bill&action=status&id_bill=<?=$id_bill?>&ttht=<?=$rowHD["status"]?>&ttmoi="+new_value;
                    }
                </script>
                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>name</th>
                                <th>Quantity</th>
                                <th>purchase_price</th>
                                <th>into money</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                              $rows = $hoadon->data;
                              foreach($rows as $row):
                                $stt++;
                            ?>
                            <tr class="tr-shadow">
                              <td><?=$stt?></td>
                              <td><?=$row["name"]?></td>
                              <td><?=$row["quantity"]?></td>
                              <td><?=$row["purchase_price"]?></td>
                              <td><?=$row["purchase_price"]*$row["quantity"]?></td>
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
                    <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a
                            href="https://colorlib.com">Colorlib</a>.</p>
                </div>
            </div>
        </div>
    </div>
</div>