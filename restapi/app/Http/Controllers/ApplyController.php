<?php

namespace App\Http\Controllers;
use App\Models\Apply;
use Illuminate\Http\Request;

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
            'fatherName'=>$request->fatherName,
            'phone'=>$request->phone,
            'fin'=>$request->fin,
            'email'=>$request->email,
            'registrationCertificateNumber'=>$request->registrationCertificateNumber,
            'registrationType'=>$request->registrationType,
            'registrationAddress'=>$request->registrationAddress,
            'tin'=>$request->tin,
            'accountHolderName'=>$request->accountHolderName,
            'bankName'=>$request->bankName,
            'bankCode'=>$request->bankCode,
            'iban'=>$request->iban,
            'swift'=>$request->swift,
            'refCode'=>$request->refCode,
            'nationalId'=>$request->nationalId,
            'license'=>$request->license,
            'vehicle'=>$request->vehicle,
            'vehicleModel'=>$request->vehicleModel,
            'vehicleYear'=>$request->vehicleYear,
            'vehicleNumber'=>$request->vehicleNumber,
            'vehicleColor'=>$request->vehicleColor,
            'confirmingDocument'=>$request->confirmingDocument,
            'profile'=>$request->profile,
            'tinCopy'=>$request->tinCopy,
            'bankAccount'=>$request->bankAccount,
            'tinCopyBack'=>$request->tinCopyBack,
            'convictionCertificate'=>$request->convictionCertificate,
            'idCard'=>$request->idCard,
            'paymentReceiptSSPF'=>$request->paymentReceiptSSPF,
            'nvRegistrationCertificateFront'=>$request->nvRegistrationCertificateFront,
            'firstnvRegistrationCertificateBackname'=>$request->nvRegistrationCertificateBack,
            'powerAttorney'=>$request->powerAttorney,
            'distinctionMarkOrPaymentReceipt'=>$request->distinctionMarkOrPaymentReceipt,
            'permitSheet'=>$request->permitSheet,
            'driverLicense'=>$request->driverLicense,
            'carFrontSide'=>$request->carFrontSide,
            'carBackSide'=>$request->carBackSide,
            'carLeftSide'=>$request->carLeftSide,
            'carInteriorFront'=>$request->carInteriorFront,
            'carInteriorBack'=>$request->carInteriorBack,
            'carLuggage'=>$request->carLuggage,
            'insurance'=>$request->insurance,

        ]);

        if ($data){ return response()->json('Uğurla əlavə olundu!',200); }
        else{return response()->json('Xəta baş verdi!',404); }


    }


    public function upload(Request $request){

    }

}
