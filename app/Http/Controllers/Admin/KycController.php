<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KycKyb;

class KycController extends Controller
{
    public function index()
    {
        $applications = KycKyb::with('user')->latest()->paginate(10);
        $total_applications = KycKyb::count();
        $pending_count = KycKyb::where('status', 'pending')->count();
        $approved_count = KycKyb::where('status', 'approved')->count();
        $rejected_count = KycKyb::where('status', 'rejected')->count();

        return view('admin.kyc.index', compact('applications', 'total_applications', 'pending_count', 'approved_count', 'rejected_count' ));
    }

    public function show($id)
    {
        $application = KycKyb::findOrFail($id);
        return view('admin.kyc.show', compact('application'));
    }

    public function verify(Request $request, $id)
    {
        $application = KycKyb::findOrFail($id);

        $application->status = $request->input('action') === 'approved' ? 'approved' : 'rejected';
        $application->remarks = $request->input('remarks');
        $application->save();

        return redirect()->route('admin.kyc.index')->with('success', 'Application updated.');
    }
}
