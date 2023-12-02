<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User; // tesst
use DB; // tesst
use PhpOffice\PhpWord\TemplateProcessor;
use ZipArchive;
use File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Filesystem\Filesystem;

class UserController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) {
        $this->middleware('auth:admin');
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->userRepository->getAllWithPaginate(10);
//        return $users;
        return view('admin.users.index', compact('users'));
    }

    public function indexWithDeleted() {
        $users = $this->userRepository->getAllWithDeleted();
        return view('user.users.indexWithDeleted', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];
        $user = $this->userRepository->create($data);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Thêm mới thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Thêm mới thát bại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->getById($id);
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ];
        $user = $this->userRepository->update($id, $data);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Update thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Update thất bại');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->delete($id);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

    public function forceDelete($id) {
        $user = $this->userRepository->deleteForever($id);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Forever Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Forever Delete thất bại');
        }
    }

    public function restore($id) {
        $user = $this->userRepository->restoreDeleted($id);
        if($user) {
            return redirect(route('admin.users.index'))->with('alert-success', 'Delete thành công');
        } else {
            return redirect()->back()->with('alert-error', 'Delete thất bại');
        }
    }

    public function word($id) {
////        $users = User::all();
////        foreach ($users as $user) {
////
////        }
//        $user = User::find($id);
//
//        $templateProcessor = new TemplateProcessor('word-template/user.docx');
//        $templateProcessor->setValue('id', $user->id);
//        $templateProcessor->setValue('name', $user->name);
//        $templateProcessor->setValue('email', $user->email);
//        $templateProcessor->setValue('address', $user->address);
////        $export_file = storage_path('filename.docx');
////        $templateProcessor->saveAs($export_file);
//        $fileName = $user->name . '_'. time();
//        $templateProcessor->saveAs($fileName.'.docx');
//        return response()->download($fileName.'.docx');




        $users = User::all();
        $time = time();
        foreach ($users as $user) {
            $templateProcessor = new TemplateProcessor('word-template/user.docx');
            $templateProcessor->setValue('id', $user->id);
            $templateProcessor->setValue('name', $user->name);
            $templateProcessor->setValue('email', $user->email);
            $templateProcessor->setValue('address', $user->address);
//        $export_file = storage_path('filename.docx');
//        $templateProcessor->saveAs($export_file);
            $fileName = $user->name . '_'. time();
            $templateProcessor->saveAs('filesToDownload/'.$fileName.'.docx');
        }

        $zip = new ZipArchive;
        $fileName2 = 'myzip.zip';
        if($zip->open(public_path($fileName2), ZipArchive::CREATE) === TRUE) {
            $files = File::files(public_path('filesToDownload'));
            foreach ($files as $file) {
                $relativeNameInZipFile = basename($file);
                $zip->addFile($file, $relativeNameInZipFile);
            }
            $zip->close();
        }
//        $fileToDelete = Storage::allFiles(public_path('filesToDownload'));
//        Storage::delete($fileToDelete);
        $fileToDelete = new Filesystem;
        $fileToDelete->cleanDirectory(public_path('filesToDownload'));
        return response()->download(public_path($fileName2))->deleteFileAfterSend(true);

//        return response()->download($fileName.'.docx');

    }

}
