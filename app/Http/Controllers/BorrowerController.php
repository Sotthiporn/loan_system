<?php

namespace App\Http\Controllers;

use App\Models\Borrower;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    //Get
    public function get(Request $request){

        $tableSize = empty($request->input('table_size')) ? 5 : $request->input('table_size');

        $filter = $request->input('filter');
        $search = !empty($filter['search']) ? $filter['search'] : null;

        $data = Borrower::join('company', 'company.id', 'borrower.company_id')
            ->join('borrower_guarantor', 'borrower_guarantor.borrower_id', 'borrower.id')
            ->when($search, function ($query) use ($search) {
                $query->where('borrower.first_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.last_name', 'LIKE', "%{$search}%")
                ->orWhere('borrower.address', 'LIKE', "%{$search}%")
                ->orWhere('borrower.email', 'LIKE', "%{$search}%")
                ->orWhere('borrower.dob', 'LIKE', "%{$search}%")
                ->orWhere('borrower.phone', 'LIKE', "%{$search}%")
                ->orWhere('borrower.alt_phone', 'LIKE', "%{$search}%")
                ->orWhere('borrower.business_name', 'LIKE', "%{$search}%");
            })
            ->select(
                'borrower.id as id',
                'company.id as company_id',
                'company.company_name',
                'borrower.first_name',
                'borrower.last_name',
                'borrower.gender',
                'borrower.dob',
                'borrower.business_name',
                'borrower.email',
                'borrower.phone',
                'borrower.alt_phone',
                'borrower.address',
                'borrower.photo',
                'borrower.national_id_photo',
                'borrower.salary_invoice',
                'borrower.mortgage',
                'borrower.family_book',
                'borrower_guarantor.id as guarantor_id',
                'borrower_guarantor.first_name as guarantor_first_name',
                'borrower_guarantor.last_name as guarantor_last_name',
                'borrower_guarantor.gender as guarantor_gender',
                'borrower_guarantor.dob as guarantor_dob',
                'borrower_guarantor.business_name as guarantor_business_name',
                'borrower_guarantor.email as guarantor_email',
                'borrower_guarantor.phone as guarantor_phone',
                'borrower_guarantor.alt_phone as guarantor_alt_phone',
                'borrower_guarantor.address as guarantor_address',
                'borrower_guarantor.photo as guarantor_photo',
                'borrower_guarantor.national_id_photo as guarantor_national_photo',
                'borrower_guarantor.salary_invoice as guarantor_salary_invoice',
                'borrower_guarantor.mortgage as guarantor_mortgage',
            )
            ->orderBy('borrower.id', 'desc')
            ->paginate($tableSize);

        return $this->responseWithPagination($data);
    }
}
