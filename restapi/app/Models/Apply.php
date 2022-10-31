<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = [

        'firstname','lastname','father_name','phone','fin',
        'email','registration_certificate_number','registration_type',
        'registration_address','tin','account_holder_name','bank_name',
        'bank_code','iban','swift','ref_code','national_id','driver_license',
        'vehicle','vehicle_model','vehicle_model_year','vehicle_number','vehicle_color',
        'confirming_document','profile','tin_copy_attach','bank_account_attach','tin_copy_back_attach',
        'conviction_certificate_attach','id_card_attach','payment_receipt_sspf_attach','nv_registration_certificate_front_attach',
        'nv_registration_certificate_back_attach','power_attorney_attach','distinction_mark_or_payment_receipt_attach',
        'permit_sheet_attach','driver_license_attach','car_front_side_attach','car_back_side_attach','car_left_side_attach','car_right_side_attach',
        'car_interior_front_attach','car_interior_back_attach','car_luggage_attach','insurance_attach'
    ];
}
