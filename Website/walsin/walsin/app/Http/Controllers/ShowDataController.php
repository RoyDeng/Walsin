<?php

namespace App\Http\Controllers;

use \App\Mo as MoEloquent;
use \App\Mo_item as MoItemEloquent;
use \App\Error as ErrorEloquent;
use \App\Stock_item as StockItemEloquent;
use \App\Order_item as OrderItemEloquent;
use \App\Ac_item as AcItemEloquent;
use \App\Po_item as PoItemEloquent;
use \App\Order as OrderEloquent;
use \App\Ps_item as PsItemEloquent;
use \App\Workstation as WorkstationEloquent;

use View;
use Auth;
use Request;
use Redirect;

class ShowDataController extends Controller
{
	public function getMoData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$mo=MoEloquent::with('order','order_item','mo_item','ps')->get();
        return view('mo', ['mo'=>$mo,'notification'=>$notification,'num'=>$num]);
    }

	public function getMoDetails($o_id)
	{
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$mo=MoEloquent::where('o_id', $o_id)->firstOrFail();
		$mo_item=MoItemEloquent::where('m_id', $mo->m_id)->get();
		$orders=OrderEloquent::with('client','order_item','ps_item')->where('o_id', $o_id)->firstOrFail();
        return view('mo_details', ['mo'=>$mo,'mo_item'=>$mo_item,'orders'=>$orders,'notification'=>$notification,'num'=>$num]);
    }

	public function getErrorData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$error=ErrorEloquent::all();
        return view('error', ['error'=>$error,'notification'=>$notification,'num'=>$num]);
    }
	
    public function getCarryData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$carry=StockItemEloquent::with('stock','place_item')->get();
        return view('carry', ['carry'=>$carry,'notification'=>$notification,'num'=>$num]);
    }
	
    public function getStorageData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$storage=StockItemEloquent::with('order_item','place_item')->get();
        return view('storage', ['storage'=>$storage,'notification'=>$notification,'num'=>$num]);
    }	
	
	public function getExportData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$export=StockItemEloquent::with('order_item')->get();
        return view('export', ['export'=>$export,'notification'=>$notification,'num'=>$num]);
    }
	
	public function getTestData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$test=AcItemEloquent::with('ac','item')->get();
        return view('test', ['test'=>$test,'notification'=>$notification,'num'=>$num]);
    }
	
	public function getStockData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$stock=StockItemEloquent::with('stock','place_item')->get();
        return view('stock', ['stock'=>$stock,'notification'=>$notification,'num'=>$num]);
    }
	
	public function getProcureData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$procure=PoItemEloquent::with('po','bo')->get();
        return view('procure', ['procure'=>$procure,'notification'=>$notification,'num'=>$num]);
    }
	
	
	public function getImportData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
	    $import=StockItemEloquent::with('stock','order_item')->get();
        return view('import', ['import'=>$import,'notification'=>$notification,'num'=>$num]);
    }
	
	public function getPickData()
    {
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$pick=StockItemEloquent::with('stock')->get();
        return view('pick', ['pick'=>$pick,'notification'=>$notification,'num'=>$num]);
    }

	public function getOrderData()
	{
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$order=OrderEloquent::with('order_item','mo')->get();
        return view('order', ['order'=>$order,'notification'=>$notification,'num'=>$num]);
    }
	
	public function getSearchResult()
	{
		$num=ErrorEloquent::where('r_status','=',0)->count();
		$notification=ErrorEloquent::all();
		$keyword=Request::get('keyword');
		$search=WorkstationEloquent::where('w_id','LIKE',"%$keyword%")->paginate(10);
        return view('search', ['search'=>$search,'notification'=>$notification,'num'=>$num]);
    }
}