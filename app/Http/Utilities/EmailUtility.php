<?php

namespace App\Http\Utilities;

use App\Models\Order;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;

class EmailUtility 
{


    public static function getPdf($id){

        $settings = view()->shared('global_d');
        $data = Order::find($id);
        $mpdf = new \Mpdf\Mpdf([
            'mode' => 'utf-8',
            'orientation' => 'P',
            'format'      => 'A4',
            'margin_left' => 0,
            'margin_right' => 0,
            'margin_top' => 0,
            'margin_bottom' => 0,
        ]);
   
        $html = Blade::render('theme.invoice',compact('data','settings'));
        $mpdf->WriteHTML($html);
        $pdfContent = $mpdf->Output('', 'S');
        return $pdfContent;
        
    }


    public static function generatePdf($id){

        $pdfContent = EmailUtility::getPdf($id);
        $pdfPath = public_path('admin/invoices/'.$id.'.pdf'); 
        file_put_contents($pdfPath, $pdfContent);

        return $pdfPath;

    }

    public static function send_customer_email($id){


        $data = Order::find($id)->toArray();
        $data['pdf_path'] = EmailUtility::generatePdf($id);
        $data['admin_email'] = View::shared('global_d')['email_address'];

        Mail::send('theme.emails.order-confirmation-email',$data, function($message) use($data){

            $message->to($data['customer_email']);
            $message->subject('Order Receipt - ' . $data['customer_email']);
            $message->from(env('MAIL_USERNAME'), env('MAIL_FROM_NAME'));
            $message->cc($data['admin_email']);
            
            $message->attach($data['pdf_path'], array(
                'as' => 'order-invoice'.$data['id'].'.pdf',      
                'mime' => 'application/pdf')
            );

        });

    }
    


   
}
