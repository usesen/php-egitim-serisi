<?php

namespace App\Http\Controllers;

use App\Application\Services\PHPDersleriCustomerService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(PHPDersleriCustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'first_name', 'last_name', 'email', 'phone', 'address',
            'city', 'country', 'postal_code', 'company', 'position',
            'notes', 'debt', 'credit'
        ]);

        $customer = $this->customerService->createCustomer($data);

        return response()->json(['success' => true, 'data' => $customer], 201);
    }

    public function update(Request $request, int $id)
    {
        $data = $request->only([
            'first_name', 'last_name', 'email', 'phone', 'address',
            'city', 'country', 'postal_code', 'company', 'position',
            'notes', 'debt', 'credit'
        ]);

        $customer = $this->customerService->updateCustomer($id, $data);

        if ($customer) {
            return response()->json(['success' => true, 'data' => $customer], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Customer not found'], 404);
        }
    }

    public function destroy(int $id)
    {
        $deleted = $this->customerService->deleteCustomer($id);

        if ($deleted) {
            return response()->json(['success' => true, 'message' => 'Customer deleted successfully'], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Customer not found'], 404);
        }
    }

    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return response()->json(['success' => true, 'data' => $customers]);
    }
}
