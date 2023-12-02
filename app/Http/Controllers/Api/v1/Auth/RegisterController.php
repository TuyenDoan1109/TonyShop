<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\AdminResource;
use App\Repositories\Admin\AdminRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    protected $adminRepository;
    public function __construct(AdminRepositoryInterface $adminRepository) {
        $this->adminRepository = $adminRepository;
    }

    public function register (RegisterRequest $request) {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];
        $admin = $this->adminRepository->create($data);
        if($admin) {
            $admin->createToken('tuyenToken')->accessToken;
            $response = [
                'admin' => new AdminResource($admin)
            ];
            return response()->okWithMessage($response, 'Register Successfully. Please Login');
        } else {
            return response()->internalServerError('Something Wrong!');
        }

    }
}
