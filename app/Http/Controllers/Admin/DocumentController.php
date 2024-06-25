<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentRequest;
use App\Models\Document;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('documents_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Document::with(['createdInfo', 'updatedInfo','organizationInfo'])->select(sprintf('%s.*', (new Document)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'documents_show';
                $editGate      = 'documents_edit';
                $deleteGate    = 'documents_delete';
                $crudRoutePart = 'documents';

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
            $table->addColumn('createdInfo', function ($row) {
                return $row->createdInfo ? $row->createdInfo->name : '';
            });

            $table->addColumn('updatedInfo', function ($row) {
                return $row->updatedInfo ? $row->updatedInfo->name : '';
            });

            $table->addColumn('organizationInfo', function ($row) {
                return $row->organizationInfo ? $row->organizationInfo->name : '';
            });

            $table->editColumn('created_stamp', function ($row) {
                return $row->created_stamp ? $row->created_stamp : '';
            });

            $table->editColumn('last_updated_stamp', function ($row) {
                return $row->last_updated_stamp ? $row->last_updated_stamp : '';
            });
            $table->editColumn('ref_id', function ($row) {
                return $row->ref_id ? $row->ref_id : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'created_by', 'updated_by']);

            return $table->make(true);
        }

        return view('admin.documents.index');
    }

    public function create()
    {
        abort_if(Gate::denies('documents_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documents.create', compact('created_bies', 'updated_bies','organizations'));
    }

    public function store(DocumentRequest $request)
    {
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = date('Ymd') . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/documents', $fileName);
            $fileUrl = Storage::url($filePath);
            $fileSize = $file->getSize();
            $fileType = $file->getMimeType();
        }

        Document::create([
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'organization_id' => $request->organization_id,
            'created_stamp' => $request->created_stamp,
            'last_updated_stamp' => $request->last_updated_stamp,
            'file_path' => $fileUrl ?? '',
            'file_name' => $fileName ?? '',
            'file_size' => $fileSize ?? '',
            'file_type' => $fileType ?? '',
            'ref_id' => $request->ref_id,
            'ref_table' => $request->ref_table,
        ]);

        return redirect()->route('admin.documents.index');
    }

    public function show(Document $document)
    {
        abort_if(Gate::denies('documents_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.documents.show', compact('document'));
    }

    public function edit(Document $document)
    {
        abort_if(Gate::denies('documents_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $created_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $organizations = Organization::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documents.edit', compact('created_bies', 'updated_bies','organizations','document'));
    }

    public function update(DocumentRequest $request, Document $document)
    {
        if ($request->hasFile('file_path')) {
            if ($document->file_path) {
                Storage::delete('public/documents/' . $document->file_name);
            }

            $file = $request->file('file_path');
            $fileName = date('Ymd') . rand(100, 999) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/documents', $fileName);
            $fileUrl = Storage::url($filePath);
            $fileSize = $file->getSize();
            $fileType = $file->getMimeType();
        }

        $document->update([
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by,
            'organization_id' => $request->organization_id,
            'created_stamp' => $request->created_stamp,
            'last_updated_stamp' => $request->last_updated_stamp,
            'file_path' => $fileUrl ?? $document->file_path,
            'file_name' => $fileName ?? $document->file_name,
            'file_size' => $fileSize ?? $document->file_size,
            'file_type' => $fileType ?? $document->file_type,
            'ref_id' => $request->ref_id,
            'ref_table' => $request->ref_table,
        ]);

        return redirect()->route('admin.documents.index');
    }

    public function destroy(Document $document)
    {
        $document->delete();
        return redirect()->route('admin.documents.index');
    }
}
