<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\AdminResource;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    protected $adminRepository;
    public function __construct(AdminRepositoryInterface $adminRepository) {
        $this->adminRepository = $adminRepository;
    }

    // Login
    public function login (LoginRequest $request) {
        $admin = $this->adminRepository->getAdminByEmail($request->input('email'));
        if ($admin) {
            if (Hash::check($request->password, $admin->password)) {
                $token = $admin->createToken('tuyenToken')->accessToken;
                $response = [
                    'token' => $token,
                    'admin' => new AdminResource($admin)
                ];
                return response()->okWithMessage($response, 'Login Successfully');
            } else {
                return response()->notFound('Password does not match');
            }
        } else {
            return response()->notFound('User does not exist');
        }
    }

    // Logout
    public function logout()  {
        auth()->user()->tokens()->delete();
        $response = [
            'message' => 'Logout Successfully'
        ];
        return response()->json($response,200);
    }
}
