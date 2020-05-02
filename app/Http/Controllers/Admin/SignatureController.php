<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use Mail;
use App\Client;
use App\Signature;
use Carbon\Carbon;
use App\Mail\WorkOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SignatureController extends Controller
{
      public function store(Request $request, $id){
                // dd($request->get('client-name'));
            $base64 = $request->get('base64');
            $path = public_path().'/img/signatures/';
            $image = str_replace('data:image/png;base64,', '', $base64);
            $fileData = base64_decode($image);
            $fileName = uniqid().'.png';
            
            $moved = file_put_contents($path.$fileName, $fileData);

            $signature = new Signature();
            $signature->title = $request->get('signature-title');
            $signature->url = '/img/signatures/'.$fileName;
            $signature->save();

            $post = Post::find($id);
            $pdf = PDF::loadView('pdf.order', ['post'=> $post]);   

            $url = 'pdf/order/ordentrabajo-'.$post->id.'-'.Carbon::now()->format('dmYHis').'.pdf';
            $pdf->save($url);

            $post->finished_at = Carbon::now();
            $post->observation = $request->observation;
            $post->signature_id = $signature->id;
            $post->email = $request->email;
            $post->file = $url;
            $post->save();

    /*        Mail::send('emails/work-order', $post, function ($mail) use ($pdf) {
                  $mail->from('david.aguilar@msn.com', 'David Doe');
                  $mail->to('david.villegas.aguilar@gmail.com');
                  $mail->attachData($pdf->output(), 'test.pdf');
              });
*/
            $email = $post->email;
            $data = ['nombre' => $signature->title];
            Mail::send('emails.work-order', $data, function ($message) use ($pdf, $email) {
                  $message->from('david.aguilar@msn.com', 'Ecoref Chile');
                  $message->to($email);
                  $message->attachData($pdf->output(), 'test.pdf');
            });

            //return back();
            return redirect()
                  ->route('admin.posts.index')
                  ->with('flash', 'Reporte de trabajo ha sido enviado al correo.');
      }
}
