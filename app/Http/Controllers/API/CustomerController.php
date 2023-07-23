<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends BaseController
{
    /**
     * Get list of customer
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $customers = Customer::all();

        return $this->sendResponse(
            CustomerResource::collection($customers), 'Customers retrieved successfully.'
        );
    }

    /**
     * Create new customer
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        list($input, $validator) = $this->inputValidation($request);

        if($validator->fails()){
            return $this->sendError('Validation Error.', (array)$validator->errors());
        }

        $customer = Customer::create($input);

        return $this->sendResponse(
            new CustomerResource($customer), 'Customer created successfully.'
        );
    }

    /**
     * Show specific customer details
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function show(Customer $customer): JsonResponse
    {
        return $this->sendResponse(
            new CustomerResource($customer), 'Customer retrieved successfully.'
        );
    }

    /**
     * Update customer data
     *
     * @param Request $request
     * @param Customer $customer
     * @return JsonResponse
     */
    public function update(Request $request, Customer $customer): JsonResponse
    {
        list($input, $validator) = $this->inputValidation($request);

        if($validator->fails()){
            return $this->sendError('Validation Error.', (array)$validator->errors());
        }

        $customer->update([
            'name' => $input['name'],
            'first_name' => $input['first_name'] ?? null,
            'last_name' => $input['last_name'] ?? null,
            'email' => $input['email'],
            'gender' => $input['gender'] ?? null,
            'phone_number' => $input['phone_number'] ?? '',
            'birthday' => $input['birthday'] ?? null,
            'address' => $input['address'] ?? null,
            'postcode' => $input['postcode'] ?? null,
            'city' => $input['city'] ?? null
        ]);

        return $this->sendResponse(
            new CustomerResource($customer), 'Customer updated successfully.'
        );
    }

    /**
     * Delete specific customer record
     *
     * @param Customer $customer
     * @return JsonResponse
     */
    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();

        return $this->sendResponse(
            [], 'Customer deleted successfully.'
        );
    }

    /**
     * @param Request $request
     * @return array
     */
    private function inputValidation(Request $request): array
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required|string',
            'first_name' => 'nullable|string',
            'last_name' => 'nullable|string',
            'email' => 'required|email',
            'gender' => 'nullable|numeric',
            'phone_number' => 'numeric|nullable',
            'birthday' => 'date|date_format:Y-m-d|nullable',
            'address' => 'nullable|string',
            'postcode' => 'numeric|nullable',
            'city' => 'string|nullable'
        ]);
        return array($input, $validator);
    }
}
