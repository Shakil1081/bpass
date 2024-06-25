<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }} {{ request()->is("admin/teams*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('team_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.teams.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.team.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('finance_bank_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.finance-banks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/finance-banks") || request()->is("admin/finance-banks/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.financeBank.title') }}
                </a>
            </li>
        @endcan
        @can('organization_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.organizations.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/organizations") || request()->is("admin/organizations/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.organization.title') }}
                </a>
            </li>
        @endcan
        @can('bank_account_access')
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.bank-account.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/bank-account") || request()->is("admin/bank-account/*") ? "c-active" : "" }}">
                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                </i>
                {{ trans('cruds.bank_account.title') }}
            </a>
        </li>
        @endcan
        @can('cheques_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.cheques.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cheques") || request()->is("admin/cheques/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cheques.title') }}
                </a>
            </li>
        @endcan
        @can('cheques_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.cheques-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cheques-details") || request()->is("admin/cheques-details/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.cheque_details.title') }}
                </a>
            </li>
        @endcan
        @can('party_group_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.party-groups.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/party-groups") || request()->is("admin/party-groups/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.partyGroup.title') }}
                </a>
            </li>
        @endcan
        @can('party_group_bd_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.party-group-bds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/party-group-bds") || request()->is("admin/party-group-bds/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.partyGroupBd.title') }}
                </a>
            </li>
        @endcan
        @can('party_table_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.party-tables.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/party-tables") || request()->is("admin/party-tables/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.partyTable.title') }}
                </a>
            </li>
        @endcan
        @can('department_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.departments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/departments") || request()->is("admin/departments/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.department.title') }}
                </a>
            </li>
        @endcan

        @can('documents_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.documents.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/documents") || request()->is("admin/documents/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.documents.title') }}
                </a>
            </li>
        @endcan
        @can('non_purchase_order_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.non-purchase-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/non-purchase-orders") || request()->is("admin/non-purchase-orders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.nonPurchaseOrder.title') }}
                </a>
            </li>
        @endcan
        @can('requisition_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.requisitions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/requisitions") || request()->is("admin/requisitions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.requisition.title') }}
                </a>
            </li>
        @endcan
        @can('purchase_order_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.purchase-orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/purchase-orders") || request()->is("admin/purchase-orders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.purchaseOrder.title') }}
                </a>
            </li>
        @endcan
        @can('products_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.products.title') }}
                </a>
            </li>
        @endcan

        @can('term_condition_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.term-conditions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/term-conditions") || request()->is("admin/term-conditions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.termCondition.title') }}
                </a>
            </li>
        @endcan
        @can('budget_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.budgets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/budgets") || request()->is("admin/budgets/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.budget.title') }}
                </a>
            </li>
        @endcan
        @can('expense_type_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.expense-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/expense-types") || request()->is("admin/expense-types/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.expenseType.title') }}
                </a>
            </li>
        @endcan
        @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
            <li class="c-sidebar-nav-item">
                <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "c-active" : "" }} c-sidebar-nav-link" href="{{ route("admin.team-members.index") }}">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-users">
                    </i>
                    <span>{{ trans("global.team-members") }}</span>
                </a>
            </li>
        @endif
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>
