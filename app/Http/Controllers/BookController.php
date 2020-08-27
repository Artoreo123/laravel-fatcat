<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Books;
use App\BookImage;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 20;

        if (!empty($keyword)) {
            $books = Books::oldest()->where('name', 'like', '%' . $keyword . '%')->paginate($perPage);// WHERE LIKE !!!
        } else {
//            $books = Books::oldest()->orderBy('id')->paginate($perPage);
            $books = Books::orderBy('id','ASC')->get();
        }
        //$books = $books->toArray();
        //$books['data'] = array_reverse($books['data'], true);

        $response = Http::get('api.openweathermap.org/data/2.5/weather?q=Khonkaen&appid=9226067b44d78f9290896fedede6c640')->json();

        return view('books.index')->with(['books' => $books, 'datas' => $response]);
        //return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
//        //return json_encode($item);
        $types = Type::all();
        return view('books.create')->with(['types' => $types]);

//        return view ('books.create', compact('items'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

//        $requestData = $request->all();
//        Books::create(['name' => $requestData['name'],'type_id' => $requestData['item']]);
        $request->validate([
            'name' => 'required',
            'type_id' => 'nullable',
            'image' => 'image|mimes:png,jpg,jpeg|max:10000'
        ]);
        $form_data = array(
            'name' => $request->name,
            'type_id' => $request->type_id
        );

        //image uoload
//        $image = $request->image;
//        if ($image) {
//            $imageName = $image->getClientOriginalName();
//            $image->move('images', $imageName);
//            $form_data['image'] = $imageName;
//        }

        Books::create($form_data);
        return redirect('book/index')->with('flash_message', 'Book added!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {

        $books = Books::findOrFail($id);
//        $types = Typies::all();

        return view('books.show')->with(['books' => $books]);
//        return view('books.show', compact('books'));
//        return view('directory.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $books = Books::findOrFail($id);
        $types = Type::all();

        return view('books.edit')->with(['books' => $books, 'types' => $types]);

//        $item = Books::findOrFail($id);
//        return view('books.create')->with(['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'nullable'
        ]);
        $form_data = array(
            'name' => $request->name,
            'type_id' => $request->type_id
        );

        Books::whereId($id)->update($form_data);
        return redirect('book/index')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {

//        $books = Books::findOrFail($id);
//        DB::table('book_images')->where('books_id', $books['id'])->delete();
        Books::destroy($id);

//        $books = Books::findOrFail($id);
//        $books->delete();
        return redirect('book/index')->with('flash_message', 'Book deleted!');
    }

    public function uploadImage($id, Request $request)
    {
        $books = Books::findOrFail($id);

        $value = DB::table('book_images')->where('books_id', $books['id'])->get();
        //dd(get($value->count()."asd"));
        if ($value->count() <= 4) {
            $image = $request->file('file');
            if ($image) {
                $imageName = time() . $image->getClientOriginalName();
                $image->move('images', $imageName);
                $imagePath = "/images/$imageName";
                //insert Image
                $books->images()->create(['image_path' => $imagePath]);
//                return view('book/edit/'+$id);
                return $uploaded_file=true;
            } else {
                return $value->count()." !!!";
            }
        }
        else return "can't upload !!!!!!!";
    }

//    public function deleteImage($idimg,$bookid)
//    {
//        $booksimg = BookImage::findOrFail($idimg);
//        BookImage::destroy($idimg);
//        //delete image in folder
//        $image_path = public_path().'/'.$booksimg->image_path;
//        unlink($image_path);
//        $booksimg->delete();
//        return redirect('book/edit/'.$bookid)->with('flash_message', 'Book deleted!');
//    }
    public function deleteImage($id)
    {
        $booksimg = BookImage::findOrFail($id);
        BookImage::destroy($id);
        //delete image in folder
        $image_path = public_path().'/'.$booksimg->image_path;
        unlink($image_path);
        $booksimg->delete();
        return ["status"=>true];

       // return redirect('book/edit/'.$bookid)->with('flash_message', 'Book deleted!');
    }
    public function typeBook($typeid)
    {
        $books = Books::where('type_id',$typeid)->orderBy('id','ASC')->get();

        return view('books.index', compact('books'));
    }
    public function temp(Request $request){
        // API +++++++++++++++++++++++++++++++++++
        $form_namecity = array(
            'namecity' => $request->namecity
        );
        dd($form_namecity);
        $response = Http::get('api.openweathermap.org/data/2.5/weather?q='.$form_namecity.'&appid=9226067b44d78f9290896fedede6c640')->json();

        dd($response);
        return view('books.index')->with([ 'datas' => $response]);

//        return redirect('book/index')->with([ 'datas' => $response]);
//
    }
}
