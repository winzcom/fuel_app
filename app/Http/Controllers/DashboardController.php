<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Expense;
use App\Fuel;
use App\GeneralSetting;
use App\Invoice;
use App\Machine;
use App\MachineReading;
use App\Sell;
use App\Seller;
use App\Stock;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Currency;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $data = [];
        $this->middleware('auth:admin');
        $general_all = GeneralSetting::first();
        $this->site_title = $general_all->title;
    }
    public function getDashboard()
    {
        $data['page_title'] = "Dashboard";
        $data['site_title'] = $this->site_title;
        $data['total_customer'] = Customer::all()->count();
        $data['total_machine'] = Machine::all()->count();
        $data['total_fuel'] = Fuel::all()->count();
        $data['total_seller'] = Seller::all()->count();
        return view('dashboard.dashboard',$data);
    }
    public function createCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Create Currency";
        return view('dashboard.currency-create',$data);
    }
    public function storeCurrency(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:currencies,name',
            'rate' => 'required'
        ]);
        try {
            $curr = Input::except('_method','_token');
            Currency::create($curr);
            session()->flash('message', 'Currency Create Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showCurrency()
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "All Currency";
        $data['currency'] = Currency::orderBy('id','ASC')->paginate(100);
        return view('dashboard.currency-show',$data);
    }
    public function editCurrency($id)
    {
        $general = GeneralSetting::first();
        $data['site_title'] = $general->title;
        $data['page_title'] = "Edit Currency";
        $data['currency'] = Currency::findOrFail($id);
        return view('dashboard.currency-edit',$data);

    }
    public function updateCurrency(Request $request,$id)
    {
        $curr = Currency::findOrFail($id);
        $this->validate($request,[
            'name' => 'required|unique:currencies,name,'.$curr->id,
            'rate' =>'required'
        ]);
        try {
            $currency = Input::except('_method','_token');
            $curr->fill($currency)->save();
            session()->flash('message', 'Currency Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteCurrency(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $currency = Currency::findOrFail($request->input('id'));
                $currency->delete();
                session()->flash('message', 'Currency Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function createFuel()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Fuel";
        $data['currency'] = Currency::all();
        return view('dashboard.fuel-create',$data);
    }
    public function storeFuel(Request $request)
    {
        $this->validate($request,[
           'name' => 'required|unique:fuels,name',
            'rate' => 'required',
            'currency_id' => 'required'
        ]);
        try {
            $fuel = Input::except('_method','_token');
            Fuel::create($fuel);
            session()->flash('message', 'Fuel Create Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }


    }
    public function showFuel()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Fuel";
        $data['fuel'] = Fuel::orderBy('id','ASC')->paginate(100);
        return view('dashboard.fuel-show',$data);
    }
    public function editFuel($id)
    {
        $data['fuel'] = Fuel::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Edit Fuel';
        $data['currency'] = Currency::all();
        return view('dashboard.fuel-edit',$data);
    }
    public function updateFuel(Request $request,$id)
    {
        $fuels = Fuel::findOrFail($id);
        $this->validate($request,[
           'name' => 'required|unique:fuels,name,'.$fuels->id,
            'rate' => 'required',
            'currency_id' => 'required',
            'quantity' => 'required|numeric'
        ]);
        try {
            $fuel = Input::except('_method','_token');
            $fuels->fill($fuel)->save();
            session()->flash('message', 'Fuel Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function createMachine()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Create Machine';
        $data['fuel'] = Fuel::all();
        return view('dashboard.machine-create',$data);
    }
    public function storeMachine(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:machines,name',
            'code' => 'required|unique:machines,code',
            'fuel_id' => 'required',
        ]);
        try {
            $machine = Input::except('_method','_token');
            Machine::create($machine);
            session()->flash('message', 'Machine Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showMachine()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Machine";
        $data['machine'] = Machine::orderBy('id','ASC')->paginate(100);
        return view('dashboard.machine-show',$data);
    }
    public function editMachine($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Machine";
        $data['machine'] = Machine::findOrFail($id);
        $data['fuel'] = Fuel::all();
        return view('dashboard.machine-edit',$data);
    }
    public function updateMachine(Request $request,$id)
    {
        $machines = Machine::findOrFail($id);
        $this->validate($request, [
            'name' => 'required|unique:machines,name,' . $machines->id,
            'code' => 'required|unique:machines,code,' . $machines->id,
            'fuel_id' => 'required'
        ]);
        try {
            $machine = Input::except('_method', '_token');
            $machines->fill($machine)->save();
            session()->flash('message', 'Machine Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteMachine(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $machine = Machine::findOrFail($request->input('id'));
                $machine->sellers()->detach();
                $machine->delete();
                session()->flash('message', 'Machine Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function createCustomer()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = 'Sell Now';
        $data['machine'] = Machine::all();
        return view('dashboard.customer-create',$data);
    }
    public function storeCustomer(Request $request)
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
                    if($request->machine_id  == $r->machine_id){

                        if($r->current_reading < $request->quantity){
                            session()->flash('message', 'Quantity Can\'t Large Then Current Reading.');
                            Session::flash('type', 'danger');
                            return redirect()->back();
                        }else{
                            $r->current_reading = $r->current_reading - $request->quantity;
                            $r->save();
                        }


                    }else{
                        continue;
                    }
                }
                $customer = Customer::create($customer);
                $invoice = [];
                $invoice['customer_id'] = $customer->id;
                $invoice['machine_id'] = $customer->machine_id;
                $invoice['quantity'] = $customer->quantity;
                $invoice['created_date'] = date("Y-m-d H:i:s");
                $invoice['pay_date'] = date("Y-m-d");
                $invoice['paid_by'] = Auth::guard('admin')->user()->username;
                $invoice['paid_id'] = Auth::guard('admin')->user()->id;
                $invoice['role_id'] = 1;
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

                return redirect()->route('customer-invoice',$inv->id);

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
    public function customerInvoice($id)
    {
        $data['invoice'] = Invoice::findOrFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell Invoice";
        $data['general'] = GeneralSetting::first();
        return view('dashboard.customer-invoice',$data);
    }

    public function showCustomer()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell All Invoice";
        $data['customer'] = Customer::orderBy('id','DESC')->paginate(100);
        return view('dashboard.customer-show',$data);
    }
    public function getReportInvoice($date)
    {
        $data['invoice'] = Invoice::where('pay_date','=',$date)->orderBy('id','DESC')->paginate(10000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Invoice For $date";
        return view('dashboard.report-invoice',$data);
    }
    public function editCustomer($id)
    {
        $data['customer'] = Customer::findorFail($id);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Invoice";
        $data['machine'] = Machine::all();
        return view('dashboard.customer-edit',$data);
    }
    public function updateCustomer(Request $request,$id)
    {
        $this->validate($request,[
           'name' => 'required',
            'machine_id' => 'required',
            'quantity' => 'required',
            'phone' => 'digits:11'
        ]);
        try {
            $customers = Customer::findOrFail($id);
            $customer = Input::except('_method','_token');

            /* ------------------------------------------- */

            $reading1 = MachineReading::where('start_reading_time','=',date('Y-m-d'))->count();
            $reading = MachineReading::where('start_reading_time','=',date('Y-m-d'))->get();

            if($reading1){
                foreach($reading as $r){
                    if($request->machine_id  == $r->machine_id){

                        if($r->current_reading < $request->quantity){
                            session()->flash('message', 'Quantity Can\'t Large Then Current Reading.');
                            Session::flash('type', 'danger');
                            return redirect()->back();
                        }else{
                            $r->current_reading = $r->current_reading - ($request->input('quantity') - $customers->quantity );
                            $r->save();
                        }

                    }else{
                        continue;
                    }
                }

                $customers->fill($customer)->save();

                $invID = $customers->invoice_id;
                $inv = Invoice::findOrFail($invID);
                $inv2 = $inv->quantity;
                $invoice = [];
                $invoice['customer_id'] = $customers->id;
                $invoice['machine_id'] = $customers->machine_id;
                $invoice['quantity'] = $request->input('quantity');
                $invoice['created_date'] = date("Y-m-d H:i:s");
                $invoice['pay_date'] = date("Y-m-d");
                $inv->fill($invoice)->save();

                $sell = Sell::where('sell_date','=',$inv->pay_date)->first();

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

                        /* ------------------------------------------ */
                        $selldate->amount = $selldate->amount - (( $inv2 * $inv->customer->machine->fuel->rate ) - ($inv->quantity * $inv->customer->machine->fuel->rate ));


                        /* ------------------------------------------ */

                        $selldate->save();
                    }

                }
                session()->flash('message', 'Sell SuccessFully Updated.');
                Session::flash('type', 'success');

                return redirect()->route('customer-invoice',$inv->id);

            }else{
                session()->flash('message', 'Please Added First Machine Start Reading.');
                Session::flash('type', 'danger');
                return redirect()->back();
            }


        } catch (\PDOException $e) {
            session()->flash('message', "$e ---Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function customerInvoiceId($id)
    {
        $data['invoice'] = Invoice::where('customer_id','=',$id)->first();
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Sell Invoice";
        $data['general'] = GeneralSetting::first();
        return view('dashboard.customer-invoice',$data);
    }
    public function createSeller()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create Seller";
        $data['machine'] = Machine::all();
        return view('dashboard.seller-create',$data);
    }
    public function storeSeller(Request $request)
    {
        $this->validate($request,[
           'name' => 'required',
            'email' => 'required|unique:sellers,email',
            'password' => 'required|min:5',
            'machines' => 'required',
            'status' => 'required',
            'phone' => 'required|digits:11'
        ]);
        try {
            $sel = new Seller;
            $sel->name  = $request->name;
            $sel->email = $request->email;
            $sel->password = Hash::make($request->password);
            $sel->phone = $request->phone;
            $sel->status = $request->status;
            $sel->save();
            $sel->machines()->sync($request->machines, false);
            session()->flash('message', 'Seller Created Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();

        } catch (\PDOException $e) {
            session()->flash('message', "$e --Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function showSeller()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Seller";
        $data['seller'] = Seller::orderBy('id','DESC')->paginate(100);
        return view('dashboard.seller-show',$data);
    }
    public function getChangeStaffPassword($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Change Seller Password";
        $data['staff'] = Seller::findOrFail($id);
        return view('dashboard.seller-password-change',$data);
    }
    public function updateChangeStaffPassword(Request $request,$id)
    {
        $this->validate($request,[
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $newpass = Hash::make($request->password_confirmation);
            $staff = Seller::findOrFail($id);
            $staff->password = $newpass;
            $staff->save();
            session()->flash('message', 'Seller Password Changes Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function inactiveStaff($id)
    {
        try {
            $p = 0;
            $staff = Seller::findOrFail($id);
            $staff->status = $p;
            $staff->save();
            session()->flash('message', 'Seller Activity Changes Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function activeStaff($id)
    {
        try {
            $p = 1;
            $staff = Seller::findOrFail($id);
            $staff->status = $p;
            $staff->save();
            session()->flash('message', 'Seller Activity Changes Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function editStaff($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Seller";
        $machines = Machine::all();
        $machine2 = [];
        foreach($machines as $a){
            $machine2[$a->id] = $a->name;
        }
        $data['staff'] = Seller::findOrFail($id);
        return view('dashboard.seller-edit',$data)->withMachine($machine2);
    }
    public function updateStaff(Request $request,$id)
    {
        $sellers = Seller::findOrFail($id);
        $this->validate($request,[
            'name' =>'required',
            'email' => 'required|unique:sellers,email,'.$sellers->id,
            'phone' =>'required|digits:11',
            'status' => 'required',
            'machines' => 'required'
        ]);
        try {
            $seller = Input::except('_method','_token','machines');
            $sellers->fill($seller)->save();

            $sellers->machines()->sync($request->machines);
            session()->flash('message', 'Seller Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function deleteStaff(Request $request)
    {
        try {
            if ($request->input('id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $seller = Seller::findOrFail($request->input('id'));
                $seller->machines()->detach();
                $seller->delete();
                session()->flash('message', 'Seller Deleted Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function getStartReading()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Machine Start Reading";
        $data['machine'] = Machine::orderBy('id','ASC')->paginate(100);
        return view('dashboard.start-reading',$data);
    }
    public function addStartReading($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Add Machine Start Reading";
        $data['machine'] = Machine::findOrFail($id);
        $data['reading'] = MachineReading::where([['machine_id', '=', $id],['start_reading_time', '=', date('Y-m-d')],])->first();
        $data['general'] = GeneralSetting::first();
        return view('dashboard.start-reading-add',$data);
    }
    public function updateStartReading(Request $request)
    {
        try {
            if ($request->input('machine_id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $reading = new MachineReading;
                $reading->machine_id = $request->machine_id;
                $reading->start_reading_time = date("Y-m-d");
                $reading->current_reading = $request->start_reading;
                $reading->start_reading = $request->start_reading;
                $reading->save();

                session()->flash('message', 'Start Reading Added Successfully.');
                Session::flash('type', 'success');
                return redirect()->back();
            }

        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function getEndReading()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Machine End Reading";
        $data['machine'] = Machine::orderBy('id','ASC')->paginate(100);
        return view('dashboard.end-reading',$data);
    }
    public function addEndReading($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Add Machine Start Reading";
        $data['machine'] = Machine::findOrFail($id);
        $data['general'] = GeneralSetting::first();
        $data['reading'] = MachineReading::where([['machine_id', '=', $id],['start_reading_time', '=', date('Y-m-d')],])->first();
        return view('dashboard.start-reading-end',$data);
    }
    public function updateEndReading(Request $request)
    {
        try {
            if ($request->input('machine_id') === '') {
                session()->flash('message', 'Oops, bad request!');
                Session::flash('type', 'danger');
                return redirect()->back();
            }else{
                $reading = MachineReading::where([['machine_id', '=', $request->machine_id],['start_reading_time', '=', date('Y-m-d')],])->first();
                $endreading = $request->end_reading;
                if($endreading > $reading->start_reading){
                    session()->flash('message', 'End Reading Can\'t Larger then Start Reading.');
                    Session::flash('type', 'danger');
                    return redirect()->back();
                }
                else{
                    $reading->end_reading_time = date("Y-m-d");
                    $reading->end_reading = $request->end_reading;
                    $reading->save();

                    session()->flash('message', 'End Reading Added Successfully.');
                    Session::flash('type', 'success');
                    return redirect()->back();
                }

            }

        } catch (\PDOException $e) {
            session()->flash('message', "Some Problem Occurs, Please Try Again!");
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function viewReading()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Reading";
        $data['reading'] = MachineReading::orderBy('id','DESC')->paginate(1000);
        $data['invoice'] = Invoice::all();
        return view('dashboard.reading-show',$data);

    }
    public function createExpense()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Create New Expense";
        $data['currency'] = Currency::all();
        return view('dashboard.expense-create',$data);
    }
    public function storeExpense(Request $request)
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
    public function showExpense()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "All Expense";
        $data['expense'] = Expense::orderBy('id','DESC')->paginate(1000);
        return view('dashboard.expense-show',$data);
    }
    public function editExpense($id)
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Edit Expense";
        $data['expense'] = Expense::findOrFail($id);
        $data['currency'] = Currency::all();
        return view('dashboard.expense-edit',$data);
    }
    public function updateExpense(Request $request,$id)
    {
        $expenses = Expense::findOrFail($id);
        $this->validate($request,[
           'reason' => 'required',
            'currency_id' => 'required',
            'amount' => 'required'
        ]);
        try {
            $expense = Input::except('_method','_token');
            $expenses->fill($expense)->save();
            session()->flash('message', 'Expense Updated Successfully.');
            Session::flash('type', 'success');
            return redirect()->back();
        } catch (\PDOException $e) {
            session()->flash('message', 'Some Problem Occurs, Please Try Again!');
            Session::flash('type', 'danger');
            return redirect()->back();
        }
    }
    public function searchExpense(Request $request)
    {
        $start_time = $request->start_date." "."00:00:00";
        $end_time = $request->end_date." "."23:59:59";
        $data['expense'] = Expense::whereBetween('created_at', [$start_time, $end_time])->orderBy('id','DESC')->paginate(1000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Search Expense";
        return view('dashboard.expense-show',$data);
    }
    public function searchReading(Request $request)
    {
        $start_time = $request->start_date;
        $end_time = $request->end_date;
        $data['reading'] = MachineReading::whereBetween('start_reading_time', [$start_time, $end_time])->orderBy('id','DESC')->paginate(1000);
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Reading Search";
        $data['invoice'] = Invoice::all();
        return view('dashboard.reading-show',$data);
    }
    public function incomeReport()
    {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Income Report";
        $data['expense'] = Expense::all();
        $data['sell'] = Sell::orderBy('id','DESC')->paginate(1000);
        return view('dashboard.income-report',$data);

    }

    public function addStockForm() {
        $data['site_title'] = $this->site_title;
        $data['page_title'] = "Add Stock";
        $data['fuels'] = Fuel::get(['name','id']);
        return view('dashboard.add-fuel-stock',$data);
    }

    public function addStock(Request $request) {
       
        $this->validate($request,[
            'quantity' => 'required|numeric|min:0'
        ]);

        $stock = Stock::firstOrNew(['fuel_id' => $request->fuel]);
        $stock->increment('quantity', $request->quantity);
        
        session()->flash('message', 'Quantity Updated');
        Session::flash('type', 'success');
        return redirect()->back();
    }

}
