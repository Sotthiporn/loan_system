<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BorrowerGuarantor extends Model
{
    use HasFactory, SoftDeletes;

    const TABLE_NAME = 'borrower_guarantor';
    const ID = 'id';
    const BORROWER_ID = 'borrower_id';
    const FIRST_NAME = 'first_name';
    const LAST_NAME = 'last_name';
    const GENDER = 'gender';
    const DOB = 'dob';
    const ADDRESS = 'address';
    const PHONE = 'phone';
    const EMAIL = 'email';
    const ALT_PHONE = 'alt_phone';
    const PHOTO = 'photo';
    const NATIONAL_ID_PHOTO = 'national_id_photo';
    const BUSINESS_NAME = 'business_name';
    const SALARY_INVOICE = 'salary_invoice';
    const MORTGAGE = 'mortgage';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    //Image path for photo
    const photoPath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR . 'photo';
    const thumbnailPhotoPath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR  . 'photo' . DIRECTORY_SEPARATOR . 'thumbnail';

    //Image path for national_id_photo
    const nationalPath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR . 'national_id_photo';
    const thumbnailNationalPath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR  . 'national_id_photo' . DIRECTORY_SEPARATOR . 'thumbnail';


    //Image path for salary_invoice
    const salaryInvoicePath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR . 'salary_invoice';
    const thumbnailSalaryInvoicePath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR  . 'salary_invoice' . DIRECTORY_SEPARATOR . 'thumbnail';


    //Image path for mortgage
    const mortgagePath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR . 'mortgage';
    const thumbnailMortgagePath = 'images' . DIRECTORY_SEPARATOR . 'guarantor' . DIRECTORY_SEPARATOR  . 'mortgage' . DIRECTORY_SEPARATOR . 'thumbnail';

    protected $table = self::TABLE_NAME;


    public static function comboList(){
        return self::orderBy('id', 'desc')->get();
    }


    public function setData($data)
    {
        $this->{self::BORROWER_ID} = $data[self::BORROWER_ID];
        $this->{self::FIRST_NAME} = $data[self::FIRST_NAME];
        $this->{self::LAST_NAME} = $data[self::LAST_NAME];
        $this->{self::GENDER} = $data[self::GENDER];
        $this->{self::DOB} = $data[self::DOB];
        $this->{self::ADDRESS} = $data[self::ADDRESS];
        $this->{self::EMAIL} = $data[self::EMAIL];
        $this->{self::PHONE} = $data[self::PHONE];
        $this->{self::ALT_PHONE} = $data[self::ALT_PHONE];
        $this->{self::BUSINESS_NAME} = $data[self::BUSINESS_NAME];
    }
}
