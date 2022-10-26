<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = ['firstname','lastname','fatherName','phone','fin',
        'email','registrationCertificateNumber','registrationType',
        'registrationAddress','tin','accountHolderName','bankName',
        'bankCode','iban','swift','refCode','nationalId','license',
        'vehicle','vehicleModel','vehicleYear','vehicleNumber','vehicleColor',
        'confirmingDocument','profile','tinCopy','bankAccount','tinCopyBack',
        'convictionCertificate','idCard','paymentReceiptSSPF','nvRegistrationCertificateFront',
        'nvRegistrationCertificateBack','powerAttorney','distinctionMarkOrPaymentReceipt',
        'permitSheet','driverLicense','carFrontSide','carBackSide','carLeftSide','carRightSide',
        'carInteriorFront','carInteriorBack','carLuggage','insurance'];
}
