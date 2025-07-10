<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KycKyb extends Model
{
    protected $fillable = [
        'user_id', 'full_name', 'date_of_birth', 'nationality', 'id_type', 'id_number',
        'id_document', 'residential_address', 'proof_of_address', 'company_name',
        'company_registration', 'country_incorporation', 'business_type',
        'business_address', 'company_documents', 'representative_name', 'representative_id',
        'status', 'remarks'
        
    ];

    protected $casts = [
        'company_documents' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
