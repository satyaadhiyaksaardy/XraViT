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
    $validator = Validator::make($request->all(), [
        'input' => 'required|file|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($validator->fails()) {
        noty()->addError('Please upload a valid file.');
        return redirect('/');
    }

    $uploadedFile = $request->file('input');

    try {
        $response = Http::attach(
            'input',
            file_get_contents($uploadedFile),
            $uploadedFile->getClientOriginalName()
        )->post('http://example.com/users');

        if ($response->failed()) {
            throw new Exception('Error when sending POST request.');
        }

        noty()->addSuccess('Your request has been processed successfully.');
        return redirect('/')->with('response', $response->body());

    } catch (Exception $e) {
        // Log the exception for developers
        Log::error('Error when sending POST request: ' . $e->getMessage());

        // Notify user of the error
        $errorMessage = 'Sorry, there was an error processing your request. Please try again later.';
        noty()->addError($errorMessage);
        return redirect('/')->with('response', $errorMessage);
    }
});