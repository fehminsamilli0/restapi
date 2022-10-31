<?php

namespace App\Http\Controllers;
use App\Models\Apply;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApplyController extends Controller
{

    public function store(Request $request){

        $request->validate([
            'firstname'=>'required|min:3|max:35',
            'lastname'=>'required|min:3|max:35',
            'fatherName'=>'required|min:3|max:35',
            'phone'=>'required|number',
            'fin'=>'required',
            'email'=>'required|email',
            'registrationCertificateNumber'=>'required',
            'registrationType'=>'required',
            'registrationAddress'=>'required',
            'tin'=>'required',
            'accountHolderName'=>'required',
            'bankName'=>'required',
            'bankCode'=>'required',
            'iban'=>'required',
            'swift'=>'required',
            'refCode'=>'required',
            'nationalId'=>'required',
            'license'=>'required',
            'vehicle'=>'required',
            'vehicleModel'=>'required',
            'vehicleYear'=>'required',
            'vehicleNumber'=>'required',
            'vehicleColor'=>'required',
            'confirmingDocument'=>'required',
            'profile'=>'required',
            'tinCopy'=>'required',
            'bankAccount'=>'required',
            'tinCopyBack'=>'required',
            'convictionCertificate'=>'required',
            'idCard'=>'required',
            'paymentReceiptSSPF'=>'required',
            'nvRegistrationCertificateFront'=>'required',
            'nvRegistrationCertificateBack'=>'required',
            'powerAttorney'=>'required',
            'distinctionMarkOrPaymentReceipt'=>'required',
            'permitSheet'=>'required',
            'driverLicense'=>'required',

            'carFrontSide'=>'required',
            'carBackSide'=>'required',
            'carLeftSide'=>'required',
            'carRightSide'=>'required',

            'carInteriorFront'=>'required',
            'carInteriorBack'=>'required',
            'carLuggage'=>'required',
            'insurance'=>'nullable'
        ]);

        $data = Apply::create([

            'firstname'=>$request->firstname,
            'lastname'=>$request->lastname,
            'father_name'=>$request->fatherName,
            'phone'=>$request->phone,
            'fin'=>$request->fin,
            'email'=>$request->email,
            'registration_certificate_number'=>$request->registrationCertificateNumber,
            'registration_type'=>$request->registrationType,
            'registration_address'=>$request->registrationAddress,
            'tin'=>$request->tin,
            'account_holder_name'=>$request->accountHolderName,
            'bank_name'=>$request->bankName,
            'bank_code'=>$request->bankCode,
            'iban'=>$request->iban,
            'swift'=>$request->swift,
            'ref_code'=>$request->refCode,
            'national_id'=>$request->nationalId,
            'driver_license'=>$request->license,
            'vehicle'=>$request->vehicle,
            'vehicle_model'=>$request->vehicleModel,
            'vehicle_model_year'=>$request->vehicleYear,
            'vehicle_number'=>$request->vehicleNumber,
            'vehicle_color'=>$request->vehicleColor,
            'confirming_document'=>$request->confirmingDocument,
            'profile'=>$request->profile,
            'tin_copy_attach'=>$request->tinCopy,
            'bank_account_attach'=>$request->bankAccount,
            'tin_copy_back_attach'=>$request->tinCopyBack,
            'conviction_certificate_attach'=>$request->convictionCertificate,
            'id_card_attach'=>$request->idCard,
            'payment_receipt_sspf_attach'=>$request->paymentReceiptSSPF,
            'nv_registration_certificate_front_attach'=>$request->nvRegistrationCertificateFront,
            'nv_registration_certificate_back_attach'=>$request->nvRegistrationCertificateBack,
            'power_attorney_attach'=>$request->powerAttorney,
            'distinction_mark_or_payment_receipt_attach'=>$request->distinctionMarkOrPaymentReceipt,
            'permit_sheet_attach'=>$request->permitSheet,
            'driver_license_attach'=>$request->driverLicense,

            'car_front_side_attach'=>$request->carFrontSide,
            'car_back_side_attach'=>$request->carBackSide,
            'car_left_side_attach'=>$request->carLeftSide,
            'car_right_side_attach'=>$request->carRightSide,

            'car_interior_front_attach'=>$request->carInteriorFront,
            'car_interior_back_attach'=>$request->carInteriorBack,
            'car_luggage_attach'=>$request->carLuggage,
            'insurance_attach'=>$request->insurance,

        ]);

        if ($data){ return response()->json('Uğurla əlavə olundu!',200); }
        else{return response()->json('Xəta baş verdi!',404); }


    }


    public function uploadFile(Request $request){

        $request->validate([
            'file'=>'required|mimes:pdf,jpg,jpeg,png|max:3072'
        ]);


        if ($request->hasFile('file')) {
            $file = $request->file('file')->getClientOriginalName();
            $path  = '/driver_attaches/';
            $name = pathinfo($file, PATHINFO_FILENAME);
            $fileName = Str::slug($name) . '-' . time() . '.' . $request->file->getClientOriginalExtension();
            $request->file->move(public_path($path), $fileName);
            $file_url = $path . $fileName;
            return $file_url;
        }




    }

    public function deleteFile(Request $request)
    {
        $request->validate([
            'file'=>'required'
        ]);

        if ($request->file) {
            $path  = '/driver_attaches/';
            $file=$request->file;

            if (\File::exists(public_path($path.$file))) {
                unlink(public_path($path.$file));
                return response()->json('Uğurla silindi!',200);
            }else{
                return response()->json('Xəta baş verdi!',404);
            }


        }
    }

}
