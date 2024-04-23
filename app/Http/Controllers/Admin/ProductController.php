<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\customer;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $data['product'] = product::get();
        // return view('admin.product.index', $data);
        return view('admin.product.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $editData = customer::find($id);

        $editDataRecord = [
            'customername' => $request->title,
            'companyname' => $request->description,
            'phone' => $request->boxtitle,
            'email' => $request->boxsubtile,
            'address' => $request->button,
            'icon' => $request->icon,
        ];

        $updateSuccess = $editData->update($editDataRecord);

        try {
            if ($updateSuccess) {
                return redirect()->route('admin.customer', $id)->with('success', 'Customer has been updated successfully.');
            } else {
                return redirect()->route('admin.customer', $id)->with('error', 'Error updating the customer. Please try again.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.customer', $id)->with('error', 'Error updating the customer. Please try again.');
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
                return redirect()->route('admin.customer')->with('error', 'Customer is not found.');
            }


            $customer->delete();

            return redirect()->route('admin.customer')->with('success', 'Customer has been deleted successfully.');
        } catch (\Exception $e) {
            // Handle any exceptions or errors
            return redirect()->route('admin.customer')->with('error', 'Error deleting the customer. Please try again.');
        }
    }
}
