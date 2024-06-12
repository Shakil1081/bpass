<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRequisitionRequest;
use App\Http\Requests\StoreRequisitionRequest;
use App\Http\Requests\UpdateRequisitionRequest;
use App\Models\Department;
use App\Models\Requisition;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RequisitionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('requisition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Requisition::with(['updated_by', 'department'])->select(sprintf('%s.*', (new Requisition)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'requisition_show';
                $editGate      = 'requisition_edit';
                $deleteGate    = 'requisition_delete';
                $crudRoutePart = 'requisitions';

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
            $table->addColumn('updated_by_name', function ($row) {
                return $row->updated_by ? $row->updated_by->name : '';
            });

            $table->addColumn('department_department_name', function ($row) {
                return $row->department ? $row->department->department_name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'updated_by', 'department']);

            return $table->make(true);
        }

        return view('admin.requisitions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('requisition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.requisitions.create', compact('departments', 'updated_bies'));
    }

    public function store(StoreRequisitionRequest $request)
    {
        $requisition = Requisition::create($request->all());

        return redirect()->route('admin.requisitions.index');
    }

    public function edit(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $updated_bies = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $departments = Department::pluck('department_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $requisition->load('updated_by', 'department');

        return view('admin.requisitions.edit', compact('departments', 'requisition', 'updated_bies'));
    }

    public function update(UpdateRequisitionRequest $request, Requisition $requisition)
    {
        $requisition->update($request->all());

        return redirect()->route('admin.requisitions.index');
    }

    public function show(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requisition->load('updated_by', 'department');

        return view('admin.requisitions.show', compact('requisition'));
    }

    public function destroy(Requisition $requisition)
    {
        abort_if(Gate::denies('requisition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $requisition->delete();

        return back();
    }

    public function massDestroy(MassDestroyRequisitionRequest $request)
    {
        $requisitions = Requisition::find(request('ids'));

        foreach ($requisitions as $requisition) {
            $requisition->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
