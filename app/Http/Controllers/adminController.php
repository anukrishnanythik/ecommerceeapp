<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
use App\Notifications\ordermailnotification;
use Illuminate\Support\Facades\Notification;

class adminController extends Controller

{
    public function show()
    {
        $order= Order::with('orderuser')->with('orderproduct')->get();
        return view('admin.showorder',compact('order'));
    }

public function delivery(string $id)
{
    $order= Order::findOrFail(decrypt($id));
    $order['deliverystatus'] ='delivered';
    $order['paymentstatus'] ='paid';
    $order-> update();
    return redirect()->back();
}

public function printpdf(string $id)
{
    $order= Order::findOrFail(decrypt($id));
    $pdf = PDF::loadView('admin.pdfview',compact('order'));
    return $pdf->download('orderdetails.pdf');
}

public function emailview(string $id)
{
    $order= Order::with('ordercart')->findOrFail(decrypt($id));
    return view('admin.emailview',compact('order'));
}

    public function sendemail(Request $request, $id)
    {
    $data= User::findOrFail(decrypt($id));
    $details=[
        'greeting'=>$request->greeting,
        'body'=>$request->body,
        'actiontext'=>$request->actiontext,
        'actionurl'=>$request->actionurl,
        'endpart'=>$request->endpart
    ];
    Notification::send($data,new ordermailnotification($details));
    return redirect()->back()->with('status',"Notification sent succesfully!!");
}

public function ordersearch(Request $request)
{
  $searchtext=$request->search;
  $order= Order::where('username','LIKE','%'.$searchtext.'%')->orWhere('phone','LIKE','%'.$searchtext.'%')->get();

    return view('admin.showorder',compact('order'));
}



}
