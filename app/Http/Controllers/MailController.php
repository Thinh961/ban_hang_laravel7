<?php

namespace App\Http\Controllers;

use App\Mail\InfoAboutUs;
use Illuminate\Http\Request;
use App\Mail\MailCart;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function mailInfo(Request $request)
    {
        if (!empty($request->input('email'))) {
            $email = $request->input('email');
            $data = [
                'title' => 'Cảm ơn khách hàng',
                "content" => "Cảm ơn khách hàng đã đăng ký dịch vụ của chúng tôi,
                 chúng tôi là hệ thống Unimart chuyên cung cấp các sản phẩm về thiết bị điện tử,
                 chúng tôi cam kết sản phẩm của cửa hàng chúng tôi là chính hãng, giá cả hợp lí,
                 quý khách có thể ghé thăm của hàng của chúng tôi <a href='http://nguyenhieu.unitopcv.com/Project/unimart'>Unimart</a> ",
            ];
            Mail::to($email)->send(new InfoAboutUs($data));
            toastr()->success('Đăng kí nhận khuyến mãi thành công, vui lòng kiểm tra email của bạn');
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
}
