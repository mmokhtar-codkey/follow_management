<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MediaViceRequest;
use App\Http\Requests\StorePostaRequest;
use App\Models\International;
use App\Models\Media;
use App\Models\Media_Vice_Comment;
use App\Models\Nation_Category;
use App\Models\Nation_Vice_Comment;
use App\Models\Note;
use App\Models\Note_Category;
use App\Models\Note_Vice_Comment;
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

    /*------------------
     * Vice Note
     * ----------------
     */
    public function noteVice()
    {
        $cat_note = Note_Category::select()->get();
        return view('posta.vice.nota', compact('cat_note'));
    }
    public function viewnoteVice()
    {
        //
        $cat_note = Note_Category::select()->get();
        $note = Note::select()->get();
        return view('posta.vice.show.shownote', compact('note', 'cat_note'));
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
        $vice_comment = Note_Vice_Comment::select()->where('note_id',$id)->get();
        $note = Note::select()->where('id', $id)->find($id);
        return view('posta.vice.viewnote', compact('note','vice_comment'));
    }
    public function catviewnoteVice(string $id)
    {
        //
        $cat_note = Note_Category::select()->where('id', $id)->find($id);
        $note = Note::select()->where('ncategory_id', $id)->get();
        return view('posta.vice.show.allnotes', compact('note', 'cat_note'));
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
    /*------------------
     * Vice Note_Comment
     * ----------------
     */
    public function NoteComment_create(Request $request)
    {
        try {
            Note_Vice_Comment::create([
                'comment' => $request['comment'],
                'other' => $request['other'],
                'note_id' => $request['note_id'],
            ]);
            return redirect()
                ->back()
                ->with(['success' => 'تم حفظ التعليمات بنجاح']);
        }
        catch (\Exception $ex)
        {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /*------------------
     * Vice Nation
     * ----------------
     */
    public function nationCategoryCreate(Request $request)
    {
        //
        try {

            Nation_Category::create([
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
    public function catviewNationVice(string $id)
    {
        //
        $cat_nation = Nation_Category::select()->where('id', $id)->find($id);
        $nation = International::select()->where('ncategory_id', $id)->get();
        return view('posta.vice.show.allnation', compact('nation', 'cat_nation'));
    }
    public function nationVice()
    {
        //
        $cat_nation = Nation_Category::select()->get();
        return view('posta.vice.nation',compact('cat_nation'));
    }
    public function viewnationVice()
    {
        //
        $cat_nation = Nation_Category::select()->get();
        $nation = International::select()->get();
        return view('posta.vice.show.shownation', compact('nation', 'cat_nation'));

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
    public function shownationVice(string $id)
    {
        //
        $vice_comment = Nation_Vice_Comment::select()->where('nation_id',$id)->get();
        $nation = International::select()->where('id', $id)->find($id);
        return view('posta.vice.viewnation', compact('nation','vice_comment'));
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
    /*------------------
     * Vice Nation_Comment
     * ----------------
    */
    public function NationComment_create(Request $request)
    {
        try {
            Nation_Vice_Comment::create([
                'comment' => $request['comment'],
                'other' => $request['other'],
                'nation_id' => $request['nation_id'],
            ]);
            return redirect()
                ->back()
                ->with(['success' => 'تم حفظ التعليمات بنجاح']);
        }
        catch (\Exception $ex)
        {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /*------------------
     * Vice Media
     * ----------------
    */
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
    /*------------------
     * Vice Nation_comment
     * ----------------
     */
    public function MediaComment_create(Request $request)
    {
        try {
            Media_Vice_Comment::create([
                'comment' => $request['comment'],
                'other' => $request['other'],
                'media_id' => $request['media_id'],
            ]);
            return redirect()
                ->back()
                ->with(['success' => 'تم حفظ التعليمات بنجاح']);
        }
        catch (\Exception $ex)
        {
            return redirect()
                ->back()
                ->with(['error' => 'هناك خطا ما يرجي المحاوله فيما بعد']);
        }
    }

    /*----------------------
     * توقيع السيد المحافظ
     * ---------------------
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
}
