<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF; // PDFクラスを使うために追加


class WillController extends Controller
{
    public function generateWillPDF(Request $request)
    {
        $willContent = $request->input('will_content'); // 遺言書の内容を受け取る

        // PDFを生成
        $pdf = PDF::loadView('will_content', compact('willContent'));
        
        // PDFファイルとしてダウンロードさせる
        return $pdf->download('will.pdf');
    }
}
