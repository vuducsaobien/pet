<?php
namespace App\Mail;

use App\Models\SettingModel;
use Illuminate\Support\Facades\Mail;
use App\Helpers\Template;

class MailService
{
    private $fromTitle;

    public function __construct()
    {
        $this->fromTitle = 'Pet Shop Marten';
    }

    public function sendContactConfirm($data)
    {
        $mail = json_decode(SettingModel::where('key_value', 'setting-email')->first()->value, true);
        if (empty($mail))
            return false;
        else {
            Mail::send([], [], function ($message) use ($mail, $data) {
                $message->from($mail['username'], $this->fromTitle);
                $message->to($data['email']);
                $message->subject($this->fromTitle . ' Thông báo gửi liên hệ thành công');

                $content = sprintf('
                <p>Xin chào, %s</p>
                <p>Pet Shop Marten đã nhận được thông tin liên hệ từ bạn và sẽ phản hồi bạn trong thời gian sớm nhất</p>
                <p>Cảm ơn!</p>
                ', $data['name']);
                $message->setBody($content, 'text/html');
            });
            return true;
        }
    }

    public function sendContactInfo($data)
    {
        $mail = json_decode(SettingModel::where('key_value', 'setting-email')->first()->value, true);
        if (empty($mail))
            return false;
        else {
            Mail::send([], [], function ($message) use ($mail, $data) {
                $message->from($mail['username'], $this->fromTitle);

                $bcc = explode(',', SettingModel::where('key_value', 'setting-bcc')->first()->value);
                $message->bcc($bcc);

                $message->subject('Thông tin liên hệ từ ' . $data['name']);
                $content = sprintf('
                <p>Name: %s</p>
                <p>Email: %s</p>
                <p>Subject: %s</p>
                <p>Message: %s</p>
                ', $data['name'], $data['email'], $data['subject'], $data['message']);
                $message->setBody($content, 'text/html');
            });
            return true;
        }
    }

    public function sendOrderConfirm($data)
    {
        $mail = json_decode(SettingModel::where('key_value', 'setting-email')->first()->value, true);
        if (empty($mail))
            return false;
        else {

            // echo '<pre style="color:red";>$data === '; print_r($data);echo '</pre>';
            // echo '<h3>Die is Called </h3>';die;

            Mail::send([], [], function ($message) use ($mail, $data) {
                $message->from($mail['username'], $this->fromTitle);
                $message->to($data['email']);
                $message->subject($this->fromTitle . ' Thông báo Đặt Hàng Thành Công !!');

                $cart = $data['cart'];
                $total = Template::format_price($data['amount'], 'vietnamese dong');

                $htmlProduct = '';
                foreach ($cart as $key => $value) {
                    $price       = Template::format_price($value['price'], 'vietnamese dong');
                    $total_price = Template::format_price($value['total_price'], 'vietnamese dong');

                    $attribute           = $value['attribute'];
                    $attribute_value     = $value['attribute_value'];
                    $strAttrb            = '';
                    $i = 1;
                    foreach ($attribute as $keyChild => $valueChild) {
                        $strAttrb .= "$valueChild: $attribute_value[$keyChild] - ";
                    }
                    $strAttrb = ' - Thuộc tính SP : ' . substr($strAttrb, 0, -3) . '.';
                    
                    $htmlProduct .= '
                    <h5>Sản phẩm số '.($key+1).':</h5>
                    <ul>
                        <li>Tên Sản Phẩm: '.$value['name'] . $strAttrb .'</li>
                        <li>Mã Sản Phẩm: '.$value['product_code'].'</li>
                        <li>Số lượng: '.$value['quantity'].'</li>
                        <li>Giá 1 Sản Phẩm: '.$price.'</li>
                        <li>Tổng Giá Tiền: '.$total_price.'</li>
                    </ul>
                    ';
                }

                $content = '
                    <p>Xin chào, '.$data['name'].'</p>
                    <p>Pet Shop Marten Cám ơn bạn đã Đặt Hàng.</p>

                    <h5>Thông tin nhận hàng:</h5>
                    <ul>
                        <li>Tên Khách Hàng: '.$data['name'].'</li>
                        <li>Mã Đơn Hàng: '.$data['order_code'].'</li>
                        <li>Địa chỉ nhận hàng: '.$data['address'].'</li>
                        <li>Email: '.$data['email'].'</li>
                        <li>Số Điện thoại: 0'.$data['phone'].'</li>
                        <li>Phương thức thanh toán: '.$data['payment_id'].'</li>
                        <li>Tổng số lượng Sản phẩm: '.$data['quantity'].'</li>
                        <li>Tổng Số Tiền: '.$total.'</li>
                    </ul>

                    <h5>Thông tin Chi tiết Đơn Hàng:</h5>
                    '.$htmlProduct.'
                    <p>Cảm ơn!</p>
                ';
                $message->setBody($content, 'text/html');
            });
            return true;
        }
    }




    // Mailer::sendContactConfirm($data);
    // Mailer::sendContactInfo($data);
}