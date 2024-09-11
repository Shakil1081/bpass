<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyOrganizationRequest;
use App\Http\Requests\StoreOrganizationRequest;
use App\Http\Requests\UpdateOrganizationRequest;
use App\Models\Organization;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganizationController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('organization_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Organization::with(['createdBy', 'updatedBy'])->select(sprintf('%s.*', (new Organization)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'organization_show';
                $editGate      = 'organization_edit';
                $deleteGate    = 'organization_delete';
                $crudRoutePart = 'organizations';

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
            $table->addColumn('created_by_name', function ($row) {
                return $row->createdBy ? $row->createdBy->full_name : '';
            });

            $table->addColumn('updated_by_name', function ($row) {
                return $row->updatedBy ? $row->updatedBy->full_name : '';
            });

            $table->editColumn('address', function ($row) {
                return $row->address ? $row->address : '';
            });
            $table->editColumn('is_corporate', function ($row) {
                return $row->is_corporate ? Organization::IS_CORPORATE_SELECT[$row->is_corporate] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('short_name', function ($row) {
                return $row->short_name ? $row->short_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by', 'updated_by']);

            return $table->make(true);
        }

        return view('admin.organizations.index');
    }

    public function create()
    {
        abort_if(Gate::denies('organization_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.organizations.create', compact('created_bies', 'updated_bies'));
    }

    public function store(StoreOrganizationRequest $request)
    {
        $organization = Organization::create($request->all());

        if ($request->input('logo', false)) {
            $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $organization->id]);
        }

        return redirect()->route('admin.organizations.index');
    }

    public function edit(Organization $organization)
    {
        abort_if(Gate::denies('organization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('full_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organization->load('createdBy', 'updatedBy');

        return view('admin.organizations.edit', compact('created_bies', 'organization', 'updated_bies'));
    }

    public function update(UpdateOrganizationRequest $request, Organization $organization)
    {
        $organization->update($request->all());

        if ($request->input('logo', false)) {
            if (! $organization->logo || $request->input('logo') !== $organization->logo->file_name) {
                if ($organization->logo) {
                    $organization->logo->delete();
                }
                $organization->addMedia(storage_path('tmp/uploads/' . basename($request->input('logo'))))->toMediaCollection('logo');
            }
        } elseif ($organization->logo) {
            $organization->logo->delete();
        }

        return redirect()->route('admin.organizations.index');
    }

    public function show(Organization $organization)
    {
        abort_if(Gate::denies('organization_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->load('createdBy', 'updatedBy');

        return view('admin.organizations.show', compact('organization'));
    }

    public function destroy(Organization $organization)
    {
        abort_if(Gate::denies('organization_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $organization->delete();

        return back();
    }

    public function massDestroy(MassDestroyOrganizationRequest $request)
    {
        $organizations = Organization::find(request('ids'));

        foreach ($organizations as $organization) {
            $organization->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('organization_create') && Gate::denies('organization_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Organization();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
