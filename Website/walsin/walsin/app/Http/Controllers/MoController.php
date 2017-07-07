<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoRequest;

use App\Mo;
use App\Mo_item;
use \App\Error as ErrorEloquent;
use \App\Error_item as ErrorItemEloquent;
use \App\Mo as MoEloquent;
use \App\Mo_item as MoItemEloquent;
use \App\Workstation as WorkstationEloquent;
use \App\User as UserEloquent;
use \App\Order as OrderEloquent;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use View;

class MoController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function editMo($o_id)
	{
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$mo=MoEloquent::where('o_id', $o_id)->firstOrFail();
		$mo_item=MoItemEloquent::where('m_id', $mo->m_id)->get();
		$orders=OrderEloquent::with('client','order_item')->where('o_id', $o_id)->firstOrFail();
		$workstation=WorkstationEloquent::all();
		$user=UserEloquent::all();
		return View::make('add',['mo'=>$mo,'mo_item'=>$mo_item,'orders'=>$orders,'workstation'=>$workstation,'user'=>$user,'notification'=>$notification,'num'=>$num]);
	}

	public function addItem(MoRequest $request, $o_id)
	{
		$mo=Mo::where('o_id',$o_id)->first();

		if(!$mo){
			$mo=new Mo();
			$mo->o_id=$o_id;
			$mo->m_date=new Date();
			$mo->save();
		}

		$moItem=new Mo_item();
		$moItem->m_id=$mo->m_id;
		$moItem->fill($request->all());
		$moItem->save();

		return redirect()->back();
	}
	
	public function removeItem($mo_id)
	{
		$removeMoItem=MoItemEloquent::findOrFail($mo_id);
		$removeMoItem->delete();
        return redirect()->back();
    }
	
	public function updateOrder($o_id)
	{
		$orderStatus=OrderEloquent::where('o_id',$o_id)->first();
		$orderStatus->o_status=1;
		$orderStatus->save();
        return redirect('mo');
    }
}