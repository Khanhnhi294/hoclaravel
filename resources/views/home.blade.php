<h1 style="text-align: center;">Học lập trình tại Unicode</h1>
<?php
echo date('Y-m-d H:i:s');
echo config('app.env');
?>
<!-- Trong id va slug co the dung vong lap de lay id va slug cua tung URL trong database -->
<a href="<?php echo route('admin.tintuc', ['id'=>1, 'slug'=>'tin-tuc-the-gioi'])?>">xem tin tuc</a>