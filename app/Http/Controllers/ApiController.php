<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Licen;

class ApiController extends Controller
{
    public function allowLicenseKey(Request $request)
    {
        $licenseKey = $request->input('license_key');

        // Validate the license key
        $validate = Validator::make($request->all(), [
            'license_key' => [
            'required',
            'string',
            'regex:/^[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}-[A-Z0-9]{5}$/',
            ],
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid license key format.',
            ], 400);
        }

        // Check if the license key is valid
        $licenKey = Licen::with('autoDialerModules', 'autoDistributorModuales', 'evaluationModuales', 'company')->where('license_key', $licenseKey)->first();
        if (!$licenKey) {
            return response()->json([
                'status' => 'error',
                'message' => 'License key not found.',
            ], 404);
        }
        // Check if the license key is already used
        // if ($licenKey->isInactive()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'License key is inactive.',
        //     ], 400);
        // }
        // Check if the license key is expired
        // if ($licenKey->isExpired()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'License key is expired.',
        //     ], 400);
        // }

        // Check if the license key is already used
        if ($licenKey->isInUsed()) {
            return response()->json([
                'status' => 'error',
                'message' => 'License key is already used.',
            ], 400);
        }
        // Check if the license key is Valid
        if($licenKey->isActive() || $licenKey->isInactive()) {
            return response()->json([
                'status' => 'success',
                'message' => 'License key is valid.',
                'data' => [
                    'company_name' => $licenKey->company->name,
                    'license_key' => $licenKey->license_key,
                    'start_date' => $licenKey->start_date,
                    'end_date' => $licenKey->end_date,
                    'status' => $licenKey->status,
                    'license' => $licenKey,
                ],
            ], 200);
        }

    }

}
