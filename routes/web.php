<?php

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

Route::get('/', 'JobController@index');
Route::get('/jobs/create', 'JobController@create')->name('job.create');
Route::post('/jobs/create', 'JobController@store')->name('job.store');
Route::get('/jobs/{id}/edit', 'JobController@edit')->name('job.edit');
Route::post('/jobs/{id}/update', 'JobController@update')->name('job.update');
Route::get('/jobs/my-job', 'JobController@myJob')->name('my.job');

Route::get('/jobs/applications', 'JobController@applicant')->name('applicant');
Route::get('/jobs/all-jobs', 'JobController@allJobs')->name('all.jobs');

//Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

//jobs
Route::get('/jobs/{id}/{job}', 'JobController@show')->name('jobs.show');

//single post
Route::get('/post/{id}/{slug}', 'DashboardController@show')->name('post.show');

//company
Route::get('/companies', 'CompanyController@company')->name('company');
Route::get('/company/{id}/{company}', 'CompanyController@index')->name('company.index');
Route::get('company/create', 'CompanyController@create')->name('company.view');
Route::post('company/create', 'CompanyController@store')->name('company.store');
Route::post('company/cover-photo', 'CompanyController@coverPhoto')->name('cover.photo');
Route::post('company/logo', 'CompanyController@companyLogo')->name('company.logo');

//user profile
Route::get('user/profile', 'UserprofileController@index')->name('user.profile');
Route::post('user/profile/create', 'UserprofileController@store')->name('profile.create');
Route::post('user/cover_letter', 'UserprofileController@coverLetter')->name('cover.letter');
Route::post('user/resume', 'UserprofileController@resume')->name('resume');
Route::post('user/avatar', 'UserprofileController@avatar')->name('avatar');

//employer view
Route::view('employer/register', 'auth.employer-register')->name('employer.register');
Route::post('employer/register', 'EmployerRegisterController@employerRegister')->name('emp.register');
Route::post('/applications/{id}', 'JobController@apply')->name('apply');

//save and unsave job
Route::post('/save/{id}', 'FavouriteController@saveJob');
Route::post('/unsave/{id}', 'FavouriteController@unSaveJob');

//search jobs
Route::get('/jobs/search', 'JobController@searchJobs');

//category
Route::get('/category/{id}', 'CategoryController@index')->name('category.index');

//contact
Route::get('/contact', 'ContactController@contact')->name('contact');
Route::post('/contact', 'ContactController@handleForm')->name('contact.form');

//email job link
Route::post('/job/mail', 'EmailController@send')->name('mail');

//admin Blog
Route::get('/dashboard', 'DashboardController@index')->middleware('admin');
Route::get('/dashboard/create', 'DashboardController@create')->middleware('admin');
Route::post('/dashboard/create', 'DashboardController@store')->name('post.store')->middleware('admin');
Route::get('/dashboard/{id}/edit', 'DashboardController@edit')->name('post.edit')->middleware('admin');
Route::post('/dashboard/{id}/update', 'DashboardController@update')->name('post.update')->middleware('admin');
Route::post('/dashboard/destroy', 'DashboardController@destroy')->name('post.delete')->middleware('admin');
Route::get('/dashboard/trash', 'DashboardController@trash')->name('post.trash')->middleware('admin');
Route::get('/dashboard/{id}/trash', 'DashboardController@restore')->name('post.restore')->middleware('admin');
Route::get('/dashboard/{id}/toggle', 'DashboardController@toggle')->name('post.toggle')->middleware('admin');
Route::get('/dashboard/{id}/delete-permanently', 'DashboardController@deletePermanently')->name('post.delete.permanently')->middleware('admin');

//admin Testimonial
Route::get('/testimonial', 'TestimonialController@index')->middleware('admin');
Route::get('/testimonial/create', 'TestimonialController@create')->middleware('admin');
Route::post('/testimonial/create', 'TestimonialController@store')->name('testimonial.store')->middleware('admin');
Route::post('/testimonial/{id}/destroy', 'TestimonialController@destroy')->name('testimonial.destroy')->middleware('admin');

//admin fetching jobs
Route::get('/dashboard/jobs', 'DashboardController@getAllJobs')->middleware('admin');
Route::get('/dashboard/{id}/jobs', 'DashboardController@changeJobStatus')->name('change.job.status')->middleware('admin');
