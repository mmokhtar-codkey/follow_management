<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaViceRequest;
use App\Http\Requests\StorePostaRequest;
use App\Models\International;
use App\Models\Media;
use App\Models\Note;
use App\Models\Note_Category;
use Illuminate\Http\Request;
use App\Models\Vice_signatur;
use Carbon\Carbon;

class SignatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sign = Vice_signatur::select()->get();
        return view('signature.signature-pad', compact('sign'));
    }
    public function noteVice()
    {
        $cat_note = Note_Category::select()->get();
        return view('posta.vice.nota', compact('cat_note'));
    }
    public function viewnoteVice()
    {
        //
        $cat_note =Note_Category::select()->get();
        $note =Note:: select()->get();
        return view('posta.vice.show.shownote',compact('note','cat_note'));
    }
    public function noteViceCreate(MediaViceRequest $request)
    {
        //

        try {
            $file = [];
            if ($files = $request->file('attach')) {
                foreach ($files as $f => $file) {
                    $ext = $file->getClientOriginalExtension();
                    $file_name = time() . '.' . $f++ . '.' . $ext;
                    $path = 'vice/note';
                    $file->move($path, $file_name);
                    $upload[] = $file_name;
                }
            } else {
                $upload[] = '';
            }
            Note::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'date' => $request['date'],
                'ncategory_id' => $request['ncategory_id'],
                'attach' => implode('|', $upload),

            ]);
            return redirect()
                ->back()
                ->with(['success' => 'تم حفظ النوتة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function shownoteVice(string $id)
    {
        //

        $note = Note::select()->where('id', $id)->find($id);
        return view('posta.vice.viewnote', compact('note'));
    }
    public function catviewnoteVice(string $id)
    {
        //
        $cat_note =Note_Category::select()->where('id', $id)->find($id);
        $note = Note::select()->where('ncategory_id', $id)->get();
        return view('posta.vice.show.allnotes', compact('note','cat_note'));
    }
    public function noteCategoryCreate(Request $request)
    {
        //

        try {

            Note_Category::create([
                'name' => $request['name'],
            ]);
            return redirect()
                ->back()
                ->with(['success' => 'تم حفظ النوتة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function nationVice()
    {
        //
        return view('posta.vice.nation');
    }
    public function viewnationVice()
    {
        //
        $nation = International::select()->get();
        return view('posta.vice.show.shownation', compact('nation'));
    }
    public function nationViceCreate(MediaViceRequest $request)
    {
        //

        try {
            $file = [];
            if ($files = $request->file('attach')) {
                foreach ($files as $f => $file) {
                    $ext = $file->getClientOriginalExtension();
                    $file_name = time() . '.' . $f++ . '.' . $ext;
                    $path = 'vice/nation';
                    $file->move($path, $file_name);
                    $upload[] = $file_name;
                }
            } else {
                $upload[] = '';
            }
            International::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'date' => $request['date'],
                'side_id' => $request['side_id'],
                'attach' => implode('|', $upload),

            ]);
            return redirect()
                ->back()
                ->with(['success' => 'تم حفظ النوتة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function shownationVice(string $id)
    {
        //
        $nation = International::select()->where('id', $id)->find($id);
        return view('posta.vice.viewnation', compact('nation'));
    }
    public function mediaVice()
    {
        //
        return view('posta.vice.media');
    }
    public function viewmediaVice()
    {
        //
        $media = Media::select()->get();
        return view('posta.vice.show.showmedia', compact('media'));
    }
    public function mediaViceCreate(MediaViceRequest $request)
    {
        //

        try {
            $file = [];
            if ($files = $request->file('attach')) {
                foreach ($files as $f => $file) {
                    $ext = $file->getClientOriginalExtension();
                    $file_name = time() . '.' . $f++ . '.' . $ext;
                    $path = 'vice/media';
                    $file->move($path, $file_name);
                    $upload[] = $file_name;
                }
            } else {
                $upload[] = '';
            }
            Media::create([
                'title' => $request['title'],
                'description' => $request['description'],
                'date' => $request['date'],
                'side_id' => $request['side_id'],
                'attach' => implode('|', $upload),

            ]);
            return redirect()
                ->back()
                ->with(['success' => 'تم حفظ النوتة بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function showmediaVice(string $id)
    {
        //
        $media = Media::select()->where('id', $id)->find($id);
        return view('posta.vice.viewmedia', compact('media'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $folderPath = 'vice/'; // create signatures folder in public directory
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $signature = uniqid() . '.' . $image_type;
        $file = $folderPath . $signature;
        file_put_contents($file, $image_base64);

        // $data_uri = "data:image/png;base64,iVBORw0K...";
        // $encoded_image = explode(",", $data_uri)[1];
        // $decoded_image = base64_decode($encoded_image);
        // $signature = uniqid() . '.' . $encoded_image;
        // $file = $folderPath . $signature;
        // file_put_contents($file, $decoded_image);
        // Save in your data in database here.
        Vice_signatur::create([
            // 'name' => $request->name,
            'signature' => $file
        ]);

        return back()->with('success', ' تم حفظ التوقيع الإلكتروني بنجاح ');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $signs = Vice_signatur::find($id);
            if (!$signs) {
                return redirect()
                    ->back()
                    ->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $signs->forcedelete();

            return redirect()
                ->back()
                ->with(['success' => 'تم حذف التوقيع بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function notedestroy(string $id)
    {
        //
        try {
            $signs = Note::find($id);
            if (!$signs) {
                return redirect()
                    ->back()
                    ->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $signs->forcedelete();

            return redirect()
                ->back()
                ->with(['success' => 'تم الحذف  بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function mediadestroy(string $id)
    {
        //
        try {
            $signs = Media::find($id);
            if (!$signs) {
                return redirect()
                    ->back()
                    ->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $signs->forcedelete();

            return redirect()
                ->back()
                ->with(['success' => 'تم  الحذف بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
    public function nationdestroy(string $id)
    {
        //
        try {
            $signs = International::find($id);
            if (!$signs) {
                return redirect()
                    ->back()
                    ->with(['error' => 'هذه الموضوع غير موجوده']);
            }
            $signs->forcedelete();

            return redirect()
                ->back()
                ->with(['success' => 'تم الحذف  بنجاح']);
        } catch (\Exception $ex) {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }
}
