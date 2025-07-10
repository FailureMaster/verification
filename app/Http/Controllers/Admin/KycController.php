<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KycKyb;

class KycController extends Controller
{
    public function index()
    {
        $applications = KycKyb::latest()->paginate(10);
        return view('admin.kyc.index', compact('applications'));
    }

    public function show($id)
    {
        $application = KycKyb::findOrFail($id);
        return view('admin.kyc.show', compact('application'));
    }

    public function verify(Request $request, $id)
    {
        $application = KycKyb::findOrFail($id);

        $application->status = $request->input('action') === 'verify' ? 'verified' : 'rejected';
        $application->remarks = $request->input('remarks');
        $application->save();

        return redirect()->route('admin.kyc.index')->with('success', 'Application updated.');
    }
}
