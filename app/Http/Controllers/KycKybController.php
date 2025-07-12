<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\KycKybRequest;

class KycKybController extends Controller
{
    public function create()
    {
        $kyc = auth()->user()->kycKyb;

        if( isset($kyc->status) && $kyc->status != "rejected"){
            return to_route('kyc-kyb.status');
        }

        return view('kyc-kyb.form', compact('kyc'));
    }

    public function store(KycKybRequest $request)
    {
        $user = auth()->user();

        if ($user->kycKyb) {
            return back()->with('error', 'You have already submitted your KYC/KYB information.');
        }

        // Encrypt file uploads (stored in encrypted disk)
        $idDoc          = $request->file('id_document')->store('', 'encrypted');
        $proofAddress   = $request->file('proof_of_address')->store('', 'encrypted');
        $companyDocs    = collect($request->file('company_documents'))->map(fn ($f) => $f->store('', 'encrypted'))->toJson();
        $repId          = $request->file('representative_id')->store('', 'encrypted');

        $user->kycKyb()->create([
            'full_name' => $request->full_name,
            'date_of_birth' => $request->date_of_birth,
            'nationality' => $request->nationality,
            'id_type' => $request->id_type,
            'id_number' => $request->id_number,
            'id_document' => $idDoc,
            'residential_address' => $request->residential_address,
            'proof_of_address' => $proofAddress,
            'company_name' => $request->company_name,
            'company_registration' => $request->company_registration,
            'country_incorporation' => $request->country_incorporation,
            'business_type' => $request->business_type,
            'business_address' => $request->business_address,
            'company_documents' => $companyDocs,
            'representative_name' => $request->representative_name,
            'representative_id' => $repId,
        ]);

        return redirect()->route('kyc-kyb.form')->with('success', 'Your KYC/KYB application has been submitted.');
    }

    public function status()
    {
        $kyc = auth()->user()->kycKyb;

        return view('kyc-kyb.status', compact('kyc'));
    }
}
