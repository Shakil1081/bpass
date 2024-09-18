<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPartyGroupBdRequest;
use App\Http\Requests\StorePartyGroupBdRequest;
use App\Http\Requests\UpdatePartyGroupBdRequest;
use App\Models\PartyGroupBd;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class PartyGroupBdController extends Controller
{
    use MediaUploadingTrait, CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('party_group_bd_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = PartyGroupBd::with(['last_updated_stamp'])->select(sprintf('%s.*', (new PartyGroupBd)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'party_group_bd_show';
                $editGate      = 'party_group_bd_edit';
                $deleteGate    = 'party_group_bd_delete';
                $crudRoutePart = 'party-group-bds';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('group_name', function ($row) {
                return $row->group_name ? $row->group_name : '';
            });
            $table->editColumn('group_name_local', function ($row) {
                return $row->group_name_local ? $row->group_name_local : '';
            });
            $table->editColumn('office_site_name', function ($row) {
                return $row->office_site_name ? $row->office_site_name : '';
            });
            $table->editColumn('annual_revenue', function ($row) {
                return $row->annual_revenue ? $row->annual_revenue : '';
            });
            $table->editColumn('num_employees', function ($row) {
                return $row->num_employees ? $row->num_employees : '';
            });
            $table->editColumn('ticker_symbol', function ($row) {
                return $row->ticker_symbol ? $row->ticker_symbol : '';
            });
            $table->editColumn('comments', function ($row) {
                return $row->comments ? $row->comments : '';
            });
            $table->editColumn('logo_image_url', function ($row) {
                if ($photo = $row->logo_image_url) {
                    return sprintf(
                        '<a href="%s" target="_blank"><img src="%s" width="50px" height="50px"></a>',
                        $photo->url,
                        $photo->thumbnail
                    );
                }

                return '';
            });
            $table->addColumn('last_updated_stamp_name', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp->name : '';
            });

            $table->editColumn('last_updated_tx_stamp', function ($row) {
                return $row->last_updated_tx_stamp ? $row->last_updated_tx_stamp : '';
            });
            $table->editColumn('employee_position_type_in_local', function ($row) {
                return $row->employee_position_type_in_local ? $row->employee_position_type_in_local : '';
            });
            $table->editColumn('group_brand_name', function ($row) {
                return $row->group_brand_name ? $row->group_brand_name : '';
            });
            $table->editColumn('tin_no', function ($row) {
                return $row->tin_no ? $row->tin_no : '';
            });
            $table->editColumn('vat_reg_no', function ($row) {
                return $row->vat_reg_no ? $row->vat_reg_no : '';
            });
            $table->editColumn('registratn_category', function ($row) {
                return $row->registratn_category ? $row->registratn_category : '';
            });
            $table->editColumn('bin_no', function ($row) {
                return $row->bin_no ? $row->bin_no : '';
            });
            $table->editColumn('acct_status', function ($row) {
                return $row->acct_status ? $row->acct_status : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'logo_image_url', 'last_updated_stamp']);

            return $table->make(true);
        }

        return view('admin.partyGroupBds.index');
    }

    public function create()
    {
        abort_if(Gate::denies('party_group_bd_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $last_updated_stamps = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.partyGroupBds.create', compact('last_updated_stamps'));
    }

    public function store(StorePartyGroupBdRequest $request)
    {
        $partyGroupBd = PartyGroupBd::create($request->all());

        if ($request->input('logo_image_url', false)) {
            $partyGroupBd->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_image_url'))))->toMediaCollection('logo_image_url');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $partyGroupBd->id]);
        }

        return redirect()->route('admin.party-group-bds.index');
    }

    public function edit(PartyGroupBd $partyGroupBd)
    {
        abort_if(Gate::denies('party_group_bd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $last_updated_stamps = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $partyGroupBd->load('last_updated_stamp');

        return view('admin.partyGroupBds.edit', compact('last_updated_stamps', 'partyGroupBd'));
    }

    public function update(UpdatePartyGroupBdRequest $request, PartyGroupBd $partyGroupBd)
    {
        $partyGroupBd->update($request->all());

        if ($request->input('logo_image_url', false)) {
            if (! $partyGroupBd->logo_image_url || $request->input('logo_image_url') !== $partyGroupBd->logo_image_url->file_name) {
                if ($partyGroupBd->logo_image_url) {
                    $partyGroupBd->logo_image_url->delete();
                }
                $partyGroupBd->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo_image_url'))))->toMediaCollection('logo_image_url');
            }
        } elseif ($partyGroupBd->logo_image_url) {
            $partyGroupBd->logo_image_url->delete();
        }

        return redirect()->route('admin.party-group-bds.index');
    }

    public function show(PartyGroupBd $partyGroupBd)
    {
        abort_if(Gate::denies('party_group_bd_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyGroupBd->load('last_updated_stamp');

        return view('admin.partyGroupBds.show', compact('partyGroupBd'));
    }

    public function destroy(PartyGroupBd $partyGroupBd)
    {
        abort_if(Gate::denies('party_group_bd_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $partyGroupBd->delete();

        return back();
    }

    public function massDestroy(MassDestroyPartyGroupBdRequest $request)
    {
        $partyGroupBds = PartyGroupBd::find(request('ids'));

        foreach ($partyGroupBds as $partyGroupBd) {
            $partyGroupBd->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('party_group_bd_create') && Gate::denies('party_group_bd_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PartyGroupBd();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
