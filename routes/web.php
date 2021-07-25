
  
<?php

use Illuminate\Support\Facades\Route;

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


//--------------------------------- public routes ---------------------------

//-------- home ---------------

Route::get('/', function () {
    return view('home.home');
})->name('home');

//--------- lang ----------------

// Route::get('/{lang}', [App\Http\Controllers\LocalizationController::class, 'index'])->name('change.language');

//-------- auth ------------

Route::get('/login', [App\Http\Controllers\AuthenticationController::class, 'login'])->name('login');

Route::post('/authenticate', [App\Http\Controllers\AuthenticationController::class, 'authenticate'])->name('authenticate');

Route::get('/register', [App\Http\Controllers\AuthenticationController::class, 'register'])->name('register');

Route::post('/storeUser', [App\Http\Controllers\AuthenticationController::class, 'storeUser'])->name('storeUser');

//--------------------------------- protected routes ---------------------------
Route::middleware('auth')->group(function () {

    Route::get('/profile', function () {
        return view('profile.dashboard.dashboard_profile');
    })->name('profile');

    Route::get('/logout', [App\Http\Controllers\AuthenticationController::class, 'logout'])->name('logout');

    //-------- admin dashboard ------------
    Route::middleware('role:admin')->group(function () {

        Route::prefix('admin_dashboard')->group(function () {

            Route::get('/', [App\Http\Controllers\AdminProfileController::class, 'welcome'])->name('admin.dashboard');

            Route::get('/edit_profile', [App\Http\Controllers\AdminProfileController::class, 'edit'])->name('admin.edit.profile');

            Route::post('/update_profile', [App\Http\Controllers\AdminProfileController::class, 'update'])->name('admin.update.profile');

            Route::get('/{id}/block', [App\Http\Controllers\AdminProfileController::class, 'block'])->name('admin.block.account');

            Route::get('/{id}/unblock', [App\Http\Controllers\AdminProfileController::class, 'unblock'])->name('admin.unblock.account');

            Route::prefix('registration_requests')->group(function () {

                Route::get('/', [App\Http\Controllers\AdminProfileController::class, 'getRegistrationRequests'])->name('admin.registration.requests');

                Route::get('/{id}/activate', [App\Http\Controllers\AdminProfileController::class, 'activate'])->name('admin.activate.registration.requests');

                Route::get('/{id}/delete', [App\Http\Controllers\AdminProfileController::class, 'delete'])->name('admin.delete.registration.requests');
            });

            Route::prefix('doctors')->group(function () {

                Route::get('/', [App\Http\Controllers\DoctorProfileController::class, 'index'])->name('admin.doctors');

                Route::get('/delete/{id}', [App\Http\Controllers\DoctorProfileController::class, 'destroy'])->name('admin.delete.doctor');
            });

            Route::prefix('receptionists')->group(function () {

                Route::get('/', [App\Http\Controllers\ReceptionistProfileController::class, 'index'])->name('admin.receptionists');

                Route::get('/edit/{id}', [App\Http\Controllers\AdminProfileController::class, 'editReceptionist'])->name('admin.edit.receptionist');

                Route::post('/update/{id}', [App\Http\Controllers\AdminProfileController::class, 'updateReceptionist'])->name('admin.update.receptionist');

                Route::get('/delete/{id}', [App\Http\Controllers\ReceptionistProfileController::class, 'destroy'])->name('admin.delete.receptionist');
            
            });
            
            Route::prefix('medical_specialties')->group(function () {

                Route::get('/', [App\Http\Controllers\MedicalSpecialityController::class, 'index'])->name('admin.medical.specialities');

                Route::get('/add', [App\Http\Controllers\MedicalSpecialityController::class, 'create'])->name('admin.add.medical.speciality');

                Route::post('/store', [App\Http\Controllers\MedicalSpecialityController::class, 'store'])->name('admin.store.medical.speciality');

                Route::get('/edit/{id}', [App\Http\Controllers\MedicalSpecialityController::class, 'edit'])->name('admin.edit.medical.speciality');

                Route::post('/update/{id}', [App\Http\Controllers\MedicalSpecialityController::class, 'update'])->name('admin.update.medical.speciality');

                Route::get('/delete/{id}', [App\Http\Controllers\MedicalSpecialityController::class, 'destroy'])->name('admin.delete.medical.speciality');

            });

        });
    
    });

    //-------- doctors dashboard ------------
    Route::middleware('role:doctor')->group(function () {
    
        Route::prefix('doctor_dashboard')->group(function () {

        Route::get('/', [App\Http\Controllers\DoctorProfileController::class, 'welcome'])->name('doctor.dashboard');

        Route::get('/{id}/file_history', [App\Http\Controllers\DoctorProfileController::class, 'show'])->name('doctor.doctor.file');

        Route::get('/edit_profile', [App\Http\Controllers\DoctorProfileController::class, 'edit'])->name('doctor.edit.profile');

        Route::post('/update_profile', [App\Http\Controllers\DoctorProfileController::class, 'update'])->name('doctor.update.profile');

        Route::get('/', [App\Http\Controllers\DoctorProfileController::class, 'welcome'])->name('doctor.dashboard');

            Route::prefix('clinic')->group(function () {
                
                Route::get('/', [App\Http\Controllers\ClinicController::class, 'show'])->name('doctor.clinic');

                Route::get('/add', [App\Http\Controllers\ClinicController::class, 'create'])->name('doctor.add.clinic');

                Route::post('/store', [App\Http\Controllers\ClinicController::class, 'store'])->name('doctor.store.clinic');

                Route::get('/edit_hours', [App\Http\Controllers\ClinicController::class, 'edit'])->name('doctor.edit.clinic_hours');

                Route::post('/update_hours', [App\Http\Controllers\ClinicController::class, 'update'])->name('doctor.update.clinic_hours');

                Route::get('/delete', [App\Http\Controllers\ClinicController::class, 'destroy'])->name('doctor.delete.clinic_hours');

                Route::post('/{patient_id}/store_diagnose', [App\Http\Controllers\DiagnoseController::class, 'store'])->name('doctor.add.diagnose');

                Route::prefix('/patients')->group(function () {

                    //get doctor's clinic patients
                    Route::get('/', [App\Http\Controllers\PatientController::class, 'getClinicPatients'])->name('doctor.clinic.patients');

                    //get specific patient history file
                    Route::get('/{id}/patient_file', [App\Http\Controllers\PatientController::class, 'getPatientFileHistory'])->name('doctor.clinic.patient_file');

                    //edit medicines for specific patients
                    Route::get('/{id}/edit_medicines/{medicineId}', [App\Http\Controllers\MedicineController::class, 'edit'])->name('doctor.clinic.edit.medicines');

                    //edit medicines for specific patients
                    Route::post('/{id}/update_medicines/{medicineId}', [App\Http\Controllers\MedicineController::class, 'update'])->name('doctor.clinic.update.medicines');
                });
            });
        });
    });


    //-------- receptionist dashboard ------------
    Route::middleware('role:receptionist')->group(function () {

        Route::prefix('receptionist_dashboard')->group(function () {

            Route::get('/', [App\Http\Controllers\ReceptionistProfileController::class, 'welcome'])->name('receptionist.dashboard');

            Route::get('/edit_profile', [App\Http\Controllers\ReceptionistProfileController::class, 'edit'])->name('receptionist.edit.profile');

            Route::post('/update_profile', [App\Http\Controllers\ReceptionistProfileController::class, 'update'])->name('receptionist.update.profile');

            Route::get('/appointments', [App\Http\Controllers\AppointmentController::class, 'index'])->name('receptionist.appointments');

            Route::get('/clinics', [App\Http\Controllers\ClinicController::class, 'getClinicsView'])->name('receptionist.clinics');

            Route::get('/adults_clinics', [App\Http\Controllers\ClinicController::class, 'getAdultsClinics'] )->name('receptionist.adults.clinics');

            Route::get('/children_clinics', [App\Http\Controllers\ClinicController::class, 'getChildrenClinics'] )->name('receptionist.children.clinics');

            Route::get('/doctors', [App\Http\Controllers\DoctorProfileController::class, 'indexReceptionist'] )->name('receptionist.doctors');

            Route::prefix('patients')->group(function () {
                Route::get('/', [App\Http\Controllers\PatientController::class, 'indexReceptionist'])->name('receptionist.patients');

                Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('receptionist.patients.search');

                Route::get('/add', [App\Http\Controllers\PatientController::class, 'create'])->name('receptionist.add.patient');

                Route::post('/store', [App\Http\Controllers\PatientController::class, 'store'])->name('receptionist.store.patient');

                Route::get('{id}/edit', [App\Http\Controllers\PatientController::class, 'edit'])->name('receptionist.edit.patient');

                Route::post('{id}/update', [App\Http\Controllers\PatientController::class, 'update'])->name('receptionist.update.patient');

                Route::post('{id}/upload_sheet', [App\Http\Controllers\PatientController::class, 'uploadSheetImage'])->name('receptionist.patient.upload.sheet');

                Route::get('/{id}/download_patient_card', [App\Http\Controllers\PatientController::class, 'downloadPatientCard'])->name('receptionist.patient.download.card');

                Route::get('/{id}/download_patient_sheet', [App\Http\Controllers\PatientController::class, 'downloadPatientSheet'])->name('receptionist.patient.download.sheet');

                Route::get('{id}/patient_file', [App\Http\Controllers\PatientController::class, 'show'])->name('receptionist.patients.patient.file');

                Route::prefix('/{id}/new_appointment')->group(function () {

                    Route::get('/', [App\Http\Controllers\AppointmentController::class, 'create'])->name('receptionist.patients.new.appointment');

                    Route::get('/adults_clinics', [App\Http\Controllers\AppointmentController::class, 'getAdultsClinicsAppointments'])->name('adults.clinic.patient.appointment');

                    Route::get('/children_clinics', [App\Http\Controllers\AppointmentController::class, 'getChildrenClinicsAppointments'])->name('children.clinic.patient.appointment');

                    Route::get('/{clinicId}/add_appointment', [App\Http\Controllers\AppointmentController::class, 'getAppointmentForm'])->name('receptionist.patient.add.appointment');
                   
                    Route::post('/{clinicId}/store_appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('receptionist.patient.store.appointment');
                });
            });
        });
    });

});

/*
//----------- localization ------------------
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	Route::get('/', function()
	{
		return View::make('hello');
	});
	Route::get('test',function(){
		return View::make('test');
	});
});
/*
Route::get('/user', [UserController::class, 'index']);
Route::group(['prefix'=>'accounts','as'=>'account.'], function() {
    Route::get('/', 'SomeController@index')->name('test');
    Route::get('/new', function(){
            return redirect()->route('account.test');
    });
});
*/
//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
