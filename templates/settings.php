<?php
if (!defined("ABSPATH")) {
    exit;
}

$payro24      = $this->get_option('payro24') ? 'checked' : '';
$is_encript = $this->get_option('is_encript') ? 'checked' : '';
$sandbox    = $this->get_option('sandbox') ? 'checked' : '';
$websiteurl = get_site_url();

?>
<div class="wrap">
    <h1>تنظیمات</h1>
    <form method="post" action="<?php echo $websiteurl . '/wp-admin/admin.php?page=payro24_wpefc_setting' ?>">
        <table>
            <tr style="height: 20px;"></tr>
            <tr style="line-height: 20px;margin-top: 30px">
                <td style="border-bottom: 1px solid #ccc;"><b>پیرو</b></td>
            </tr>
            <tr>
                <td><label>فعال سازی درگاه</label></td>
                <td><input type="checkbox" name="payro24" value="1" <?php echo $payro24 ?>></td>
            </tr>
            <tr>
                <td><label>آزمایشگاه</label></td>
                <td><input type="checkbox" name="sandbox" value="1" <?php echo $sandbox ?>></td>
            </tr>
            <tr>
                <td><label>کد درگاه پیرو</label></td>
                <td><input type="text" name="api_key" size="36" value="<?php echo $this->get_option('api_key') ?>"></td>
            </tr>
            <tr>
                <td><label>واحد پول</label></td>
                <td>
                    <select name="currency">
                        <option value="rial" <?php selected($this->get_option('currency'), 'rial'); ?>>ریال</option>
                        <option value="toman" <?php selected($this->get_option('currency'), 'toman'); ?>>تومان</option>
                    </select>
                </td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                <td><label>پیام پرداخت موفق</label></td>
                <td><textarea name="sucssesmsg" rows="4"
                              cols="50"><?php echo $this->get_option('sucssesmsg') ?></textarea></td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr>
                <td><label>پیام پرداخت ناموفق</label></td>
                <td><textarea name="faildmsg" rows="4" cols="50"><?php echo $this->get_option('faildmsg') ?></textarea>
                </td>
            </tr>
            <tr style="height: 20px;"></tr>
            <tr style="line-height: 20px;margin-top: 30px">
                <td style="border-bottom: 1px solid #ccc;"><b>سیستم رمزگزاری</b></td>
            <tr>
                <td><label>فعال</label></td>
                <td><input type="checkbox" name="is_encript" value="1" <?php echo $is_encript ?>></td>
            </tr>
        </table>
        <p>در صورتی که از نسخه های نال افزونه استفاده میکنید و پرداخت صورت نمیگیرد، رمزگزاری را غیرفعال کنید</p>
        <input type="submit" class="button button-primary" value="ذخیرهٔ تغییرات">
    </form>
</div>
<style>
    .wrap form input, .wrap form textarea {
        border: 1px solid #ccc;
    }
    .wrap form{
        line-height: 40px;
    }
</style>