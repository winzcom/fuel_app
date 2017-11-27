<?php

namespace App\Http\Controllers;


use App\Currency;
use App\Expense;
use App\Machine;
use App\Seller;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\GeneralSetting;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\MachineReading;
use App\Invoice;
use App\Customer;
use App\Sell;
use App\Fuel;

class SellerController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
    }

    public function getDashboard()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Seller Dashboard";
        $data['total_customer'] = Customer::all()->count();
        $data['total_machine'] = Machine::all()->count();
        $data['total_fuel'] = Fuel::all()->count();
        $data['total_seller'] = Seller::all()->count();
        return view('seller.seller-dashboard',$data);
    }
    public function getSellerMachine($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Seller Machine";
        $data['machine'] = Seller::findOrFail($id);
        return view('seller.seller-machine',$data);
    }
    public function getSellerMachineSell($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell Fuel";
        $data['machines'] = Seller::findOrFail(Auth::user()->id);
        $data['machine'] = Machine::findOrFail($id);
        return view('seller.seller-sell',$data);
    }
    public function postSellerMachineSell(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'machine_id' => 'required',
            'quantity' => 'required',
            'phone' => 'digits:11'
        ]);
        try {
            $customer = Input::except('_method','_token');

            $reading1 = MachineReading::where('start_reading_time','=',date('Y-m-d'))->count();
            $reading = MachineReading::where('start_reading_time','=',date('Y-m-d'))->get();

            if($reading1){
                foreach($reading as $r){
                    if($r->machine_id != $request->machine_id){
                        continue;
                    }else{
                        if($r->current_reading < $request->quantity){
                            session()->flash('message', 'Quantity Can\'t Large Then Current Reading.');
                            Session::flash('type', 'danger');
                            return redirect()->back();
                        }else{
                            $r->current_reading = $r->current_reading - $request->quantity;
                            $r->save();
                        }
                    }
                }
                $customer = Customer::create($customer);
                $invoice = [];
                $invoice['customer_id'] = $customer->id;
                $invoice['machine_id'] = $customer->machine_id;
                $invoice['quantity'] = $customer->quantity;
                $invoice['created_date'] = date("Y-m-d H:i:s");
                $invoice['pay_date'] = date("Y-m-d");
                $invoice['paid_by'] = Auth::user()->name;
                $invoice['paid_id'] = Auth::user()->id;
                $inv = Invoice::create($invoice);
                $cus1 = Customer::findOrFail($customer->id);
                $cus1->invoice_id = $inv->id;
                $cus1->save();

                $sell = new Sell;

                if($inv->pay_date == date("Y-m-d")) {
                    $sellD = Sell::where('sell_date','=',$inv->pay_date)->count();
                    if($sellD == 0) {
                        $sell->sell_date = date("Y-m-d");
                        $sell->currency_id = $inv->customer->machine->fuel->currency->id;
                        $sell->amount = $inv->quantity * $inv->customer->machine->fuel->rate;
                        $sell->save();
                    }else{
                        $selldate = Sell::where('sell_date','=',$inv->pay_date)->first();
                        $selldate->currency_id = $inv->customer->machine->fuel->currency->id;
                        $amount = $selldate->amount + ( $inv->quantity * $inv->customer->machine->fuel->rate );
                        $selldate->amount = $amount;
                        $selldate->save();
                    }

                }
                session()->flash('message', 'Sell SuccessFully Completed.');
                Session::flash('type', 'success');

                return redirect()->route('seller-customer-invoice',$inv->id);

            }else{
                session()->flash('message', 'Please Added First Machine Start Reading.');
                Session::flash('type', 'danger');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function getSellerCustomerInvoice($id)
    {
        $data['invoice'] = Invoice::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell Invoice";
        $data['general'] = GeneralSetting::first();
        return view('seller.seller-customer-invoice',$data);
    }
    public function sellerAllSell($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Seller All Invoice";
        $data['invoice'] = Invoice::where('paid_id','=',$id)->orderBy('id','DESC')->paginate(1000);
        return view('seller.seller-invoice-show',$data);
    }
    public function getSellerMachineReading($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Seller Machine Reading";
        $machine = Seller::findOrFail($id);
        $mac = [];
        foreach($machine->machines as $m){
            $mac[] = $m->id;
        }
        $data['reading'] = MachineReading::whereIn('machine_id',$mac)->orderBy('id','DESC')->paginate(1000);
        $data['invoice'] = Invoice::all();
        return view('seller.seller-reading',$data);
    }
    public function sellerReadingSearch(Request $request)
    {
        $start_time = $request->start_date." "."00:00:00";
        $end_time = $request->end_date." "."23:59:59";
        $data['reading'] = MachineReading::whereBetween('created_at', [$start_time, $end_time])->orderBy('id','DESC')->paginate(1000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Reading Search";
        $data['invoice'] = Invoice::all();
        return view('seller.seller-reading',$data);
    }
    public function createSellerExpense()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Seller Expense";
        $data['currency'] = Currency::all();
        return view('seller.seller-expense',$data);
    }
    public function storeSellerExpense(Request $request)
    {
        $this->validate($request,[
           'reason' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        ]);
        try {
            $expense = Input::except('_method','_token');
            $expense['created_by'] = Auth::user()->name;
            $expense['created_id'] = Auth::user()->id;
            Expense::create($expense);
            session()->flash('message', 'Expense Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }











}
