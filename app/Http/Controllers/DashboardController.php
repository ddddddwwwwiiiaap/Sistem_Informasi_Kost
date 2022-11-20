<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Customer;
use App\Models\Facility;
use App\Models\BoardingHouse;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\Message;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::getData();
        $facilities = Facility::index();
        $boardinghouses = BoardingHouse::index();
        return view('dashboard.customer', compact('customers', 'facilities', 'boardinghouses'));
        
    }

    public function indexAdmin()
    {
        $rooms = Room::count();
        $roomsavailable = Room::where('status', '=', 'available')->count();
        $customers = Customer::where('status', '=', 'active')->count();
        $facilities = Facility::count();
        $transactions = Transaction::indexLimit();
        $messages = Message::getDataDescLimit();
        return view('dashboard.admin', compact('rooms','facilities', 'transactions', 'roomsavailable', 'customers', 'messages'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
