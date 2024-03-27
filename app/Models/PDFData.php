<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PDFData extends Model
{
    protected $fillable = ['date', 'description', 'amount','fees','total'];
    protected $table = 'pdf_data';
    public function PDFData()
  {
    return $this->belongsTo(PDFData::class);
  }
}
