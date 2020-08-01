<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAtestatRequest;
use App\Http\Requests\StoreAtestatRequest;
use App\Http\Requests\UpdateAtestatRequest;
use App\Models\Atestat;
use App\Models\Place;
use App\Models\Region;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AtestatController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('atestat_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atestats = Atestat::all();

        return view('admin.atestats.index', compact('atestats'));
    }

    public function create()
    {
        abort_if(Gate::denies('atestat_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Region::all()->pluck('mnemonic', 'id')->prepend(trans('global.pleaseSelect'), '');

        $regions = Region::all()->pluck('denj', 'id')->prepend(trans('global.pleaseSelect'), '');

        $places = Place::all()->pluck('denloc', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.atestats.create', compact('series', 'regions', 'places'));
    }

    public function store(StoreAtestatRequest $request)
    {
        $atestat = Atestat::create($request->all());

        if ($request->input('image', false)) {
            $atestat->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $atestat->id]);
        }

        return redirect()->route('admin.atestats.index');
    }

    public function edit(Atestat $atestat)
    {
        abort_if(Gate::denies('atestat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $series = Region::all()->pluck('mnemonic', 'id')->prepend(trans('global.pleaseSelect'), '');

        $regions = Region::all()->pluck('denj', 'id')->prepend(trans('global.pleaseSelect'), '');

        $places = Place::all()->pluck('denloc', 'id')->prepend(trans('global.pleaseSelect'), '');

        $atestat->load('serie', 'region', 'place', 'created_by');

        return view('admin.atestats.edit', compact('series', 'regions', 'places', 'atestat'));
    }

    public function update(UpdateAtestatRequest $request, Atestat $atestat)
    {
        $atestat->update($request->all());

        if ($request->input('image', false)) {
            if (!$atestat->image || $request->input('image') !== $atestat->image->file_name) {
                if ($atestat->image) {
                    $atestat->image->delete();
                }

                $atestat->addMedia(storage_path('tmp/uploads/' . $request->input('image')))->toMediaCollection('image');
            }
        } elseif ($atestat->image) {
            $atestat->image->delete();
        }

        return redirect()->route('admin.atestats.index');
    }

    public function show(Atestat $atestat)
    {
        abort_if(Gate::denies('atestat_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atestat->load('serie', 'region', 'place', 'created_by');

        return view('admin.atestats.show', compact('atestat'));
    }

    public function destroy(Atestat $atestat)
    {
        abort_if(Gate::denies('atestat_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $atestat->delete();

        return back();
    }

    public function massDestroy(MassDestroyAtestatRequest $request)
    {
        Atestat::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('atestat_create') && Gate::denies('atestat_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Atestat();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}