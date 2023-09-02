<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::post('/upload', function (Request $request) {
    $validated = Validator::make($request->all(), [
        'input' => 'required|file|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validated->fails()) {
        // toastr()->error('Please upload a valid file.');
        noty()->addError('Please upload a valid file.');
        return redirect('/');
    }

    $uploadedFile = $request->file('input');

    try {
        $response = Http::attach(
            'input',
            file_get_contents($uploadedFile->getRealPath()),
            $uploadedFile->getClientOriginalName()
        )->post('http://example.com/users');

        $responseData = $response->body();

        // toastr()->error('Your request has been processed successfully.');
        noty()->addSuccess('Your request has been processed successfully.');
    } catch (Exception $e) {
        // Log the exception for developers
        Log::error('Error when sending POST request: ' . $e->getMessage());

        // Return a friendly message for users
        $responseData = 'Sorry, there was an error processing your request. Please try again later.';
        // toastr()->error($responseData);
        noty()->addError($responseData);
    }

    return redirect('/')->with('response', $responseData);
});