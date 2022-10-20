<?php

namespace App\Http\Controllers\Manager;

use App\Http\Requests\NewsCreateRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Repositories\CategoryRepository;
use App\Repositories\NewsRepository;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends BaseController
{
    private $newsRepository;
    private $categoryRepository;

    public function __construct()
    {
        parent::__construct();
        $this->newsRepository = app(NewsRepository::class);
        $this->categoryRepository = app(CategoryRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemlist = $this->newsRepository->getAll();
        return view('manager.index', compact('itemlist'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = new News();
        $categoryList = $this->categoryRepository->getForCombobox();
        return  view('manager.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsCreateRequest $request)
    {
        $data = $request->input();
        $item = (new News())->create($data);

        if ($item) {
            return redirect()   ->route('manager.edit', [$item->id])
                ->with(['success'=>'Успешно сохранено']);
        } else {
            return back()   ->withErrors(['msg'=>'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->newsRepository->getEdit($id);
        if (empty($item)) {
            abort(404);
        }
        $categoryList = $this->categoryRepository->getForComboBox();

        return view('manager.edit',
            compact('item', 'categoryList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsUpdateRequest $request, $id)
    {
        $item = $this->newsRepository->getEdit($id);

        if (empty($item)){
            return back()
                ->withErrors(['msg' => "Запись id=[{$id}] не найдена"])
                ->withInput();
        }

        $data = $request->all();

        $result = $item->update($data);

        if ($result){
            return redirect()
                ->route('manager.edit', $item->id)
                ->with(['success'=>'Успешно сохранено']);
        }
        else {
            return back()
                ->withErrors(['msg' => 'Ошибка сохранения'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //софт-удаление (остается в б.д.)
        $result = News::destroy($id);
        // полное удаление из б.д.
//         $result = News::find($id)->forceDelete();
        if ($result){
            return redirect()
                ->route('manager.index')
                ->with(['success' => "Запись id[$id] удалена"]);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления']);
        }
    }
}
