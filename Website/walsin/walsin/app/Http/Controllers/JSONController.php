<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
use Carbon\Carbon;

use \App\Order as OrderEloquent;
use App\Mo;
use App\Mo_item;
use App\Ps_item;
use App\Workstation;
use App\Error;

use Redirect;

class JSONController extends Controller
{
	public function getItem()
	{
		$o_id=Request::get('o_id');
		$ps=OrderEloquent::with('ps_item','order_item')->where('o_id','=',$o_id)->get();
		return view('ps',['ps'=>json_encode($ps,JSON_UNESCAPED_UNICODE)]);
	}

	public function getError()
	{
		$error=Error::all();
		return view('alert',['error'=>json_encode($error,JSON_UNESCAPED_UNICODE)]);
	}

	public function updateData()
	{
		$o_id=Request::get('o_id');
		$w_id=Request::get('w_id');
		
		$mo=Mo::where('o_id',$o_id)->first();
		$mo_item=Mo_item::where('m_id',$mo->m_id)->where('w_id',$w_id)->first();
		$workstation=Workstation::where('w_id',$w_id)->first();

		if($workstation->s_status==0)
		{
			$mo_item->m_status=1;
			$mo_item->m_time=Carbon::now();
			$mo_item->save();

			$ps_item=Ps_item::where('o_id',$o_id)->first();
			$w_count=Mo_item::where('m_id',$mo->m_id)->count();
			$pass_count=Mo_item::where('m_id',$mo->m_id)->where('m_status','=',1)->count();
			$o_reach=round($pass_count/$w_count,2);

			$ps_item->o_reach=$o_reach;
			$ps_item->save();
		}
		if($workstation->s_status==2)
		{
			$error=Error::where('o_id',$o_id)->first();

			if(!$error){
				$error=new Error();
				$error->o_id=$o_id;
				$error->r_time=Carbon::now();
				$error->save();
			}
		}
	}
}