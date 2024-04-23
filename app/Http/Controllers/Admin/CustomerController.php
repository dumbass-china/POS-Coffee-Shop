<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['customers'] = customer::get();
        return view('admin.customer.index',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.customer.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'ishidden' => 'required|in:0,1',
          'customername' => 'required',
          'companyname' => 'required',
          'phone' => 'required',
          'email' => 'required',
          'address' => 'required',
    ]);

    $saveData = [
        'ishidden' => $request->ishidden,
        'customername' => $request->customername,
        'companyname' => $request->companyname,
        'phone' => $request->phone,
        'email' => $request->email,
        'address' => $request->address,
    ];
    customer::create($saveData);

    try {
        // Your save logic here

        return redirect()->route('admin.customer.index')->with('success', 'Customer has been created successfully.');


    } catch (\Exception $e) {
        // Handle any exceptions or errors
        return redirect()->route('admin.customer.index')->with('error', 'Error creating the customer. Please try again.');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = customer::find($id);
        return view('admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = customer::find($id);
        return view('admin.customer.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editData = customer::find($id);
        $editDataRecord = [
            'ishidden' => $request->ishidden,
            'customername' => $request->customername,
            'companyname' => $request->companyname,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.customer.index', $id)->with('success', 'Customer has been updated successfully.');
            } else {
                return redirect()->route('admin.customer.index', $id)->with('error', 'Error updating the customer. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.customer.index', $id)->with('error', 'Error updating the customer. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $customer = customer::find($id);
            if (!$customer) {
                return redirect()->route('admin.customer.index')->with('error', 'Customer not found.');
            }

            // Delete the banner and its associated image
            $customer->delete();

            return redirect()->route('admin.customer.index')->with('success', 'Customer has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.customer.index')->with('error', 'Error deleting the Customer. Please try again.');
        }
    }
}
