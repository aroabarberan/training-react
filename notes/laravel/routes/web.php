<?php
use App\Note;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/notes', 'NoteController@allNotes')->name('notes');
// Route::delete('/notes/{id}', 'NoteController@deleteNote');
Route::delete('/notes/{id}', function($id) {
  try 
  {
    DB::table('notes')->where('id', $id)->delete();
      return response()->json('note deleted');
  }

  catch (Exception $e) {
      return response()->json($e->getMessage(), 500);
  }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
