<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostaRequest;
use App\Models\Bosta;
use Illuminate\Http\Request;
use App\Models\Side;
use Carbon\Carbon;
use App\Models\Responsible;
use App\Models\Governor_signatur;
use App\Models\Other_Bosta;
use App\Models\Signature_decision;
use App\Models\Signature_detail;
use App\Models\Signature_Priorty;
use App\Models\Vice_signatur;

class BostaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Gsignatur = Governor_signatur::select()->get();
        return view('posta.posta', compact('Gsignatur'));
    }
    /**
     * Display a listing of the resource.
     */
    public function indexPosta()
    {
        $Gsignatur = Governor_signatur::select()->get();
        return view('posta.postaDetails.show', compact('Gsignatur'));
    }


    public function create()
    {
        $responsibles = Responsible::select()->get();
        $side = Side::select()->get();
        return view('posta.add_posta', compact('responsibles', 'side'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $now = Carbon::today();
        $file = [];
        if ($files = $request->file('posta_file')) {
            foreach ($files as $file) {
                $ext = strtolower($file->getClientOriginalName());
                $file_name = time() . '.' . $ext;
                $path = 'vice';
                $file->move($path, $file_name);
                $upload[] = $file_name;
            }
        } else {
            $upload[] = '';
        }

        try {
            $signatur = Governor_signatur::create([
                'posta_num' => request('posta_num'),
                'posta_office_num' => request('posta_office_num'),
                'posta_date' => request('posta_date'),
                'bosta_recive' => request('bosta_recive'),
                'side_name' => request('side_name'),
                'posta_state' => 'لم يتم',
                'posta_about' => request('posta_about'),
                'posta_file' => implode('|', $upload),
            ]);
            for ($i = 0; $i < count($request->side_mean); $i++) {
                $side_mean[] = $request->side_mean[$i];
                Bosta::create([
                    'side_mean' => $side_mean[$i],
                    'governor_signature_id' => $signatur->id,
                ]);
            }
            return redirect()->route('signature.details')->with(['success' => 'تم حفظ الموضوع بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('signature.details')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function vic_done(Request $request, string $id)
    {
        //
        $responsibles = Responsible::select()->get();
        $sign = Vice_signatur::select()->get();
        $Gsignatur = Governor_signatur::select()->find($id);
        $Gsign = Governor_signatur::select()->where('id', $id)->get();
        $side = Bosta::select()->where('governor_signature_id', $id)->get();
        return view('posta.view_pdf', compact('Gsignatur', 'Gsign', 'side', 'responsibles', 'sign'));
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $Sign_decision = Signature_decision::select()->where('governor_signature_id', $id)->get();
        $Sign_detail = Signature_detail::select()->where('governor_signature_id', $id)->get();
        $side = Bosta::select()->where('governor_signature_id', $id)->get();
        $Sign_Priorty = Signature_Priorty::select()->where('governor_signature_id', $id)->get();
        $other = Other_Bosta::select()->where('governor_signature_id', $id)->get();
        $sign = Vice_signatur::select()->get();
        $Gsignatur = Governor_signatur::select()->find($id);
        $Gsign = Governor_signatur::select()->where('id', $id)->get();
        return view('posta.postaDetails.edit', compact('Gsignatur', 'Gsign', 'side', 'sign', 'Sign_decision', 'Sign_detail', 'Sign_Priorty', 'other'));
    }

    public function Print_sign($id)
    {
        $Sign_decision = Signature_decision::select()->where('governor_signature_id', $id)->get();
        $Sign_detail = Signature_detail::select()->where('governor_signature_id', $id)->get();
        $side = Bosta::select()->where('governor_signature_id', $id)->get();
        $Sign_Priorty = Signature_Priorty::select()->where('governor_signature_id', $id)->get();
        $other = Other_Bosta::select()->where('governor_signature_id', $id)->get();
        $sign = Vice_signatur::select()->get();
        $Gsignatur = Governor_signatur::select()->find($id);
        $Gsign = Governor_signatur::select()->where('id', $id)->get();
        return view('posta.postaDetails.print', compact('Gsignatur', 'other', 'Gsign', 'side', 'sign', 'Sign_decision', 'Sign_detail', 'Sign_Priorty'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            Governor_signatur::where('id', $id)->update([
                "posta_state" => 'تم'
            ]);
            Signature_decision::create([
                'vice_decision' => $request['vice_decision'],
                'follow_date' => $request['follow_date'],
                'mgenral_state' => $request['mgenral_state'],
                'govice_state' => $request['govice_state'],
                'mgenral' => $request['mgenral'],
                'govice' => $request['govice'],
                'governor_signature_id' => $id,
            ]);
            try{
                if($request->side_means)
                for ($i = 0; $i < count($request->side_means); $i++) {
                    $side_means[] = $request->side_means[$i];
                    Other_Bosta::create([
                        'side_mean' => $side_means[$i],
                        'state' => 1,
                        'prority' => 1,
                        'governor_signature_id' => $id,
                    ]);
                }

            }catch(\Exception $ex){

            }
            if($request->bosta_id)
            for ($i = 0; $i < count($request->bosta_id); $i++) {
                $bosta_id[] = $request->bosta_id[$i];
                Signature_detail::create([
                    'bosta_id' => $bosta_id[$i],
                    'governor_signature_id' => $id,
                ]);
            }
            if($request->bostaa_id)
            for ($i = 0; $i < count($request->bostaa_id); $i++) {
                $bostaa_id[] = $request->bostaa_id[$i];
                Signature_Priorty::create([
                    'bosta_id' => $bostaa_id[$i],
                    'priority' => 1,
                    'governor_signature_id' => $id,
                ]);
            }
            return redirect()->route('bosta.index')->with(['success' => 'تم حفظ التأشيرة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->route('bosta.index')->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        // try {
            $Gsignatur = Governor_signatur::find($id);
            $bosta =Bosta:: where('governor_signature_id',$id)->delete('governor_signature_id');
            if (!$Gsignatur) {
                return redirect()
                    ->back()
                    ->with(['error' => 'هذه التأشيرة غير موجوده']);
            }
            $Gsignatur->forcedelete();

            return redirect()
                ->back()
                ->with(['success' => 'تم حذف التأشيرة بنجاح']);
        // } catch (\Exception $ex) {
        //     return redirect()
        //         ->back()
        //         ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        // }
    }
}
