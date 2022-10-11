<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminNotificationController extends Controller
{
    public function maskAsRead($idOrder, $idNotifi)
    {
        $order = Order::find($idOrder);
        if ($order) {
            auth()->user()->unreadNotifications->where('id', $idNotifi)->markAsRead();
            return redirect(Route("admin.order.edit", $idOrder));
        }
        auth()->user()->unreadNotifications->where('id', $idNotifi)->markAsRead();
        return redirect('admin')->with('alert','Đơn hàng không tìm thấy hoặc đã bị xoá');
    }

    public function getId(){
        return response()->json(Auth::user()->unreadNotifications[0]->id);
    }
}
