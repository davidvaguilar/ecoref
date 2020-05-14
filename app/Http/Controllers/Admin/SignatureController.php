<?php

namespace App\Http\Controllers\Admin;

use App\Post;
use App\Record;
use Mail;
use App\Client;
use App\Signature;
use App\Refrigerant;
use Carbon\Carbon;
use App\Mail\WorkOrder;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class SignatureController extends Controller
{
      public function store(Request $request, $id){
            $post = Post::find($id);

            $base64 = $request->get('base64');
            $path = public_path().'/img/signatures/';
            $image = str_replace('data:image/png;base64,', '', $base64);
            $fileData = base64_decode($image);
            $fileName = 'ot-'.$post->title.'-'.Carbon::now()->format('dmYHis').'.png';
            
            $moved = file_put_contents($path.$fileName, $fileData);
            $signature = new Signature();
            $signature->url = '/img/signatures/'.$fileName;
            $signature->save();
            
            $post->finished_at = Carbon::now();
            $post->observation = $request->observation;
            $post->signature_id = $signature->id;
            $post->save();

            $refrigerants = Refrigerant::all();
            $pdf = PDF::loadView('pdf.order', ['post'=> $post, 'refrigerants'=> $refrigerants]);   
            $url = 'pdf/order/ot-'.$post->title.'-'.Carbon::now()->format('dmYHis').'.pdf';
            $pdf->save($url);

            $record = new Record;
            $record->post_id = $post->id;
            $record->url = $url;
            $record->save();
          
            $subject = 'ordentrabajo-'.$post->id;
            $to = $post->email;
            $data = ['nombre' => 'Ecoref'];
           
            Mail::send('emails.work-order', $data, function ($message) use ($pdf, $to, $subject) {
                  $message->from('hugo.ortiz@ecorefchile.cl', 'Ecoref Chile');
                  $message->to('ot@ecorefchile.cl')->subject($subject);
                  $message->attachData($pdf->output(), $subject.'.pdf');
            });
            return redirect()
                  ->route('admin.posts.index')
                  ->with('flash', 'Se ha generado un PDF de la OT '.$post->title.'.');
      }
}
